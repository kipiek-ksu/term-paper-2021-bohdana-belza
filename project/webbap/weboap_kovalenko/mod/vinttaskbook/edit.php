<?php  // $Id: edit.php,v 1.12.2.1 2007/02/23 20:17:36 mark-nielsen Exp $
/**
 * Provides the interface for overall authoring of lessons
 *
 * @author Tkachuk Ilya Jctim™
 * @version $Id: edit.php,v 1.12.2.1 2007/02/23 20:17:36 mark-nielsen Exp $
 * @license http://www.gnu.org/copyleft/gpl.html GNU Public License
 * @package lesson
 **/

    require_once('../../config.php');
    require_once('lib.php');
    require_once("edit_form.php");

    $id      = required_param('id', PARAM_INT);             // Course Module ID
    $type = optional_param('type', '', PARAM_TEXT);
    $action = optional_param('action','add', PARAM_ACTION);

    if (!$cm = get_coursemodule_from_id('vinttaskbook', $id)) {
        error('Course Module ID was incorrect');
    }

    if (!$course = get_record('course', 'id', $cm->course)) {
        error('Course is misconfigured');
    }

    require_login($course->id, false, $cm);
    
    if (! $vinttaskbook = get_record("vinttaskbook", "id", $cm->instance)) {
        error("Course module is incorrect");
    }
    
   
    switch ($action) {
    case 'view':
        if ($type=='test') test_view($cm, $course, $vinttaskbook);
        if ($type=='solution') solution_view($cm, $course, $vinttaskbook);
        die;
    case 'add':
        if ($type=='category') category_add($cm, $course, $vinttaskbook);
        if ($type=='task') task_add($cm, $course, $vinttaskbook);
        if ($type=='test') test_add($cm, $course, $vinttaskbook);
        die;
    case 'delete':
        if ($type=='category') category_delete($cm, $course, $vinttaskbook);
        if ($type=='task') task_delete($cm, $course, $vinttaskbook);
        if ($type=='test') test_delete($cm, $course, $vinttaskbook);
        if ($type=='solution') solution_delete($cm, $course, $vinttaskbook);
        die;
    case 'edit':
        if ($type=='category') category_edit($cm, $course, $vinttaskbook);
        if ($type=='task') task_edit($cm, $course, $vinttaskbook);
        if ($type=='test') test_edit($cm, $course, $vinttaskbook);
        die;
    case 'mark':
        if ($type=='solution') solution_mark($cm, $course, $vinttaskbook);
    default:
        error('Incorrect action specified');
    }

/**
 * Add new category
 */
function category_add($cm, $course, $vinttaskbook) {
    $context = get_context_instance(CONTEXT_MODULE, $cm->id);
    if (!has_capability('mod/vinttaskbook:addcategory', $context)) {
        error('You can\'t add categories to this taskbook!');
    }
    
    $mform = new mod_vinttaskbook_edit_cat_form();
    $mform->set_data(array('id'=>$cm->id, 'vinttaskbook'=>$vinttaskbook->id, 'action' => 'add', 'type'=>'category'));

    if ($mform->is_cancelled()) {
        redirect("view.php?id=$cm->id");
    }

    if ($data = $mform->get_data()) {
        //trusttext_after_edit($data->catname, $context);

        $newcategory = new object();
        $newcategory->vinttaskbook      = $data->vinttaskbook;
        $newcategory->name              = $data->catname;
        $newcategory->number            = $data->number;
        $newcategory->timecreated       = time();
        $newcategory->timemodified      = time();

        if (!$newcategory->id = insert_record('vinttaskbook_categories', $newcategory)) {
            error('Could not insert this new category');
        } else {
            add_to_log($course->id, 'vinttaskbook', 'add category', "view.php?id=$cm->id", "$newcategory->id", $cm->id);
        }
        redirect("view.php?id=$cm->id&amp;cid=$newcategory->id");

    } else {
        $stredit = get_string("add_category", "vinttaskbook");
        _print_edit_header($course, $cm, $vinttaskbook, $stredit);
        $mform->display();
        print_footer($course);
        die;
    }
}   


/**
 * Edit existing category
 */
