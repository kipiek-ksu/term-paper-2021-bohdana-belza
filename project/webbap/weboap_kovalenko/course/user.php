<?php // $Id: user.php,v 1.66.2.1 2007/02/28 05:36:14 nicolasconnault Exp $

// Display user activity reports for a course

    require_once("../config.php");
    require_once("lib.php");

    $modes = array("outline", "complete", "todaylogs", "alllogs");

    $id      = required_param('id',PARAM_INT);       // course id
    $user    = required_param('user',PARAM_INT);     // user id
    $mode    = optional_param('mode', "todaylogs", PARAM_ALPHA);
    $page    = optional_param('page', 0, PARAM_INT);
    $perpage = optional_param('perpage', 100, PARAM_INT);

    require_login();

    if (! $course = get_record("course", "id", $id)) {
        error("Course id is incorrect.");
    }

    if (! $user = get_record("user", "id", $user)) {
        error("User ID is incorrect");
    }

    $coursecontext = get_context_instance(CONTEXT_COURSE, $id);
    $personalcontext = get_context_instance(CONTEXT_USER, $user->id);

    // if in either context, we can read report, then we can proceed
    if (!(has_capability('moodle/site:viewreports', $coursecontext) or ($course->showreports and $USER->id == $user->id) or has_capability('moodle/user:viewuseractivitiesreport', $personalcontext))) {
        error("You are not allowed to look at this page");
    }

    add_to_log($course->id, "course", "user report", "user.php?id=$course->id&amp;user=$user->id&amp;mode=$mode", "$user->id"); 

    $stractivityreport = get_string("activityreport");
    $strparticipants   = get_string("participants");
    $stroutline        = get_string("outline");
    $strcomplete       = get_string("complete");
    $stralllogs        = get_string("alllogs");
    $strtodaylogs      = get_string("todaylogs");
    $strmode           = get_string($mode);
    $fullname          = fullname($user, true);

    if ($course->id != SITEID) {
        print_header("$course->shortname: $stractivityreport ($mode)", $course->fullname,
                 "<a href=\"../course/view.php?id=$course->id\">$course->shortname</a> ->
                  <a href=\"../user/index.php?id=$course->id\">$strparticipants</a> ->
                  <a href=\"../user/view.php?id=$user->id&amp;course=$course->id\">$fullname</a> -> 
                  $stractivityreport -> $strmode");
    } else {
        print_header("$course->shortname: $stractivityreport ($mode)", $course->fullname,
                 "<a href=\"../user/view.php?id=$user->id&amp;course=$course->id\">$fullname</a> -> 
                  $stractivityreport -> $strmode");
    }


/// Print tabs at top
/// This same call is made in:
///     /user/view.php
///     /user/edit.php
///     /course/user.php
    $currenttab = $mode;
    $showroles = 1;
    include($CFG->dirroot.'/user/tabs.php');

    get_all_mods($course->id, $mods, $modnames, $modnamesplural, $modnamesused);

    switch ($mode) {
        case "grade":
            $course = get_record('course', 'id', required_param('id', PARAM_INT));
            if (!empty($course->showgrades)) {
                require_once($CFG->dirroot.'/grade/lib.php');
                print_student_grade($user, $course);
            }
            break;
      
        case "todaylogs" :
            echo '<div class="graph">';
            print_log_graph($course, $user->id, "userday.png");
            echo '</div>';
            print_log($course, $user->id, usergetmidnight(time()), "l.time DESC", $page, $perpage, 
                      "user.php?id=$course->id&amp;user=$user->id&amp;mode=$mode");
            break;

        case "alllogs" :
            echo '<div class="graph">';
            print_log_graph($course, $user->id, "usercourse.png");
            echo '</div>';
            print_log($course, $user->id, 0, "l.time DESC", $page, $perpage, 
                      "user.php?id=$course->id&amp;user=$user->id&amp;mode=$mode");
            break;
        case 'stats':

            if (empty($CFG->enablestats)) {
                error("Stats is not enabled.");
            }

            require_once($CFG->dirroot.'/lib/statslib.php');

            $statsstatus = stats_check_uptodate($course->id);
            if ($statsstatus !== NULL) {
                notify ($statsstatus);
            }

            $earliestday = get_field_sql('SELECT timeend FROM '.$CFG->prefix.'stats_user_daily ORDER BY timeend');
            $earliestweek = get_field_sql('SELECT timeend FROM '.$CFG->prefix.'stats_user_weekly ORDER BY timeend');
            $earliestmonth = get_field_sql('SELECT timeend FROM '.$CFG->prefix.'stats_user_monthly ORDER BY timeend');
    
            if (empty($earliestday)) $earliestday = time();
            if (empty($earliestweek)) $earliestweek = time();
            if (empty($earliestmonth)) $earliestmonth = time();
            
            $now = stats_get_base_daily();
            $lastweekend = stats_get_base_weekly();
            $lastmonthend = stats_get_base_monthly();

            $timeoptions = stats_get_time_options($now,$lastweekend,$lastmonthend,$earliestday,$earliestweek,$earliestmonth);

            if (empty($timeoptions)) { 
                error(get_string('nostatstodisplay'), $CFG->wwwroot.'/course/user.php?id='.$course->id.'&user='.$user->id.'&mode=outline');
            }

            // use the earliest.
            $time = array_pop(array_keys($timeoptions));
            
            $param = stats_get_parameters($time,STATS_REPORT_USER_VIEW,$course->id,STATS_MODE_DETAILED);

            $param->table = 'user_'.$param->table;

            $sql = 'SELECT timeend,'.$param->fields.' FROM '.$CFG->prefix.'stats_'.$param->table.' WHERE '
            .(($course->id == SITEID) ? '' : ' courseid = '.$course->id.' AND ')
                .' userid = '.$user->id
                .' AND timeend >= '.$param->timeafter
                .$param->extras
                .' ORDER BY timeend DESC';
            $stats = get_records_sql($sql);

            if (empty($stats)) {
                error(get_string('nostatstodisplay'), $CFG->wwwroot.'/course/user.php?id='.$course->id.'&user='.$user->id.'&mode=outline');
            }

            echo '<center><img src="'.$CFG->wwwroot.'/course/report/stats/graph.php?mode='.STATS_MODE_DETAILED.'&course='.$course->id.'&time='.$time.'&report='.STATS_REPORT_USER_VIEW.'&userid='.$user->id.'" alt="'.get_string('statisticsgraph').'" /></center>';

            // What the heck is this about?   -- MD
            $stats = stats_fix_zeros($stats,$param->timeafter,$param->table,(!empty($param->line2)),(!empty($param->line3)));

            $table = new object();
            $table->align = array('left','center','center','center');
            $param->table = str_replace('user_','',$param->table);
            $table->head = array(get_string('periodending','moodle',$param->table),$param->line1,$param->line2,$param->line3);
            foreach ($stats as $stat) {
                if (!empty($stat->zerofixed)) {  // Don't know why this is necessary, see stats_fix_zeros above - MD
                    continue;
                }
                $a = array(userdate($stat->timeend,get_string('strftimedate'),$CFG->timezone),$stat->line1);
                $a[] = $stat->line2;
                $a[] = $stat->line3;
                $table->data[] = $a;
            }
            print_table($table);
            break;
        case "outline" :
        case "complete" :
        default:
            $sections = get_all_sections($course->id);

            for ($i=0; $i<=$course->numsections; $i++) {

                if (isset($sections[$i])) {   // should always be true

                    $section = $sections[$i];
                    $showsection = (has_capability('moodle/course:viewhiddensections', $coursecontext) or $section->visible or !$course->hiddensections);

                    if ($showsection) { // prevent hidden sections in user activity. Thanks to Geoff Wilbert!

                        if ($section->sequence) {
                            echo '<div class="section">';
                            echo '<h2>';
                            switch ($course->format) {
                                case "weeks": print_string("week"); break;
                                case "topics": print_string("topic"); break;
                                default: print_string("section"); break;
                            }
                            echo " $i</h2>";
    
                            echo '<div class="content">';

                            if ($mode == "outline") {
                                echo "<table cellpadding=\"4\" cellspacing=\"0\">";
                            }

                            $sectionmods = explode(",", $section->sequence);
                            foreach ($sectionmods as $sectionmod) {
                                if (empty($mods[$sectionmod])) {
                                    continue;
                                }
                                $mod = $mods[$sectionmod];
    
                                if (empty($mod->visible)) {
                                    continue;
                                }

                                $instance = get_record("$mod->modname", "id", "$mod->instance");
                                $libfile = "$CFG->dirroot/mod/$mod->modname/lib.php";

                                if (file_exists($libfile)) {
                                    require_once($libfile);

                                    switch ($mode) {
                                        case "outline":
                                            $user_outline = $mod->modname."_user_outline";
                                            if (function_exists($user_outline)) {
                                                $output = $user_outline($course, $user, $mod, $instance);
                                                print_outline_row($mod, $instance, $output);
                                            }
                                            break;
                                        case "complete":
                                            $user_complete = $mod->modname."_user_complete";
                                            if (function_exists($user_complete)) {
                                                $image = "<img src=\"../mod/$mod->modname/icon.gif\" ".
                                                         "class=\"icon\" alt=\"$mod->modfullname\" />";
                                                echo "<h4>$image $mod->modfullname: ".
                                                     "<a href=\"$CFG->wwwroot/mod/$mod->modname/view.php?id=$mod->id\">".
                                                     format_string($instance->name,true)."</a></h4>";
                                                
                                                ob_start();

                                                echo "<ul>";
                                                $user_complete($course, $user, $mod, $instance);
                                                echo "</ul>";

                                                $output = ob_get_contents();
                                                ob_end_clean();
                                                
                                                if (str_replace(' ', '', $output) != '<ul></ul>') {
                                                    echo $output;
                                                }
                                            }
                                            break;
                                        }
                                    }
                                }
    
                            if ($mode == "outline") {
                                echo "</table>";
                            }
                            echo '</div>';  // content
                            echo '</div>';  // section
                        }
                    }
                }
            }
            break;
    }


    print_footer($course);


function print_outline_row($mod, $instance, $result) {
    global $CFG;

    $image = "<img src=\"$CFG->modpixpath/$mod->modname/icon.gif\" class=\"icon\" alt=\"$mod->modfullname\" />";

    echo "<tr>";
    echo "<td valign=\"top\">$image</td>";
    echo "<td valign=\"top\" style=\"width:300\">";
    echo "   <a title=\"$mod->modfullname\"";
    echo "   href=\"../mod/$mod->modname/view.php?id=$mod->id\">".format_string($instance->name,true)."</a></td>";
    echo "<td>&nbsp;&nbsp;&nbsp;</td>";
    echo "<td valign=\"top\">";
    if (isset($result->info)) {
        echo "$result->info";
    } else {
        echo "<p style=\"text-align:center\">-</p>";
    }
    echo "</td>";
    echo "<td>&nbsp;&nbsp;&nbsp;</td>";
    if (!empty($result->time)) {
        $timeago = format_time(time() - $result->time);
        echo "<td valign=\"top\" style=\"white-space: nowrap\">".userdate($result->time)." ($timeago)</td>";
    }
    echo "</tr>";
}

?>

