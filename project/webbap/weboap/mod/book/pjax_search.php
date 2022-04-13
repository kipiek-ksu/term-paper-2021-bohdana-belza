<?
require_once('../../config.php');
require_once('lib.php');

$text = $_GET['search'];
$i='';
$n = strlen($text);
/*
$beg = strpos($ch->content, $text);

$ebeg = $beg+$n;
//$beg - переменная неопределена
*/
$out = '';
$utext = '';
$lowtext = '';
//echo utf8_encode($text[0]);
//echo $text;
//echo mb_strtolower($text, "utf8");
//echo mb_strtolower($text);
//echo ucfirst($text);
if ($n>2) {	$lowtext = mb_strtolower($text, "utf8");
	$utext = ucfirst($lowtext);
//	echo $text;
//	echo $lowtext;
//	echo $utext;
//	echo strcmp($text,$utext);
//	echo strcmp($text,$lowtext);

	$searchsql = "
		SELECT b.*
		FROM `mdl_book_chapters` b
		WHERE
           	(b.title LIKE '%". $text ."%') OR (b.content LIKE '%".$text."%')
		ORDER BY `pagenum`
	";
	$chapters = get_records_sql($searchsql);

	if ($chapters != '') {

		foreach ($chapters as $ch) {
			$i = $i+1;
			$link = '';
			$content = '';

			//$content .= "<div style='background-color:#ff0000'>".$ch->id."|".$ch->pagenum."</div>";
         /*
			$content .= "<div>
				<a href=\"#chapterid=".$ch->id." \"
				onclick=\"getElementById('toc_chapter".$ch->id."').click();\">"
				.$ch->title."</a>
			</div>";
			$content .= $beg;
			$content .= "<div>..."
				.substr($ch->content, $beg, $ebeg).""
				.substr($ch->content, $ebeg, 30)."
			...</div><br/>";
        */

            if ($ch->subchapter==0) {
				if ($ch->id != 730)
					$DName = "Глава \" ".$ch->title." \" ";
					$content .= $ch->title;
            } else {
            	switch ($ch->element) {
					case 0:
     					if ($ch->subchapter == 1) {
							$myName = 'subject_' . $ch->id;
							$DName = "Підглава \" ".$ch->title." \" ";
							$content .= $ch->title;
						}
						break;
					case 2:
						$myName = 'example_' . $ch->id;
						$DName = "Приклад \" ".$ch->title." \" ";
						$content .= $ch->title;
						break;
					case 3:
						$myName = 'problem_' . $ch->id;
						$DName = "Задача \" ".$ch->title." \" ";
						$content .= $ch->title;
						break;
					case 4:
						$myName = 'comment_' . $ch->id;
						$DName = "Коментарій \" ".$ch->title." \" ";
						$content .= $ch->title;
						break;
					case 5:
						switch ($ch->contenttype) {
							case 1:
								$myName = 'stext_' . $ch->id;
								$DName = "Текст";
								$content .='<div class="stext">' .$ch->content. '</div>';
								break;
							case 2:
								$myName = 'listing_' . $ch->id;
								$DName = "Листинг \" ".$ch->title." \" ";
								$content .= '<b><i>'.$ch->title . '</i></b><br/>';
								$content .= "<pre>".html_to_text($ch->content)."</pre>";
								break;
						}
						break;
				}
            }
/*
			$count = 0;
			$fff = utf8_decode("search");
			echo $fff;
			$bbb = "my kitty frag";
			*/
			$content = mb_eregi_replace($text,"<span style=\"background-color: #ADA96E; color:#CCFF33; \"><b>".$text."</b></span>", $content);
			if (strcmp($text,$lowtext)!=0) $content = mb_eregi_replace($lowtext,"<span style=\"background-color: #ADA96E; color:#CCFF33; \"><b>".$lowtext."</b></span>", $content);
            if (strcmp($text,$utext)!=0) $content = mb_eregi_replace($utext,"<span style=\"background-color: #ADA96E; color:#CCFF33; \"><b>".$utext."</b></span>", $content);

			/*$ccc = str_ireplace("kitty","<span style=\"color:#ADA96E;\"><b>".$fff."</b></span>", $content,$count);
			echo $ccc;
			echo $count;

			*/

			//echo $text;
			//echo ''.$text.'</b>';
			//echo '<font color="#ADA96E" ><b>'.$text.'</b></font>';
			//echo str_replace($text,'<b>'.$text.'</b>',$ch->content);

			/*$book = get_records_select('book', '(id='. $ch->bookid. ')','id', 'course');
			$b = '';
   			foreach ($book as $tr) {
            	$b .= $tr->course;
            }

      		$book = get_records_select('book', '(course='. $b. ')','id', 'id');
			$course = '';
   			foreach ($book as $tr) {
            	$course .= $tr->id;
            }*/ //some solution method

			$cparent = get_records_select('book_chapters', '(parentchapter='. $ch->parentchapter. ')&&(subchapter=0)','pagenum', 'title');
            $c = '';
            foreach ($cparent as $tr) {
            	$c .= $tr->title;
            }


   			$link .= '<div class="search_object"><div class="search_object_title"><a
   				onclick="gotoContent(\''.$ch->parentchapter.'\',\'view.php?id=14#' . $myName .'\')">'.
   				$c.' -> '.$DName .'</a></div>'; //need to fix later if create second book

			$out .= $link;

			$out .= '<div class="search_object_content">'.$content.'</div></div><br/>';

		}//foreach end

		if ($out!='') {
			echo "
			<div class=\"search_title\">
				<div>Фраза \" ".$text." \"</div>
				<div>Результат пошуку: ".$i."</div>
			</div><br/>";
			echo $out;
		} else {
			echo "нічого не знайдено";
		}

	} else {
		echo "нічого не знайдено";
	}

} else {
	echo "текст запиту повинен містити більше ніж 2 букви";
}

   	//	$chapters = get_records_select('book_chapters', 'title LIKE \'%' .$p . '%\'','pagenum', 'title, content, hidden');


    //$totalcount = count_records_sql($countsql);


    //$chapters = get_records_sql('`mdl_book_chapters`', '(b.title LIKE '%".$text."%')OR(b.content LIKE '%".$text."%')', 'pagenum');
   // print_r($text);

?>