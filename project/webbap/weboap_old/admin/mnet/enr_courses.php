<?PHP  // $Id: enr_courses.php,v 1.5.2.2 2007/04/13 06:33:00 nicolasconnault Exp $
       // enrol_config.php - allows admin to edit all enrollment variables
       //                    Yes, enrol is correct English spelling.

    require_once(dirname(__FILE__) . "/../../config.php");
    require_once($CFG->libdir.'/adminlib.php');

    if (!confirm_sesskey()) {
        error(get_string('confirmsesskeybad', 'error'));
    }


    $adminroot = admin_get_root();
    admin_externalpage_setup('mnetenrol', $adminroot);
    $CFG->pagepath = 'admin/mnet';

    require_once("$CFG->dirroot/enrol/enrol.class.php");   /// Open the factory class
    $enrolment = enrolment_factory::factory('mnet');

    $mnethost = required_param('host', PARAM_INT);
    $host = get_record('mnet_host', 'id', $mnethost);

    $courses = $enrolment->fetch_remote_courses($mnethost);

    /// Print the page

    admin_externalpage_print_header($adminroot);

    print_box('<strong>' . s($host->name) . ' </strong><br />'
              . get_string("enrolcourses_desc", "mnet"));

    echo '<hr />';

    echo '<div id="trustedhosts"><!-- See theme/standard/styles_layout.css #trustedhosts .generaltable for rules -->'
           . '<table class="generaltable">';

    $icon  = "<img src=\"$CFG->pixpath/i/course.gif\"".
    " class=\"icon\" alt=\"".get_string("course")."\" />";

    foreach ($courses as $course) {
        $link = $CFG->wwwroot . '/admin/mnet/enr_course_enrol.php?'
            . "host={$mnethost}&amp;courseid={$course->id}&amp;sesskey={$USER->sesskey}";
        echo '<tr>'
               . "<td>$icon</td>"
               . "<td><a href=\"$link\">".format_string($course->fullname). "</a></td>"
               . '</tr><tr>'
               . '<td></td>'
               . '<td>'.format_string($course->shortname). ' - ' .format_string($course->cat_name).'</td>'
               . '</tr><tr>'
               . '<td></td>'
               . "<td align=\"left\" >{$course->summary}</td>"
               . '</tr>';
    }
    echo '</table></div>';

    admin_externalpage_print_footer($adminroot);

?>
