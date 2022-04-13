<?php  // $Id: lib.php,v 1.4 2006/08/28 16:41:20 mark-nielsen Exp $
/**
 * Library of functions and constants for module vinttaskbook
 *
 * @author Tkachuk Ilya Jctim™
 * @version $Id: lib.php,v 1.4 2006/08/28 16:41:20 mark-nielsen Exp $
 * @package vinttaskbook
 **/

/// (replace vinttaskbook with the name of your module and delete this line)


$vinttaskbook_CONSTANT = 8;     /// for example

$vinttaskbook_LANGS = array('pascal' => 'pascal', 'cpp' => 'c++' , 'java' => 'java');     /// for example

/**
 * Given an object containing all the necessary data, 
 * (defined by the form in mod.html) this function 
 * will create a new instance and return the id number 
 * of the new instance.
 *
 * @param object $instance An object from the form in mod.html
 * @return int The id of the newly inserted vinttaskbook record
 **/
function vinttaskbook_add_instance($vinttaskbook) {
    
    $vinttaskbook->timemodified = time();

    # May have to add extra stuff in here #
    return insert_record("vinttaskbook", $vinttaskbook);
}

/**
 * Given an object containing all the necessary data, 
 * (defined by the form in mod.html) this function 
 * will update an existing instance with new data.
 *
 * @param object $instance An object from the form in mod.html
 * @return boolean Success/Fail
 **/
function vinttaskbook_update_instance($vinttaskbook) {

    $vinttaskbook->timemodified = time();
    $vinttaskbook->id = $vinttaskbook->instance;

    # May have to add extra stuff in here #

    return update_record("vinttaskbook", $vinttaskbook);
}

/**
 * Given an ID of an instance of this module, 
 * this function will permanently delete the instance 
 * and any data that depends on it. 
 *
 * @param int $id Id of the module instance
 * @return boolean Success/Failure
 **/
function vinttaskbook_delete_instance($id) {

    if (! $vinttaskbook = get_record("vinttaskbook", "id", "$id")) {
        return false;
    }

    $result = true;

    # Delete any dependent records here #

    if (! delete_records("vinttaskbook", "id", "$vinttaskbook->id")) {
        $result = false;
    }

    return $result;
}

/**
 * Return a small object with summary information about what a 
 * user has done with a given particular instance of this module
 * Used for user activity reports.
 * $return->time = the time they did it
 * $return->info = a short text description
 *
 * @return null
 * @todo Finish documenting this function
 **/
function vinttaskbook_user_outline($course, $user, $mod, $vinttaskbook) {
    return $return;
}

/**
 * Print a detailed representation of what a user has done with 
 * a given particular instance of this module, for user activity reports.
 *
 * @return boolean
 * @todo Finish documenting this function
 **/
function vinttaskbook_user_complete($course, $user, $mod, $vinttaskbook) {
    return true;
}

/**
 * Given a course and a time, this module should find recent activity 
 * that has occurred in vinttaskbook activities and print it out. 
 * Return true if there was output, or false is there was none. 
 *
 * @uses $CFG
 * @return boolean
 * @todo Finish documenting this function
 **/
function vinttaskbook_print_recent_activity($course, $isteacher, $timestart) {
    global $CFG;

    return false;  //  True if anything was printed, otherwise false 
}

/**
 * Function to be run periodically according to the moodle cron
 * This function searches for things that need to be done, such 
 * as sending out mail, toggling flags etc ... 
 *
 * @uses $CFG
 * @return boolean
 * @todo Finish documenting this function
 **/
function vinttaskbook_cron () {
    global $CFG;

    return true;
}

/**
 * Must return an array of grades for a given instance of this module, 
 * indexed by user.  It also returns a maximum allowed grade.
 * 
 * Example:
 *    $return->grades = array of grades;
 *    $return->maxgrade = maximum allowed grade;
 *
 *    return $return;
 *
 * @param int $vinttaskbookid ID of an instance of this module
 * @return mixed Null or object with an array of grades and with the maximum grade
 **/
function vinttaskbook_grades($vinttaskbookid) {
/// Must return an array of grades, indexed by user, and a max grade.

    $vinttaskbook = get_record('vinttaskbook', 'id', intval($vinttaskbookid));
    if (empty($vinttaskbook) || empty($vinttaskbook->grade)) {
        return NULL;
    }

    $return = new stdClass;
    $return->grades = get_records_menu('vinttaskbook_grades', 'vinttaskbook', $vinttaskbook->id, '', 'userid, grade');
    $return->maxgrade = get_field('vinttaskbook', 'grade', 'id', $vinttaskbook->id);
    return $return;
}