function category_edit($cm, $course, $vinttaskbook) {

    $cid = optional_param('cid', 0, PARAM_INT); // Comment ID

    if (!$category = get_record('vinttaskbook_categories', 'id', $cid)) {
      error('Category is incorrect');
    }
    $context = get_context_instance(CONTEXT_MODULE, $cm->id);
    if (!has_capability('mod/vinttaskbook:editcategory', $context)) {
      error('You can\'t edit categories in this taskbook!');
    }
   
    $mform = new mod_vinttaskbook_edit_cat_form();
    //trusttext_prepare_edit($category->name, can_use_html_editor(), $context);
    $mform->set_data(array('id'=>$cm->id, 'cid'=>$cid, 'vinttaskbook'=>$vinttaskbook->id, 'action' => 'edit', 'type'=>'category',
                            'catname' =>$category->name, 'number'=>$category->number));

    if ($data = $mform->get_data()) {
        //trusttext_after_edit($data->catname, $context);

        $updatedcategory               = new object();
        $updatedcategory->id           = $cid;
        $updatedcategory->name         = $data->catname;
        $updatedcategory->number       = $data->number;
        $updatedcategory->timemodified = time();

        if (!update_record('vinttaskbook_categories', $updatedcategory)) {
            error('Could not update this category');
        } else {
            add_to_log($course->id, 'vinttaskbook_category', 'update category', "view.php?id=$cm->id&amp;cid=$cid", "$updatedcategory->id",$cm->id);
        }
        redirect("view.php?id=$cm->id&amp;cid=$updatedcategory->id");

    } else {
        $stredit = get_string("edit_category", "vinttaskbook");
        _print_edit_header($course, $cm, $vinttaskbook, $stredit);
        $mform->display();
        print_footer($course);
        die;
    }
} 

/**
 * Deleting existing category
 */    
function category_delete($cm, $course, $vinttaskbook){
  $cid     = optional_param('cid', 0, PARAM_INT);      // Comment ID
  $confirm = optional_param('confirm', 0, PARAM_BOOL); // delete confirmation
  if (!$category = get_record('vinttaskbook_categories', 'id', $cid)) {
    error('Category is incorrect');
  }
    
  $context = get_context_instance(CONTEXT_MODULE, $cm->id);
  if (!has_capability('mod/vinttaskbook:deletecategory', $context)) {
      error('You can\'t delete this category!');
  }
  if (data_submitted() and $confirm) {
        delete_records('vinttaskbook_categories','id', $cid);
        delete_records('vinttaskbook_tasks',' vinttaskcategories', $cid);
        add_to_log($course->id, 'vinttaskbook', 'delete category', "view.php?id=$cm->id", "$category->id",$cm->id);
        redirect("view.php?id=$cm->id");

    } else {
        $linkyes    = 'edit.php';
        $optionsyes = array('id'=>$cm->id, 'cid'=>$cid, 'action'=>'delete', 'type'=>'category', 'confirm'=>1, );
        $linkno     = 'view.php';
        $optionsno  = array('id'=>$cm->id, 'cid'=>$cid);
        $strdeletewarning = get_string("areyousuredeletecategory","vinttaskbook");

        $stredit = get_string("delete_category");
        _print_edit_header($course, $cm, $vinttaskbook, $stredit);
        echo($category->name);
        //print_r('<br/>All Tasks in this category :(');
        notice_yesno($strdeletewarning, $linkyes, $linkno, $optionsyes, $optionsno, 'post', 'get');
        print_footer($course);
        die;
    }


}    

/**
 * Add new task
 */  
