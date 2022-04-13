<?php  // $Id: edit.php,v 1.12.2.1 2007/02/23 20:17:36 mark-nielsen Exp $
/**
 * Provides the interface for overall authoring of lessons
 *
 * @author Tkachuk Ilya Jctim™
 * @version $Id: edit.php,v 1.12.2.1 2007/02/23 20:17:36 mark-nielsen Exp $
 * @license http://www.gnu.org/copyleft/gpl.html GNU Public License
 * @package lesson
 **/

    require_once("../../config.php");
    require_once("lib.php");
	
	//global $USER;

    $id       = required_param('id', PARAM_INT); // Course Module ID, or
  	$cid      = required_param('cid', PARAM_INT);  // vinttaskbook Category ID
  	$tid      = required_param('tid', PARAM_INT);  // vinttaskbook Task ID
    $tasktext = optional_param('tasktext', '', PARAM_RAW);  // vinttaskbook Solution
    $taskfile = optional_param('taskfile');  // vinttaskbook Solution
	//$language	= required_param('tasklanguage', PARAM_INT);  // vinttaskbook Programming language
    $edit     = optional_param('edit', -1, PARAM_BOOL);     // Edit mode
	//$righttestscount = 3;
    $type = optional_param('type', '', PARAM_TEXT);
	$action = optional_param('action','add', PARAM_ACTION);

    if ($id) {
        if (! $cm = get_record("course_modules", "id", $id)) {
            error("Course Module ID was incorrect");
        }
    
        if (! $course = get_record("course", "id", $cm->course)) {
            error("Course is misconfigured");
        }
    
        if (! $vinttaskbook = get_record("vinttaskbook", "id", $cm->instance)) {
            error("Course module is incorrect");
        }

    } else {
        if (! $vinttaskbook = get_record("vinttaskbook", "id", $a)) {
            error("Course module is incorrect");
        }
        if (! $course = get_record("course", "id", $vinttaskbook->course)) {
            error("Course is misconfigured");
        }
        if (! $cm = get_coursemodule_from_instance("vinttaskbook", $vinttaskbook->id, $course->id)) {
            error("Course Module ID was incorrect");
        }
    }

	if (!$cm = get_coursemodule_from_id('vinttaskbook', $id)) {
        error('Course Module ID was incorrect');
    }

    if (!$course = get_record('course', 'id', $cm->course)) {
        error('Course is misconfigured');
    }

    if (! $vinttaskbook = get_record("vinttaskbook", "id", $cm->instance)) {
        error("Course module is incorrect");
    }
    require_login($course->id);

    $context = get_context_instance(CONTEXT_MODULE, $cm->id);
    $allowedit = has_capability('moodle/course:manageactivities', $context);
    if (!has_capability('mod/vinttaskbook:submittask', $context)) {
        error('You can\'t submit task!');
    }

    
    add_to_log($course->id, "vinttaskbook", "view", "view.php?id=$cm->id", "$vinttaskbook->id");
