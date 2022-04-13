<?php

require_once "Spanish/stemm_es.php";
 
class StemSpanish implements Stemmer_Interface {
     public function stem($word){
         return stemm_es::stemm($word);
     }
}
