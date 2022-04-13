<?PHP
// IT DISPLAYS THE TOTAL NUMBER OF RESOURCES , STUDENTS ENROLLED,
//EDITING/NON EDITING TEACHERS FOR THE COURSE SELECTED

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

</p><span class="title">Moodle Statistics</span></p>

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





	$courses = get_records_sql('SELECT id FROM mdl_course WHERE id='.$iCourseID);

foreach($courses as $c){

	$iCourseID = $c->id;



//MAIN QUERIES
$context = get_context_instance(CONTEXT_COURSE, $iCourseID);
$oCourseResult = get_record_select('course','id='.$iCourseID,'fullname,timecreated,timemodified');
$aoTeacherDetailsResult = get_role_users(3, $context);
$aoNonEditTeacherDetailsResult = get_role_users(4, $context);
$aoStudentDetailsResult = get_role_users(5, $context);


//ACTIVITY QUERIES
$iAssignmentCount = count_records_select('assignment','course='.$iCourseID);
$iChatCount = count_records_select('chat','course='.$iCourseID);
$iChoiceCount = count_records_select('choice','course='.$iCourseID);
$iForumCount = count_records_select('forum','course='.$iCourseID);
$iGlossaryCount = count_records_select('glossary','course='.$iCourseID);
$iHotPotCount = count_records_select('hotpot','course='.$iCourseID);
$iQuestionCount = count_records_select('questionnaire','course='.$iCourseID);
$iQuizCount = count_records_select('quiz','course='.$iCourseID);
$iWikiCount = count_records_select('wiki','course='.$iCourseID);


//LAST ACCESS FUNCTIONALITY
$rsLastAccessDetailsResult = get_records_sql("SELECT mdl_user.id,mdl_user_lastaccess.timeaccess FROM mdl_user LEFT JOIN mdl_user_lastaccess ON mdl_user.id=mdl_user_lastaccess.userid WHERE mdl_user_lastaccess.courseid = ".$iCourseID.";");
$aLastAccess = array();
foreach($rsLastAccessDetailsResult as $record){
	$aLastAccess[$record->id]=$record->timeaccess;
}

//STUDENT DETAILS - OUTPUT
$iStudentLast10Days = 0;
$iStudentNever = 0;
$sStudentOutputString = '';
$sStudentOutputString .='<p>';
$sStudentOutputString .= '<span class="title">Student Details: </span><br />';
if(empty($aoStudentDetailsResult)){
	$sStudentOutputString .= "None Enrolled";
}else{
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
				$iStudentLast10Days++;
			}
		}else{
			$sStudentOutputString .=  'Today';
			$iStudentLast10Days++;
		}
	}
	$sStudentOutputString .= '</td></tr>';
		$iLoop++;
	}
	$sStudentOutputString .= '</table>';
}
$sStudentOutputString .= '</p>';

//////////
//OUTPUT//
//////////
//COURSE DETAILS
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
if(empty($aoStudentDetailsResult)){
	echo '0';
}else{
	echo count($aoStudentDetailsResult);
}
echo '&nbsp;</span></td></tr>';

