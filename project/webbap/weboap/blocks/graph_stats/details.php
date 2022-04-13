<?php
require_once("../../config.php");
global $CFG;
print_header();
print_simple_box_start('center', '96%');
	echo '<h2><center>'.get_string('connectedtoday','block_graph_stats').'</center></h2><br />';
	echo "<ul>";
	$sql = 'SELECT DISTINCT l.userid, u.firstname, u.lastname
			FROM '.$CFG->prefix.'log l, '.$CFG->prefix.'user u 
			WHERE l.userid = u.id
			AND time > '.mktime(0, 0, 0, date("m") , date("d"), date("Y")).' 
			AND time < '.mktime(23, 59, 59, date("m") , date("d"), date("Y")).' 
			AND action = "login"
			ORDER BY u.lastname, u.firstname ASC ';
	$connections = get_recordset_sql($sql);
	foreach ($connections as $connection) {
		echo '<li>'.$connection["lastname"].' '.$connection["firstname"].'</li>';
	}
	echo "</ul>";
print_simple_box_end();	
$CFG->docroot = '';   // We don't want a doc link here
print_footer('none');
?>