<?PHP // $Id: view.php,v 1.2.8.2 2007/06/17 10:36:37 stronk7 Exp $

require_once('../../config.php');
require_once('lib.php');

$id        = required_param('id', PARAM_INT);           // Course Module ID
$chapterid = optional_param('chapterid', 0, PARAM_INT); // Chapter ID
$edit      = optional_param('edit', -1, PARAM_BOOL);     // Edit mode

// =========================================================================
// security checks START - teachers edit; students view
// =========================================================================
if (!$cm = get_coursemodule_from_id('labs', $id)) {
	error('Course Module ID was incorrect');
}

if (!$course = get_record('course', 'id', $cm->course)) {
    error('Course is misconfigured');
}

if (!$labs = get_record('labs', 'id', $cm->instance)) {
    error('Course module is incorrect');
}

require_course_login($course, true, $cm);

$context = get_context_instance(CONTEXT_MODULE, $cm->id);

$allowedit = has_capability('moodle/course:manageactivities', $context);

if ($allowedit) {
    if ($edit != -1) {
        $USER->editing = $edit;
    } else {
        if (isset($USER->editing)) {
            $edit = $USER->editing;
        } else {
            $edit = 0;
        }
    }
} else {
    $edit = 0;
}

$allusers = get_records_select('user', '', 'id', 'id');
foreach ($allusers as $oneuser)
{
	$usertasks = null;
	$usertasks = get_record('labs_users', 'user_id', $oneuser->id);
	if ($usertasks == null)
	{
			srand ((double) microtime() * 10000000);
			$task1 = rand(1, 20);
			$newrecord = new Object();
			$newrecord->user_id = $oneuser->id;
			$newrecord->task_id = $task1;
			$myid = insert_record('labs_users', $newrecord, true);
			$task2 = rand(1, 20);
			if ($task2 == $task1)
			{
				while($task2 == $task1)
				{
					$task2 = rand(1, 20);
				}
			}
			$newrecord = new Object();
			$newrecord->user_id = $oneuser->id;
			$newrecord->task_id = $task2;
			$myid = insert_record('labs_users', $newrecord, true);
			$task3 = rand(1, 20);
			if ($task3 == $task1 || $task3 == $task2)
			{
				while($task3 == $task1 || $task3 == $task2)
				{
					$task3 = rand(1, 20);
				}
			}
			$newrecord = new Object();
			$newrecord->user_id = $oneuser->id;
			$newrecord->task_id = $task3;
			$myid = insert_record('labs_users', $newrecord, true);
			$task4 = rand(1, 20);
			if ($task4 == $task1 || $task4 == $task2 || $task4 == $task3)
			{
				while($task4 == $task1 || $task4 == $task2 || $task4 == $task3)
				{
					$task4 = rand(1, 20);
				}
			}
			$newrecord = new Object();
			$newrecord->user_id = $oneuser->id;
			$newrecord->task_id = $task4;
			$myid = insert_record('labs_users', $newrecord, true);
	}
}

