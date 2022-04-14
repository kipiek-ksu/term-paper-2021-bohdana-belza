<?php  // $Id: mod.php,v 1.7 2007/01/15 21:28:26 skodak Exp $

    if (!defined('MOODLE_INTERNAL')) {
        die('Direct access to this script is forbidden.');    ///  It must be included from a Moodle page
    }

    require_once($CFG->dirroot.'/course/lib.php');
    require_once($CFG->dirroot.'/course/report/log/lib.php');


    print_heading(get_string('chooselogs') .':');

    print_log_selector_form($course); 

    print_heading(get_string('chooselivelogs') .':');
    echo '<p>';
    link_to_popup_window('/course/report/log/live.php?id='. $course->id,'livelog', get_string('livelogs'), 500, 800);
    echo '</p>';
?>