<?php // $Id: category.php,v 1.12 2006/10/17 21:45:19 tjhunt Exp $
/**
 * Allows a teacher to create, edit and delete categories
 *
 * @version $Id: category.php,v 1.12 2006/10/17 21:45:19 tjhunt Exp $
 * @author Martin Dougiamas and many others.
 *         {@link http://moodle.org}
 * @license http://www.gnu.org/copyleft/gpl.html GNU Public License
 * @package question
 */

    require_once("../config.php");
    require_once("editlib.php");
    require_once("category_class.php");

    // get values from form
    $param = new stdClass();
    $id = required_param('id',PARAM_INT);   // course id
    $param->moveup = optional_param('moveup',0,PARAM_INT);
    $param->movedown = optional_param('movedown',0,PARAM_INT);
    $param->hide = optional_param('hide',0,PARAM_INT);
    $param->delete = optional_param('delete',0,PARAM_INT);
    $param->confirm = optional_param('confirm',0,PARAM_INT);
    $param->cancel = optional_param('cancel','',PARAM_ALPHA);
    $param->move = optional_param('move',0,PARAM_INT);
    $param->moveto = optional_param('moveto',0,PARAM_INT);
    $param->publish = optional_param('publish',0,PARAM_INT);
    $param->addcategory = optional_param('addcategory','',PARAM_NOTAGS);
    $param->edit = optional_param('edit',0,PARAM_INT);
    $param->updateid = optional_param('updateid',0,PARAM_INT);
    $param->page = optional_param('page',1,PARAM_INT);

    if (! $course = get_record("course", "id", $id)) {
        error("Course ID is incorrect");
    }
    
    $context = get_context_instance(CONTEXT_COURSE, $id);
    
    require_login($course->id, false);
    require_capability('moodle/question:managecategory', $context);

    $qcobject = new question_category_object();
    $qcobject->set_course($course);

    // Page header
    // TODO: generalise this to any activity
    if (isset($SESSION->modform->instance) and $quiz = get_record('quiz', 'id', $SESSION->modform->instance)) {
        $strupdatemodule = has_capability('moodle/course:manageactivities', get_context_instance(CONTEXT_COURSE, $course->id))
            ? update_module_button($SESSION->modform->cmid, $course->id, get_string('modulename', 'quiz'))
            : "";
        print_header_simple(get_string('editcategories', 'quiz'), '',
                 "<a href=\"$CFG->wwwroot/mod/quiz/index.php?id=$course->id\">".get_string('modulenameplural', 'quiz').'</a>'.
                 " -> <a href=\"$CFG->wwwroot/mod/quiz/view.php?q=$quiz->id\">".format_string($quiz->name).'</a>'.
                 ' -> '.get_string('editcategories', 'quiz'),
                 "", "", true, $strupdatemodule);
        $currenttab = 'edit';
        $mode = 'categories';
        include($CFG->dirroot.'/mod/quiz/tabs.php');
    } else {
        print_header_simple(get_string('editcategories', 'quiz'), '', get_string('editcategories', 'quiz'));

        // print tabs
        $currenttab = 'categories';
        include('tabs.php');
    }

    // Process actions.
    if (isset($_REQUEST['sesskey']) and confirm_sesskey()) { // sesskey must be ok
        if (!empty($param->delete) and empty($param->cancel)) {
            if (!empty($param->confirm)) {
                /// 'confirm' is the category to move existing questions to
                $qcobject->delete_category($param->delete, $param->confirm);
            } else {
                $qcobject->delete_category($param->delete);
            }
        } else if (!empty($param->moveup)) {
            $qcobject->move_category_up_down('up', $param->moveup);
        } else if (!empty($param->movedown)) {
            $qcobject->move_category_up_down('down', $param->movedown);
        } else if (!empty($param->hide)) {
            $qcobject->publish_category(false, $param->hide);
        } else if (!empty($param->move)) {
            $qcobject->move_category($param->move, $param->moveto);
        } else if (!empty($param->publish)) {
            $qcobject->publish_category(true, $param->publish);
        } else if (!empty($param->addcategory)) {
            $param->newparent   = required_param('newparent',PARAM_INT);
            $param->newcategory = required_param('newcategory',PARAM_NOTAGS);
            $param->newinfo     = required_param('newinfo',PARAM_NOTAGS);
            $param->newpublish  = required_param('newpublish',PARAM_INT);
            $qcobject->add_category($param->newparent, $param->newcategory, $param->newinfo,
                $param->newpublish, $course->id);
        } else if (!empty($param->edit)) {
            $qcobject->edit_single_category($param->edit, $param->page);
        } else if (!empty($param->updateid)) {
            $param->updateparent  = required_param('updateparent',PARAM_INT);
            $param->updatename    = required_param('updatename',PARAM_NOTAGS);
            $param->updateinfo    = required_param('updateinfo',PARAM_NOTAGS);
            $param->updatepublish = required_param('updatepublish',PARAM_INT);
            $qcobject->update_category($param->updateid, $param->updateparent, $param->updatename,
                $param->updateinfo, $param->updatepublish, $course->id);
        }
    }

    // display the user interface
    $qcobject->display_user_interface($param->page);

    print_footer($course);
?>