echo '<tr><td><img src="../images/accessed.gif" alt="icon" /></td><td class="odd">Number of students who accessed to course within the past 10 Days: </td><td class="odd"><span class="title">&nbsp;'.$iStudentLast10Days.'&nbsp;</span></td></tr>';
echo '<tr><td><img src="../images/never.gif" alt="icon" /></td><td class="even">Number of students who have never accessed the course: </td><td class="even"><span class="title">&nbsp;'.$iStudentNever.'&nbsp;</span></td></tr>';
echo '<tr><td><img src="../images/assignment.gif" alt="icon" /></td><td class="odd">Number of Assignment Activities Used:</td><td class="odd"><span class="title">&nbsp;'.$iAssignmentCount.'&nbsp;</span></td></tr>';
echo '<tr><td><img src="../images/chat.gif" alt="icon" /></td><td class="even">Number of Chat Activities Used:</td><td class="even"><span class="title">&nbsp;'.$iChatCount.'&nbsp;</span></td></tr>';
echo '<tr><td><img src="../images/choice.gif" alt="icon" /></td><td class="odd">Number of Choice Activities Used:</td><td class="odd"><span class="title">&nbsp;'.$iChoiceCount.'&nbsp;</span></td></tr>';
echo '<tr><td><img src="../images/forum.gif" alt="icon" /></td><td class="even">Number of Forum Activities Used:</td><td class="even"><span class="title">&nbsp;'.$iForumCount.'&nbsp;</span></td></tr>';
echo '<tr><td><img src="../images/glossary.gif" alt="icon" /></td><td class="odd">Number of Glossary Activities Used:</td><td class="odd"><span class="title">&nbsp;'.$iGlossaryCount.'&nbsp;</span></td></tr>';
echo '<tr><td><img src="../images/hotpot.gif" alt="icon" /></td><td class="even">Number of Hot Potatoes Activities Used:</td><td class="even"><span class="title">&nbsp;'.$iHotPotCount.'&nbsp;</span></td></tr>';
echo '<tr><td><img src="../images/questionnaire.gif" alt="icon" /></td><td class="odd">Number of Questionnaire Activities Used:</td><td class="odd"><span class="title">&nbsp;'.$iQuestionCount.'&nbsp;</span></td></tr>';
echo '<tr><td><img src="../images/quiz.gif" alt="icon" /></td><td class="even">Number of Quiz Activities Used:</td><td class="even"><span class="title">&nbsp;'.$iQuizCount.'&nbsp;</span></td></tr>';
echo '<tr><td><img src="../images/wiki.gif" alt="icon" /></td><td class="odd">Number of Wiki Activities Used:</td><td class="odd"><span class="title">&nbsp;'.$iWikiCount.'&nbsp;</span></td></tr>';
echo '</table>';
echo '</p>';


echo '<hr />';

//TEACHER DETAILS
echo '<p>';
echo '<span class="title">Teacher Details: </span><br />';
if(empty($aoTeacherDetailsResult)){
	echo "None Assigned";
}else{
echo '<table>';
echo '<tr><th scope="col">Full Name:</th><th scope="col">Username:</th><th scope="col">Last Accessed:</th></tr>';
$iLoop = 0;
foreach($aoTeacherDetailsResult as $record){
	if($iLoop%2<1){
		$sHighlight = "odd";
	}else{
		$sHighlight = "even";
	}
	echo '<tr><td class="'.$sHighlight.'">'.$record->lastname.', '.$record->firstname.'</td><td class="'.$sHighlight.'">'.$record->username.'</td><td class="'.$sHighlight.'">';
	if(empty($aLastAccess[$record->id])){
		echo 'Never';
	}else{
		if(lastAccess($aLastAccess[$record->id])>0){
			echo lastAccess($aLastAccess[$record->id]).' Day(s) ago';
		}else{
			echo 'Today';
		}
	}
	echo '</td></tr>';
	$iLoop++;
}
echo '</table>';
}
echo '</p>';

echo '<hr />';

//NON-EDITING TEACHER DETAILS
echo '<p>';
echo '<span class="title">Non-Editing Teacher Details: </span><br />';
if(empty($aoNonEditTeacherDetailsResult)){
	echo "None Assigned";
}else{
	echo '<table>';
	echo '<tr><th scope="col">Full Name:</th><th scope="col">Username:</th><th scope="col">Last Accessed:</th></tr>';
	$iLoop = 0;
	foreach($aoNonEditTeacherDetailsResult as $record){
		if($iLoop%2<1){
			$sHighlight = "odd";
		}else{
			$sHighlight = "even";
		}
	echo '<tr><td class="'.$sHighlight.'">'.$record->lastname.', '.$record->firstname.'</td><td class="'.$sHighlight.'">'.$record->username.'</td><td class="'.$sHighlight.'">';
	if(empty($aLastAccess[$record->id])){
		echo 'Never';
	}else{
		if(lastAccess($aLastAccess[$record->id])>0){
			echo lastAccess($aLastAccess[$record->id]).' Day(s) ago';
		}else{
			echo 'Today';
		}
	}
	echo '</td></tr>';
		$iLoop++;
	}
	echo '</table>';
}
echo '</p>';

}

echo '</p>';



?>

<hr />
<a href="javascript:print();">Print Report</a><span class="noprint"> | </span><a href="../index.php">View Statistics For Another Course</a>
</body>
</html>