function task_add($cm, $course, $vinttaskbook) {
    $context = get_context_instance(CONTEXT_MODULE, $cm->id);
    if (!has_capability('mod/vinttaskbook:addtask', $context)) {
        error('You can\'t add task to this taskbook!');
    }
    $vinttaskcategories = get_records("vinttaskbook_categories", "vinttaskbook", $vinttaskbook->id);
    //$categories = new array();
    foreach($vinttaskcategories as $key=>$category){
      $categories["$key"]=$category->name;
      }
    //print_r($categories);
    
		global $vinttaskbook_LANGS;
    $mform = new mod_vinttaskbook_edit_task_form($categories, $vinttaskbook_LANGS);
    $mform->set_data(array('id'=>$cm->id, 'vinttaskbook'=>$vinttaskbook->id, 'action' => 'add', 'type'=>'task'));

    if ($mform->is_cancelled()) {
        redirect("view.php?id=$cm->id");
    }

    if ($data = $mform->get_data()) {
        trusttext_after_edit($data->taskname, $context);

        $newtask = new object();
        $newtask->vinttaskbook        = $data->vinttaskbook;
        $newtask->vinttaskcategories  = $data->taskcategories;
        $newtask->number              = $data->number;
        $newtask->name                = $data->taskname;
        $newtask->description         = $data->summary;
        $newtask->input_data          = $data->input_data;
        $newtask->output_data         = $data->output_data;
        $newtask->description_data    = $data->description_data;
        $newtask->output_example      = $data->output_example;
        $newtask->input_example       = $data->input_example;
        //$newtask->original_solution   = html_to_text($data->original_solution);
        $newtask->original_solution   = $data->original_solution;
        $newtask->original_compilator = $data->original_compilator;
        
        $newtask->timecreated       = time();
        $newtask->timemodified      = time();

        if (!$newtask->id = insert_record('vinttaskbook_tasks', $newtask)) {
            error('Could not insert this new task');
        } else {
            add_to_log($course->id, 'vinttaskbook', 'add task', "view.php?id=$cm->id", "$newtask->id", $cm->id);
        }
        redirect("view.php?id=$cm->id&amp;cid=$newtask->vinttaskcategories&amp;tid=$newtask->id");

    } else {
        $stredit = get_string("add_task", "vinttaskbook");
        _print_edit_header($course, $cm, $vinttaskbook, $stredit);
        $mform->display();
        print_footer($course);
        die;
    }
}  

/**
 * Edit existing task
 */
function task_edit($cm, $course, $vinttaskbook) {

    $cid = optional_param('cid', 0, PARAM_INT); // Comment ID
    $tid = optional_param('tid', 0, PARAM_INT); // Comment ID

    if (!$task = get_record('vinttaskbook_tasks', 'id', $tid)) {
      error('Task is incorrect');
    }
    $context = get_context_instance(CONTEXT_MODULE, $cm->id);
    if (!has_capability('mod/vinttaskbook:edittask', $context)) {
        error('You can\'t edit task in this taskbook!');
    }
   
    $vinttaskcategories = get_records("vinttaskbook_categories", "vinttaskbook", $vinttaskbook->id);
    //$categories = new array();
    foreach($vinttaskcategories as $key=>$category){
      $categories["$key"]=$category->name;
    }
    
		global $vinttaskbook_LANGS;
    $mform = new mod_vinttaskbook_edit_task_form($categories, $vinttaskbook_LANGS);
    //trusttext_prepare_edit($category->name, can_use_html_editor(), $context);
    $mform->set_data(array('id'=>$cm->id, 'cid'=>$cid, 'tid'=>$tid, 'vinttaskbook'=>$vinttaskbook->id, 'action' => 'edit', 'type'=>'task',
                            'taskname' =>$task->name, 'number'=>$task->number, 'taskcategories'=>$task->vinttaskcategories, 'summary'=>$task->description,
                            'input_data'=>$task->input_data, 'output_data'=>$task->output_data, 'description_data'=>$task->description_data, 'input_example'=>$task->input_example, 'output_example'=>$task->output_example, 'original_solution'=>$task->original_solution, 'original_compilator'=>$task->original_compilator));

    if ($data = $mform->get_data()) {
        //trusttext_after_edit($data->taskname, $context);

        $updatedtask = new object();
        $updatedtask->id                  = $tid;
        $updatedtask->vinttaskbook        = $data->vinttaskbook;
        $updatedtask->vinttaskcategories  = $data->taskcategories;
        $updatedtask->number              = $data->number;
        $updatedtask->name                = $data->taskname;
        $updatedtask->description         = $data->summary;
        $updatedtask->input_data          = $data->input_data;
        $updatedtask->output_data         = $data->output_data;
        $updatedtask->description_data    = $data->description_data;
        $updatedtask->output_example      = $data->output_example;
        $updatedtask->input_example       = $data->input_example;
        //$updatedtask->original_solution   = html_to_text($data->original_solution);
        $updatedtask->original_solution   = $data->original_solution;
        $updatedtask->original_compilator = $data->original_compilator;

        $updatedtask->timemodified      = time();
        
        if (!update_record('vinttaskbook_tasks', $updatedtask)) {
            error('Could not update this task');
        } else {
            add_to_log($course->id, 'vinttaskbook_tasks', 'update task', "view.php?id=$cm->id&amp;cid=$updatedtask->vinttaskcategories&amp;tid=$updatedtask->id", "$updatedtask->id",$cm->id);
        }
        redirect("view.php?id=$cm->id&amp;cid=$updatedtask->vinttaskcategories&amp;tid=$updatedtask->id");

    } else {
        $stredit = get_string("edit_task", "vinttaskbook");
        _print_edit_header($course, $cm, $vinttaskbook, $stredit);
        $mform->display();
        print_footer($course);
        die;
    }
} 