/**
 * Must return an array of user records (all data) who are participants
 * for a given instance of vinttaskbook. Must include every user involved
 * in the instance, independient of his role (student, teacher, admin...)
 * See other modules as example.
 *
 * @param int $vinttaskbookid ID of an instance of this module
 * @return mixed boolean/array of students
 **/
function vinttaskbook_get_participants($vinttaskbookid) {
    return false;
}

/**
 * This function returns if a scale is being used by one vinttaskbook
 * it it has support for grading and scales. Commented code should be
 * modified if necessary. See forum, glossary or journal modules
 * as reference.
 *
 * @param int $vinttaskbookid ID of an instance of this module
 * @return mixed
 * @todo Finish documenting this function
 **/
function vinttaskbook_scale_used ($vinttaskbookid,$scaleid) {
    $return = false;

    //$rec = get_record("vinttaskbook","id","$vinttaskbookid","scale","-$scaleid");
    //
    //if (!empty($rec)  && !empty($scaleid)) {
    //    $return = true;
    //}
   
    return $return;
}

//////////////////////////////////////////////////////////////////////////////////////
/// Any other vinttaskbook functions go here.  Each of them must have a name that 
/// starts with vinttaskbook_

function vinttaskbook_edit_button($id, $courseid, $vinttaskbook, $cid = null, $tid = null) {
    global $CFG, $USER;


    if (isteacheredit($courseid)) {
        if (!empty($USER->editing)) {
            $string = get_string("turneditingoff");
            $edit = '0';
        } else {
            $string = get_string("turneditingon");
            $edit = '1';
        }
        $cidtid='';
        if(!empty($cid)){
          $cidtid .= '<input type="hidden" name="cid" value="'.$cid.'" />';
        }
        if(!empty($tid)){
          $cidtid .= '<input type="hidden" name="tid" value="'.$tid.'" />';
        }
        
        return '<form method="get" action="'.$CFG->wwwroot.'/mod/vinttaskbook/view.php"><div>'.
               '<input type="hidden" name="id" value="'.$id.'" />'.
               $cidtid.
               //'<input type="hidden" name="vinttaskbook" value="'.$vinttaskbook.'" />'.
               '<input type="hidden" name="edit" value="'.$edit.'" />'.
               '<input type="submit" value="'.$string.'" /></div></form>';
    } else {
        return '';
    }
}

function task_table($task, $edit=0){
  $output  = "";
  $output .= "
  <table class=\"tasktable\" width=\"100%\">
    <!--tr>
      <td colspan=\"2\"><span class=\"condition\">$task->number: $task->name</span></td>
    </tr-->
    <tr>
      <td colspan=\"2\"><span class=\"condition\">" . get_string("condition", "vinttaskbook") . "</span></td>
    </tr>
    <tr>
      <td colspan=\"2\"><span class=\"\">$task->description</span></td>
    </tr>
    <tr>
      <td><span class=\"condition\">" . get_string("input_data", "vinttaskbook") . "</span></td>
      <td><span class=\"condition\">" . get_string("output_data", "vinttaskbook") . "</span></td>
    </tr>
    <tr valign=\"top\">
      <td><span class=\"\"><pre class=\"data\">". ($task->input_data) ."</pre></span></td>
      <td><span class=\"\"><pre class=\"data\">". ($task->output_data) ."</pre></span></td>
    </tr>
    <tr>
      <td colspan=\"2\"><span class=\"\">$task->description_data</span></td>
    </tr>
    <tr>
      <td colspan=\"2\"><span class=\"condition\">" . get_string("example", "vinttaskbook") . ":</span></td>
    </tr>
    <tr valign=\"top\">
      <td><span class=\"\"><pre class=\"data\">". ($task->input_example) ."</pre></span></td>
      <td><span class=\"\"><pre class=\"data\">". ($task->output_example) ."</pre></span></td>
    </tr>
  </table>
  ";
  if ($edit)
  {
    $output .= "
    <table class=\"solutiontable\" width=\"100%\">
      <tr>
        <td colspan=\"2\" class=\"theader\"><span class=\"condition\">" . get_string("original_solution", "vinttaskbook") . "</span></td>
      </tr>
      <tr>
        <td colspan=\"2\"><span class=\"\"><pre><code class=\"$task->original_compilator\">". ($task->original_solution) . "</code></pre></span></td>
      </tr>
    </table>
    ";
  }
  return $output;
}

