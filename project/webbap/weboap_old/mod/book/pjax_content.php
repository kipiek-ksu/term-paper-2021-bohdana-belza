<?php
require_once('../../config.php');
require_once('lib.php');

$curparent = $_GET['curparent'];

if ($curparent != "")
{
	$chapters = get_records_select('book_chapters', 'parentchapter = '.$curparent, 'pagenum', 'id, subchapter, element, contenttype, title, content, hidden');

	$content = '';
	$i = 0;
	$currentopen = '';

	foreach ($chapters as $ch) {
		if ($i == 0) {
			$i = 1;
			$currentopen = 0;
			if ($ch->title == '' )
			{
				if ($ch->id == 730)
					$content .='<div class="chapter">10. Швидкі алгоритми сортування і пошуку</div>';
				else
					$content .='<div class="chapter_symboll">Chapter Unknown'.$ch->id.'</div>';
			}
			else
				if ($ch->id == 138) {
					$content .='<div class="chapter">7. Оператори повторення з параметром. Масиви</div>';
					$myName = 'subject_' . $ch->id;
					$content .='<span id="'. $myName .'" onclick="MyToogle( \''. $myName .'\' )">';
					$content .='<div class="subject">' . $ch->title . '</div>';
					$content .='<div id="'. $myName .'content" onclick="event.cancelBubble=true;" style="display:block;">';
					$currentopen = 1;
				}
				else
					$content .= '<div class="chapter">'. $ch->title .'</div>';
		}
		else {
			switch ($ch->element) {
				case 0:
					if ($ch->subchapter == 1) {
						if ($currentopen == 1) {
							$content .='</div>';
							$content .='</span>';
						}
						$myName = 'subject_' . $ch->id;
						$content .='<span id="'. $myName .'" onclick="MyToogle( \''. $myName .'\' )">';
						if ($ch->title == '' )
							$content .='<div class="subject_symboll">******</div>';
						else
							$content .='<div class="subject">' . $ch->title . '</div>';
						$content .='<div id="'. $myName .'content" onclick="event.cancelBubble=true;" style="display:block;">';
						$currentopen = 1;
					}
					break;
				case 1:
					/*if (($currentopen > 2)&&($currentopen < 6)){
						$content .='</div>';
						$content .='</span>';
					}
					*/
					$content .='</div>';
					$content .='</span>';
					$currentopen = 2;
					break;
				case 2:
					if (($currentopen > 2)&&($currentopen < 6)){
						$content .='</div>';
						$content .='</span>';
					}
					$myName = 'example_' . $ch->id;
					$content .='<span id="'. $myName .'" onclick="MyToogle( \''. $myName .'\' )">';
					if ($ch->title == '' )
						$content .='<div class="example_symboll">Example Unknown</div>';
					else
						$content .='<div class="example">' . $ch->title . '</div>';
					$content .='<div id="'. $myName .'content" onclick="event.cancelBubble=true;" style="display:block;">';
					$content .= $ch->content;
					$currentopen = 3;
					break;
				case 3:
					if (($currentopen > 2)&&($currentopen < 6)){
						$content .='</div>';
						$content .='</span>';
					}

					$myName = 'problem_' . $ch->id;
					$content .='<span id="'. $myName .'" onclick="MyToogle( \''. $myName .'\' )">';
					if ($ch->title == '' )
						$content .='<div class="problem_symboll">Problem Unknown</div>';
					else
						$content .='<div class="problem">' . $ch->title . '</div>';
					$content .='<div id="'. $myName .'content" onclick="event.cancelBubble=true;" style="display:block;">';
					$content .= $ch->content;
					$currentopen = 4;
					break;
				case 4:
					if (($currentopen > 2)&&($currentopen < 6)){
						$content .='</div>';
						$content .='</span>';
					}

					$myName = 'comment_' . $ch->id;
					$content .='<span id="'. $myName .'" onclick="MyToogle( \''. $myName .'\' )">';
					if ($ch->title == '' )
						$content .='<div class="commentary_symboll">Commentary Unknown</div>';
					else
						$content .='<div class="commentary">' . $ch->title . '</div>';
					$content .='<div id="'. $myName .'content" onclick="event.cancelBubble=true;" style="display:block;">';
					$content .= $ch->content;
					$currentopen = 5;
					break;
				case 5:
					switch ($ch->contenttype) {
						case 1:
							$myName = 'stext_' . $ch->id;
							$content .='<div id='.$myName.' class="stext">';
							$content .= $ch->content;
							$content .='</div>';
							break;
						case 2:
							$myName = 'listing_' . $ch->id;
							/*$content .='<input onclick="
								$(\'codetext_'.$ch->id.'_cp\').style.width = getClientWidth()-360-180*0.95+\'px\';
									" value="&#8596;" type="button"/>';
							*/
							$content .='<span id="'. $myName .'" onclick="MyToogle( \''. $myName .'\' )">';
							$content .='<div class="listing">' . $ch->title . '</div>';
							$content .='<div id="'. $myName .'content" onclick="event.cancelBubble=true;" style="display:block;">';
							$content .='<textarea id="codetext_'.$ch->id.'" class="codepress pascal" style=" width:95%; height:200px;" wrap="off" READONLY>';
							$content .= html_to_text($ch->content);
							$content .='</textarea>';
							$content .='<input type="button" align="left" onclick="TransferFromListing(\''.$ch->id.'\');" value="Виконати"/>';
							$content .='</div>';
							$content .='</span>';
							break;
						case 3://listingNone
							$myName = 'listing_' . $ch->id;
							/*$content .='<input onclick="
								$(\'codetext_'.$ch->id.'_cp\').style.width = getClientWidth()-360-180*0.95+\'px\';
									" value="&#8596;" type="button"/>';
							*/
							$content .='<span id="'. $myName .'" onclick="MyToogle( \''. $myName .'\' )">';
							$content .='<div class="listing">' . $ch->title . '</div>';
							$content .='<div id="'. $myName .'content" onclick="event.cancelBubble=true;" style="display:block;">';
							$content .='<textarea id="codetext_'.$ch->id.'" class="codepress pascal" style=" width:95%; height:200px;" wrap="off" READONLY>';
							$content .= html_to_text($ch->content);
							$content .='</textarea>';
							//$content .='<input type="button" align="left" onclick="TransferFromListing(\''.$ch->id.'\');" value="Виконати"/>';
							$content .='</div>';
							$content .='</span>';
							break;
					}
					break;

			} //end switch
		} //end else
	} //end foreach

	if (($currentopen > 2)&&($currentopen < 6)) {
		$content .='</div>';
		$content .='</span>';

		$content .='</div>';
		$content .='</span>';
	}

	if ($currentopen == 1) {
		$content .='</div>';
		$content .='</span>';
	}

	echo $content;
}
else { echo "none";}

?>