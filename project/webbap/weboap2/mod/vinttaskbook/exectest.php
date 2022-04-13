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
    $solid    = required_param('solid', PARAM_INT);  // vinttaskbook Task ID

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

    require_login($course->id);

    $context = get_context_instance(CONTEXT_MODULE, $cm->id);
    $allowedit = has_capability('moodle/course:manageactivities', $context);
    if (!has_capability('mod/vinttaskbook:exectests', $context)) {
        error('You can\'t exec tests!');
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
	$stredit = get_string("exec_tests", "vinttaskbook");
	
	/*print_header_simple(format_string($vinttaskbook->name), "",
				 "<a href=\"index.php?id=$course->id\">$strvinttaskbooks</a> ->
				  <a href=\"view.php?id=$cm->id\">".format_string($vinttaskbook->name,true)."</a> -> $stredit", "",
				  "", true, "", navmenu($course, $cm));
*/
	
  $tests_count = count_records_select("vinttaskbook_tests", "vinttasktask=$tid");
	echo '
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="style.css"/>
	<link rel="stylesheet" type="text/css" href="highlight.css"/>
	<script type="text/javascript" src="highlight.js"></script>
  </head>
  <body class="mybody">';
  
  if (!$tests_count==0){
  	$tests = get_records("vinttaskbook_tests", "vinttasktask", $tid, "number");
    $solution = get_record("vinttaskbook_solutions", "id", $solid);

    echo '<span class="mess">' . get_string("task_solution", "vinttaskbook") . '</span>';
    
    echo "<pre><code class=\"pascal\">" . s($solution->solution) . "</code></pre>";
    
    $filename = "tasksolution";

		if ($solution->language == 1){
			//C
			write_file($filename, "c", $solution->id, $solution->solution);
		} else {
			//PASCAL
	    write_file($filename, "pas", $solution->id, $solution->solution);
		}
		
    // ECHO
    print_box_start();
    ?>
    <table border="0" width="100%" class="maintable">
    <?php
    
    //COMPILATION
    $compilatorresult = "";

			if ($solution->language == 1){
				//C
				exec("$CFG->compiler_c -o $CFG->compilersdataroot\\$filename$solution->id.exe -I G:\\weboap2\\compilers\\c\\mingw\\include\\ $CFG->compilersdataroot\\$filename$solution->id.c",$output_compile,$s_compile);
			} else {
				// PASCAL

				exec("$CFG->compiler_pascal $CFG->compilersdataroot\\$filename$solution->id.pas",$output_compile,$s_compile);
			}
        
				if (!$s_compile){
          ?>
          <tr>
            <td colspan="2"><span class="mess"><?php echo get_string("compile_successfully", "vinttaskbook"); ?></span></td>
          </tr>
          <?php
        
          // RUN
          foreach ($tests as $test){
            unset($s_run);
            unset($output_run);
            write_file($filename, "in", $solution->id, $test->input_data);
              $st = start_time();
                exec("$CFG->compilersdataroot\\$filename$solution->id.exe < $CFG->compilersdataroot\\$filename$solution->id.in",$output_run,$s_run);
              $st = stop_time($st);
              $output_run = implode("\r\n" , $output_run);
              if ($test->output_data == $output_run)       {$someResult = get_string("right_result", "vinttaskbook");$textclass1="textright";}
                                                      else {$someResult = get_string("not_right_result", "vinttaskbook");$textclass1="textnoright";}
              if ($test->time > $st || $test->time == 0)   {$someTime   = get_string("right_time", "vinttaskbook");$textclass2="textright";}
                                                      else {$someTime   = get_string("not_right_time", "vinttaskbook");$textclass2="textnoright";}
            if (!$s_run){
            ?>
            <tr>
              <td width="50%"><span class="test"><?php echo get_string("test", "vinttaskbook") . " " . $test->number; ?></span></td>
              <td width="50%"><span class="mess"><?php echo get_string("run_successfully", "vinttaskbook"); ?></span></td>
            </tr>
            <tr>
              <td colspan="2">
                <table border="0" class="innertable" width="100%">
                  <tr valign="top">
                    <td width="50%" class="bottomborder"><span class=""><?php echo get_string("result_standard", "vinttaskbook"); ?></span></td>
                    <td width="50%" class="bottomborder"><span class=""><?php echo get_string("result_received", "vinttaskbook"); ?></span></td>
                  </tr>
                  <tr valign="top">
                    <td width="50%"><span class=""><?php echo text_to_html($test->output_data); ?></span></td>
                    <td width="50%"><span class=""><?php echo text_to_html($output_run); ?></span></td>
                  </tr>
                  <tr valign="top">
                    <td width="50%" class="topborder"><span class=""><?php echo get_string("test_time", "vinttaskbook") . ": " . $test->time; ?></span></td>
                    <td width="50%" class="topborder"><span class=""><?php echo get_string("test_time", "vinttaskbook") . ": " . $st; ?></span></td>
                  </tr>
                  <tr valign="top">
                    <td colspan="2" class="topborder"><span class="test"><?php echo  get_string("proposal", "vinttaskbook"); ?></span></td>
                  </tr>
                  <tr valign="top">
                    <td colspan="2"><span class="<?php echo $textclass1;?>"><?php echo  $someResult ?></span><br/>
                                                      <span class="<?php echo $textclass2;?>"><?php echo  $someTime ?></span></td>
                  </tr>
                </table>
              </td>
            </tr>
                <?php 
               
            } else {
              ?>
              <tr>
                <td width="50%"><span class="test"><?php echo get_string("test", "vinttaskbook") . " " . $test->number; ?></span></td>
                <td width="50%"><span class="mess"><?php echo get_string("run_not_successfully", "vinttaskbook"); ?></span></td>
              </tr>
              <?php
            }
          }
        } else {
          ?>
          <tr>
            <td colspan="2"><span class="mess"><?php echo get_string("compile_not_successfully", "vinttaskbook") ?></span></td>
          </tr>
          <?php
        }
    //@unlink("$CFG->compilersdataroot\\$filename$solution->id.pas");
	@unlink("$CFG->compilersdataroot\\$filename$solution->id.c");
    @unlink("$CFG->compilersdataroot\\$filename$solution->id.o");
    //@unlink("$CFG->compilersdataroot\\$filename$solution->id.exe");
    @unlink("$CFG->compilersdataroot\\$filename$solution->id.in");
    
    // ECHO END
    ?>
      </table>
    <?php
    
    print_box_end();
    //echo "<a title=\"" . get_string("backtotasks", "vinttaskbook") . "\"href=\"view.php?id=$id&amp;cid=$cid&amp;tid=$tid\">" . get_string("backtotasks", "vinttaskbook") . "</a>";
	} else {
    echo '<span class="mess">' . get_string("test_havenot", "vinttaskbook") . '</span>';
  }
  
  print_box_start('myclass');
  close_window_button();
  print_box_end();
  echo '</body>';
	
	//print_footer($course);

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
  

?>
