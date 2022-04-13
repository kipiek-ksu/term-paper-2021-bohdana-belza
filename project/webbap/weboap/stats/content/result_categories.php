<?PHP
// IT DISPLAYS THE NUMBER OF STUDENTS AND ACADEMIC STAFF (EDITING TEACHERS) FOR A SELECTED MAIN CATEGORY.
//EVEN IF STUDENTS ARE ENROLLED IN MORE THAN 1 COURSE, THEY ARE ONLY COUNTED ONCE. THE SAME FOR EDITING TEACHERS
// IT ALSO DISPLAYS THE TOTAL NUMBER OF STUDENTS ENROLLED IN EACH ONE OF THE COURSES THAT BELONG TO THAT MAIN CATEGORY

require_once("../../config.php");
require_login();

global $USER;
$adminContext = get_context_instance(CONTEXT_SYSTEM, SITEID);
if(!user_has_role_assignment($USER->id,1,$adminContext->id)){
	redirect("block.php");
	exit();
}




#CHECK URL ID
$iCourseID = optional_param('courseid',0,PARAM_INT);
$iCatID = optional_param('catid',-1,PARAM_INT);

if($iCourseID<1 && $iCatID<1){
	redirect("../index.php");
	exit();
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Moodle Statistics</title>
<body>

<link rel="stylesheet" type="text/css" href="../styles/default.css" media="screen" />
<link rel="stylesheet" type="text/css" href="../styles/print.css" media="print" />
</head>

<body>
<p> <div style="text-align: center;"><img src="../images/moodle.png" alt="logo" /></div> </p>
<div id="search">
</p><span class="title">Moodle Statistics</span></p>
</div>
<a href="javascript:print();">Print Report</a><span class="noprint"> | </span><a href="../index.php">View Statistics For Another Course</a>
<hr />

<?php
//FUNCTIONS/////////////////////////////////////////////////////////////
function lastAccess($timestamp)
{
	if(date("d F Y - G:i",$timestamp)>date("d F Y - G:i",0)){
		$diff = time()-$timestamp;
		$days = $diff/(60 * 60 * 24);
		if($days>1){
			$days = ceil($days);
		}else{
			$days = 0;
		}
	}else{
		$days = -1;
	}

	return $days;
}



//INITIALIZE COUNTERS

$num_courses[$iCatID]=0 ;
$num_students[$iCatID]=0 ;
$num_teachers[$iCatID]=0;



	$sSQL = 'SELECT id, visible FROM mdl_course WHERE category = '.$iCatID;
	$query_students='SELECT DISTINCT u.id
FROM mdl_user u, mdl_role_Assignments a, mdl_role r, mdl_context c, mdl_course co, mdl_course_categories ca
WHERE (a.roleid =5 AND r.name = "Student" AND a.userid=u.id)AND (a.contextid = c.id AND c.instanceid = co.id)
AND (co.category = ca.id AND co.visible =1)AND (ca.id ='.$iCatID;

$query_teachers='SELECT DISTINCT  u.id
FROM mdl_user u, mdl_role_Assignments a, mdl_role r, mdl_context c, mdl_course co, mdl_course_categories ca
WHERE (a.roleid =3 AND r.name = "Teacher" AND a.userid=u.id)AND (a.contextid = c.id AND c.instanceid = co.id)
AND (co.category = ca.id AND co.visible =1)AND (ca.id ='.$iCatID;


//GET ALL THE SUBNESTED SUBCATEGORIES FOR THE CHOSEN MAIN CATEGORY WE HAVE PASSED AS A PARAMETER

	$aCategories = get_all_subcategories($iCatID);



	if(count($aCategories)>0){


	foreach($aCategories as $cat){

			$sSQL .= ' OR category = '.$cat;
		$query_students .= ' OR ca.id = '.$cat;
		$query_teachers .= ' OR ca.id = '.$cat;
	}

  }


	$query_students .= ' )';
	$query_teachers .= ' )';

	$courses = get_records_sql($sSQL);
	$students= get_records_sql($query_students);
	$teachers= get_records_sql($query_teachers);

$num_students[$iCatID]=count($students);
$num_teachers[$iCatID]=count($teachers);



foreach($courses as $c){

	$iCourseID = $c->id;



#MAIN QUERIES
$context = get_context_instance(CONTEXT_COURSE, $iCourseID);
$oCourseResult = get_record_select('course','id='.$iCourseID,'fullname,timecreated,timemodified');
$aoStudentDetailsResult = get_role_users(5, $context);





//LAST ACCESS FUNCTIONALITY
$rsLastAccessDetailsResult = get_records_sql("SELECT mdl_user.id,mdl_user_lastaccess.timeaccess FROM mdl_user LEFT JOIN mdl_user_lastaccess ON mdl_user.id=mdl_user_lastaccess.userid WHERE mdl_user_lastaccess.courseid = ".$iCourseID.";");
$aLastAccess = array();

foreach($rsLastAccessDetailsResult as $record){
	$aLastAccess[$record->id]=$record->timeaccess;
   }




$iStudentNever = 0;
$sStudentOutputString = '';
$sStudentOutputString .='<p>';
$sStudentOutputString .= '<span class="title">Student Details: </span><br />';
if(empty($aoStudentDetailsResult)){
	$sStudentOutputString .= "None Enrolled";
}

else{



	$sStudentOutputString .= '<table>';
	$sStudentOutputString .= '<tr><th scope="col">Full Name:</th><th scope="col">Username:</th><th scope="col">Last Accessed:</th></tr>';
	$iLoop = 0;
	foreach($aoStudentDetailsResult as $record){
		if($iLoop%2<1){
			$sHighlight = "odd";
		}else{
			$sHighlight = "even";
		}
	$sStudentOutputString .= '<tr><td class="'.$sHighlight.'">'.$record->lastname.', '.$record->firstname.'</td><td class="'.$sHighlight.'">'.$record->username.'</td><td class="'.$sHighlight.'">';
	if(empty($aLastAccess[$record->id])){
		$sStudentOutputString .= 'Never';
		$iStudentNever++;
	}else{
		if(lastAccess($aLastAccess[$record->id])>0){
			$sStudentOutputString .=  lastAccess($aLastAccess[$record->id]).' Day(s) ago';
			if(lastAccess($aLastAccess[$record->id])<11){

			}
		}else{
			$sStudentOutputString .=  'Today';

		}
	}
	$sStudentOutputString .= '</td></tr>';
		$iLoop++;
	}
	$sStudentOutputString .= '</table>';
}
$sStudentOutputString .= '</p>';



//IT ONLY DISPLAYS VISIBLE COURSES AND WITH STUDENTS ENROLLED

if(!empty($aoStudentDetailsResult) && $c->visible==1 ){

$num_courses[$iCatID]+=1 ;

echo '<p>';
	echo '<span class="title">General Details: </span><br />';
	echo '<table>';
	echo '<tr><td class="dark"><span class="bold">Report Generated:</span></td><td class="odd">'.date("d F Y - G:i").'</td></tr>';
	echo '<tr><td class="dark"><span class="bold">Course:</span></td><td class="odd">'.$oCourseResult->fullname.'</td></tr>';
	echo '<tr><td class="dark"><span class="bold">Course Created:</span></td><td class="odd">'.date("d F Y - G:i",$oCourseResult->timecreated).'</td></tr>';
	echo '</table>';
	echo '</p>';

echo '<hr />';

//USAGE NUMBERS
echo '<p>';
echo '<span class="title">Usage Overview: </span><br />';
echo '<table>';
echo '<tr><td><img src="../images/users.gif" alt="icon" /></td><td class="even">Number of students enrolled: </td><td class="even"><span class="title">&nbsp;';
echo count($aoStudentDetailsResult);

echo '&nbsp;</span></td></tr>';

echo '<tr><td><img src="../images/never.gif" alt="icon" /></td><td class="even">Number of students who have never accessed the course: </td><td class="even"><span class="title">&nbsp;'.$iStudentNever.'&nbsp;</span></td></tr>';

echo '</table>';
echo '</p>';
echo '<hr />';
echo '<p>';





echo '<p>';



}


}

///IT DISPLAYS THE TOTALS FOR THE CHOSEN CATEGORY

if($iCatID>0){



$categories = get_categories('','name ASC');
foreach($categories as $c){
	if($c->id==$iCatID){
	echo '<tr><td><img src="../images/news.gif" alt="icon" /></td><span class="title">Information about </td><span class="title">&nbsp;'.$c->name.'&nbsp;</span></tr><br>';

	}
}


echo '<tr><td><img src="../images/users.gif" alt="icon" /></td><span class="title">Total number of students enrolled: </td><span class="title">&nbsp;'.$num_students[$iCatID].'&nbsp;</span></tr><br>';
echo '<tr><td><img src="../images/users.gif" alt="icon" /></td><span class="title">Total number of teachers enrolled: </td><span class="title">&nbsp;'.$num_teachers[$iCatID].'&nbsp;</span></tr><br>';
echo '<tr><td><img src="../images/assignment.gif" alt="icon" /></td><span class="title">Total number of courses: </td><span class="title">&nbsp;'.$num_courses[$iCatID].'&nbsp;</span></tr><br>';

echo '<div style="width:100%;border:1px solid #000000;background-color:#cccccc;text-align:center;">-o0o-</div>';
}

?>

<hr />
<a href="javascript:print();">Print Report</a><span class="noprint"> | </span><a href="../index.php">View Statistics For Another Course</a>
</body>
</html>
