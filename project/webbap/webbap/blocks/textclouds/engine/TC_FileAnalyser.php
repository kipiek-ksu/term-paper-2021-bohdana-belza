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
This class analyses and index files

*/
	class TC_FileAnalyser{
		private $text;
		private $tags;
		private $path;
		private $filter;
        private $lang;
        

		
		public function TC_FileAnalyser($path,$filter){
			$this->path = $path;
			$this->filter = $filter;
			$this->extract();
		}

        public function setLang($lang){
            $this->lang = $lang;
            $this->executeFiltering();
        }
		
		private function extract(){
            global $CFG;
            $hasela =false;
            $ext = substr($this->path,strrpos($this->path,".")+1);
            
            if($ext=="doc"||$ext=="ppt"||$ext=="xls"){
               require_once "lib/OldOfficeParser.php";
               $parser = new OldOfficeParser();
               $this->text = $parser->parse($this->path);
            }
            else if($ext=="pdf"){
               require_once "lib/PDFParser.php";
               $parser = new PDFParser();
               $this->text = $parser->parse($this->path);

            }
            else if($ext=="odt"||$ext=="odp"||$ext=="ods"){
               require_once "lib/OpenOfficeParser.php";
               $parser = new OpenOfficeParser();
               $this->text = $parser->parse($this->path);
            }
            else if($ext=="pptx"){
            	require_once "lib/PPTXParser.php";
            	$parser = new PPTXParser();
            	$this->text = $parser->parse($this->path);           
            }
            else if($ext=="docx"){
            	require_once 'lib/DOCXParser.php';
            	$parser = new DOCXParser();
            	$this->text = $parser->parse($this->path);   
            }
            else if($ext=="xlsx"){
               require_once "lib/XLSXParser.php";
               $parser = new XSLXParser();
               $this->text = $parser->parse($this->path);
            }
            else $this->text="";
			// Cleaning

			$what = array("\r\n","\n","\r");
			$with = " ";
			$this->text = str_replace($what, $with, $this->text);
		}
		
		private function executeFiltering(){
			$this->text = preg_replace('/\W/', ' ', $this->text);
			
			$tokens = explode(" ", $this->text);
			$this->tags = $this->filter->filter($tokens,$this->lang);
			
			arsort($this->tags);
		}
		
		public function getText(){
			return $this->text;
		}
		
		public function getPath(){
			return $this->path;
		}
		
		public function setPath($path){
			$this->path = $path;
			$this->extract();
		}
		
		public function getTags(){
			if($this->tags==null) $this->extract();
			return $this->tags;
		}
	}
?>