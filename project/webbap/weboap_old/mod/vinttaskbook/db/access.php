<?php
//
// Capability definitions for the assignment module.
//
// The capabilities are loaded into the database table when the module is
// installed or updated. Whenever the capability definitions are updated,
// the module version number should be bumped up.
//
// The system has four possible values for a capability:
// CAP_ALLOW, CAP_PREVENT, CAP_PROHIBIT, and inherit (not set).
//
//
// CAPABILITY NAMING CONVENTION
//
// It is important that capability names are unique. The naming convention
// for capabilities that are specific to modules and blocks is as follows:
//   [mod/block]/<component_name>:<capabilityname>
//
// component_name should be the same as the directory name of the mod or block.
//
// Core moodle capabilities are defined thus:
//    moodle/<capabilityclass>:<capabilityname>
//
// Examples: mod/forum:viewpost
//           block/recent_activity:view
//           moodle/site:deleteuser
//
// The variable name for the capability definitions array follows the format
//   $<componenttype>_<component_name>_capabilities
//
// For the core capabilities, the variable is $moodle_capabilities.


$mod_vinttaskbook_capabilities = array(
    
    'mod/vinttaskbook:addcategory' => array(
      'captype' => 'write',
      'contextlevel' => CONTEXT_MODULE,
      'legacy' => array(
        'teacher' => CAP_ALLOW,
        'editingteacher' => CAP_ALLOW,
        'admin' => CAP_ALLOW
      )
    ),
    
    'mod/vinttaskbook:editcategory' => array(
      'captype' => 'write',
      'contextlevel' => CONTEXT_MODULE,
      'legacy' => array(
        'teacher' => CAP_ALLOW,
        'editingteacher' => CAP_ALLOW,
        'admin' => CAP_ALLOW
      )
    ),
    
    'mod/vinttaskbook:deletecategory' => array(
      'captype' => 'write',
      'contextlevel' => CONTEXT_MODULE,
      'legacy' => array(
        'teacher' => CAP_ALLOW,
        'editingteacher' => CAP_ALLOW,
        'admin' => CAP_ALLOW
      )
    ),
    
    'mod/vinttaskbook:addtask' => array(
      'captype' => 'write',
      'contextlevel' => CONTEXT_MODULE,
      'legacy' => array(
        'teacher' => CAP_ALLOW,
        'editingteacher' => CAP_ALLOW,
        'admin' => CAP_ALLOW
      )
    ),
    
    'mod/vinttaskbook:edittask' => array(
      'captype' => 'write',
      'contextlevel' => CONTEXT_MODULE,
      'legacy' => array(
        'teacher' => CAP_ALLOW,
        'editingteacher' => CAP_ALLOW,
        'admin' => CAP_ALLOW
      )
    ),
    
    'mod/vinttaskbook:deletetask' => array(
      'captype' => 'write',
      'contextlevel' => CONTEXT_MODULE,
      'legacy' => array(
        'teacher' => CAP_ALLOW,
        'editingteacher' => CAP_ALLOW,
        'admin' => CAP_ALLOW
      )
    ),
    
    'mod/vinttaskbook:viewtest' => array(
      'captype' => 'read',
      'contextlevel' => CONTEXT_MODULE,
      'legacy' => array(
        'teacher' => CAP_ALLOW,
        'editingteacher' => CAP_ALLOW,
        'admin' => CAP_ALLOW
      )
    ),
    
    'mod/vinttaskbook:addtest' => array(
      'captype' => 'write',
      'contextlevel' => CONTEXT_MODULE,
      'legacy' => array(
        'teacher' => CAP_ALLOW,
        'editingteacher' => CAP_ALLOW,
        'admin' => CAP_ALLOW
      )
    ),
    
    'mod/vinttaskbook:edittest' => array(
      'captype' => 'write',
      'contextlevel' => CONTEXT_MODULE,
      'legacy' => array(
        'teacher' => CAP_ALLOW,
        'editingteacher' => CAP_ALLOW,
        'admin' => CAP_ALLOW
      )
    ),
    
    'mod/vinttaskbook:deletetest' => array(
      'captype' => 'write',
      'contextlevel' => CONTEXT_MODULE,
      'legacy' => array(
        'teacher' => CAP_ALLOW,
        'editingteacher' => CAP_ALLOW,
        'admin' => CAP_ALLOW
      )
    ),
    
    'mod/vinttaskbook:viewsolution' => array(
      'captype' => 'read',
      'contextlevel' => CONTEXT_MODULE,
      'legacy' => array(
        'teacher' => CAP_ALLOW,
        'editingteacher' => CAP_ALLOW,
        'admin' => CAP_ALLOW
      )
    ),
    
    'mod/vinttaskbook:deletesolution' => array(
      'captype' => 'write',
      'contextlevel' => CONTEXT_MODULE,
      'legacy' => array(
        'teacher' => CAP_ALLOW,
        'editingteacher' => CAP_ALLOW,
        'admin' => CAP_ALLOW
      )
    ),
    
    'mod/vinttaskbook:marksolution' => array(
      'captype' => 'write',
      'contextlevel' => CONTEXT_MODULE,
      'legacy' => array(
        'teacher' => CAP_ALLOW,
        'editingteacher' => CAP_ALLOW,
        'admin' => CAP_ALLOW
      )
    ),
    
    'mod/vinttaskbook:deletetest' => array(
      'captype' => 'write',
      'contextlevel' => CONTEXT_MODULE,
      'legacy' => array(
        'teacher' => CAP_ALLOW,
        'editingteacher' => CAP_ALLOW,
        'admin' => CAP_ALLOW
      )
    ),
    
    'mod/vinttaskbook:exectests' => array(
      'captype' => 'write',
      'contextlevel' => CONTEXT_MODULE,
      'legacy' => array(
        'teacher' => CAP_ALLOW,
        'editingteacher' => CAP_ALLOW,
        'admin' => CAP_ALLOW
      )
    ),
    
    'mod/vinttaskbook:submittask' => array(
      'captype' => 'read',
      'contextlevel' => CONTEXT_MODULE,
      'legacy' => array(
        'student' => CAP_ALLOW,
        'teacher' => CAP_ALLOW,
        'editingteacher' => CAP_ALLOW,
        'admin' => CAP_ALLOW
      )
    ),
    

);


?>