function test_table($tests, $edit=0, $opts=array()){
  $output  = "";
  
  $editstr = "";
  $editstr2 = "";
  if ($edit) {
    $id = $opts['id'];
    $cid = $opts['cid'];
    $tid = $opts['tid'];
    $type = $opts['type'];
    /*$editstr = "
      <a title=\"" . get_string('edit') . "\"href=\"edit.php?id=$id&amp;cid=$cid&amp;tid=$tid&amp;type=$type&amp;action=edit\"><img src=\"pix/edit.png\" height=\"11\" class=\"iconsmall\" alt=\"" . get_string('edit') . "\" /></a>
      <a title=\"" . get_string('delete') . "\"href=\"edit.php?id=$id&amp;cid=$cid&amp;tid=$tid&amp;type=$type&amp;action=delete\"><img src=\"pix/del.png\" height=\"11\" class=\"iconsmall\" alt=\"" . get_string('delete') . "\" /></a>
    ";*/
    $addstr = "
      <a title=\"" . get_string('add') . "\"href=\"edit.php?id=$id&amp;cid=$cid&amp;tid=$tid&amp;type=$type&amp;action=add\"><img src=\"pix/add.png\" height=\"11\" class=\"iconsmall\" alt=\"" . get_string('add') . "\" /></a>
    ";
  }
  
  $output .= "
  <table class=\"testtable\" width=\"100%\">
    <tr>
      <th><span class=\"condition\">" . "№" . "</span></th>
      <th><span class=\"condition\">" . get_string("input_data", "vinttaskbook") . "</span></th>
      <th><span class=\"condition\">" . get_string("output_data", "vinttaskbook") . "</span></th>
    </tr>
  ";
  foreach ($tests as $test){
    if ($edit){
      $editstr = "
        <a title=\"" . get_string('edit') . "\"href=\"edit.php?id=$id&amp;cid=$cid&amp;tid=$tid&amp;testid=$test->id&amp;type=$type&amp;action=edit\"><img src=\"pix/edit.png\" height=\"11\" class=\"iconsmall\" alt=\"" . get_string('edit') . "\" /></a>
        <a title=\"" . get_string('delete') . "\"href=\"edit.php?id=$id&amp;cid=$cid&amp;tid=$tid&amp;testid=$test->id&amp;type=$type&amp;action=delete\"><img src=\"pix/del.png\" height=\"11\" class=\"iconsmall\" alt=\"" . get_string('delete') . "\" /></a>
      ";
    }
    $output .= "
      <tr valign=\"top\">
        <td width=\"10%\"><span class=\"\">$test->number. " . $editstr . "</span></td>
        <td width=\"45%\"><span class=\"\"><pre class=\"data\">". ($test->input_data) ."</pre></span></td>
        <td width=\"45%\"><span class=\"\"><pre class=\"data\">". ($test->output_data) ."</pre></span></td>
      </tr>
    ";
  }
  $output .= "</table><br/>";
  if ($edit){
    $output .= $addstr . "<br/>";
    $output .= "<a title=\"" . get_string("backtotasks", "vinttaskbook") . "\"href=\"view.php?id=$id&amp;cid=$cid&amp;tid=$tid\">" . get_string("backtotasks", "vinttaskbook") . "</a>";
  }
  
  return $output;
}

