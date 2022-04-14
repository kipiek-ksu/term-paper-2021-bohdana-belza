<?php // $Id: index.php,v 1.4.4.1 2007/02/28 05:36:35 nicolasconnault Exp $

/// This page lists all the instances of lams in a particular course

    require_once("../../config.php");
    require_once("lib.php");

    $id = required_param('id', PARAM_INT);   // course

    if (! $course = get_record("course", "id", $id)) {
        error("Course ID is incorrect");
    }

    require_login($course->id);

    add_to_log($course->id, "lams", "view all", "index.php?id=$course->id", "");


/// Get all required strings

    $strlamss = get_string("modulenameplural", "lams");
    $strlams  = get_string("modulename", "lams");


/// Print the header

    if ($course->id != SITEID) {
        $navigation = "<a href=\"../../course/view.php?id=$course->id\">$course->shortname</a> ->";
    }

    print_header("$course->shortname: $strlamss", $course->fullname, "$navigation $strlamss", "", "", true, "", navmenu($course));

/// Get all the appropriate data

    if (! $lamss = get_all_instances_in_course("lams", $course)) {
        notice("There are no lams", "../../course/view.php?id=$course->id");
        die;
    }

/// Print the list of instances (your module will probably extend this)

    $timenow = time();
    $strname  = get_string("name");
    $strweek  = get_string("week");
    $strtopic  = get_string("topic");

    if ($course->format == "weeks") {
        $table->head  = array ($strweek, $strname);
        $table->align = array ('center', 'left');
    } else if ($course->format == "topics") {
        $table->head  = array ($strtopic, $strname);
        $table->align = array ('center', 'left', 'left', 'left');
    } else {
        $table->head  = array ($strname);
        $table->align = array ('left', 'left', 'left');
    }

    foreach ($lamss as $lams) {
        if (!$lams->visible) {
            //Show dimmed if the mod is hidden
            $link = "<a class=\"dimmed\" href=\"view.php?id=$lams->coursemodule\">$lams->name</a>";
        } else {
            //Show normal if the mod is visible
            $link = "<a href=\"view.php?id=$lams->coursemodule\">$lams->name</a>";
        }

        if ($course->format == 'weeks' or $course->format == 'topics') {
            $table->data[] = array ($lams->section, $link);
        } else {
            $table->data[] = array ($link);
        }
    }

    echo '<br />';

    print_table($table);

/// Finish the page

    print_footer($course);

?>
