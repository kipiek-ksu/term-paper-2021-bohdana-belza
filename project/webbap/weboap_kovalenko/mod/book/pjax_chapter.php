<?
require_once('../../config.php');
require_once('lib.php');

$curparent = $_GET['curparent'];
$e = $_GET['edit'];
$book = $_GET['book'];
$sesskey = $_GET['sesskey'];
$tocopen='';
$toc = "";
$subtempid = '';

if ($e) {
	if ($curparent != "")
	{

   		$chapters = get_records_select('book_chapters', '(subchapter = 1)and(parentchapter='.$curparent.')','pagenum', 'id, pagenum, parentchapter, title, content, contenttype, element, hidden');
		foreach ($chapters as $ch) {
			switch ($ch->contenttype) {
				case 0: //first level
					switch ($ch->element) {
						case 0:
					  		if ($tocopen == 1){
								$toc .='</div>';
							}
							if ($ch->title=='') {
								$DName ='******';
							}
							else
								$DName = $ch->title;
							$myName = 'toc_subject_' . $ch->id;
							$subtempid = $ch->id;
							$toc .='
							<div style="float:left; left:25px; margin-left: 25px;">
							<div class="toc_subject" style="width:205px; float:left; text-align: left; margin-left: 0px; text-indent:0px;">';
								$toc .=  '
								<img border="0" src="pix/plus.gif" onclick="simplehiden(\'subbutton_'. $subtempid .'\',\'subtable_'. $subtempid .'\');" width="13" id="subbutton_'.$subtempid.'"/>
								<a  onclick="gotoContent(\''.$curparent.'\',\' view.php?id='.$book.'#subject_' . $ch->id .'\')">'. $DName .'</a>
							</div>';
							$toc .= '
							<div style="width:76px; float:right; right:0px;top:0px;">';
								if ($i != 1) {
									$toc .=  '
										<a title="'.get_string('up').'" href="move.php?id='.$book.'&amp;chapterid='.$ch->id.'&amp;up=1&amp;sesskey='.$sesskey.'">
										<img src="'.$CFG->pixpath.'/t/up.gif" height="11" class="iconsmall" alt="'.get_string('up').'" /></a>
									';
								} //up
								if ($i != count($chapters)) {
									$toc .=  '
										<a title="'.get_string('down').'" href="move.php?id='.$book.'&amp;chapterid='.$ch->id.'&amp;up=0&amp;sesskey='.$sesskey.'">
										<img src="'.$CFG->pixpath.'/t/down.gif" height="11" class="iconsmall" alt="'.get_string('down').'" /></a>
									';
								} //down
								$toc .=  '
									<a title="'.get_string('edit').'" href="edit.php?id='.$book.'&amp;chapterid='.$ch->id.'">
									<img src="pix/edit.png" height="11" class="iconsmall" alt="'.get_string('edit').'" /></a>
								'; //edit
								$toc .=  '
									<a title="'.get_string('delete').'" href="delete.php?id='.$book.'&amp;chapterid='.$ch->id.'&amp;sesskey='.$sesskey.'">
									<img src="pix/del.png" height="11" class="iconsmall" alt="'.get_string('delete').'" /></a>
								'; //delete
								$toc .= '
									<a title="'.get_string('addafter', 'book').'" href="edit.php?id='.$book.'&amp;pagenum='.$ch->pagenum.'&amp;parentchapter='.$ch->parentchapter.'">
									<img src="pix/add.png" height="11" class="iconsmall" alt="'.get_string('addafter', 'book').'" /></a>
								';  //add
							$toc .= '
							</div></div>';
							$toc .='
								<div id="subtable_'. $subtempid .'" style="display:none;
								float:left;	margin-left: 50px; text-align: left; position:relative;">';
							$tocopen = 1;
							break;
						case 1:
							$title = 'toc_fragment_' . $ch->id;
							$toc .='
							<div>
							<div class="toc_fragment" style="width:190px; float:left; left:50px;">';
								$toc .= '<a onclick="gotoContent(\''.$curparent.'\',\' view.php?id='.$book.'#fragment_' . $ch->id.'\')">'. $title .'</a>
							</div>';
							$toc .='
							<div style="width:76px; float:right; right:0px;top:0px;">';
								if ($i != 1) {
									$toc .=  '
										<a title="'.get_string('up').'" href="move.php?id='.$book.'&amp;chapterid='.$ch->id.'&amp;up=1&amp;sesskey='.$sesskey.'">
										<img src="'.$CFG->pixpath.'/t/up.gif" height="11" class="iconsmall" alt="'.get_string('up').'" /></a>
									';
								} //up
								if ($i != count($chapters)) {
									$toc .=  '
										<a title="'.get_string('down').'" href="move.php?id='.$book.'&amp;chapterid='.$ch->id.'&amp;up=0&amp;sesskey='.$sesskey.'">
										<img src="'.$CFG->pixpath.'/t/down.gif" height="11" class="iconsmall" alt="'.get_string('down').'" /></a>
								';
								} //down
								$toc .=  '
									<a title="'.get_string('edit').'" href="edit.php?id='.$book.'&amp;chapterid='.$ch->id.'">
									<img src="pix/edit.png" height="11" class="iconsmall" alt="'.get_string('edit').'" /></a>
								'; //edit
								$toc .=  '
									<a title="'.get_string('delete').'" href="delete.php?id='.$book.'&amp;chapterid='.$ch->id.'&amp;sesskey='.$sesskey.'">
									<img src="pix/del.png" height="11" class="iconsmall" alt="'.get_string('delete').'" /></a>
								'; //delete
								$toc .= '
									<a title="'.get_string('addafter', 'book').'" href="edit.php?id='.$book.'&amp;pagenum='.$ch->pagenum.'&amp;parentchapter='.$ch->parentchapter.'">
									<img src="pix/add.png" height="11" class="iconsmall" alt="'.get_string('addafter', 'book').'" /></a>
								';  //add
							$toc .='
							</div></div>';
							break;
						case 2:
							$title = 'toc_example_' . $ch->id;
							$toc .='
							<div><div class="toc_example" style="width:190px; float:left; left:50px;">';
								$toc .= '<a onclick="gotoContent(\''.$curparent.'\',\' view.php?id='.$book.'#example_' . $ch->id.'\')">'. $title .'</a>
							</div>';
							$toc .='
							<div style="width:76px; float:right; right:0px;top:0px;">';
								if ($i != 1) {
									$toc .=  '
										<a title="'.get_string('up').'" href="move.php?id='.$book.'&amp;chapterid='.$ch->id.'&amp;up=1&amp;sesskey='.$sesskey.'">
										<img src="'.$CFG->pixpath.'/t/up.gif" height="11" class="iconsmall" alt="'.get_string('up').'" /></a>
									';
								} //up
								if ($i != count($chapters)) {
									$toc .=  '
										<a title="'.get_string('down').'" href="move.php?id='.$book.'&amp;chapterid='.$ch->id.'&amp;up=0&amp;sesskey='.$sesskey.'">
										<img src="'.$CFG->pixpath.'/t/down.gif" height="11" class="iconsmall" alt="'.get_string('down').'" /></a>
									';
								} //down
								$toc .=  '
									<a title="'.get_string('edit').'" href="edit.php?id='.$book.'&amp;chapterid='.$ch->id.'">
									<img src="pix/edit.png" height="11" class="iconsmall" alt="'.get_string('edit').'" /></a>
								'; //edit
								$toc .=  '
									<a title="'.get_string('delete').'" href="delete.php?id='.$book.'&amp;chapterid='.$ch->id.'&amp;sesskey='.$sesskey.'">
									<img src="pix/del.png" height="11" class="iconsmall" alt="'.get_string('delete').'" /></a>
								'; //delete
								$toc .= '
									<a title="'.get_string('addafter', 'book').'" href="edit.php?id='.$book.'&amp;pagenum='.$ch->pagenum.'&amp;parentchapter='.$ch->parentchapter.'">
									<img src="pix/add.png" height="11" class="iconsmall" alt="'.get_string('addafter', 'book').'" /></a>
								';  //add
							$toc .='
							</div></div>';
							break;
						case 3:
							$title = 'toc_problem_' . $ch->id;
							$toc .='
							<div><div class="toc_problem" style="width:190px; float:left; left:50px;">';
								$toc .= '<a onclick="gotoContent(\''.$curparent.'\',\' view.php?id='.$book.'#problem_' . $ch->id.'\')">'. $title .'</a>
							</div>';
							$toc .='
							<div style="width:76px; float:right; right:0px;top:0px;">';
								if ($i != 1) {
									$toc .=  '
										<a title="'.get_string('up').'" href="move.php?id='.$book.'&amp;chapterid='.$ch->id.'&amp;up=1&amp;sesskey='.$sesskey.'">
										<img src="'.$CFG->pixpath.'/t/up.gif" height="11" class="iconsmall" alt="'.get_string('up').'" /></a>
									';
								} //up
								if ($i != count($chapters)) {
									$toc .=  '
										<a title="'.get_string('down').'" href="move.php?id='.$book.'&amp;chapterid='.$ch->id.'&amp;up=0&amp;sesskey='.$sesskey.'">
										<img src="'.$CFG->pixpath.'/t/down.gif" height="11" class="iconsmall" alt="'.get_string('down').'" /></a>
									';
								} //down
								$toc .=  '
									<a title="'.get_string('edit').'" href="edit.php?id='.$book.'&amp;chapterid='.$ch->id.'">
									<img src="pix/edit.png" height="11" class="iconsmall" alt="'.get_string('edit').'" /></a>
								'; //edit
								$toc .=  '
									<a title="'.get_string('delete').'" href="delete.php?id='.$book.'&amp;chapterid='.$ch->id.'&amp;sesskey='.$sesskey.'">
									<img src="pix/del.png" height="11" class="iconsmall" alt="'.get_string('delete').'" /></a>
								'; //delete
								$toc .= '
									<a title="'.get_string('addafter', 'book').'" href="edit.php?id='.$book.'&amp;pagenum='.$ch->pagenum.'&amp;parentchapter='.$ch->parentchapter.'">
									<img src="pix/add.png" height="11" class="iconsmall" alt="'.get_string('addafter', 'book').'" /></a>
								';  //add
							$toc .= '
							</div></div>';
							break;
						case 4:
							$title = 'toc_comment_' . $ch->id;
							$toc .='
							<div><div class="toc_comment" style="width:190px; float:left; left:50px;">';
								$toc .= '<a onclick="gotoContent(\''.$curparent.'\',\' view.php?id='.$book.'#comment_' . $ch->id.'\')">'. $title .'</a>
							</div>';
							$toc .='
							<div style="width:76px; float:right; right:0px;top:0px;">';
								if ($i != 1) {
									$toc .=  '
										<a title="'.get_string('up').'" href="move.php?id='.$book.'&amp;chapterid='.$ch->id.'&amp;up=1&amp;sesskey='.$sesskey.'">
										<img src="'.$CFG->pixpath.'/t/up.gif" height="11" class="iconsmall" alt="'.get_string('up').'" /></a>
									';
								} //up
								if ($i != count($chapters)) {
									$toc .=  '
										<a title="'.get_string('down').'" href="move.php?id='.$book.'&amp;chapterid='.$ch->id.'&amp;up=0&amp;sesskey='.$sesskey.'">
										<img src="'.$CFG->pixpath.'/t/down.gif" height="11" class="iconsmall" alt="'.get_string('down').'" /></a>
									';
								} //down
								$toc .=  '
									<a title="'.get_string('edit').'" href="edit.php?id='.$book.'&amp;chapterid='.$ch->id.'">
									<img src="pix/edit.png" height="11" class="iconsmall" alt="'.get_string('edit').'" /></a>
								'; //edit
								$toc .=  '
									<a title="'.get_string('delete').'" href="delete.php?id='.$book.'&amp;chapterid='.$ch->id.'&amp;sesskey='.$sesskey.'">
									<img src="pix/del.png" height="11" class="iconsmall" alt="'.get_string('delete').'" /></a>
								'; //delete
								$toc .= '
									<a title="'.get_string('addafter', 'book').'" href="edit.php?id='.$book.'&amp;pagenum='.$ch->pagenum.'&amp;parentchapter='.$ch->parentchapter.'">
									<img src="pix/add.png" height="11" class="iconsmall" alt="'.get_string('addafter', 'book').'" /></a>
								';  //add
							$toc .= '
							</div></div>';
							break;
					}//switch
				case 1: //first level
					if ($subtempid != $ch->id) {
						$title = 'toc_text_' . $ch->id;
						$toc .='<div><div class="toc_stext" style="width:190px; float:left; left:50px;">';
						$toc .= '<a onclick="gotoContent(\''.$curparent.'\',\' view.php?id='.$book.'#stext_' . $ch->id.'\')">'. $title .'</a>';
						$toc .='</div><div style="width:76px; float:right; right:0px;top:0px;">';
							if ($i != 1) {
								$toc .=  '
									<a title="'.get_string('up').'" href="move.php?id='.$book.'&amp;chapterid='.$ch->id.'&amp;up=1&amp;sesskey='.$sesskey.'">
									<img src="'.$CFG->pixpath.'/t/up.gif" height="11" class="iconsmall" alt="'.get_string('up').'" /></a>
								';
							} //up
							if ($i != count($chapters)) {
								$toc .=  '
									<a title="'.get_string('down').'" href="move.php?id='.$book.'&amp;chapterid='.$ch->id.'&amp;up=0&amp;sesskey='.$sesskey.'">
									<img src="'.$CFG->pixpath.'/t/down.gif" height="11" class="iconsmall" alt="'.get_string('down').'" /></a>
								';
							} //down
							$toc .=  '
								<a title="'.get_string('edit').'" href="edit.php?id='.$book.'&amp;chapterid='.$ch->id.'">
								<img src="pix/edit.png" height="11" class="iconsmall" alt="'.get_string('edit').'" /></a>
							'; //edit
							$toc .=  '
								<a title="'.get_string('delete').'" href="delete.php?id='.$book.'&amp;chapterid='.$ch->id.'&amp;sesskey='.$sesskey.'">
								<img src="pix/del.png" height="11" class="iconsmall" alt="'.get_string('delete').'" /></a>
							'; //delete
							$toc .= '
								<a title="'.get_string('addafter', 'book').'" href="edit.php?id='.$book.'&amp;pagenum='.$ch->pagenum.'&amp;parentchapter='.$ch->parentchapter.'">
								<img src="pix/add.png" height="11" class="iconsmall" alt="'.get_string('addafter', 'book').'" /></a>
							';  //add
						$toc .="</div></div>";
					}
					break;
				case 2: //first level
				case 3:
					$title = $ch->title;
					$toc .='<div><div class="toc_listing" style="width:190px; float:left; left:50px;">';
					$toc .= '<a onclick="gotoContent(\''.$curparent.'\',\' view.php?id='.$book.'#listing_' . $ch->id.'\')">'. $title .'</a>';
					$toc .='
						</div><div style="width:76px; float:right; right:0px;top:0px;">';
						if ($i != 1) {
							$toc .=  '
								<a title="'.get_string('up').'" href="move.php?id='.$book.'&amp;chapterid='.$ch->id.'&amp;up=1&amp;sesskey='.$sesskey.'">
								<img src="'.$CFG->pixpath.'/t/up.gif" height="11" class="iconsmall" alt="'.get_string('up').'" /></a>
							';
						} //up
						if ($i != count($chapters)) {
							$toc .=  '
								<a title="'.get_string('down').'" href="move.php?id='.$book.'&amp;chapterid='.$ch->id.'&amp;up=0&amp;sesskey='.$sesskey.'">
								<img src="'.$CFG->pixpath.'/t/down.gif" height="11" class="iconsmall" alt="'.get_string('down').'" /></a>
							';
						} //down
						$toc .=  '
							<a title="'.get_string('edit').'" href="edit.php?id='.$book.'&amp;chapterid='.$ch->id.'">
							<img src="pix/edit.png" height="11" class="iconsmall" alt="'.get_string('edit').'" /></a>
						'; //edit
						$toc .=  '
							<a title="'.get_string('delete').'" href="delete.php?id='.$book.'&amp;chapterid='.$ch->id.'&amp;sesskey='.$sesskey.'">
							<img src="pix/del.png" height="11" class="iconsmall" alt="'.get_string('delete').'" /></a>
						'; //delete
						$toc .= '
							<a title="'.get_string('addafter', 'book').'" href="edit.php?id='.$book.'&amp;pagenum='.$ch->pagenum.'&amp;parentchapter='.$ch->parentchapter.'">
							<img src="pix/add.png" height="11" class="iconsmall" alt="'.get_string('addafter', 'book').'" /></a>
						';  //add
					$toc .="</div></div>";
	      			break;
			} //switch
		}//foreach
		echo  $toc;
	}//curparent
	else { echo "none";}
} else { //edit

	if ($curparent != "") {
		$chapters = get_records_select('book_chapters', '(subchapter = 1)and(element=0)and(parentchapter='.$curparent.')','pagenum', 'id, title, content, hidden');
		foreach ($chapters as $ch) {
			if ($ch->title=='') {
				$DName ='******';
			}
			else
				$DName = $ch->title;
			$myName = 'toc_subject_' . $ch->id;
			$subtempid = $ch->id;
			$toc .='<div class="toc_subject" width="360" style="left:40px;
				word-spacing: 0px; line-height: 150%; text-indent: 0px; text-align: left; valign:top;
				margin-left: 30px; margin-right: 30px; margin-top: 0px; margin-bottom: 0px; ">';
			$toc .=  '<a  onclick="gotoContent(\''.$curparent.'\',\' view.php?id='.$book.'#subject_' . $ch->id .'\')">'. $DName .'</a>';
			$toc .= '</div>';
		}
	}
	echo $toc;

} //main
?>