for ($j=1; $j<11; $j++){
	$mylink = get_record('labs_chapters', 'labid', $j, 'title', "link1");
	$newcid = get_record('vinttaskbook_categories', 'number', $j);
	$cid = $newcid->id;
	$newlink = get_record('labs_users', 'user_id', $USER->id);
	$newtid = get_record('vinttaskbook_tasks', 'vinttaskcategories', $cid, 'number', $newlink->task_id);
	$tid = $newtid->id;
	$mylink->content = "<p><span lang=\"UK\"><a href=\"$CFG->wwwroot/mod/vinttaskbook/view.php?id=35&cid=$cid&tid=$tid\">Task 1</a></span></p>";
	update_record('labs_chapters', $mylink);

	$mylink = get_record('labs_chapters', 'labid', $j, 'title', "link2");
	$newcid = get_record('vinttaskbook_categories', 'number', $j);
	$cid = $newcid->id;
	$newlink = get_record('labs_users', 'user_id', $USER->id, 'id', $newlink->id + 1);
	$newtid = get_record('vinttaskbook_tasks', 'vinttaskcategories', $cid, 'number', $newlink->task_id);
	$tid = $newtid->id;
	$mylink->content = "<p><span lang=\"UK\"><a href=\"$CFG->wwwroot/mod/vinttaskbook/view.php?id=35&cid=$cid&tid=$tid\">Task 2</a></span></p>";
	update_record('labs_chapters', $mylink);

	$mylink = get_record('labs_chapters', 'labid', $j, 'title', "link3");
	$newcid = get_record('vinttaskbook_categories', 'number', $j);
	$cid = $newcid->id;
	$newlink = get_record('labs_users', 'user_id', $USER->id, 'id', $newlink->id + 1);
	$newtid = get_record('vinttaskbook_tasks', 'vinttaskcategories', $cid, 'number', $newlink->task_id);
	$tid = $newtid->id;
	$mylink->content = "<p><span lang=\"UK\"><a href=\"$CFG->wwwroot/mod/vinttaskbook/view.php?id=35&cid=$cid&tid=$tid\">Task 3</a></span></p>";
	update_record('labs_chapters', $mylink);

	$mylink = get_record('labs_chapters', 'labid', $j, 'title', "link4");
	$newcid = get_record('vinttaskbook_categories', 'number', $j);
	$cid = $newcid->id;
	$newlink = get_record('labs_users', 'user_id', $USER->id, 'id', $newlink->id + 1);
	$newtid = get_record('vinttaskbook_tasks', 'vinttaskcategories', $cid, 'number', $newlink->task_id);
	$tid = $newtid->id;
	$mylink->content = "<p><span lang=\"UK\"><a href=\"$CFG->wwwroot/mod/vinttaskbook/view.php?id=35&cid=$cid&tid=$tid\">Task 4</a></span></p>";
	update_record('labs_chapters', $mylink);
}

//echo $newlink->task_id + $i - 1;
//echo "link$i";

/// read chapters
$select = $allowedit ? "labid = $labs->id" : "labid = $labs->id AND hidden = 0";
$chapters = get_records_select('labs_chapters', $select, 'pagenum', 'id, pagenum, subchapter, element, parentchapter, title, contenttype, hidden');

if (!$chapters) {
    if ($allowedit) {
        redirect('edit.php?id='.$cm->id); //no chapters - add new one
        die;
    } else {
        error('Error reading lab chapters.');
    }
}
/// check chapterid and read chapter data
if ($chapterid == '0') { // go to first chapter if no given
    foreach($chapters as $ch) {
        if ($allowedit) {
            $chapterid = $ch->id;
            break;
        }
        if (!$ch->hidden) {
            $chapterid = $ch->id;
            break;
        }
    }
}


if (!$chapter = get_record('labs_chapters', 'id', $chapterid)) {
    error('Error reading lab chapters.');
}

//check all variables
//unset($id);
//unset($chapterid);

/// chapter is hidden for students
if (!$allowedit and $chapter->hidden) {
    error('Error reading lab chapters.');
}

/// chapter not part of this book!
if ($chapter->labid != $labs->id) {
    error('Chapter not part of this lab!');
}
// =========================================================================
// security checks  END
// =========================================================================

add_to_log($course->id, 'labs', 'view', 'view.php?id='.$cm->id.'&amp;chapterid='.$chapter->id, $labs->id, $cm->id);


///read standard strings
$strlabss = get_string('modulenameplural', 'labs');
$strlabs  = get_string('modulename', 'labs');
$strTOC = get_string('TOC', 'labs');

/// prepare header
if ($course->category) {
    $navigation = '<a href="../../course/view.php?id='.$course->id.'">'.$course->shortname.'</a> ->';
} else {
    $navigation = '';
}