/**
 * Deleting existing task
 */    
function task_delete($cm, $course, $vinttaskbook){
  $tid     = optional_param('tid', 0, PARAM_INT);      // Comment ID
  $cid     = optional_param('cid', 0, PARAM_INT);      // Comment ID
  $confirm = optional_param('confirm', 0, PARAM_BOOL); // delete confirmation
  if (!$task = get_record('vinttaskbook_tasks', 'id', $tid)) {
    error('Task is incorrect');
  }
  
  $tests = get_records("vinttaskbook_tests", "vinttasktask", $tid, "number");
    
  $context = get_context_instance(CONTEXT_MODULE, $cm->id);
  if (!has_capability('mod/vinttaskbook:deletetask', $context)) {
      error('You can\'t delete this task!');
  }
  if (data_submitted() and $confirm) {
        delete_records('vinttaskbook_tasks',' id', $tid);
        delete_records('vinttaskbook_tests',' vinttasktask', $tid);
        add_to_log($course->id, 'vinttaskbook', 'delete task', "view.php?id=$cm->id", "$task->id",$cm->id);
        redirect("view.php?id=$cm->id&amp;cid=$cid");

    } else {
        $linkyes    = 'edit.php';
        $optionsyes = array('id'=>$cm->id, 'cid'=>$cid, 'tid'=>$tid, 'action'=>'delete', 'type'=>'task', 'confirm'=>1 );
        $linkno     = 'view.php';
        $optionsno  = array('id'=>$cm->id, 'cid'=>$cid, 'tid'=>$tid);
        $strdeletewarning = get_string("areyousuredeletetask","vinttaskbook");

        $stredit = get_string("delete_task", "vinttaskbook");
        _print_edit_header($course, $cm, $vinttaskbook, $stredit);
        echo($task->name);
        echo task_table($task, 1);
        echo get_string("tests", "vinttaskbook");
        echo test_table($tests);
        
        notice_yesno($strdeletewarning, $linkyes, $linkno, $optionsyes, $optionsno, 'post', 'get');
        print_footer($course);
        die;
    }
} 

/**
 * Wiev tests
 */
function test_view($cm, $course, $vinttaskbook) {
  $tid     = optional_param('tid', 0, PARAM_INT);      // Task ID
	$cid     = optional_param('cid', 0, PARAM_INT);      // Category ID
	
	$context = get_context_instance(CONTEXT_MODULE, $cm->id);
	
  if (!has_capability('mod/vinttaskbook:viewtest', $context)) {
    error('You can\'t view test to this task!');
  }
	if (!$task = get_record('vinttaskbook_tasks', 'id', $tid)) {
		error('Task is incorrect');
	}
	
	//$vinttasktasks = get_records("vinttaskbook_tasks", "vinttaskcategories", $cid, "number");
	$tests = get_records("vinttaskbook_tests", "vinttasktask", $tid, "number");

  $stredit = get_string("view_tests", "vinttaskbook");
  _print_edit_header($course, $cm, $vinttaskbook, $stredit);
  echo test_table($tests, 1, array('id' => $cm->id, 'cid' => $cid, 'tid' => $tid, 'type' => 'test' ));
  print_footer($course);
  die;
}

/**
 * Add new test
 */
