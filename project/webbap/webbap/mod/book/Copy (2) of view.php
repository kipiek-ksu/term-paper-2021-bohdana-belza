<?PHP // $Id: view.php,v 1.2.8.2 2007/06/17 10:36:37 stronk7 Exp $

require_once('../../config.php');
require_once('lib.php');

$id        = required_param('id', PARAM_INT);           // Course Module ID
$chapterid = optional_param('chapterid', 0, PARAM_INT); // Chapter ID
$edit      = optional_param('edit', -1, PARAM_BOOL);     // Edit mode

// =========================================================================
// security checks START - teachers edit; students view
// =========================================================================
if (!$cm = get_coursemodule_from_id('book', $id)) {
    error('Course Module ID was incorrect');
}

if (!$course = get_record('course', 'id', $cm->course)) {
    error('Course is misconfigured');
}

if (!$book = get_record('book', 'id', $cm->instance)) {
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

/// read chapters
$select = $allowedit ? "bookid = $book->id" : "bookid = $book->id AND hidden = 0";
$chapters = get_records_select('book_chapters', $select, 'pagenum', 'id, pagenum, subchapter, element, parentchapter, title, contenttype, hidden');

if (!$chapters) {
    if ($allowedit) {
        redirect('edit.php?id='.$cm->id); //no chapters - add new one
        die;
    } else {
        error('Error reading book chapters.');
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


if (!$chapter = get_record('book_chapters', 'id', $chapterid)) {
    error('Error reading book chapters.');
}

//check all variables
//unset($id);
//unset($chapterid);

/// chapter is hidden for students
if (!$allowedit and $chapter->hidden) {
    error('Error reading book chapters.');
}

/// chapter not part of this book!
if ($chapter->bookid != $book->id) {
    error('Chapter not part of this book!');
}
// =========================================================================
// security checks  END
// =========================================================================

add_to_log($course->id, 'book', 'view', 'view.php?id='.$cm->id.'&amp;chapterid='.$chapter->id, $book->id, $cm->id);


///read standard strings
$strbooks = get_string('modulenameplural', 'book');
$strbook  = get_string('modulename', 'book');
$strTOC = get_string('TOC', 'book');

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
	<input class="search_button" value="пошук" onclick="search();"   src="pix/search-btn.gif" type="image"/>
	<input class="search_field" id="query" value="search" onsubmit="search();"  type="text"/>
	<input class="searchbg" id="searchbg" value=""  type="hidden"/>
</form>
';*/

$menu = '
	<ul id="nav">
		<li class="page_item">
			<a href="../../course/view.php?id='.$course->id.'">'.$course->shortname.'</a> ->
			<a href="index.php?id='.$course->id.'">'.$strbooks.'</a> -> '.$book->name.'</li>
	</ul>';
print_header( '&nbsp;',
              '&nbsp;',
              /*"$navigation <a href=\"index.php?id=$course->id\">$strbooks</a> -> $book->name"*/$menu,
              '','
			<script type="text/javascript" src="'.$CFG->wwwroot.'/mod/book/jaxprota/prototype.js"></script>
			<script type="text/javascript" src="'.$CFG->wwwroot.'/mod/book/fx.js"></script>
			<script type="text/javascript" src="'.$CFG->wwwroot.'/mod/book/splitter.js"></script>
			<script type="text/javascript" src="'.$CFG->wwwroot.'/mod/book/codepress/codepress.js"></script>

			


			<script type="text/javascript" src="'.$CFG->wwwroot.'/lib/editor/xinha/plugins/Equation/ASCIIMathML.js"></script>



			<style type="text/css">@import url('.$CFG->wwwroot.'/mod/book/style.css);</style>

 			<link rel="stylesheet" type="text/css" href="'.$CFG->wwwroot.'/theme/weboap/styles.php" />

<style type="text/css">
#alm {	display:block; position:absolute; width: 350px; top: 0px;left:0px; border:0px solid #888;}

#virtbook {	display:block; width: 800px; height: 530px; left:0px; top:0px; float:top; border:0px solid #ffddee;}
#sel {	height: 100%; display:block;  overflow-y:scroll; overflow-x: hidden; border:1px solid #A6A7A1;
background-color:#E6E6DC;}
#def {	display:block; position:absolute; overflow-y:auto; overflow-x: hidden; float:left; top: 10px; bottom:10px;
right:10px; left:360px; border:0px solid #000000;}
#menu {	display:block; top: 0px; left:0px;  width: 95%; height: 100%; padding:0px; border:0px solid #A6A7A1;}
#myfooter {display:block;}
body {	scrollbar:no; overflow-y: hidden; overflow-x: hidden;}
*html {	scrollbar:no; overflow-y: hidden; overflow-x: hidden;}

#main { float: left; padding: 0px 40px 0px 30px; border-color:#cccbba; border:0px solid #000000; width:10px;}
#centerbox{
	position: absolute;
	top: 210px;
	width:1000px;
	float:left;
	background-color:#ffffff;
}
/*#leftborderbox{
	position: absolute;
	top: 200px;
	left: 0px;
	width: 50px;
	float:left;
	border:0px solid #000000;
}
#rightborderbox{
	position: absolute;
	top: 200px;
	right: 0px;
	width: 50px;
	float:right;
	border:0px solid #000000;
}*/
#footer{

}
/*
#content{
	visibility : hidden;
}*/

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

#barsearchform{	position: relative;
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
{	/*position: absolute;*/
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
    $chnavigation .= '<a title="'.get_string('navprev', 'book').'" href="view.php?id='.$cm->id.'&amp;chapterid='.$previd.'"><img src="pix/nav_prev.gif" class="bigicon" alt="'.get_string('navprev', 'book').'"/></a>';
} else {
    $chnavigation .= '<img src="pix/nav_prev_dis.gif" class="bigicon" alt="" />';
}
if ($nextid) {
    $chnavigation .= '<a title="'.get_string('navnext', 'book').'" href="view.php?id='.$cm->id.'&amp;chapterid='.$nextid.'"><img src="pix/nav_next.gif" class="bigicon" alt="'.get_string('navnext', 'book').'" /></a>';
} else {
    $sec = '';
    if ($section = get_record('course_sections', 'id', $cm->section)) {
        $sec = $section->section;
    }
    $chnavigation .= '<a title="'.get_string('navexit', 'book').'" href="../../course/view.php?id='.$course->id.'#section-'.$sec.'"><img src="pix/nav_exit.gif" class="bigicon" alt="'.get_string('navexit', 'book').'" /></a>';
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
					<img border="0" src="pix/splash.png" />
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
