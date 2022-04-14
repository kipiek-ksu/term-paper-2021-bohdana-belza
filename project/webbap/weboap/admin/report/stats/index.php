<?php  // $Id: index.php,v 1.10.4.1 2007/03/14 17:23:33 poltawski Exp $

    require_once('../../../config.php');
    require_once($CFG->dirroot.'/lib/statslib.php');
    require_once($CFG->dirroot.'/course/report/stats/lib.php');

    require_once($CFG->libdir.'/adminlib.php');

    $adminroot = admin_get_root();

    admin_externalpage_setup('reportstats', $adminroot);

    admin_externalpage_print_header($adminroot);


    $courseid = optional_param('course', SITEID, PARAM_INT);
    $report   = optional_param('report', 0, PARAM_INT);
    $time     = optional_param('time', 0, PARAM_INT);
    $mode     = optional_param('mode', STATS_MODE_GENERAL, PARAM_INT);
    $userid   = optional_param('userid', 0, PARAM_INT);
    $roleid   = 0;

    if ($report > 50) {
        $roleid = substr($report,1);
        $report = 5;
    }

    if ($report == STATS_REPORT_USER_LOGINS) {
        $courseid = SITEID; //override
    }

    if ($mode == STATS_MODE_RANKED) {
        redirect($CFG->wwwroot.'/'.$CFG->admin.'/report/stats/index.php?time='.$time, '', 3, $adminroot);
    }

    if (!$course = get_record("course","id",$courseid)) {
        error("That's an invalid course id");
    }

    if (!empty($userid)) {
        if (!$user = get_record('user','id',$userid)) {
            error("That's an invalid user id");
        }
    }

    require_login();

    if (empty($CFG->enablestats)) {
        redirect("$CFG->wwwroot/$CFG->admin/settings.php?section=stats", get_string('mustenablestats', 'admin'), 3, $adminroot);
    }

    require_capability('moodle/site:viewreports', get_context_instance(CONTEXT_COURSE, $course->id));

    add_to_log($course->id, "course", "report stats", "report/stats/index.php?course=$course->id", $course->id);

    stats_check_uptodate($course->id);


//    $strreports = get_string("reports");
//    $strstats = get_string('stats');
//
//    $menu = report_stats_mode_menu($course, $mode, $time); // add 4th $url parameter if uncommented!
//
//
//    $crumb = "<a href=\"{$CFG->wwwroot}/admin\">".get_string('administration')."</a> ->
//             <a href=\"{$CFG->wwwroot}/admin/report.php\">$strreports</a> ->
//             $strstats";

//    print_header("$course->shortname: $strstats", "$course->fullname",
//                  $crumb, '', '', true, '&nbsp;', $menu);


    require_once($CFG->dirroot.'/course/report/stats/report.php');

    admin_externalpage_print_footer($adminroot);

?>
