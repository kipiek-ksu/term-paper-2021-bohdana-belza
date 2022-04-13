<?php  // $Id: view.php,v 1.4 2006/08/28 16:41:20 mark-nielsen Exp $
/**
 * This page prints a particular instance of vinttaskbook
 * 
 * @author Tkachuk Ilya Jctim™
 * @version $Id: view.php,v 1.4 2006/08/28 16:41:20 mark-nielsen Exp $
 * @package vinttaskbook
 **/

/// (Replace vinttaskbook with the name of your module)

    require_once("../../config.php");
    require_once("lib.php");

    $id       = optional_param('id', 0, PARAM_INT); // Course Module ID, or
  	$cid      = optional_param('cid', 0, PARAM_INT);  // vinttaskbook Category ID
  	$tid      = optional_param('tid', 0, PARAM_INT);  // vinttaskbook Task ID
    $edit     = optional_param('edit', -1, PARAM_BOOL);     // Edit mode

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

    if ($allowedit) {
        if ($edit != -1) {
            $USER->editing = $edit;
        } else {
            if (isset($USER->editing)) {
                $edit = $USER->editing;
            } else {
                $edit = 0;
            }
        }
    } else {
        $edit = 0;
    }

    
    add_to_log($course->id, "vinttaskbook", "view", "view.php?id=$cm->id", "$vinttaskbook->id");

/// Print the page header

    if ($course->category) {
        $navigation = "<a href=\"../../course/view.php?id=$course->id\">$course->shortname</a> ->";
    } else {
        $navigation = '';
    }

    $strvinttaskbooks = get_string("modulenameplural", "vinttaskbook");
    $strvinttaskbook  = get_string("modulename", "vinttaskbook");

    print_header_simple(format_string($vinttaskbook->name), "",
                 "<a href=\"index.php?id=$course->id\">$strvinttaskbooks</a> ->
                  ".format_string($vinttaskbook->name,true), "",
                  '
									<link rel="stylesheet" type="text/css" href="style.css"/>
									<link rel="stylesheet" type="text/css" href="highlight.css"/>
									<script type="text/javascript" src="highlight.js"></script>
									', 
									true, vinttaskbook_edit_button($id, $course->id, $vinttaskbook->id, $cid, $tid), "");

/// Print the main part of the page
	$vinttaskcategories = get_records("vinttaskbook_categories", "vinttaskbook", $vinttaskbook->id);
	$vinttasktasks = get_records("vinttaskbook_tasks", "vinttaskcategories", $cid, "number");
	$vinttasktask = get_record("vinttaskbook_tasks", "id", $tid);
?>
<script type="text/javascript">
		initHighlightingOnLoad();
		function showform(){
			if (document.getElementById("tasksubmit").style.visibility == "hidden") {
				document.getElementById("tasksubmit").style.display = "block";
				document.getElementById("tasksubmit").style.visibility = "visible";
				
			} else if (document.getElementById("tasksubmit").style.visibility == "visible") {
				document.getElementById("tasksubmit").style.display = "none";
				document.getElementById("tasksubmit").style.visibility = "hidden";
			}
		}
</script>

