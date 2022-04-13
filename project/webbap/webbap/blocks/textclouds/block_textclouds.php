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
This is the main class of Text Clouds Block.

*/
require_once 'engine/TC_FileAnalyser.php';
require_once 'engine/TC_TextAnalyser.php';
require_once 'engine/TC_FolderAnalyser.php';
require_once 'engine/TC_StopWordsFilter.php';
require_once 'engine/TC_LangDetector.php';
require_once 'engine/Stemmer_Interface.php';
require_once 'engine/null_stemmer.php';

require_once 'TextCloudsRenderer.php';

class block_textclouds extends block_base {
    function init() {
        $this->title = "Text Clouds";
        $this->version = 2010112916;
        $this->cron = 10;
        $this->debug = false;
    }

    function get_content() {
        global $COURSE;
        if ($this->content != NULL) {
            return $this->content;
        }


        if (empty($this->config->numtags)) {
            $this->config->numtags = 30;
        }

        if (empty($this->config->minsize)) {
            $this->config->minsize = 15;
        }

        if (empty($this->config->usecolors)) {
            $this->config->usecolors = false;
            ;
        }

        $renderer = new TextCloudsRenderer($COURSE->id, $this->config->minsize, $this->config->numtags, $this->config->usecolors);
        $this->content = new stdClass;

        $this->content->text = $renderer->getHTML();
        $this->content->footer = "";

    }

    function instance_allow_config() {
        return true;
    }

