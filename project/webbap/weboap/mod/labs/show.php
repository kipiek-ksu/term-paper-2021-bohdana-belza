<?PHP // $Id: show.php,v 1.2 2006/11/21 19:26:36 skodak Exp $

require('teacheraccess.php'); //page only for teachers

///switch hidden state
$chapter->hidden = $chapter->hidden ? 0 : 1;

///add slashes to all text fields
$chapter->content = addslashes($chapter->content);
$chapter->title = addslashes($chapter->title);
$chapter->importsrc = addslashes($chapter->importsrc);
if (!update_record('labs_chapters', $chapter)) {
    error('Could not update your labs');
}

///change visibility of subchapters too
if (!$chapter->subchapter) {
    $chapters = get_records('labs_chapters', 'labsid', $labs->id, 'pagenum', 'id, subchapter, hidden');
    $found = 0;
    foreach($chapters as $ch) {
        if ($ch->id == $chapter->id) {
            $found = 1;
        } else if ($found and $ch->subchapter) {
            $ch->hidden = $chapter->hidden;
            update_record('labs_chapters', $ch);
        } else if ($found) {
            break;
        }
    }
}

add_to_log($course->id, 'course', 'update mod', '../mod/labs/view.php?id='.$cm->id, 'labs '.$labs->id);
add_to_log($course->id, 'labs', 'update', 'view.php?id='.$cm->id, $labs->id, $cm->id);
labs_check_structure($labs->id);
redirect('view.php?id='.$cm->id.'&chapterid='.$chapter->id);
die;

?>