function test_add($cm, $course, $vinttaskbook) {
    $tid     = optional_param('tid', 0, PARAM_INT);      // Task ID
    $cid     = optional_param('cid', 0, PARAM_INT);      // Category ID
    
    $context = get_context_instance(CONTEXT_MODULE, $cm->id);
    if (!has_capability('mod/vinttaskbook:addtest', $context)) {
      error('You can\'t add test to this task!');
    }
    if (!$task = get_record('vinttaskbook_tasks', 'id', $tid)) {
  		error('Task is incorrect');
  	}    
    
    $mform = new mod_vinttaskbook_edit_test_form();
    $mform->set_data(array('id'=>$cm->id, 'vinttaskbook'=>$vinttaskbook->id, 'action' => 'add', 'type'=>'test', 'cid' => $cid, 'tid' => $tid));

    if ($mform->is_cancelled()) {
        redirect("edit.php?id=$cm->id&amp;cid=$cid&amp;tid=$tid&amp;type=test&amp;action=view");
    }

    if ($data = $mform->get_data()) {
        trusttext_after_edit($data->number, $context);

        $newtest = new object();
        $newtest->vinttaskbook        = $data->vinttaskbook;
        $newtest->vinttasktask        = $data->tid;
        $newtest->number              = $data->number;
        $newtest->input_data          = $data->input_data;
        $newtest->output_data         = $data->output_data;
        //$newtest->time                = $data->time;
        
        $newtest->timecreated       = time();
        $newtest->timemodified      = time();

        if (!$newtest->id = insert_record('vinttaskbook_tests', $newtest)) {
            error('Could not insert this new test');
        } else {
            add_to_log($course->id, 'vinttaskbook', 'add test', "edit.php?id=$cm->id", "$newtest->id", $cm->id);
        }
        redirect("edit.php?id=$cm->id&amp;cid=$cid&amp;tid=$tid&amp;type=test&amp;action=view");

    } else {
        $stredit = get_string("add_test", "vinttaskbook");
        _print_edit_header($course, $cm, $vinttaskbook, $stredit);
        $mform->display();
        print_footer($course);
        die;
    }
}  

/**
 * Edit existing test
 */
function test_edit($cm, $course, $vinttaskbook) {

    $cid = optional_param('cid', 0, PARAM_INT); // Category ID
    $tid = optional_param('tid', 0, PARAM_INT); // Task ID
    $testid = optional_param('testid', 0, PARAM_INT); // Test ID

    if (!$test = get_record('vinttaskbook_tests', 'id', $testid)) {
      error('Test is incorrect');
    }
    $context = get_context_instance(CONTEXT_MODULE, $cm->id);
    if (!has_capability('mod/vinttaskbook:edittest', $context)) {
      error('You can\'t edit test in this task!');
    }

    if (!$task = get_record('vinttaskbook_tasks', 'id', $tid)) {
  		error('Task is incorrect');
  	}    
      
      
    $mform = new mod_vinttaskbook_edit_test_form();
    $mform->set_data(array('id'=>$cm->id, 'cid'=>$cid, 'tid'=>$tid, 'testid'=>$testid, 'vinttaskbook'=>$vinttaskbook->id, 'action' => 'edit', 'type'=>'test',
                            'number'=>$test->number, 'input_data'=>$test->input_data, 'output_data'=>$test->output_data/*, 'time'=>$test->time*/));

    if ($data = $mform->get_data()) {
        //trusttext_after_edit($data->taskname, $context);

        $updatedtest = new object();
        $updatedtest->id                  = $testid;
        $updatedtest->vinttaskbook        = $data->vinttaskbook;
        $updatedtest->vinttasktask        = $data->tid;
        $updatedtest->number              = $data->number;
        $updatedtest->input_data          = $data->input_data;
        $updatedtest->output_data         = $data->output_data;
        //$updatedtest->time                = $data->time;

        $updatedtask->timemodified      = time();
        
        if (!update_record('vinttaskbook_tests', $updatedtest)) {
            error('Could not update this test');
        } else {
            add_to_log($course->id, 'vinttaskbook_tests', 'update test', "view.php?id=$cm->id&amp;cid=$cid&amp;tid=$updatedtest->id", "$updatedtest->id",$cm->id);
        }
        redirect("edit.php?id=$cm->id&amp;cid=$cid&amp;tid=$tid&amp;type=test&amp;action=view");

    } else {
        $stredit = get_string("edit_test", "vinttaskbook");
        _print_edit_header($course, $cm, $vinttaskbook, $stredit);
        $mform->display();
        print_footer($course);
        die;
    }
}

/**
 * Delete existing test
 */
