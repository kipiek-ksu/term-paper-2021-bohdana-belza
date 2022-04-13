<?php
require_once "Stemmer_Interface.php";

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
This mock class is an implementation of Stemmer_Interface used when Text Clouds has to index a document in a language where a stemmer is not provided.
*/
class null_stemmer implements Stemmer_Interface {
    public function stem($word){
        return $word;
    }

}
