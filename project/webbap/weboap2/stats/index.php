



<?PHP

// STATISTICS PLUGGIN (STATS)
///////////////////////////////////////////////////////////////////////////
//                                                                       //                                          //
//                                                                       //
// developed by Steven Ball and Mari Cruz Garcia.                        //
//If you use it, please say a little pray for our souls.                  //                                           //
// This program is free software; you can redistribute it and/or modify  //
// it under the terms of the GNU General Public License as published by  //
// the Free Software Foundation; either version 2 of the License, or     //
// (at your option) any later version.                                   //
//                                                                       //
// This program is distributed in the hope that it will be useful,       //
// but WITHOUT ANY WARRANTY; without even the implied warranty of        //
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the         //
// GNU General Public License for more details:                          //
//                                                                       //
//          http://www.gnu.org/copyleft/gpl.html                         //
//                                                                       //
///////////////////////////////////////////////////////////////////////////


require_once("../config.php");
require_login();
//ROLES:
//1 Name: Administrator
//2 Name: Course creator
//3 Name: Teacher
//4 Name: Non-editing teacher
//5 Name: Student
//6 Name: Guest
//7 Name: Authenticated user

global $USER;
$adminContext = get_context_instance(CONTEXT_SYSTEM, SITEID);
if(!user_has_role_assignment($USER->id,1,$adminContext->id)){
	redirect("content/block.php");
	exit();
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Moodle Statistics</title>
<link rel="stylesheet" type="text/css" href="styles/default.css" />
</head>

<body>
<p><div style="text-align: center;"><img src="images/moodle.png" alt="logo" /></div><p>
<div id="search">
</p><span class="title">Moodle Statistics: </span></p>

<?php

/////////////////////// TOTAL NUMBER OF USERS
//Enable/Disable this part  to calculate the total number of students and academic staff.
//It is assumed that students are authenticated in Moodle by a LDAP server while staff members are authenticated
//by a IMAP server. Change that field with the authentication settings of your organization.

$student = count_records('user','deleted',0, 'auth', ldap);
$staff= count_records('user','deleted',0, 'auth', imap);
echo '<p>There are currently <span class="bold">'.$student.'</span> students enrolled </p>';
echo '<p>There are currently <span class="bold">'.$staff.'</span> academic staff</p>';

//////////////////// TOTAL NUMBER OF COURSES: IT ONLY COUNTS VISIBLE COURSES WITH STUDENTS ENROLLED
$courses = get_courses('all','c.fullname ASC','c.id,c.fullname,c.visible');
$sOptions = "";
$iCount = 0;
foreach($courses as $c){
	if( $c->id>1 && $c->visible==1 ){

	$context = get_context_instance(CONTEXT_COURSE, $c->id);
	$aoStudentDetailsResult = get_role_users(5, $context);
if (!empty ($aoStudentDetailsResult)) {

$sOptions.='<option value="'.$c->id.'">'.$c->fullname.'</option>';
		$iCount++;
}

	}
}

echo '<p>There are <span class="bold">'.$iCount.'</span> course(s) available</p>';
echo '<form action="content/result_courses.php" method="get">';
echo '<p><select name="courseid" id="courseid">';
echo $sOptions;
echo '</select>';
echo '<p></p><input type="submit" value="Get Statistics" /></p>';
echo '</form>';

//CATEGORIES
$categories = get_categories('','name ASC');
$sOptions = "";
$iCount = 0;
foreach($categories as $c){
	if($c->id>1){


		$sOptions.='<option value="'.$c->id.'">'.$c->name.'</option>';
		$iCount++;



	}
}

echo '<p>There are <span class="bold">'.$iCount.'</span> categories(s) available</p>';
echo '<form action="content/result_categories.php" method="get">';
echo '<p><select name="catid" id="catid">';
echo $sOptions;
echo '</select>';
echo '<p></p><input type="submit" value="Get Statistics" /></p>';
echo '</form>';
?>
</div>
</body>
</html>