<table width="100%">
	<tr>
		<td><?php echo get_string("categories", "vinttaskbook"); ?></td>
		<td><?php if ($vinttasktasks) {echo get_string("tasks", "vinttaskbook");} ?></td>
	</tr>
	<tr>
		<td valign="top" width="30%"><ul>
			<?php foreach ($vinttaskcategories as $cat) {
        if ($cat->id == $cid) {
          echo "<li><a href=\"view.php?id=$id&amp;cid=$cat->id\"><span class=\"selectedcat\">$cat->name</span></a>";
        }
        else {
          echo "<li><a href=\"view.php?id=$id&amp;cid=$cat->id\">$cat->name</a>";
        }
        
        if ($edit) {
          echo " <a title=\"" . get_string('edit') . "\" href=\"edit.php?id=$id&amp;cid=$cat->id&amp;type=category&amp;action=edit\"><img src=\"pix/edit.png\" height=\"11\" class=\"iconsmall\" alt=\"" . get_string('edit') . "\" /></a>";
          echo " <a title=\"" . get_string('delete') . "\" href=\"edit.php?id=$id&amp;cid=$cat->id&amp;type=category&amp;action=delete\"><img src=\"pix/del.png\" height=\"11\" class=\"iconsmall\" alt=\"" . get_string('delete') . "\" /></a>";
        }
        echo "</li>";
       }?>
			
		</ul>
    <?php 
      if ($edit) {
          echo " <a title=\"" . get_string('add') . "\" href=\"edit.php?id=$id&amp;type=category&amp;action=add\"><img src=\"pix/add.png\" height=\"11\" class=\"iconsmall\" alt=\"" . get_string('add') . "\" /></a>";
      }
    ?>
    </td>
		<td valign="top" width="70%"><ul>
			<?php foreach ($vinttasktasks as $task) {
        if ($task->id == $tid) {
          echo "<li><a href=\"view.php?id=$id&amp;cid=$cid&amp;tid=$task->id\"><span class=\"selectedtask\">$task->number. $task->name</span></a>";
        }
        else {
          echo "<li><a href=\"view.php?id=$id&amp;cid=$cid&amp;tid=$task->id\">$task->number. $task->name</a>";
        }
        
        if ($edit) {
          echo " <a title=\"" . get_string('edit') . "\" href=\"edit.php?id=$id&amp;cid=$cid&amp;tid=$task->id&amp;type=task&amp;action=edit\"><img src=\"pix/edit.png\" height=\"11\" class=\"iconsmall\" alt=\"" . get_string('edit') . "\" /></a>";
          echo " <a title=\"" . get_string('delete') . "\" href=\"edit.php?id=$id&amp;cid=$cid&amp;tid=$task->id&amp;type=task&amp;action=delete\"><img src=\"pix/del.png\" height=\"11\" class=\"iconsmall\" alt=\"" . get_string('delete') . "\" /></a>";
          echo " <a title=\"" . get_string('tests') . "\" href=\"edit.php?id=$id&amp;cid=$cid&amp;tid=$task->id&amp;type=test&amp;action=view\"><img src=\"pix/test.gif\" height=\"11\" class=\"iconsmall\" alt=\"" . get_string('tests') . "\" /></a>";
        }
        if ($allowedit){
          echo " <a title=\"" . get_string('solutions') . "\" href=\"edit.php?id=$id&amp;cid=$cid&amp;tid=$task->id&amp;type=solution&amp;action=view\"><img src=\"pix/solutions.png\" height=\"11\" class=\"iconsmall\" alt=\"" . get_string('solutions') . "\" /></a>";
        }
        echo "<br/>";
        if ($task->id == $tid) {
          echo task_table($vinttasktask, $edit);
						if ($cid && $tid) :?>
							<input type="button" onclick="return showform();" value="<?php echo get_string("solve", "vinttaskbook");?>"/>
							<div id="tasksubmit" style="background-color:#c7c7k5;border:medium solid #98AAB9; visibility:hidden; display:none;" width="100%">
								<div style="text-align:right;"><a href="javascript:showform();" style="text-decoration:none; color:#ff2244;">x</a></div>
						    <?php require_once("edit_form.php");
						      $mform = new mod_vinttaskbook_submit_task_form("tasksubmit.php");
						      $mform->set_data(array('id'=>$id, 'cid'=>$cid, 'tid'=>$tid, 'vinttaskbook'=>$vinttaskbook->id));
						      $mform->display();
						    ?>
						    
							</div>
						<?php endif;
        }
        echo "</li>";
				
       }?>
		</ul>
    <?php 
      if ($edit) {
          echo " <a title=\"" . get_string('add') . "\" href=\"edit.php?id=$id&amp;cid=$cid&amp;type=task&amp;action=add\"><img src=\"pix/add.png\" height=\"11\" class=\"iconsmall\" alt=\"" . get_string('add') . "\" /></a>";
      }
    ?>
		<?php if (!$vinttasktasks) :?>
			<div style="width:100%; height:100%; text-align:center;"><img src="pix/splash2.jpg" width="450px"></div>
		<?php endif;?>
    </td>
	</tr>
</table>


<?php
//print_side_block_start();
//print_single_button("123", array('name'=>'mybaton', 'value'=>'myvalue'), 'Go');
//print_side_block_end();

echo "<a title=\"" . get_string("gotolabs", "vinttaskbook") . "\"href=\"http:/mod/labs/view.php?id=65\">" . get_string("gotolabs", "vinttaskbook") . "</a>";

/// Finish the page
    print_footer($course);

?>
