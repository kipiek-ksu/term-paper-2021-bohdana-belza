<?php
require_once('../../config.php');
require_once('lib.php');


$e = $_GET['edit'];
$book = $_GET['book'];
$sesskey = $_GET['sesskey'];
$curparent = $_GET['curparent'];

$toc = "__";
if ($e) {
	if ($curparent != "")
	{
   		$chapters = get_records_select('book_chapters', '(subchapter = 1)and(element = 1)and(parentchapter='.$curparent.')','pagenum', 'title, contenttype, element, id, pagenum, parentchapter, content, hidden');

		foreach ($chapters as $ch) {
			echo $ch->title.'88';
			
			switch ($ch->contenttype) {
				case 0: //first level
					echo $ch->element;
					switch ($ch->element) {
						case 1:
							$title = 'toc_fragment_' . $ch->id;
							$toc .='<tr><td width="60"></td><td width="263" class="toc_fragment">';
							$toc .= '<a href="view.php?id='.$book.'#fragment_' . $ch->id.'">fragment_'.$ch->id.'</a>';		
							$toc .='</td><td width="97">';
							if ($i != 1) {
								$toc .=  ' <a title="'.get_string('up').'" href="move.php?id='.$book.'&amp;chapterid='.$ch->id.'&amp;up=1&amp;sesskey='.$sesskey.'"><img src="'.$CFG->pixpath.'/t/up.gif" height="11" class="iconsmall" alt="'.get_string('up').'" /></a>';
								} //up

							if ($i != count($chapters)) {
								$toc .=  ' <a title="'.get_string('down').'" href="move.php?id='.$book.'&amp;chapterid='.$ch->id.'&amp;up=0&amp;sesskey='.$sesskey.'"><img src="'.$CFG->pixpath.'/t/down.gif" height="11" class="iconsmall" alt="'.get_string('down').'" /></a>';
								} //down

							$toc .=  ' <a title="'.get_string('edit').'" href="edit.php?id='.$book.'&amp;chapterid='.$ch->id.'"><img src="pix/edit.png" height="11" class="iconsmall" alt="'.get_string('edit').'" /></a>'; //edit
							
							$toc .=  ' <a title="'.get_string('delete').'" href="delete.php?id='.$book.'&amp;chapterid='.$ch->id.'&amp;sesskey='.$sesskey.'"><img src="pix/del.png" height="11" class="iconsmall" alt="'.get_string('delete').'" /></a>'; //delete

							$toc .= ' <a title="'.get_string('addafter', 'book').'" href="edit.php?id='.$book.'&amp;pagenum='.$ch->pagenum.'&amp;parentchapter='.$ch->parentchapter.'">
							<img src="pix/add.png" height="11" class="iconsmall" alt="'.get_string('addafter', 'book').'" /></a>';  //add

						$toc .='</td></tr>';
						echo '1';
						break;
					case 2:
						echo '2';
						break;
					case 3:
						echo '3';
						break;
					}
				break;
			}
			
		}
		echo $toc;	
	}
}
else { echo "none";}

?>