<?PHP
    require_once("../config.php");
    require_once("lib.php");

    $id         = required_param('id');
    $download   = optional_param('download');	
    $user       = optional_param('user', -1);
    $action     = optional_param('action', 'grades'); 
    $cview      = optional_param('cview', -1);
	$teacher_id = optional_param('teacher');
	$group_id   = optional_param('group', array(-1));
	
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

	if (isadmin()) { //Администратор
		$teachers = get_records_sql("SELECT a.id, a.firstname, a.lastname FROM {$CFG->prefix}user a INNER JOIN {$CFG->prefix}role_assignments b ON a.id = b.userid WHERE b.roleid = 3 ORDER BY lastname, firstname");
	} elseif (isteacher()) { //Преподаватель
		$teachers = get_records_sql("SELECT id, firstname, lastname FROM {$CFG->prefix}user WHERE id = $USER->id");
	}
	if (isteacher() and !$teacher_id and !isadmin()) {
		$teacher_id = $USER->id;
		$_GET['teacher'] = $USER->id;
	}
	if (isset($teacher_id) and $teacher_id != -1) { //Указан преподаватель
		$groups = get_records_sql("SELECT id, name FROM {$CFG->prefix}groups WHERE ownerid = $teacher_id");
	} else { //Не указан преподаватель
		$groups = get_records_sql("SELECT id, name FROM {$CFG->prefix}groups");
	}
	if ((isadmin() or isteacher()) and $action == "grades") {
	?>
	<form id="filter" method="get">
		<input name="id" type="hidden" value="<?PHP print($id); ?>">
		<table>
			<tr>
				<td>
					<select name="teacher" id="teacher" onchange="document.forms.filter.submit();">
						<?PHP
						if (isadmin()) {
						?>
						<option value="-1">Все</option>
						<?PHP
						}
						foreach ($teachers as $teacher) {
							print("\n\t\t\t\t\t\t<option value=\"$teacher->id\"" . (($teacher->id == $teacher_id)?" selected":"") . ">$teacher->lastname $teacher->firstname</option>");
						}
						?>
					</select>
				</td>
				<td>
					<select name="group[]" multiple size="3">
						<option value="-1"<?PHP print(in_array(-1, $group_id)?" selected":""); ?>>Все</option>
						<?PHP
						foreach ($groups as $group) {
							print("\n\t\t\t\t\t\t<option value=\"$group->id\"" . (in_array($group->id, $group_id)?" selected":"") . ">$group->name</option>");
						}
						?>
					</select>
				</td>
				<td>
					<input type="submit" value="фильтровать">
				</td>
			</tr>
		</table>
	</form>
	<?
	}
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
			case "labs":
				if ($user != -1) {
					grade_view_labs($user);
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
