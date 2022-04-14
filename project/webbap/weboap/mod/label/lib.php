<?php  // $Id: lib.php,v 1.12 2007/01/02 09:33:07 skodak Exp $

/// Library of functions and constants for module label


define("LABEL_MAX_NAME_LENGTH", 50);

function label_add_instance($label) {
/// Given an object containing all the necessary data, 
/// (defined by the form in mod.html) this function 
/// will create a new instance and return the id number 
/// of the new instance.
    $textlib = textlib_get_instance();

    $label->name = addslashes(strip_tags(format_string(stripslashes($label->content),true)));
    if ($textlib->strlen($label->name) > LABEL_MAX_NAME_LENGTH) {
        $label->name = $textlib->substr($label->name, 0, LABEL_MAX_NAME_LENGTH)."...";
    }
    $label->timemodified = time();

    return insert_record("label", $label);
}


function label_update_instance($label) {
/// Given an object containing all the necessary data, 
/// (defined by the form in mod.html) this function 
/// will update an existing instance with new data.
    $textlib = textlib_get_instance();

    $label->name = addslashes(strip_tags(format_string(stripslashes($label->content),true)));
    if ($textlib->strlen($label->name) > LABEL_MAX_NAME_LENGTH) {
        $label->name = $textlib->substr($label->name, 0, LABEL_MAX_NAME_LENGTH)."...";
    }
    $label->timemodified = time();
    $label->id = $label->instance;

    return update_record("label", $label);
}


function label_delete_instance($id) {
/// Given an ID of an instance of this module, 
/// this function will permanently delete the instance 
/// and any data that depends on it.  

    if (! $label = get_record("label", "id", "$id")) {
        return false;
    }

    $result = true;

    if (! delete_records("label", "id", "$label->id")) {
        $result = false;
    }

    return $result;
}

function label_get_participants($labelid) {
//Returns the users with data in one resource
//(NONE, but must exist on EVERY mod !!)

    return false;
}

function label_get_coursemodule_info($coursemodule) {
/// Given a course_module object, this function returns any 
/// "extra" information that may be needed when printing
/// this activity in a course listing.
///
/// See get_array_of_activities() in course/lib.php

   $info = NULL;

   if ($label = get_record("label", "id", $coursemodule->instance)) {
       $info->extra = urlencode($label->content);
   }

   return $info;
}

function label_get_view_actions() {
    return array();
}

function label_get_post_actions() {
    return array();
}

function label_get_types() {
    $types = array();

    $type = new object();
    $type->modclass = MOD_CLASS_RESOURCE;
    $type->type = "label";
    $type->typestr = get_string('resourcetypelabel', 'resource');
    $types[] = $type;

    return $types;
}
?>
