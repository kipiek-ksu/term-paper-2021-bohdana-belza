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

DESCRIPTION:
This class analyses folders.

*/
require_once "TC_FileAnalyser.php";


class TC_FolderAnalyser {
    private $path;
    private $tags;
    private $filter;
    private $langdetector;


    public function TC_FolderAnalyser($path, $filter, $langdetector) {
        $this->path = $path;
        $this->filter = $filter;
        $this->langdetector = $langdetector;
        $this->extract();
    }

    private function extract() {
        $this->scanDir($this->path);

    }

    private function scanDir($path = '.', $level = 0) {
       $ignore = array( 'cgi-bin', '.', '..' );
        $dh = @opendir($path);
        // Open the directory to the handle $dh

        while (false !== ($file = readdir($dh))) {
            if( !in_array( $file, $ignore ) ){
                if (is_dir("$path/$file")) {
                    // Its a directory, so we need to keep reading down...
                    mtrace("---->Entering $path/$file");

                    $this->scanDir("$path/$file", ($level + 1));

                } else {
                   mtrace("----->Analysing $file");
                   $fan = new TC_FileAnalyser("$path/$file",$this->filter);
                   $lang = $this->langdetector->detect($fan->getText());
                   mtrace("------>Detected document language: $lang");
                   $fan->setLang($lang);
                   $result = $fan->getTags();
                   if($this->tags==null) $this->tags = array();
                   foreach($result as $name=>$freq){
                       if(array_key_exists($name,$this->tags)){
                           $this->tags[$name] += $freq;
                       }
                       else{
                           $this->tags[$name] = $freq;
                       }
                   }
                }
            }

        }

        closedir($dh);

    }

    public function getTags(){
        return $this->tags;
    }
}

?>