$buttons = /*$allowedit ?*/ '
<div id="barbuttons">
	<input onclick="MoveLeftSplitter();" value="&#8596;" type="button"/>
	<input onclick="MoveUpSplitter();" value="&nbsp;&#8597;&nbsp;" type="button"/>
</div>
<form class="barsearchform" action="" onsubmit="return false">
	<input class="search_button" onclick="search();"   src="pix/search-btn.gif" type="image"/>
	<span class="searchbg"><input class="search_field" id="query" value="" onsubmit="search();"  type="text"/></span>
	<input value="" type="hidden" id="searchbg"/>
</form>'; 
/*: '
<div id="barbuttons">
	<input onclick="MoveLeftSplitter();" value="&#8596;" type="button"/>
	<input onclick="MoveUpSplitter();" value="&nbsp;&#8597;&nbsp;" type="button"/>
</div>
<form class="barsearchform" action="" onsubmit="return false">
	<input class="search_button" value="?????" onclick="search();"   src="pix/search-btn.gif" type="image"/>
	<input class="search_field" id="query" value="search" onsubmit="search();"  type="text"/>
	<input class="searchbg" id="searchbg" value=""  type="hidden"/>
</form>
';*/

$menu = '
	<ul id="nav">
		<li class="page_item">
			<a href="../../course/view.php?id='.$course->id.'">'.$course->shortname.'</a> ->
			<a href="index.php?id='.$course->id.'">'.$strlabs.'</a> -> '.$labs->name.'</li>
	</ul>';
print_header( '&nbsp;',
              '&nbsp;',
              /*"$navigation <a href=\"index.php?id=$course->id\">$strbooks</a> -> $book->name"*/$menu,
              '','
			<script type="text/javascript" src="'.$CFG->wwwroot.'/mod/labs/jaxprota/prototype.js"></script>
			
			<script type="text/javascript" src="'.$CFG->wwwroot.'/mod/labs/splitter.js"></script>
			<script type="text/javascript" src="'.$CFG->wwwroot.'/mod/labs/codepress/codepress.js"></script>
			<script type="text/javascript" src="'.$CFG->wwwroot.'/mod/labs/fx.js"></script>
			


			<script type="text/javascript" src="'.$CFG->wwwroot.'/lib/editor/xinha/plugins/Equation/ASCIIMathML.js"></script>



			<style type="text/css">@import url('.$CFG->wwwroot.'/mod/labs/style.css);</style>

 			<link rel="stylesheet" type="text/css" href="'.$CFG->wwwroot.'/theme/weboap/styles.php" />

<style type="text/css">
#alm {	display:block; position:absolute; width: 350px; top: 0px;left:0px; border:0px solid #888;}

#virtbook {	display:block; width: 1000px; height: 530px; left:0px; top:0px; float:top; border:0px solid #ffddee;}
#sel {	height: 100%; width:348px; display:block;  overflow-y:auto; overflow-x: auto; border:1px solid #A6A7A1;
background-color:#E6E6DC;}
#def {	display:block; position:absolute; overflow-y:auto; overflow-x: hidden; float:left; left:400px; top: 0px; border:0px solid #000000; width:600px;}
#menu {	display:block; top: 0px; left:0px;  width: 95%; height: 100%; padding:0px; border:0px solid #A6A7A1;}
#myfooter {display:block;}
body {	scrollbar:no; overflow-y: hidden;} 
*html {	scrollbar:no; overflow-y: hidden;}

#main { float: left; padding-left:10px; padding-right:20px; border-color:#cccbba; border:0px solid #000000; width:560px;}
#centerbox{
	position: absolute;
	top: 210px;
	width:1000px;
	float:left;
	background-color:#ffffff;
}

#hdmenubuttons{
	/*position: absolute;
	top: 140px;*/
	/*position: relative;*/
	right: 5px;
	width: 230px;
	float:right;
	border:0px solid #000000;
}