function test_delete($cm, $course, $vinttaskbook){
  $testid  = optional_param('testid', 0, PARAM_INT);      // Task ID
  $tid     = optional_param('tid', 0, PARAM_INT);      // Task ID
  $cid     = optional_param('cid', 0, PARAM_INT);      // Category ID
  $confirm = optional_param('confirm', 0, PARAM_BOOL); // delete confirmation
  if (!$test = get_record('vinttaskbook_tests', 'id', $testid)) {
    error('Test is incorrect');
  }
    
  $context = get_context_instance(CONTEXT_MODULE, $cm->id);
  if (!has_capability('mod/vinttaskbook:deletetest', $context)) {
    error('You can\'t delete this test!');
  }

  if (!$task = get_record('vinttaskbook_tasks', 'id', $tid)) {
    error('Task is incorrect');
  }    
    
    
  if (data_submitted() and $confirm) {
        delete_records('vinttaskbook_tests',' id', $testid);
        add_to_log($course->id, 'vinttaskbook', 'delete test', "edit.php?id=$cm->id", "$test->id",$cm->id);
        redirect("edit.php?id=$cm->id&amp;cid=$cid&amp;tid=$tid&amp;type=test&amp;action=view");

    } else {
        $linkyes    = 'edit.php';
        $optionsyes = array('id'=>$cm->id, 'cid'=>$cid, 'tid'=>$tid, 'testid'=>$testid, 'action'=>'delete', 'type'=>'test', 'confirm'=>1 );
        $linkno     = 'edit.php';
        $optionsno  = array('id'=>$cm->id, 'cid'=>$cid, 'tid'=>$tid, 'action'=>'view', 'type'=>'test');
        $strdeletewarning = get_string("areyousuredeletetest","vinttaskbook");

        $stredit = get_string("delete_test", "vinttaskbook");
        _print_edit_header($course, $cm, $vinttaskbook, $stredit);
        echo $test->number;
        notice_yesno($strdeletewarning, $linkyes, $linkno, $optionsyes, $optionsno, 'post', 'get');
        print_footer($course);
        die;
    }


} 


function solution_view($cm, $course, $vinttaskbook) {
  
  $tid     = optional_param('tid', 0, PARAM_INT);      // Task ID
	$cid     = optional_param('cid', 0, PARAM_INT);      // Category ID
  $solid   = optional_param('solid', 0, PARAM_INT);      // Solution ID
	
  if ($solid) {
    if (!$solution = get_record('vinttaskbook_solutions', 'id', $solid)) {
      error('solution is incorrect');
    }
  }
  
	$context = get_context_instance(CONTEXT_MODULE, $cm->id);
	
  if (!has_capability('mod/vinttaskbook:viewsolution', $context)) {
    error('You can\'t view solution in this task!!!');
  };
	if (!$task = get_record('vinttaskbook_tasks', 'id', $tid)) {
		error('Task is incorrect');
	}
	
	//$vinttasktasks = get_records("vinttaskbook_tasks", "vinttaskcategories", $cid, "number");
	$solutions = get_records("vinttaskbook_solutions", "vinttasktask", $tid, "id");

  $stredit = get_string("view_solutions", "vinttaskbook");
  $ss = '
	<script type="text/javascript" src="highlight.js"></script>
  <link rel="stylesheet" type="text/css" href="highlight.css"/>
  ';
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
        add_to_log($course->id, 'vinttaskbook', 'delete solution', "edit.php?id=$cm->id", "$solution->id",$cm->id);
        redirect("edit.php?id=$cm->id&amp;cid=$cid&amp;tid=$tid&amp;type=solution&amp;action=view");

    } else {
        $linkyes    = 'edit.php';
        $optionsyes = array('id'=>$cm->id, 'cid'=>$cid, 'tid'=>$tid, 'solid'=>$solid, 'action'=>'delete', 'type'=>'solution', 'confirm'=>1 );
        $linkno     = 'edit.php';
        $optionsno  = array('id'=>$cm->id, 'cid'=>$cid, 'tid'=>$tid,  'action'=>'view', 'type'=>'solution');
        $strdeletewarning = get_string("areyousuredeletesolution","vinttaskbook");

        $stredit = get_string("delete_solution", "vinttaskbook");
		$ss = '
			<link rel="stylesheet" type="text/css" href="highlight.css"/>
			<script type="text/javascript" src="highlight.js"></script>
		  ';
        _print_edit_header($course, $cm, $vinttaskbook, $stredit, $ss);
        echo "$solution->id<br/><pre><code class=\"pascal\">" . s($solution->solution) . "</code></pre>";
        notice_yesno($strdeletewarning, $linkyes, $linkno, $optionsyes, $optionsno, 'post', 'get');
        echo '<script type="text/javascript">
          initHighlightingOnLoad();
        </script>';
        print_footer($course);
        die;
    }


} 