    function cron() {
        error_reporting(E_ALL);
        ini_set('display_errors', '1');
        $SOFFICE_PATH = "";
        $SOFFICE_HOST = "127.0.0.1";
        $SOFFICE_PORT = "8100";
        include_once "soffice_config.php";

        shell_exec($SOFFICE_PATH . " -headless -accept='socket,host=" . $SOFFICE_HOST . ",port=" . $SOFFICE_PORT . ";urp;' -nofirststartwizard");

        global $CFG;
        $prfx = $CFG->prefix;

        $block_id = get_record_sql("SELECT * FROM " . $prfx . "block WHERE name='textclouds'")->id;
        if($this->debug)mtrace("\n***** Text Clouds Cron Function *****");
        if($this->debug)mtrace("->Text clouds block has id " . $block_id);

        if($this->debug)mtrace("->Looking for languages installed");
        $directory = opendir($CFG->dirroot . "/blocks/textclouds/engine/langsdata/");

        while ($entryName = readdir($directory)) {

            if (substr($entryName, 0, 2) == "L_") {
                $languages[] = substr($entryName, 2);
            }
        }

        if($this->debug)mtrace("-->Found " . count($languages) . " languages.");
        if($this->debug)mtrace("-->Looking for stemming engines...");
        $stem = array();

        foreach ($languages as $element) {
            $fpath = $CFG->dirroot . "/blocks/textclouds/engine/langsdata/L_" . $element . "/Stem" . $element . ".php";
            if (file_exists($fpath)) {
                require_once $fpath;
                //$ref = new ReflectionClass('Stem' . $element);
                //if (in_array("Stemmer_Interface", $ref->getInterfaceNames()))
                    //$stem[$element] = $ref->newInstance();
                    //$stem[$element] = $ref->newInstanceArgs();
                    $namec = "Stem".$element;
                    $stem[$element] = new $namec;
                //else mtrace("*** ERROR: Class Stem" . $element . " does not seem to be a valid stemming engine. WIll be ignored.");

            }

        }

        
        if($this->debug)mtrace("-->Loaded " . count($stem) . " stemming engines");


        if($this->debug)mtrace("->Starting course processing");

        $detector = new TC_LangDetector($languages);

        $tc_rs = get_recordset_sql("SELECT pageid FROM " . $prfx . "block_instance WHERE blockid=" . $block_id);

        foreach ($tc_rs as $tc_sc) {
            if($this->debug)mtrace("-->Processing course with id=" . $tc_sc['pageid']);
            $tc_filter = new TC_StopWordsFilter($tc_sc['pageid']);
            $sql = "SELECT DISTINCT " . $prfx . "resource.id, " . $prfx . "resource.name, " . $prfx . "resource.alltext," . $prfx . "resource.reference," . $prfx . "resource.type FROM " . $prfx . "resource," . $prfx . "course_modules WHERE " . $prfx . "resource.id = " . $prfx . "course_modules.instance AND " . $prfx . "resource.id NOT IN (SELECT res_id FROM " . $prfx . "tc_resource) AND " . $prfx . "resource.course = " . $tc_sc['pageid'] . " AND " . $prfx . "course_modules.visible=1";
            if($this->debug)mtrace("\n$sql");
            $files = get_recordset_sql($sql);
            foreach ($files as $singlefile) {
                if ($singlefile['type'] == 'file') {
                    if($this->debug)mtrace("--->Processing file " . $singlefile['reference']);
                	$name = strtolower($CFG->dataroot . '/' . $tc_sc['pageid'] . '/' . $singlefile['reference']);
            		$chk = strpos($name,".doc")+strpos($name,".ppt")+strpos($name,".xls")+strpos($name,".od")+strpos($name,".pdf")+strpos($name,".doc")+strpos($name,".txt")+strpos($name,".rtf");
            		if($chk==0){
            			if($this->debug)mtrace("---->This file is not indexable because has an unknown format");
            		}
            		else{
	                    $analyser = new TC_FileAnalyser($CFG->dataroot . '/' . $tc_sc['pageid'] . '/' . $singlefile['reference'], $tc_filter);
	                    $lang = $detector->detect($analyser->getText());
	                    if($this->debug)mtrace("---->Detected document language: " . $lang);
	                    $analyser->setLang($lang);
	                    $this->elaborate_tags($analyser->getTags(), $singlefile['id'], $tc_sc['pageid'], $lang, $stem);
	                    
	                    execute_sql("INSERT INTO " . $prfx . "tc_resource(res_id,alreadytagged,toremove,language) VALUES(" . $singlefile['id'] . ",1,0,'" . $lang . "')", false);
                        if($this->debug)mtrace("\nINSERT INTO " . $prfx . "tc_resource(res_id,alreadytagged,toremove,language) VALUES(" . $singlefile['id'] . ",1,0,'" . $lang . "')");
            		}
                }
                else if ($singlefile['type'] == 'directory') {
                    if($this->debug)mtrace("--->Processing directory " . $singlefile['reference']);
                    $analyser = new TC_FolderAnalyser($CFG->dataroot . '/' . $tc_sc['pageid'] . "/" . $singlefile['reference'], $tc_filter, $detector);
                    $this->elaborate_tags($analyser->getTags(), $singlefile['id'], $tc_sc['pageid'], "---", $stem);
                    execute_sql("INSERT INTO " . $prfx . "tc_resource(res_id,alreadytagged,toremove,language) VALUES(" . $singlefile['id'] . ",1,0,'---')", false);
                    if($this->debug)mtrace("\nINSERT INTO " . $prfx . "tc_resource(res_id,alreadytagged,toremove,language) VALUES(" . $singlefile['id'] . ",1,0,'---')");
                }
                else {
                    if($this->debug)mtrace("--->Processing text " . $singlefile['name']);
                    $analyser = new TC_TextAnalyser($singlefile['alltext'], $tc_filter);
                    $lang = $detector->detect($analyser->getText());
                    if($this->debug)mtrace("---->Detected document language: " . $lang);
                    $analyser->setLang($lang);
                    $this->elaborate_tags($analyser->getTags(), $singlefile['id'], $tc_sc['pageid'], $lang, $stem);
                    execute_sql("INSERT INTO " . $prfx . "tc_resource(res_id,alreadytagged,toremove,language) VALUES(" . $singlefile['id'] . ",1,0,'" . $lang . "')", false);
                    if($this->debug)mtrace("\nINSERT INTO " . $prfx . "tc_resource(res_id,alreadytagged,toremove,language) VALUES(" . $singlefile['id'] . ",1,0,'" . $lang . "')");
                }
            }
        }

        if($this->debug)mtrace("->Looking for resources to detag because of user decision");
        
        $tc_rs = get_recordset_sql("SELECT * FROM " . $prfx . "resource," . $prfx . "tc_resource WHERE " . $prfx . "resource.id=" . $prfx . "tc_resource.res_id AND toremove=1 AND alreadytagged=1");

        foreach ($tc_rs as $res) {
            $rid = $res["res_id"];
            execute_sql("DELETE FROM " . $prfx . "tc_tag_resource WHERE resource_id=" . $rid, false);
            execute_sql("UPDATE " . $prfx . "tc_resource SET alreadytagged=0 WHERE res_id=" . $rid, false);
        }

        if($this->debug)mtrace("->Looking for resources to detag because were deleted");

        $tc_rs = get_recordset_sql("select res_id from " . $prfx . "tc_resource where res_id not in (select id from " . $prfx . "resource)");

        foreach ($tc_rs as $res) {
            $rid = $res["res_id"];
            execute_sql("DELETE FROM " . $prfx . "tc_tag_resource WHERE resource_id=" . $rid, false);
            execute_sql("DELETE FROM " . $prfx . "tc_resource WHERE res_id=" . $rid, false);
        }

        if($this->debug)mtrace("->Looking for resources to detag because are hided");

        $tc_rs = get_recordset_sql("select " . $prfx . "tc_resource.res_id from " . $prfx . "tc_resource, " . $prfx . "course_modules where " . $prfx . "tc_resource.res_id = " . $prfx . "course_modules.instance and " . $prfx . "course_modules.visible = 0");

        foreach ($tc_rs as $res) {
            $rid = $res["res_id"];
            execute_sql("DELETE FROM " . $prfx . "tc_tag_resource WHERE resource_id=" . $rid, false);
            execute_sql("DELETE FROM " . $prfx . "tc_resource WHERE res_id=" . $rid, false);
        }


        if($this->debug)mtrace("->looking for resources to detag because Text Clouds block was removed on a course");

        $tc_rs = get_recordset_sql("SELECT " . $prfx . "tc_resource.res_id FROM " . $prfx . "tc_resource, " . $prfx . "tc_tag_resource, " . $prfx . "tc_tag WHERE " . $prfx . "tc_resource.res_id = " . $prfx . "tc_tag_resource.resource_id AND " . $prfx . "tc_tag_resource.tag_id = " . $prfx . "tc_tag.id AND " . $prfx . "tc_tag.course_id NOT IN (SELECT pageid FROM " . $prfx . "block_instance WHERE blockid=" . $block_id . ") ");

        foreach ($tc_rs as $res) {
            $rid = $res["res_id"];
            execute_sql("DELETE FROM " . $prfx . "tc_tag_resource WHERE resource_id=" . $rid, false);
            execute_sql("DELETE FROM " . $prfx . "tc_resource WHERE res_id=" . $rid, false);
        }

        execute_sql("DELETE FROM " . $prfx . "tc_stopwords_add WHERE course NOT IN (SELECT pageid FROM " . $prfx . "block_instance WHERE blockid=" . $block_id . ") ", false);
        execute_sql("DELETE FROM " . $prfx . "tc_stopwords_remove WHERE course NOT IN (SELECT pageid FROM " . $prfx . "block_instance WHERE blockid=" . $block_id . ") ", false);


        if($this->debug)mtrace("->Starting maintenance");

        // Calculating tag weights
        if($this->debug)mtrace("-->Calculating tag weights...");
        $tags = get_recordset_sql("SELECT * FROM " . $prfx . "tc_tag");

        foreach ($tags as $tag) {
            $sum = get_recordset_sql("SELECT SUM(weight) as totalWeight FROM " . $prfx . "tc_tag_resource WHERE tag_id=" . $tag['id']);
            foreach ($sum as $ssum) {
                if ($ssum['totalWeight'] == 0) execute_sql("DELETE FROM " . $prfx . "tc_tag WHERE id=" . $tag['id'], false);
                else execute_sql("UPDATE " . $prfx . "tc_tag SET referstoquantity=" . $ssum['totalWeight'] . " WHERE id=" . $tag['id'], false);
            }
        }


        if($this->debug)mtrace("***** Done with Text Clouds Cron *****");

    }

