<?php

// THIS FILE IS DEPRECATED!  PLEASE DO NOT MAKE CHANGES TO IT!
//
// IT IS USED ONLY FOR UPGRADES FROM BEFORE MOODLE 1.7, ALL 
// LATER CHANGES SHOULD USE upgrade.php IN THIS DIRECTORY.
//
// This file is tailored to MySQL

function search_upgrade($oldversion=0) {

    global $CFG;
    
    $result = true;

    if ($oldversion < 2006062500 and $result) {
        $result = true; //Nothing to do
    }

    //////  DO NOT ADD NEW THINGS HERE!!  USE upgrade.php and the lib/ddllib.php functions.

    //Finally, return result
    return $result;
}