function solution_mark($cm, $course, $vinttaskbook) {

    $cid = optional_param('cid', 0, PARAM_INT); // Category ID
    $tid = optional_param('tid', 0, PARAM_INT); // Task ID
    $solid = optional_param('solid', 0, PARAM_INT); // Sol ID
    $markvalue = optional_param('markvalue', 0, PARAM_INT); // Sol ID
    $userid = optional_param('userid', 0, PARAM_INT); // Sol ID

    if (!$solution = get_record('vinttaskbook_solutions', 'id', $solid)) {
      error('solution is incorrect');
    }
    $context = get_context_instance(CONTEXT_MODULE, $cm->id);
    if (!has_capability('mod/vinttaskbook:marksolution', $context)) {
      error('You can\'t mark this solution!');
    }

    if (!$task = get_record('vinttaskbook_tasks', 'id', $tid)) {
  		error('Task is incorrect');
  	}
      $updatedsolution = new object();
      $updatedsolution->id                  = $solid;
      $updatedsolution->grade               = $markvalue;

      $updatedsolution->timemodified        = time();
        
        if (!update_record('vinttaskbook_solutions', $updatedsolution)) {
            error('Could not update this solution');
        } else {
            // Grade Max Mark in tbl_grades
            
            $grade = get_record("vinttaskbook_grades", "userid", $userid);
            if (!$grade){
              // INSET GRADE IF NOT EXIST
              $newgrade               = new object();
              $newgrade->vinttaskbook = $vinttaskbook->id;
              $newgrade->userid       = $userid;
              $newgrade->grade        = _get_average_score($userid);
              $newgrade->timemodified = time();
              if (!insert_record('vinttaskbook_grades', $newgrade)) {
                error('Could not create grade for this solution');
              } else {
                add_to_log($course->id, 'vinttaskbook_solutions', 'mark solution', "view.php?id=$cm->id&amp;cid=$cid&amp;tid=$task->id&amp;solid=$updatedsolution->id", "$updatedsolution->id",$cm->id);
              }
            } else /*if ($grade->grade<$updatedsolution->grade)*/{
              // UDPATE GRADE
              $updatedgrade         = new object();
              $updatedgrade->id     = $grade->id;
              $updatedgrade->grade  = _get_average_score($userid);
              $updatedgrade->timemodified = time();
              if (!update_record('vinttaskbook_grades', $updatedgrade)) {
                error('Could not update grade for this solution');
              } else {
                add_to_log($course->id, 'vinttaskbook_solutions', 'mark solution', "view.php?id=$cm->id&amp;cid=$cid&amp;tid=$task->id&amp;solid=$updatedsolution->id", "$updatedsolution->id",$cm->id);
              }
            }
            
            add_to_log($course->id, 'vinttaskbook_solutions', 'mark solution', "view.php?id=$cm->id&amp;cid=$cid&amp;tid=$task->id&amp;solid=$updatedsolution->id", "$updatedsolution->id",$cm->id);
        }
    
    redirect("edit.php?id=$cm->id&amp;cid=$cid&amp;tid=$tid&amp;solid=$solid&amp;type=solution&amp;action=view");
    die;

}

function _get_average_score($userid){
  
  $sum = 0;
  $grades = get_records("vinttaskbook_solutions", "userid", $userid);
  foreach ($grades as $grade){
    $sum += $grade->grade;
  }
  
  return $sum / count($grades);
  
  //return $grade;
}

function _print_edit_header($course, $cm, $vinttaskbook, $stredit, $scripts_n_styles=""){
  $strvinttaskbook = get_string("modulename", "vinttaskbook");
  $strvinttaskbooks = get_string("modulenameplural", "vinttaskbook");
  print_header_simple(format_string($vinttaskbook->name), "",
    "<a href=\"index.php?id=$course->id\">$strvinttaskbooks</a> ->
    <a href=\"view.php?id=$cm->id\">" . format_string($vinttaskbook->name,true) . "</a> -> $stredit", "",
    '<link rel="stylesheet" type="text/css" href="style.css"/>' . $scripts_n_styles, true, "", navmenu($course, $cm)
  );

}


?>