    function getStemmer($stem, $lang) {
        if ($lang == '---') return new null_stemmer();
        if (array_key_exists($lang, $stem)) return $stem[$lang];
        else return $stem["English"];
    }

    function elaborate_tags($tags, $resource_id, $course_id, $lang, $stem) {
        error_reporting(E_ALL);
        ini_set('display_errors', '1');
        global $CFG;
        $prfx = $CFG->prefix;
        $count = 0;
        foreach ($tags as $word => $times) {
            if ($count == 50) break;
            $count++;
            $n = count_records_sql("SELECT COUNT(*) FROM " . $prfx . "tc_tag WHERE text LIKE '" . $this->getStemmer($stem, $lang)->stem($word) . "%' AND course_id=" . $course_id . "");
            if ($n != 0) {
                $tagid = get_record_sql("SELECT id FROM " . $prfx . "tc_tag WHERE text LIKE'" . $this->getStemmer($stem, $lang)->stem($word) . "%' AND course_id=" . $course_id, false);

                $exist = count_records_sql("SELECT COUNT(*) FROM " . $prfx . "tc_tag_resource WHERE resource_id=" . $resource_id . " AND tag_id=" . $tagid->id);
                if ($exist == 0)
                    execute_sql("INSERT INTO " . $prfx . "tc_tag_resource(resource_id,tag_id,weight) VALUES (" . $resource_id . "," . $tagid->id . "," . $times . ")", false);
                else execute_sql("UPDATE " . $prfx . "tc_tag_resource SET weight=weight+" . $times . " WHERE resource_id=" . $resource_id . " AND tag_id=" . $tagid->id, false);
            }
            else {
                execute_sql("INSERT INTO " . $prfx . "tc_tag(text,course_id) VALUES('" . $word . "','" . $course_id . "')", false);
                $tagid = get_record_sql("SELECT id FROM " . $prfx . "tc_tag WHERE text='" . $word . "' AND course_id=" . $course_id);
                execute_sql("INSERT INTO " . $prfx . "tc_tag_resource(resource_id,tag_id,weight) VALUES(" . $resource_id . "," . $tagid->id . "," . $times . ")", false);
            }


        }
    }


}

?>