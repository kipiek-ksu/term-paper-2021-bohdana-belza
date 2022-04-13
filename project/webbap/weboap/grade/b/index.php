<?PHP
    require_once("../config.php");
    require_once("lib.php");

    $id       = required_param('id');              // course id
    $download = optional_param('download');
    $user     = optional_param('user', -1);
    $action   = optional_param('action', 'grades');
    $cview    = optional_param('cview', -1);

echo '
<link rel="stylesheet" type="text/css" href="'. $CFG->wwwroot .'/grade/script/DataGrid.css"/>
<script type="text/javascript" src="'. $CFG->wwwroot .'/grade/script/core/lang/Bs_Misc.lib.js"></script>
<script type="text/javascript" src="'. $CFG->wwwroot .'/grade/script/components/datagrid/Bs_DataGrid.class.js"></script>


<style type="text/css">

#content {
    overflow:auto;    
}

</style>
';
echo "
<script type=\"text/javascript\">
	function DataGridinit() {
		bsDpDataGrid = new Bs_DataGrid('bsDpDataGrid');
		bsDpDataGrid.buttonsDefaultPath = '". $CFG->wwwroot ."/grade/script/components/datagrid/img/ms/';
		bsDpDataGrid.bHeaderFix = true;
		bsDpDataGrid.height     = '50';
		bsDpDataGrid.width      = '1000';
		bsDpDataGrid.setDataProps(DataPropsInit());
		bsDpDataGrid.setHeaderProps(headerInit());
}

</script>
";
//echo '<div id="docTipsLayer" style="position: absolute; z-index: 1000; visibility: hidden; left: 0px; top: 0px; width: 10px">&nbsp;</div>';




    if (!$course = get_record('course', 'id', $id)) {
        error('No course ID');
    }

    require_login($course->id);

    // if the user set new prefs make sure they happen now
    if ($action == 'set_grade_preferences' && $prefs = data_submitted()) {
        if (!confirm_sesskey()) {
            error(get_string('confirmsesskeybad', 'error'));
        }
        grade_set_preferences($course, $prefs);
    }

    $preferences = grade_get_preferences($course->id);

    
    // we want this in its own window
    if ($action == 'stats') {
        grade_stats();
        exit();
    } else if ($action == 'ods') {
        grade_download('ods', $id);
        exit();
    } else if ($action == 'excel') {
        grade_download('xls', $id);
        exit();
    } else if ($action == 'text') {
        grade_download('txt', $id);
        exit();
    }

    print_header($course->shortname.': '.get_string('grades'), $course->fullname, grade_nav($course, $action));

    /// find out current groups mode
    $groupmode = groupmode($course);
    $currentgroup = setup_and_print_groups($course, $groupmode, 'index.php?id=' . $course->id);
    
    //echo '<div class="clearer"></div>';
    
    //print page title
    //echo  '<p><font size="+1">'.get_string('allgrades','grades').'</font></p>';
    //print tab menu
    //grade_preferences_menu($action, $course);
    
    //grade_set_uncategorized();

    if (has_capability('moodle/course:viewcoursegrades', get_context_instance(CONTEXT_COURSE, $course->id))) {
        switch ($action) {
            case "cats":
                grade_set_categories();
                break;
            case "insert_category":
                grade_insert_category();
                grade_set_categories();
                break;
            case "assign_categories":
                grade_assign_categories();
                grade_set_categories();
                break;
            case "set_grade_weights":
                grade_set_grade_weights();
                grade_display_grade_weights();
                break;
            case "weights":
                grade_display_grade_weights();
                break;
            case "grades":
                if ($preferences->use_advanced == 1) {
                    grade_view_all_grades($user);
                }
                else {
                    // all the grades will be in the 'uncategorized' category
                    grade_view_category_grades($user);
                }
                break;
            case "vcats":
                grade_view_category_grades($user);
                break;
            case "prefs":
            case "set_grade_preferences":
                grade_display_grade_preferences($course, $preferences);
                break;
            case "letters":
                grade_display_letter_grades();
                break;
            case "set_letter_grades":
                grade_set_letter_grades();
                grade_display_letter_grades();
                break;
            case "delete_category":
                grade_delete_category();
                // re-run set_uncategorized as they may have deleted a category that had items in it 
                grade_set_uncategorized();
                grade_set_categories();
                break;
            case "view_student_grades":
                grade_view_all_grades($user);
                break;
            case "view_student_category_grades":
                grade_view_category_grades($user);
                break;
            default:
                if ($preferences->use_advanced == 1) {
                    grade_view_all_grades($user);
                }
                else {
                    grade_view_category_grades($user);
                }
        } // end switch
    } // end if isTeacher
    else {
        if ($preferences->show_weighted || $preferences->show_points || $preferences->show_percent) {

            if ($preferences->use_advanced == 1) {
                if($action != 'vcats') {
                    grade_view_all_grades($USER->id);
                }
                else {
                    grade_view_category_grades($USER->id);
                }
            } else {
                grade_view_category_grades($USER->id);
            }

        } else {
            error(get_string('gradebookhiddenerror','grades'));
        }
    } // end else (!teacher)
    
    print_footer($course);


?>
