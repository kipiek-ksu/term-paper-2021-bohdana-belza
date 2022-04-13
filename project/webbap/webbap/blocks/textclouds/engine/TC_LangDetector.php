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

require_once "LangDetector.php";

class TC_LangDetector {
    private $lang;
    private $languages;

    public function TC_LangDetector($languages) {
        global $CFG;
        $this->languages = $languages;

        $dir = $CFG->dirroot . "/blocks/textclouds/engine/langsdata/";
        $this->lang = new LangDetector();


        foreach ($languages as $value) {
            $l = strip_tags(file_get_contents($dir ."L_".$value."/data.dic"));
            $this->lang->adddocument($l, $value);
        }
    }

    public function detect($text) {
        $langu = $this->lang->detect($text);
        if($langu=="") return "English";
        else return $langu;
    }
}