function solution_table($solutions, $edit=0, $opts=array(), $solutionid = 0){
  $output  = "";
  
  $editstr = "";
  $editstr2 = "";
  if ($edit) {
    $id = $opts['id'];
    $cid = $opts['cid'];
    $tid = $opts['tid'];
    $type = $opts['type'];
  }
  if ($solutionid){
    $output .= "<form action=\"edit.php\" method=\"post\">";
  }
  $output .= "
  <table class=\"solutiontable\" width=\"100%\">
    <tr>
      <th><span class=\"condition\">" . "№" . "</span></th>
      <th><span class=\"condition\">" . get_string("user", "vinttaskbook") . "</span></th>
      <th><span class=\"condition\">" . get_string("ball", "vinttaskbook") . "</span></th>
      <th><span class=\"condition\"></span></th>
    </tr>
  ";
  foreach ($solutions as $solution){
    if ($edit){
      $editstr = "
        <a title=\"" . get_string('view') . "\"href=\"edit.php?id=$id&amp;cid=$cid&amp;tid=$tid&amp;solid=$solution->id&amp;type=$type&amp;action=view\"><img src=\"pix/down.png\" height=\"11\" class=\"iconsmall\" alt=\"" . get_string('view') . "\" /></a>
        <!--a title=\"" . get_string('edit') . "\"href=\"edit.php?id=$id&amp;cid=$cid&amp;tid=$tid&amp;solid=$solution->id&amp;type=$type&amp;action=edit\"><img src=\"pix/edit.png\" height=\"11\" class=\"iconsmall\" alt=\"" . get_string('edit') . "\" /></a-->
        <a title=\"" . get_string('delete') . "\"href=\"edit.php?id=$id&amp;cid=$cid&amp;tid=$tid&amp;solid=$solution->id&amp;type=$type&amp;action=delete\"><img src=\"pix/del.png\" height=\"11\" class=\"iconsmall\" alt=\"" . get_string('delete') . "\" /></a>
      ";
    }
    $user_data =  get_record("user", "id", $solution->userid);
    $userid = $solution->userid;
    $grade = $solution->grade!=0?$solution->grade:'';
    
    if ($solutionid == $solution->id){
        $output .= "
          <tr valign=\"top\">
            <td width=\"10%\"><span class=\"\">$solution->id</span></td>
            <td width=\"45%\"><span class=\"\"><a title=\"" . get_string('view') . "\"href=\"edit.php?id=$id&amp;cid=$cid&amp;tid=$tid&amp;solid=$solution->id&amp;type=$type&amp;action=view\">" . fullname($user_data) . "</a></span></td>
            <td width=\"15%\"><span class=\"\">
              <input type=\"hidden\" name=\"id\" value=\"$id\">
              <input type=\"hidden\" name=\"cid\" value=\"$cid\">
              <input type=\"hidden\" name=\"tid\" value=\"$tid\">
              <input type=\"hidden\" name=\"solid\" value=\"$solutionid\">
              <input type=\"hidden\" name=\"userid\" value=\"$userid\">
              <input type=\"hidden\" name=\"type\" value=\"solution\">
              <input type=\"hidden\" name=\"action\" value=\"mark\">
              <input type=\"text\" name=\"markvalue\" value=\"$grade\">
            </span></td>
            <td width=\"30%\"><span class=\"\">$editstr</span></td>
          </tr>
          <tr valign=\"top\" class=\"expanded\">
            <td width=\"10%\"><span class=\"\"></span></td>
            <td width=\"45%\"><span class=\"\"><pre><code class=\"pascal\">" . (s($solution->solution)) . "</code></pre><br/>" . button_to_popup_window("/mod/vinttaskbook/exectest.php?id=$id&amp;cid=$cid&amp;tid=$tid&amp;solid=$solutionid", "", get_string("run_tests", "vinttaskbook"), 400, 500, "6", "none", true) . "</span></td>
            <td width=\"15%\"><span class=\"\">
              <input type=\"submit\" value=\"" . get_string("mark", "vinttaskbook") . "\">
            <br>". /*print_grade_menu(1 , "name_mark", make_grades_menu(6)) .*/ "</span></td>
            <td width=\"30%\"><span class=\"\"></span></td>
          </tr>
        ";
    }
    else {
      $output .= "
        <tr valign=\"top\">
          <td width=\"10%\">$solution->id</td>
          <td width=\"45%\"><a title=\"" . get_string('view') . "\"href=\"edit.php?id=$id&amp;cid=$cid&amp;tid=$tid&amp;solid=$solution->id&amp;type=$type&amp;action=view\">" . fullname($user_data) . "</a></td>
          <td width=\"15%\">$grade</td>
          <td width=\"30%\">$editstr</td>
        </tr>
      ";
    }
  }
  $output .= "</table><br/>";
  if ($solutionid){
    $output .= "</form>";
  }
  if ($edit) $output .= "<a title=\"" . get_string("backtotasks", "vinttaskbook") . "\"href=\"view.php?id=$id&amp;cid=$cid&amp;tid=$tid\">" . get_string("backtotasks", "vinttaskbook") . "</a>";
  return $output;
}

function solution_user_table($solutions){
  $output  = "";
 
  $output .= "
  <table border=\"1\" width=\"100%\">
    <tr>
      <td colspan=\"3\"><b>" . get_string("condition", "vinttaskbook") . "</b></td>
    </tr>
    <tr>
      <td><b>" . "№" . "</b></td>
      <td><b>" . get_string("task", "vinttaskbook") . "</b></td>
      <td><b>" . get_string("ball", "vinttaskbook") . "</b></td>
    </tr>
  ";
  foreach ($solutions as $solution){
    $user_data =  get_record("user", "id", $solution->userid);
    $output .= "
      <tr>
        <td width=\"10%\">$solution->id</td>
        <td width=\"60%\">$solution->vinttasktask</td>
        <td width=\"30%\">$solution->grade</td>
      </tr>
    ";
  }
  $output .= "</table><br/>";

  return $output;
}

?>
