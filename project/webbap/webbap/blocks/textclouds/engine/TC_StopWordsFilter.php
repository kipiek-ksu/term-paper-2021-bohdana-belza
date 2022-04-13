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

class TC_StopWordsFilter{
		
		private $tokens_list;
		private $specializer;
        private $course_id;
        private $course_remove;
        private $course_add;

        public function TC_StopWordsFilter($course_id){
            global $CFG;
            $prfx = $CFG->prefix;
            $this->course_id = $course_id;
            $this->course_add = array();
            $this->course_remove = array();
            
            $sql = "SELECT word FROM ".$prfx."tc_stopwords_add WHERE course=".$course_id;
            $rs = get_recordset_sql($sql);
            foreach($rs as $se){
                $this->course_add[] = $se['word'];
            }

            $sql = "SELECT word FROM ".$prfx."tc_stopwords_remove WHERE course=".$course_id;
            $rs = get_recordset_sql($sql);
            foreach($rs as $se){
                $this->course_remove[] = $se['word'];
            }
            
        }


		public function filter($arr,$lang){
            global $CFG;
            $tkn = file($CFG->dirroot.'/blocks/textclouds/engine/langsdata/L_'.$lang."/stopwords.txt",FILE_SKIP_EMPTY_LINES) or die("Errore");
            //$ela1 = array_diff($tkn,$this->course_remove);
            //$ela2 = array_merge($ela1,$this->course_add);
            $ela2 = array_merge($tkn,$this->course_add);
            //$this->tokens_list = array_unique($ela2);
          
			$final = array();
			foreach($ela2 as $word){
				$word = trim($word);
				if(!in_array(strtolower($word), $this->course_remove)){
					$final[] = strtolower($word);
				}

			}
			
			$this->tokens_list = array_unique($final);
			

			$tmp =array();
			foreach($arr as $num => $line){
				if($this->isStopped($arr[$num])==false){
					if(trim(strtolower($line))!="")
					if(is_numeric($line)==false)
					if(array_key_exists(trim(strtolower($line)), $tmp)){
						$tmp[trim(strtolower($line))] = $tmp[trim(strtolower($line))]+1;
					}
					else{
						$tmp[trim(strtolower($line))] = 1;
					}
				}
			}
			return $tmp;
		}
		
		private function isStopped($word){
			foreach ($this->tokens_list as $n => $s){
				if(trim(strtolower($this->tokens_list[$n]))==trim(strtolower($word))) return true;
			}
			return false;
		}
		
		public function accept($specializer){
			$this->specializer = $specializer;
			$this->tokens_list = $specializer->visit($this->tokens_list);
		}
	}
?>