/// Print the page header

    if ($course->category) {
        $navigation = "<a href=\"../../course/view.php?id=$course->id\">$course->shortname</a> ->";
    } else {
        $navigation = '';
    }

	$strvinttaskbook = get_string("modulename", "vinttaskbook");
	$strvinttaskbooks = get_string("modulenameplural", "vinttaskbook");
	$stredit = get_string("submit_solution", "vinttaskbook");
	
	print_header_simple(format_string($vinttaskbook->name), "",
				 "<a href=\"index.php?id=$course->id\">$strvinttaskbooks</a> ->
				  <a href=\"view.php?id=$cm->id\">".format_string($vinttaskbook->name,true)."</a> -> $stredit", "",
				  "", true, "", navmenu($course, $cm));
	
	switch ($action) {
		case 'view':
		{
		        redirect("view.php?id=$cm->id&amp;cid=$cid&amp;tid=$tid");//&amp;type=solution&amp;action=view");
		}
		die;
		case 'delete':
		{
			//solution_delete($cm, $course, $vinttaskbook);
			$solid  = optional_param('solid', 0, PARAM_INT);      // Task ID
			$confirm = optional_param('confirm', 0, PARAM_BOOL); // delete confirmation
  
			//notice('Solution was delete');
  
			if (!$solution = get_record('vinttaskbook_solutions', 'id', $solid)) {
				error('Solution is incorrect');
			}
    
			$context = get_context_instance(CONTEXT_MODULE, $cm->id);
			if (!has_capability('mod/vinttaskbook:deletesolution', $context)) {
				error('You can\'t delete this solution!');
			}

			if (!$task = get_record('vinttaskbook_tasks', 'id', $tid)) {
				error('Task is incorrect');
			}    
    
			if (data_submitted() and $confirm) {
				delete_records('vinttaskbook_solutions',' id', $solid);
				//add_to_log($course->id, 'vinttaskbook', 'delete solution', "edit.php?id=$cm->id", "$solution->id",$cm->id);
				notice("Your solution was delete");
			}	
		}
		die;
		default:
			{
				$language	= required_param('tasklanguage', PARAM_INT);  // vinttaskbook Programming language
				$solutions_count = count_records_select("vinttaskbook_solutions", "vinttasktask=$tid AND userid=$USER->id");
				if ($solutions_count==0){
				//TEXT
					$path = $_FILES['taskfile']['tmp_name'];
					if ($tasktext && !is_uploaded_file($path)) {
						$solutiontext = ($tasktext);
					$erroruses = 'uses';
					$pos1 = stristr($solutiontext, $erroruses);
					if ($pos1 == '')
					{
						$error1 = false;
					}
					else
					{
						$error1 = true;
					}
					$errorcomm1 = '//';
					$errorcomm2 = '{';
					$errorcomm3 = '}';
					$pos2 = stristr($solutiontext, $errorcomm1);
					$pos3 = stristr($solutiontext, $errorcomm2);
					$pos4 = stristr($solutiontext, $errorcomm3);
					if ($pos2 == '')
					{
						if ($pos3 =='')
						{
							if ($pos4 =='')
							{
								$error2 = false;
							}
							else
							{
								$error2 = true;
							}
						}
						else
						{
							$error2 = true;
						}
					}
					else
					{
						$error2 = true;
					}					
				  }
				//FILE
					if (is_uploaded_file($path)) {
						if (file_exists($path)){
							$content = '';
							$fw=fopen($path,"rb");
							while (!feof($fw)) {
								$content .= fread($fw,1024);
							}
							$solutiontext = (ereg_replace("\{.*\}", "", $content));
							$erroruses = 'uses';
					$pos1 = stristr($solutiontext, $erroruses);
					if ($pos1 == '')
					{
						$error1 = false;
					}
					else
					{
						$error1 = true;
					}
					$errorcomm1 = '//';
					$errorcomm2 = '{';
					$errorcomm3 = '}';
					$pos2 = stristr($solutiontext, $errorcomm1);
					$pos3 = stristr($solutiontext, $errorcomm2);
					$pos4 = stristr($solutiontext, $errorcomm3);
					if ($pos2 == '')
					{
						if ($pos3 =='')
						{
							if ($pos4 =='')
							{
								$error2 = false;
							}
							else
							{
								$error2 = true;
							}
						}
						else
						{
							$error2 = true;
						}
					}
					else
					{
						$error2 = true;
					}
							fclose ($fw);
						}
					}				
					
					if (!$solutiontext){
						error('Some unknown error');
					}
				if (!$error1 && !$error2)
				{
					//insert new user solution in database, if it is right
					$newsolution = new object();
					$newsolution->vinttaskbook        = $vinttaskbook;
					$newsolution->vinttasktask        = $tid;
					$newsolution->solution            = $solutiontext;
					$newsolution->language            = $language;
					$newsolution->userid          	  = $USER->id;
					$newsolution->timecreated       = time();
					$newsolution->timemodified      = time();
					if (!$newsolution->id = insert_record('vinttaskbook_solutions', $newsolution)) {
						error('Could not send solution');
					} else {
						add_to_log($course->id, 'vinttaskbook', 'add solution', "tests.php?id=$cm->id", "$newsolution->id", $cm->id);
						$tests_count = count_records_select("vinttaskbook_tests", "vinttasktask=$tid");		
						$solid = $newsolution->id;
					}
						$righttestscount = 0;
						$tests_count = count_records_select("vinttaskbook_tests", "vinttasktask=$tid");
		  
						if (!$tests_count==0){
							$tests = get_records("vinttaskbook_tests", "vinttasktask", $tid, "number");
							$solution = get_record("vinttaskbook_solutions", "id", $solid);
							$filename = "ts";
								if ($solution->language == 1){
								//C
									write_file($filename, "c", $solution->id, $solution->solution);
								} else {
								//PASCAL
									write_file($filename, "pas", $solution->id, $solution->solution);
								}
						//COMPILATION
							$compilatorresult = "";
							if ($solution->language == 1){
							//C
								exec("$CFG->compiler_c -o $CFG->dataroot\\compilersdata\\$filename$solution->id.exe -IG:\\weboap2\\compilers\\c\\mingw\\include\\ $CFG->dataroot\\compilersdata1\\$filename$solution->id.c",$output_compile, $s_compile);
							} else {
							// PASCAL
								exec("$CFG->compiler_pascal $CFG->compilersdataroot\\$filename$solution->id.pas",$output_compile,$s_compile);
							}

							if (!$s_compile){
							// RUN
								foreach ($tests as $test){
									unset($s_run);
									unset($output_run);
									write_file($filename, "in", $solution->id, $test->input_data);

									$st = start_time();
									exec("$CFG->compilersdataroot\\$filename$solution->id.exe < $CFG->compilersdataroot\\$filename$solution->id.in",$output_run,$s_run);
									$st = stop_time($st);
									$output_run = implode("\r\n" , $output_run);
									
									if ($test->output_data == $output_run)       {$someResult = get_string("right_result", "vinttaskbook");
										$textclass1="textright";$righttestscount = $righttestscount + 1;}
									else {$someResult = get_string("not_right_result", "vinttaskbook");$textclass1="textnoright";}
										if ($test->time > $st || $test->time == 0)   {$someTime   = get_string("right_time", "vinttaskbook");
											$textclass2="textright";}
										else {$someTime   = get_string("not_right_time", "vinttaskbook");$textclass2="textnoright";}
									@unlink("$CFG->compilersdataroot\\$filename$solution->id.pas");
									@unlink("$CFG->compilersdataroot\\$filename$solution->id.c");
									@unlink("$CFG->compilersdataroot\\$filename$solution->id.o");
									//@unlink("$CFG->compilersdataroot\\$filename$solution->id.exe");
									@unlink("$CFG->compilersdataroot\\$filename$solution->id.in");
								} 
							}else {
								echo '<span class="mess">' . get_string("test_havenot", "vinttaskbook") . '</span>';
							}
			
							$kk = $righttestscount/$tests_count;
							if ($kk == 1){
								$markvalue = 5;}
							else {
								if ($kk > 0.8){
									$markvalue = 4.5;}
								else {
									if ($kk > 0.6){
										$markvalue = 4;}
									else {
										if ($kk > 0.4){
											$markvalue = 3;}
										else {
											$markvalue = 2;}
									}
								}
							}
				
							$updatedsolution = new object();
							$updatedsolution->id = $solid;
							$updatedsolution->grade = $markvalue;
							$updatedsolution->timemodified = time();
        
							if (!update_record('vinttaskbook_solutions', $updatedsolution)) {
								error('Could not update this solution');
							} else {
							// Grade Max Mark in tbl_grades
								$grade = get_record("vinttaskbook_grades", "userid", $userid);
								if (!$grade){
								// INSET GRADE IF NOT EXIST
									$newgrade = new object();
									$newgrade->vinttaskbook = $vinttaskbook->id;
									$newgrade->userid = $userid;
									$newgrade->grade = $markvalue;
									$newgrade->timemodified = time();
								}
							}
							echo $righttestscount;
						}

						echo " right answer(s) from $tests_count";				
						$linkyes    = 'view.php';
						$optionsyes  = array('id'=>$cm->id, 'cid'=>$cid, 'tid'=>$tid);
						$linkno     = 'edit.php';
						$optionsno = array('id'=>$cm->id, 'cid'=>$cid, 'tid'=>$tid, 'solid'=>$solid, 'action'=>'delete', 'type'=>'solution');
						notice_yesno("Are you really want to send your solution?", $linkyes, $linkno, $optionsyes, $optionsno, 'post', 'get');
					}
				else
				{
					if ($error1)
					{
						notice(get_string("useduses","vinttaskbook"));
					}
					else
					{
						if ($error2)
						{
							notice(get_string ("usedcomm", "vinttaskbook"));
						}
					}
				}
					echo "<a title=\"" . get_string("backtotasks", "vinttaskbook") . "\"href=\"view.php?id=$id&amp;cid=$cid&amp;tid=$tid\">" . get_string("backtotasks", "vinttaskbook") . "</a>";
					print_footer($course);	
				} else {
					notice("Your cannot solve this task again :(");
					echo "<br/>";
				}
			}
	}
	
	
		function write_file($filename, $fileext, $iterator, $content){
		  global $CFG;
		  if (!$file = fopen("$CFG->compilersdataroot\\$filename$iterator.$fileext", 'w+')){
			echo "Cannot create file ($file)";
			die;
		  }
		  if (flock($file, LOCK_EX)) {
			if (fwrite($file, $content) === FALSE){
			  echo "Cannot write file ($file)";
			  die;
			}
			flock($file, LOCK_UN);
		  }
		  fclose($file);
		}

		function start_time(){
			$t = microtime ();
		  return $t;
		}

		function stop_time($start_time){
			$t = microtime ();
		  return $t-$start_time;
		}
		
