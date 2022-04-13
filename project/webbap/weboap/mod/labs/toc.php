<?PHP // $Id: toc.php,v 1.2.8.1 2007/05/20 06:02:02 skodak Exp $

defined('MOODLE_INTERNAL') or die('Direct access to this script is forbidden.');

$toc = '';          //representation of toc (HTML)
/*
if ($edit) { ///teacher's TOC

	$chtempid='';
	$subtempid='';
	$toc = '
		<table border="0" width="420" style="cellspacing:0; cellpadding:0; border-color:#cccbba;" id="tablemenu">
		<tr>
			<td width="13"></td>
			<td width="310"></td>
			<td width="97"></td>
		</tr>
	';
    $i = 0;
	foreach ($chapters as $ch) {
		if (($ch->contenttype == 0)&&($ch->element == 0)&&($ch->subchapter == 0)) {

			$chtempid = $ch->id;
			$toc .='<tr><td width="13" align="right">
			<img border="0" src="pix/plus.gif"
				onclick="hiden(
					\'button_'. $chtempid .'\',
					\'table_'. $chtempid .'\',
					\''.$ch->parentchapter.'\',
					\''.$edit.'\',
					\''.$cm->id.'\',
					\''.$USER->sesskey.'\'
				);" width="13" id="button_'.$chtempid.'"/></td>
			<td width="310" class="toc_chapter" style="valign:top;
				word-spacing: 0; line-height: 150%; text-indent: 0; text-align: left;
				margin-left: 50; margin-right: 0; margin-top: 0; margin-bottom: 0; ">';
			$myName = 'toc_chapter_' . $ch->id;

			$toc .= '<div id="jx_chapter'.$ch->id.'">';
			$toc .= '<a onclick="gotoContent(\''.$ch->parentchapter.'\',\' view.php?id='.$cm->id.'#chapterid='.$ch->id.'\')">'. $ch->title.'</a>';
			$toc .= '</td><td width="97">';
			if ($i != 1) {
				$toc .=  ' <a title="'.get_string('up').'" href="move.php?id='.$cm->id.'&amp;chapterid='.$ch->id.'&amp;up=1&amp;sesskey='.$USER->sesskey.'"><img src="'.$CFG->pixpath.'/t/up.gif" height="11" class="iconsmall" alt="'.get_string('up').'" /></a>';
			} //up
			if ($i != count($chapters)) {
				$toc .=  ' <a title="'.get_string('down').'" href="move.php?id='.$cm->id.'&amp;chapterid='.$ch->id.'&amp;up=0&amp;sesskey='.$USER->sesskey.'"><img src="'.$CFG->pixpath.'/t/down.gif" height="11" class="iconsmall" alt="'.get_string('down').'" /></a>';
			} //down

			$toc .=  ' <a title="'.get_string('edit').'" href="edit.php?id='.$cm->id.'&amp;chapterid='.$ch->id.'"><img src="pix/edit.png" height="11" class="iconsmall" alt="'.get_string('edit').'" /></a>'; //edit

			$toc .=  ' <a title="'.get_string('delete').'" href="delete.php?id='.$cm->id.'&amp;chapterid='.$ch->id.'&amp;sesskey='.$USER->sesskey.'"><img src="pix/del.png" height="11" class="iconsmall" alt="'.get_string('delete').'" /></a>'; //delete

			$toc .= ' <a title="'.get_string('addafter', 'labs').'" href="edit.php?id='.$cm->id.'&amp;pagenum='.$ch->pagenum.'&amp;subchapter='.$ch->subchapter.'">
			<img src="pix/add.png" height="11" class="iconsmall" alt="'.get_string('addafter', 'labs').'" /></a>';  //add

			$toc .= '</td></tr><tr>';
			$toc .='<td colspan="3">
				<table border="0" width="420" id="table_'. $chtempid .'" style="display:none;"></table>';
		 }
	}

	$toc .='</td></tr></table>';

} else { //normal students view
*/
$chtempid='';
$subtempid='';
$toc = '<div id="tablemenu" style="border-color:#cccbba; width:320px;">';

foreach ($chapters as $ch) {
	if (($ch->contenttype == 0)&&($ch->element == 0)&&($ch->subchapter == 0)) {
		$myName = 'toc_chapter_' . $ch->id;
		$chtempid = $ch->id;
		$toc .='<div>
			<div style="width:13px; float:left;border:3px;">
				<img border="0" src="pix/plus.gif" width="13" id="button_'.$chtempid.'"
					onclick="hiden(
						\'button_'. $chtempid .'\',
						\'table_'. $chtempid .'\',
						\''.$ch->parentchapter.'\',
						\''.$edit.'\',
						\''.$cm->id.'\',
						\''.$USER->sesskey.'\'
					);"
				/>
			</div>';

		$toc .= '<div class="toc_chapter" style="width:300px;
			word-spacing: 0; line-height: 150%; text-indent: 0; text-align: left;
			margin-left: 50; margin-right: 0; margin-top: 0; margin-bottom: 0; valign:top;"
					onclick="hiden(
						\'button_'. $chtempid .'\',
						\'table_'. $chtempid .'\',
						\''.$ch->parentchapter.'\',
						\''.$edit.'\',
						\''.$cm->id.'\',
						\''.$USER->sesskey.'\'
					);"
			>';

		$toc .= $ch->title;
		$toc .= '</div></div>';
		$toc .='<div id="table_'. $chtempid .'" style="display:none; width:320px; float:left;"></div>';
	  /*onclick="gotoContent(\''.$ch->parentchapter.'\',\' view.php?id='.$cm->id.'#chapterid='.$ch->id.'\')"*/
	}
}
$toc .= '</div>';
//}
?>
