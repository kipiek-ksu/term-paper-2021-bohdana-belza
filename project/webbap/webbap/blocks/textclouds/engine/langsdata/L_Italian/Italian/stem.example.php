<?php

include('stem.class.php');

$stemmer = new ItalianStemmer();

$parola = "mago";
$stemmed_word = $stemmer->stem($parola);
echo sprintf("%-30s%s\n", $parola, $stemmed_word);

$parola = "maga";
$stemmed_word = $stemmer->stem($parola);
echo sprintf("%-30s%s\n", $parola, $stemmed_word);

?>
