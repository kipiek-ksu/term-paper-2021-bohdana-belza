<?PHP // $Id: delete.php,v 1.2 2006/11/21 19:26:36 skodak Exp $

require('teacheraccess.php'); //page only for teachers
$confirm = optional_param('confirm', 0, PARAM_BOOL);


///header and strings
$strlabss = get_string('modulenameplural', 'labs');
$strlabs  = get_string('modulename', 'labs');

if ($course->category) {
    $navigation = '<a href="../../course/view.php?id='.$course->id.'">'.$course->shortname.'</a> ->';
} else {
    $navigation = '';
}

print_header( "$course->shortname: $labs->name",
              $course->fullname,
              "$navigation <a href=index.php?id=$course->id>$strlabss</a> -> $labs->name",
              '',
              '',
              true,
              '',
              ''
            );

///form processing
if ($confirm) {  // the operation was confirmed.
    if (!$chapter->subchapter) { //delete all its subchapters if any
        $chapters = get_records('labs_chapters', 'labsid', $labs->id, 'pagenum', 'id, subchapter');
        $found = false;
        foreach($chapters as $ch) {
            if ($ch->id == $chapter->id) {
                $found = true;
            } else if ($found and $ch->subchapter) {
                if (!delete_records('labs_chapters', 'id', $ch->id)) {
                    error('Could not update your labs');
                }
            } else if ($found) {
                break;
            }
        }
    }
    if (!delete_records('labs_chapters', 'id', $chapter->id)) {
        error('Could not update your labs');
    }

    add_to_log($course->id, 'course', 'update mod', '../mod/labs/view.php?id='.$cm->id, 'labs '.$labs->id);
    add_to_log($course->id, 'labs', 'update', 'view.php?id='.$cm->id, $labs->id, $cm->id);
    labs_check_structure($labs->id);
    redirect('view.php?id='.$cm->id);
    die;
} else {
    // the operation has not been confirmed yet so ask the user to do so
    if ($chapter->subchapter) {
        $strconfirm = get_string('confchapterdelete','labs');
    } else {
        $strconfirm = get_string('confchapterdeleteall','labs');
    }
    echo '<br />';
    notice_yesno("<b>$chapter->title</b><p>$strconfirm</p>",
                  "delete.php?id=$cm->id&chapterid=$chapter->id&confirm=1&sesskey=$USER->sesskey",
                  "view.php?id=$cm->id&chapterid=$chapter->id");
}

print_footer($course);

?>
