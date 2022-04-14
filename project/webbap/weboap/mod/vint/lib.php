<?php  // $Id: lib.php,v 1.4 2006/08/28 16:41:20 mark-nielsen Exp $
/**
 * Library of functions and constants for module vint
 *
 * @author 
 * @version $Id: lib.php,v 1.4 2006/08/28 16:41:20 mark-nielsen Exp $
 * @package vint
 **/

/// (replace vint with the name of your module and delete this line)


$vint_CONSTANT = 7;     /// for example

/**
 * Given an object containing all the necessary data, 
 * (defined by the form in mod.html) this function 
 * will create a new instance and return the id number 
 * of the new instance.
 *
 * @param object $instance An object from the form in mod.html
 * @return int The id of the newly inserted vint record
 **/
function vint_add_instance($vint) {
    
    $vint->timemodified = time();

    # May have to add extra stuff in here #

    return insert_record("vint", $vint);
}

/**
 * Given an object containing all the necessary data, 
 * (defined by the form in mod.html) this function 
 * will update an existing instance with new data.
 *
 * @param object $instance An object from the form in mod.html
 * @return boolean Success/Fail
 **/
function vint_update_instance($vint) {

    $vint->timemodified = time();
    $vint->id = $vint->instance;

    # May have to add extra stuff in here #

    return update_record("vint", $vint);
}

/**
 * Given an ID of an instance of this module, 
 * this function will permanently delete the instance 
 * and any data that depends on it. 
 *
 * @param int $id Id of the module instance
 * @return boolean Success/Failure
 **/
function vint_delete_instance($id) {

    if (! $vint = get_record("vint", "id", "$id")) {
        return false;
    }

    $result = true;

    # Delete any dependent records here #

    if (! delete_records("vint", "id", "$vint->id")) {
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
function vint_user_outline($course, $user, $mod, $vint) {
    return $return;
}

/**
 * Print a detailed representation of what a user has done with 
 * a given particular instance of this module, for user activity reports.
 *
 * @return boolean
 * @todo Finish documenting this function
 **/
function vint_user_complete($course, $user, $mod, $vint) {
    return true;
}

/**
 * Given a course and a time, this module should find recent activity 
 * that has occurred in vint activities and print it out. 
 * Return true if there was output, or false is there was none. 
 *
 * @uses $CFG
 * @return boolean
 * @todo Finish documenting this function
 **/
function vint_print_recent_activity($course, $isteacher, $timestart) {
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
function vint_cron () {
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
 * @param int $vintid ID of an instance of this module
 * @return mixed Null or object with an array of grades and with the maximum grade
 **/
/*function vint_grades($vintid) {
   return NULL;
}*/

/**
 * Must return an array of user records (all data) who are participants
 * for a given instance of vint. Must include every user involved
 * in the instance, independient of his role (student, teacher, admin...)
 * See other modules as example.
 *
 * @param int $vintid ID of an instance of this module
 * @return mixed boolean/array of students
 **/
function vint_get_participants($vintid) {
    return false;
}

/**
 * This function returns if a scale is being used by one vint
 * it it has support for grading and scales. Commented code should be
 * modified if necessary. See forum, glossary or journal modules
 * as reference.
 *
 * @param int $vintid ID of an instance of this module
 * @return mixed
 * @todo Finish documenting this function
 **/
function vint_scale_used ($vintid,$scaleid) {
    $return = false;

    //$rec = get_record("vint","id","$vintid","scale","-$scaleid");
    //
    //if (!empty($rec)  && !empty($scaleid)) {
    //    $return = true;
    //}
   
    return $return;
}

//////////////////////////////////////////////////////////////////////////////////////
/// Any other vint functions go here.  Each of them must have a name that 
/// starts with vint_


?>
