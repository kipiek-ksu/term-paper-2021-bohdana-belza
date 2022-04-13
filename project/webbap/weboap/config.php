<?php              /// Moodle Configuration File 

unset($CFG);

$CFG->dbtype    = 'mysql';
$CFG->dbhost    = 'localhost';
$CFG->dbname    = 'weboap';
$CFG->dbuser    = 'root';
$CFG->dbpass    = 'henpt,tcn';
$CFG->dbpersist =  false;
$CFG->prefix    = 'mdl_';

$CFG->wwwroot   = 'http://diso:8082';
$CFG->dirroot   = 'E:\\weboap';
$CFG->dataroot  = 'E:\\weboapdata';
$CFG->admin     = 'admin';

$CFG->directorypermissions = 00777;  // try 02777 on a server in Safe Mode
$CFG->compilersroot = "$CFG->dirroot\\compilers";
$CFG->compilersdataroot = "$CFG->dataroot\\compilersdata";

$CFG->compiler_pascal = "$CFG->compilersroot\\pascal\\fpc2.2.0\\bin\\i386-win32\\fpc.exe";
$CFG->compiler_c = "$CFG->compilersroot\\c\\mingw\\bin\\gcc.exe";

$CFG->currentcompiler = $CFG->compiler_c;



require_once("$CFG->dirroot/lib/setup.php");
// MAKE SURE WHEN YOU EDIT THIS FILE THAT THERE ARE NO SPACES, BLANK LINES,
// RETURNS, OR ANYTHING ELSE AFTER THE TWO CHARACTERS ON THE NEXT LINE.
?>