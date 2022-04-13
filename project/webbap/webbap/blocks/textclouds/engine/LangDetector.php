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
This class is used to detect a document language for indexing.

*/
class LangDetector {
        private $index = array();
        private $languages = array();

        public function addDocument($document, $language) {
                if(!isset($this->languages[$language])) {
                        $this->languages[$language] = 0;
                }

                $words = $this->getWords($document);
                foreach($words as $match) {
                        $trigrams = $this->getNgrams($match);
                        foreach($trigrams as $trigram) {
                                if(!isset($this->index[$trigram])) {
                                        $this->index[$trigram] = array();
                                }
                                if(!isset($this->index[$trigram][$language])) {
                                        $this->index[$trigram][$language] = 0;
                                }
                                $this->index[$trigram][$language]++;
                        }
                        $this->languages[$language] += count($trigrams);
                }
        }

        public function detect($document) {
                $words = $this->getWords($document);
                $trigrams = array();
                foreach($words as $word) {
                        foreach($this->getNgrams($word) as $trigram) {
                                if(!isset($trigrams[$trigram])) {
                                        $trigrams[$trigram] = 0;
                                }
                                $trigrams[$trigram]++;
                        }
                }
                $total = array_sum($trigrams);

                $scores = array();
                foreach($trigrams as $trigram => $count) {
                        if(!isset($this->index[$trigram])) {
                                continue;
                        }
                        foreach($this->index[$trigram] as $language => $lCount) {
                                if(!isset($scores[$language])) {
                                        $scores[$language] = 0;
                                }
                                $score = ($lCount / $this->languages[$language])
                                                        * ($count / $total);
                                $scores[$language] += $score;
                        }
                }
                arsort($scores);
                return key($scores);
        }

        private function getWords($document) {
                $document = strtolower($document);
                preg_match_all('/\w+/', $document, $matches);
                return $matches[0];
        }

        private function getNgrams($match, $n = 3) {
                $ngrams = array();
                $len = strlen($match);
                for($i = 0; $i < $len; $i++) {
                        if($i > ($n - 2)) {
                                $ng = '';
                                for($j = $n-1; $j >= 0; $j--) {
                                        $ng .= $match[$i-$j];
                                }
                                $ngrams[] = $ng;
                        }
                }
                return $ngrams;
        }
}
?>