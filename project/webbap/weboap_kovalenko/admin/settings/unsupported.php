<?php // $Id: unsupported.php,v 1.1 2006/09/25 20:22:56 skodak Exp $

// This file defines settingpages and externalpages in the "unsupported" hidden category, use wisely!

$ADMIN->add('unsupported', new admin_externalpage('purgemoodledata', 'Purge moodledata', $CFG->wwwroot.'/'.$CFG->admin.'/delete.php'));
$ADMIN->add('unsupported', new admin_externalpage('healthcenter', get_string('healthcenter'), $CFG->wwwroot.'/'.$CFG->admin.'/health.php'));
$ADMIN->add('unsupported', new admin_externalpage('toinodb', 'Convert to InnoDB', $CFG->wwwroot.'/'.$CFG->admin.'/innodb.php'));
$ADMIN->add('unsupported', new admin_externalpage('replace', 'Search and replace', $CFG->wwwroot.'/'.$CFG->admin.'/replace.php'));


?>
