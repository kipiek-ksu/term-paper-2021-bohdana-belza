<?php
require_once "German/de_stemmer.php";
 
class StemGerman implements Stemmer_Interface {
      public function stem($word){
          $l = de_stemmer::de_stemmer_stem_list($word);
          return $l[$word];
      }
}
?>