function solution_view($cm, $course, $vinttaskbook) {
  
  $tid     = optional_param('tid', 0, PARAM_INT);      // Task ID
  $cid     = optional_param('cid', 0, PARAM_INT);      // Category ID
  $solid   = optional_param('solid', 0, PARAM_INT);      // Solution ID
	
  if ($solid) {
    if (!$solution = get_record('vinttaskbook_solutions', 'id', $solid)) {
      error('Solution is incorrect');
    }
  }
  
	$context = get_context_instance(CONTEXT_MODULE, $cm->id);
	
  if (!has_capability('mod/vinttaskbook:viewsolution', $context)) {
    error('You can\'t view solution in this task!!!');
  };
	if (!$task = get_record('vinttaskbook_tasks', 'id', $tid)) {
		error('Task is incorrect');
	}
	
	$solutions = get_records("vinttaskbook_solutions", "vinttasktask", $tid, "id");

  $stredit = get_string("view_solutions", "vinttaskbook");
  $ss = '	<script type="text/javascript" src="highlight.js"></script>  <link rel="stylesheet" type="text/css" href="highlight.css"/>  ';
  _print_edit_header($course, $cm, $vinttaskbook, $stredit, $ss);
  //print_r($solutions);
  echo solution_table($solutions, 1, array('id' => $cm->id, 'cid' => $cid, 'tid' => $tid, 'type' => 'solution' ), $solid);
  echo '<script type="text/javascript">
    initHighlightingOnLoad();
  </script>';
  print_footer($course);
  die;
}

/**
 * Delete existing solution
 */
function solution_delete($cm, $course, $vinttaskbook){
  $solid  = optional_param('solid', 0, PARAM_INT);      // Task ID
  $tid     = optional_param('tid', 0, PARAM_INT);      // Task ID
  $cid     = optional_param('cid', 0, PARAM_INT);      // Category ID
  $confirm = optional_param('confirm', 0, PARAM_BOOL); // delete confirmation
  
  notice('Solution was delete');
  
  if (!$solution = get_record('vinttaskbook_solutions', 'id', $solid)) {
    error('Solution is incorrect');
  }
    
  $context = get_context_instance(CONTEXT_MODULE, $cm->id);
  if (!has_capability('mod/vinttaskbook:deletesolution', $context)) {
    error('You can\'t delete this solution!');
  }

  if (!$task = get_record('vinttaskbook_tasks', 'id', $tid)) {
    error('Task is incorrect');
  }    
    
    
  if ($confirm) {
        delete_records('vinttaskbook_solutions',' id', $solid);
        add_to_log($course->id, 'vinttaskbook', 'delete solution', "edit.php?id=$cm->id", "$solution->id",$cm->id);
        notice("Your solution was delete");
    } 
}

?>
