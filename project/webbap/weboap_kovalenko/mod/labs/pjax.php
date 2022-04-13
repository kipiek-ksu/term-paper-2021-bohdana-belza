<?
require_once('../../config.php');
require_once('lib.php');

if ($_GET['curparent'] != "")
{
    $curparent = $_GET['curparent'];
   		$chapters = get_records_select('labs_chapters', '(subchapter = 1)and(parentchapter='.$curparent.')','pagenum', 'title, content, hidden');
		foreach ($chapters as $ch) {
			echo  $ch->title."<br/>";
		}
}
else { echo "none";}

?>