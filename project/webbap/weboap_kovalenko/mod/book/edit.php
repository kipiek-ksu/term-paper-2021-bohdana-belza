<?PHP // $Id: edit.php,v 1.1.8.1 2007/05/20 06:01:53 skodak Exp $

require_once('../../config.php');
require_once('lib.php');

$id         = required_param('id', PARAM_INT);           // Course Module ID
$chapterid  = optional_param('chapterid', 0, PARAM_INT); // Chapter ID
$pagenum    = optional_param('pagenum', 0, PARAM_INT);
$subchapter = optional_param('subchapter', 0, PARAM_BOOL);
$element = optional_param('element', 0, PARAM_INT);
$contenttype = optional_param('contenttype', 0, PARAM_INT);
$radio = optional_param('R1', 0, PARAM_INT);
$radio2 = optional_param('R2', 0, PARAM_INT);


// =========================================================================
// security checks START - only teachers edit
// =========================================================================
require_login();

if (!$cm = get_coursemodule_from_id('book', $id)) {
    error('Course Module ID was incorrect');
}

if (!$course = get_record('course', 'id', $cm->course)) {
    error('Course is misconfigured');
}

$context = get_context_instance(CONTEXT_MODULE, $cm->id);
require_capability('moodle/course:manageactivities', $context);

if (!$book = get_record('book', 'id', $cm->instance)) {
    error('Course module is incorrect');
}

$chapter = get_record('book_chapters', 'id', $chapterid);

//check all variables
unset($id);
unset($chapterid);
if ($chapter) {
    if ($chapter->bookid != $book->id) {//chapter id not in this book!!!!
        error('Chapter not part of this book!');
    }
    $pagenum = $chapter->pagenum;
} else {
    $pagenum = (integer)$pagenum;
}

// =========================================================================
// security checks END
// =========================================================================


/// If data submitted, then process and store.
if (($form = data_submitted()) && (confirm_sesskey())) {
    //TODO: skip it for now
    //prepare data - security checks
    //$form->title = clean_text($form->title, FORMAT_HTML);
    //$form->content = clean_text($form->content, FORMAT_HTML);
	//$form->element = $radio;
	switch($radio) {
		case 20:
			$form->subchapter = 0;
			break;
		case 21:
			$form->subchapter = 1;
			break;
		case 1:
			$form->subchapter = 1;
			$form->element = $radio;
			break;
		case 2:
			$form->subchapter = 1;
			$form->element = $radio;
			break;
		case 3:
			$form->subchapter = 1;
			$form->element = $radio;
			break;
		case 4:
			$form->subchapter = 1;
			$form->element = $radio;
			break;
		case 5:
			$form->subchapter = 1;
			$form->element = $radio;
			$form->contenttype = $radio2;
			break;
	}
/*
    if (isset($form->subchapter) ) {
        $form->subchapter = 1;
    } else {
        $form->subchapter = 0;
    }
 */   if ($chapter) {
        /// editing existing chapter
        $chapter->content = !isset($form->content)?'':$form->content;
        $chapter->title = $form->title;
        $chapter->element = !isset($form->element)?'':$form->element;
		$chapter->contenttype = !isset($form->contenttype)?'':$form->contenttype;
        $chapter->subchapter = !isset($form->subchapter)?'':$form->subchapter;
		$chapter->parentchapter = !isset($form->parentchapter)?'':$form->parentchapter;
        $chapter->timemodified = time();
        $chapter->importsrc = addslashes($chapter->importsrc); //use already stored importsrc
        //27.05.08 changing
		
		if (!update_record('book_chapters', $chapter)) {
            error('Could not update your book');
         }
        //add_to_log($course->id, 'course', 'update mod', '../mod/book/view.php?id='.$cm->id, 'book '.$book->id);
        //add_to_log($course->id, 'book', 'update', 'view.php?id='.$cm->id.'&chapterid='.$chapter->id, $book->id, $cm->id);
		
	} else {
        /// adding new chapter
        $chapter->bookid = $book->id;
        $chapter->pagenum = $form->pagenum + 1; //place after given pagenum, lets hope it is a number
        $chapter->subchapter = !isset($form->subchapter)?'':$form->subchapter;
        $chapter->element = !isset($form->element)?'':$form->element;
        $chapter->contenttype = !isset($form->contenttype)?'':$form->contenttype;
		$chapter->parentchapter = !isset($form->parentchapter)?'':$form->parentchapter;
        $chapter->title = $form->title;
        $chapter->content = !isset($form->content)?'':$form->content;
        $chapter->hidden = 0;
        $chapter->timecreated = time();
        $chapter->timemodified = $chapter->timecreated;
        $chapter->importsrc = '';
		//db query getting active records
		/*$getsql = "
			SELECT b.*
			FROM `mdl_book_chapters` b
			WHERE
				(b.pagenum > '%".$chapter->pagenum."%') AND (b.parentchapter = '%".$chapter->parentchapter."%')
			ORDER BY `pagenum` DESC
		";
		$chapters = get_records_sql($getsql);*/

		$chapters = get_records_select('book_chapters', '(pagenum >= '.$chapter->pagenum.') AND (parentchapter = '.$chapter->parentchapter.')','pagenum', 'pagenum, id');

        //$chapters = get_records('book_chapters', 'bookid', $book->id, 'pagenum', 'id', 'pagenum DESC');
        if ($chapters) {
            foreach($chapters as $ch) {
				
                /*if ($ch->pagenum > $pagenum) {*/
                    $ch->pagenum = $ch->pagenum + 1;
					if (!update_record('book_chapters', $ch)) {
						error('Could not update your book');
					}
				/*}*/
            }
        }

		
       if (!$chapter->id = insert_record('book_chapters', $chapter)) {
            error('Could not insert a new chapter');
        }
		

		/*
        add_to_log($course->id, 'course', 'update mod', '../mod/book/view.php?id='.$cm->id, 'book '.$book->id);
        add_to_log($course->id, 'book', 'update', 'view.php?id='.$cm->id.'&chapterid='.$chapter->id, $book->id, $cm->id);
		*/

	}

    book_check_structure($book->id);
    redirect("view.php?id=$cm->id&chapterid=$chapter->id");
    die;
}

/// Otherwise fill and print the form.
$strbook = get_string('modulename', 'book');
$strbooks = get_string('modulenameplural', 'book');
$stredit = get_string('edit');
$pageheading = get_string('editingchapter', 'book');

$usehtmleditor = can_use_html_editor();

if (!$chapter) {
    $chapter->id = -1;
    $chapter->title = '';
    $chapter->content = '';
    $chapter->subchapter = $subchapter;
    $chapter->pagenum = $pagenum;
}

///prepare the page header
if ($course->category) {
    $navigation = '<a href="../../course/view.php?id='.$course->id.'">'.$course->shortname.'</a> ->';
} else {
    $navigation = '';
}

print_header( "$course->shortname: $book->name",
              $course->fullname,
              "$navigation <a href=\"index.php?id=$course->id\">$strbooks</A> -> <a href=\"view.php?id=$cm->id\">$book->name</A> -> $stredit",
              '',
              '',
              true,
              '',
              ''
            );


$icon = '<img align="absmiddle" height="16" width="16" src="icon_chapter.gif" />&nbsp;';
print_heading_with_help($pageheading, 'edit', 'book', $icon);
print_simple_box_start('center', '');
include('edit.html');
print_simple_box_end();

if ($usehtmleditor ) {
    use_html_editor();
}

print_footer($course);

?>
