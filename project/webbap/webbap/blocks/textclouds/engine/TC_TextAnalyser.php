<?php
/*
This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.
You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA

AUTHOR:
- Andrea Baldassari (andrea DOT baldassari AT supsi DOT ch

*/

class TC_TextAnalyser {

    private $tags;
    private $data;
    private $filter;
    private $lang;

    public function TC_TextAnalyser($data, $filter) {
        $this->data = $data;
        $this->filter = $filter;
    }

    public function setLang($lang){
        $this->lang = $lang;
        $this->executeFiltering();
    }

    private function extract() {
        $this->data = html_entity_decode($this->data);
        $this->data = preg_replace("#<[^>]*>#", "", $this->data);
        $what = array("\r\n", "\n", "\r");
        $with = " ";
        $this->data = str_replace($what, $with, $this->data);


    }

    private function executeFiltering() {
        $this->data = html_entity_decode($this->data);
        $this->data = strip_tags($this->data);
        $this->data = preg_replace("/<!--(.*?)-->/","",$this->data);
        $this->data = preg_replace("/&lt;/","<",$this->data);
        $this->data = preg_replace("/&gt;/",">",$this->data);
        $this->data = preg_replace('/\W/', ' ', $this->data);

        $tokens = explode(" ", $this->data);
        $this->tags = $this->filter->filter($tokens,$this->lang);

        arsort($this->tags);
    }

    public function getTags() {
        if ($this->tags == null) $this->extract();
        return $this->tags;
    }

    public function getText(){
        return $this->data;
    }


}
