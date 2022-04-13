<?php  // Moodle configuration file

unset($CFG);
global $CFG;
$CFG = new stdClass();

$CFG->dbtype    = 'mysqli';

$CFG->dbhost    = 'localhost';
$CFG->dbname    = 'dmath_database';
$CFG->dbuser    = 'root';
$CFG->dbpass    = 'henpt,tcn';
$CFG->prefix    = 'mdl_';
$CFG->dboptions = array (
  'dbpersist' => 0,
  'dbsocket' => 0,
);

$CFG->wwwroot   = 'http://diso:8087';
$CFG->dataroot  = '/dmath_data';
$CFG->dirroot   = 'E:\\dmath';
$CFG->admin     = 'admin';

$CFG->directorypermissions = 0777;

$CFG->passwordsaltmain = 'z6U2D75L2.`=1uH4qO#,Pm<ijO:9fx6';

require_once("$CFG->dirroot/lib/setup.php");

// There is no php closing tag in this file,
// it is intentional because it prevents trailing whitespace problems!
?>