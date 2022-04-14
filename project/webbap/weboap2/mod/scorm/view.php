<?php  // $Id: view.php,v 1.50.2.1 2007/02/28 05:36:23 nicolasconnault Exp $

    require_once("../../config.php");
    require_once('locallib.php');
    
    $id = optional_param('id', '', PARAM_INT);       // Course Module ID, or
    $a = optional_param('a', '', PARAM_INT);         // scorm ID
    $organization = optional_param('organization', '', PARAM_INT); // organization ID

    if (!empty($id)) {
        if (! $cm = get_coursemodule_from_id('scorm', $id)) {
            error("Course Module ID was incorrect");
        }
        if (! $course = get_record("course", "id", $cm->course)) {
            error("Course is misconfigured");
        }
        if (! $scorm = get_record("scorm", "id", $cm->instance)) {
            error("Course module is incorrect");
        }
    } else if (!empty($a)) {
        if (! $scorm = get_record("scorm", "id", $a)) {
            error("Course module is incorrect");
        }
        if (! $course = get_record("course", "id", $scorm->course)) {
            error("Course is misconfigured");
        }
        if (! $cm = get_coursemodule_from_instance("scorm", $scorm->id, $course->id)) {
            error("Course Module ID was incorrect");
        }
    } else {
        error('A required parameter is missing');
    }

    require_login($course->id, false, $cm);

    $context = get_context_instance(CONTEXT_COURSE, $course->id);

    if (isset($SESSION->scorm_scoid)) {
        unset($SESSION->scorm_scoid);
    }

    $strscorms = get_string("modulenameplural", "scorm");
    $strscorm  = get_string("modulename", "scorm");

    if ($course->id != SITEID) { 
        $navigation = "<a $CFG->frametarget href=\"../../course/view.php?id=$course->id\">$course->shortname</a> ->";
        if ($scorms = get_all_instances_in_course('scorm', $course)) {
            // The module SCORM activity with the least id is the course  
            $firstscorm = current($scorms);
            if (!(($course->format == 'scorm') && ($firstscorm->id == $scorm->id))) {
                $navigation .= "<a $CFG->frametarget href=\"index.php?id=$course->id\">$strscorms</a> ->";
            }       
        }
    } else {
        $navigation = "<a $CFG->frametarget href=\"index.php?id=$course->id\">$strscorms</a> ->";
    }

    $pagetitle = strip_tags($course->shortname.': '.format_string($scorm->name));

    add_to_log($course->id, 'scorm', 'pre-view', 'view.php?id='.$cm->id, "$scorm->id");

    if ((has_capability('mod/scorm:skipview', get_context_instance(CONTEXT_MODULE,$cm->id))) && scorm_simple_play($scorm,$USER)) {
        exit;
    }

    //
    // Print the page header
    //
    print_header($pagetitle, $course->fullname,
                 "$navigation <a $CFG->frametarget href=\"view.php?id=$cm->id\">".format_string($scorm->name,true)."</a>",
                 '', '', true, update_module_button($cm->id, $course->id, $strscorm), navmenu($course, $cm));

    if (empty($cm->visible) and !has_capability('moodle/course:manageactivities', $context)) {
            notice(get_string("activityiscurrentlyhidden"));
    }

    if (has_capability('moodle/course:manageactivities', $context)) {
        $trackedusers = get_record('scorm_scoes_track', 'scormid', $scorm->id, '', '', '', '', 'count(distinct(userid)) as c');
        if ($trackedusers->c > 0) {
            echo "<div class=\"reportlink\"><a $CFG->frametarget href=\"report.php?id=$cm->id\"> ".get_string('viewallreports','scorm',$trackedusers->c).'</a></div>';
        } else {
            echo '<div class="reportlink">'.get_string('noreports','scorm').'</div>';
        }
    }

    // Print the main part of the page
    print_heading(format_string($scorm->name));
    print_box(format_text($scorm->summary), 'generalbox', 'intro');
    scorm_view_display($USER, $scorm, 'view.php?id='.$cm->id, $cm);
    print_footer($course);
?>
