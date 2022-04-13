<?php  // $Id: edit.php,v 1.12.2.1 2007/02/23 20:17:36 mark-nielsen Exp $
/**
 * Provides the interface for overall authoring of lessons
 *
 * @version $Id: edit.php,v 1.12.2.1 2007/02/23 20:17:36 mark-nielsen Exp $
 * @license http://www.gnu.org/copyleft/gpl.html GNU Public License
 * @package lesson
 **/

    require_once('../../config.php');
    require_once('locallib.php');
    require_once('lib.php');

    $id      = required_param('id', PARAM_INT);             // Course Module ID
    $display = optional_param('display', 0, PARAM_INT);
    $mode    = optional_param('mode', get_user_preferences('lesson_view', 'collapsed'), PARAM_ALPHA);
    $pageid = optional_param('pageid', 0, PARAM_INT);
    
    if ($mode != 'single') {
        set_user_preference('lesson_view', $mode);
    }
    
    list($cm, $course, $lesson) = lesson_get_basics($id);
    
    if ($firstpage = get_record('lesson_pages', 'lessonid', $lesson->id, 'prevpageid', 0)) {
        if (!$pages = get_records('lesson_pages', 'lessonid', $lesson->id)) {
            error('Could not find lesson pages');
        }
    }
    
    if ($pageid) {
        if (!$singlepage = get_record('lesson_pages', 'id', $pageid)) {
            error('Could not find page ID: '.$pageid);
        }
    }

    require_login($course->id, false, $cm);
    $context = get_context_instance(CONTEXT_MODULE, $cm->id);
    require_capability('mod/lesson:manage', $context);
    
    lesson_print_header($cm, $course, $lesson, $mode);

    echo "EDIT PAGE";
    
    print_footer($course);
?>
