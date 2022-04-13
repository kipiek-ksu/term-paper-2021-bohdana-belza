<?php
require_once "Italian/stem.class.php";
 
class StemItalian implements Stemmer_Interface{

    private $stemmer;

    public function StemItalian(){
        $this->stemmer = new ItalianStemmer();
    }
    public function stem($word){
        return $this->stemmer->stem($word);
    }
}

?>