#barbuttons{
	top: 0px;
	left: 0px;
	/*width: 60px;*/
	float:left;
	border:0px solid #000000;
}

#barsearchform{
	position: relative;
	top: 0px;
	left: 0px;
	right: 5px;
	width: 165px;
	float:left;
	border:0px solid #000000;
}

.search_field:focus + .searchbg
{
	background:url(pix/search-box.gif) 2px 0px no-repeat;
}

.searchbg
{
	background:url(pix/search-box-3.gif) 2px 1px no-repeat;
	width: 99px;
	height: 23px;
	right: 55px;
	top: 0px;
	float: right;
	display: block;
	border: 0px;
}

.search_field
{
	/*position: absolute;*/
	float: right;
	/*right: 60px;
	top: 7px;*/
	width: 91px;
	height: 23px;
	background-color:transparent;
    /*background:url(pix/search-box.gif) 0px 0px no-repeat;
      */
    border: 0px;
	font: 1.0em Arial;
    /*padding: 2px 2px 2px 5px;*/
	/*border:2px solid #FBCD54;*/
}

.search_button
{
	float: right;
	top: 0px;
	right: 0px;
	/*width: 55px;*/
	border: 0px;
}




<!--[if ! IE 5]>
.search_field
{
    background:url(pix/search-box.gif) 0px 0px no-repeat;
	background-color= #00FF00;
}
<![endif]-->



</style>
',
              true,
              $buttons/*navmenu($course, $cm)*/,
              '',false,'onresize=ScreenResize(); onLoad=ScreenResize();'
            );

/// prepare chapter navigation icons
$previd = null;
$nextid = null;
$found = 0;
foreach ($chapters as $ch) {
    if ($found) {
        $nextid= $ch->id;
        break;
    }
    if ($ch->id == $chapter->id) {
        $found = 1;
    }
    if (!$found) {
        $previd = $ch->id;
    }
}
if ($ch == current($chapters)) {
    $nextid = $ch->id;
}
$chnavigation = '';
if ($previd) {
    $chnavigation .= '<a title="'.get_string('navprev', 'labs').'" href="view.php?id='.$cm->id.'&amp;chapterid='.$previd.'"><img src="pix/nav_prev.gif" class="bigicon" alt="'.get_string('navprev', 'labs').'"/></a>';
} else {
    $chnavigation .= '<img src="pix/nav_prev_dis.gif" class="bigicon" alt="" />';
}
if ($nextid) {
    $chnavigation .= '<a title="'.get_string('navnext', 'labs').'" href="view.php?id='.$cm->id.'&amp;chapterid='.$nextid.'"><img src="pix/nav_next.gif" class="bigicon" alt="'.get_string('navnext', 'labs').'" /></a>';
} else {
    $sec = '';
    if ($section = get_record('course_sections', 'id', $cm->section)) {
        $sec = $section->section;
    }
    $chnavigation .= '<a title="'.get_string('navexit', 'labs').'" href="../../course/view.php?id='.$course->id.'#section-'.$sec.'"><img src="pix/nav_exit.gif" class="bigicon" alt="'.get_string('navexit', 'labs').'" /></a>';
}

require('toc.php');

// =====================================================
// Book display HTML code
// =====================================================

