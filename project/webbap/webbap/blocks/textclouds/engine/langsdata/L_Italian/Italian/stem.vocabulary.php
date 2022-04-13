<?php

set_time_limit(0);

include('stem.class.php');

$stemmer = new ItalianStemmer();

$termine = file('vocabolario.txt');
foreach($termine as $parola) {
	$stemmed_word = $stemmer->stem($parola);
	echo sprintf("%-30s%s\n",trim($parola),$stemmed_word);
}

?>