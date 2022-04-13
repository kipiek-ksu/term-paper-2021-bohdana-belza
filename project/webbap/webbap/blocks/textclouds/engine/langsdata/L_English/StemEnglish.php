<?php
require_once "English/porterstemmer.php";
 
class StemEnglish implements Stemmer_Interface {

    public function stem($word){
        return PorterStemmer::Stem($word);
    }


}

?>