?>
	<!--/div-->
	<div id="leftborderbox">&nbsp;<!--123-->
	</div>
	<div id="centerbox">
       <div style="top:0px;left:0px;right:0px; height:11px; float:bottom;">

       </div>

		<div id="alm">

			<!--div style="background-repeat: repeat-x; height:30px;
				background : url('<?php echo $CFG->wwwroot.'/theme/'.current_theme() ?>/images/menu_ucm.png');">

				<div style="top:0px; left:0px; height:30px; width:14px; float:left;
					background : url('<?php echo $CFG->wwwroot.'/theme/'.current_theme() ?>/images/menu_ulc.png'); background-repeat: no-repeat;"></div>

				<div style="top:0px; right:0px; height:30px; width:14px; float:right;
					background : url('<?php echo $CFG->wwwroot.'/theme/'.current_theme() ?>/images/menu_urc.png'); background-repeat: no-repeat;"></div>
			</div-->
			<!--menu content-->
			<div id="sel">
				<div id="menu">
					<?php
						echo $toc; //show menu
					?>
				</div>
			</div>
			<!--end menu content-->
			<!--div style="background-repeat: repeat-x; height:30px;
				background : url('<?php echo $CFG->wwwroot.'/theme/'.current_theme() ?>/images/menu_bcm.png');">

				<div style="top:0px; left:0px; height:30px; width:14px; float:left;
					background : url('<?php echo $CFG->wwwroot.'/theme/'.current_theme() ?>/images/menu_blc.png'); background-repeat: no-repeat;"></div>

				<div style="top:0px; right:0px; height:30px; width:14px; float:right;
					background : url('<?php echo $CFG->wwwroot.'/theme/'.current_theme() ?>/images/menu_brc.png'); background-repeat: no-repeat;"></div>
			</div-->
		</div>

		<!-- book content-->
		<div id="virtbook">
			<!--div id="virtmenu"-->&nbsp;<!--/div-->
		</div>
		<div id="def">
			<div id="main" onselectstart="return false" >
				<div align="center">
					<img border="0" src="pix/splash.jpg" />
				</div>
			</div>
		</div>

       		<div style="height:11px;">

			</div>



		</div>
		<!--center content end-->
	</div>
	<div id="rightborderbox">&nbsp;<!--789-->
	</div>
	<!-- END OF CONTENT -->
	<!--div-->
	</div>
	</div>
</div> <!-- END OF WRAPPER -->

<!-- START OF FOOTER -->
<!--div id="footer" style="position: absolute; bottom:0px; left:0px; right:0px; float:bottom; height:65px">
</div--> <!-- END OF FOOTER -->

</div> <!-- END OF PAGE -->

<?php
echo "</body></html>";
?>

<!--script type="text/javascript">
	initHighlightingOnLoad('delphi');
</script-->

<?php
echo 
"<script>\n".
"function TransferFromListing(parent) {\n".
	"temp=$('iframe_codetext_'+parent+'_cp').getCode().replace(/\\r?\\n/g, '<br>');\n".
	"prevPageContent=".
		"'<html><head><script '+'type=\"'+'text/'+'javascript\" src=\"".$CFG->wwwroot."/mod/labs/gits7.'+'js\">'+'</'+'script></head><body onresize=\"ScreenResize()\">'+\n".
		"'<div id=\"taskText\" style=\"display:none;\">'+temp+'</div>'+\n".
		"'<div id=\"vint_div\" style=\"position:absolute; top:0px; left:0;\">'+\n".
	    "'<OBJECT id=\"Dvintanimax1\" name=\"Dvintanimax1\" classid=\"clsid:EF8D5138-4416-40EA-AAB0-C5561272C1D2\" codebase=\"".$CFG->wwwroot."/mod/vint/VinTAnimAx.cab#Version=1,0,0,12\">'+\n".
			"'<PARAM NAME=\"_Version\" VALUE=\"65536\" />'+\n".
	    	"'<PARAM NAME=\"_ExtentX\" VALUE=\"23283\" />'+\n".
			"'<PARAM NAME=\"_ExtentY\" VALUE=\"13547\" />'+\n".
    		"'<PARAM NAME=\"_StockProps\" VALUE=\"0\" />'+\n".
		 "'</OBJECT>'+\n".
		 "'</div></body></html>';\n".
		 
	"myWindow = window.open(\"\", \"tinyWindow\", 'toolbar,resizable,width=640,height=480');\n".
	"myWindow.document.write(prevPageContent);\n".
	"myWindow.document.bgColor=\"lightblue\";\n".
	"myWindow.document.close();\n".
"}\n".
"</script>\n";
?>