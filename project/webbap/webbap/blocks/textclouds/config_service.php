<?php

header("Content-type: text/xml");

require('../../config.php');

global $CFG;
$prfx = $CFG->prefix;

$req = $_GET["action"];
$cid = $_GET["courseid"];

if ($req == "list") {
    $doc = new DOMDocument();
    $doc->formatOutput = TRUE;

    $root = $doc->createElement("resources");
    $doc->appendChild($root);

    $sql = "SELECT * FROM " . $prfx . "resource WHERE course=" . $cid;
    $files = get_recordset_sql($sql);

    foreach ($files as $singlefile) {

        $elm = $doc->createElement("resource");
        $e = $doc->createElement("name");
        $e->appendChild($doc->createTextNode($singlefile['name']));
        $elm->appendChild($e);
        $e = $doc->createElement("type");
        $e->appendChild($doc->createTextNode($singlefile['type']));
        $elm->appendChild($e);
        $e = $doc->createElement("id");
        $e->appendChild($doc->createTextNode($singlefile['id']));
        $elm->appendChild($e);
    	

        $sql2 = "SELECT * FROM " . $prfx . "tc_resource WHERE res_id=" . $singlefile['id'];
        $present = count_records_sql($sql2);
        $isinvisible = get_field_sql("SELECT visible FROM " . $prfx . "course_modules WHERE instance=" . $singlefile['id']);

        if ($isinvisible == 0) {
            $status = "Invisible";
            $e = $doc->createElement("language");
            $e->appendChild($doc->createTextNode("Unknown"));
            $elm->appendChild($e);
        }
        else if ($present == 0) {
            $status = "Pending"; // $elm->setAttribute("status", "Disabled");

            $e = $doc->createElement("language");
            $e->appendChild($doc->createTextNode("Unknown"));
            $elm->appendChild($e);
        }
        else {
            $istagged = get_field_sql("SELECT alreadytagged FROM " . $prfx . "tc_resource WHERE res_id=" . $singlefile['id']);
            $isremoved = get_field_sql("SELECT toremove FROM " . $prfx . "tc_resource WHERE res_id=" . $singlefile['id']);
            $language = get_field_sql("SELECT language FROM " . $prfx . "tc_resource WHERE res_id=" . $singlefile['id']);

            $e = $doc->createElement("language");
            if ($language == "") $language = "Unknown";
            $e->appendChild($doc->createTextNode($language));
            $elm->appendChild($e);

        	
            if ($isremoved == 1) {
                if ($istagged == 1)$status = "Pending Removal";
                else $status = "Disabled";
            }
            else {
                if ($istagged == 1)$status = "Processed";
                else $status = "Pending";
            }
        }
    		$name = strtolower($singlefile['reference']);
            $chk = strpos($name,".doc")+strpos($name,".ppt")+strpos($name,".xls")+strpos($name,".od")+strpos($name,".pdf")+strpos($name,".doc")+strpos($name,".txt")+strpos($name,".rtf");
            
            if($chk==0&&$singlefile['type']=='file'){
              $status = "Unsupported";
            }
        $e = $doc->createElement("status");
        $e->appendChild($doc->createTextNode($status));
        $elm->appendChild($e);


        $root->appendChild($elm);
    }
    echo $doc->saveXML();
}

else if ($req == "index") {
    $what = $_GET["resid"];
    $result = execute_sql("DELETE FROM " . $prfx . "tc_resource WHERE res_id=" . $what, false);
    $doc = new DOMDocument();
    $doc->formatOutput = TRUE;
    $root = $doc->createElement("response");
    $doc->appendChild($root);
    $root->setAttribute("result", $result);
    echo $doc->saveXML();
}

else if ($req == "deindex") {
    $what = $_GET["resid"];

    $sql2 = "SELECT * FROM " . $prfx . "tc_resource WHERE res_id=" . $what;

    $present = count_records_sql($sql2);
    if ($present == 0) $result = execute_sql("INSERT INTO " . $prfx . "tc_resource(res_id,alreadytagged,toremove) VALUES(" . $what . ",0,1)", false);
    else $result = execute_sql("UPDATE " . $prfx . "tc_resource SET toremove=1 WHERE res_id=" . $what, false);
    $doc = new DOMDocument();
    $doc->formatOutput = TRUE;
    $root = $doc->createElement("response");
    $doc->appendChild($root);
    $root->setAttribute("result", $result);
    echo $doc->saveXML();
}

else if($req == "listwords"){
    $doc = new DOMDocument();
    $doc->formatOutput = TRUE;

    $root = $doc->createElement("words");
    $doc->appendChild($root);

    $sql = "SELECT word FROM " . $prfx . "tc_stopwords_add WHERE course=" . $cid;
    $files = get_recordset_sql($sql);

    foreach ($files as $singlefile) {

        $elm = $doc->createElement("add");
        $elm->appendChild($doc->createTextNode($singlefile['word']));
        $root->appendChild($elm);
    }

    $sql = "SELECT word FROM " . $prfx . "tc_stopwords_remove WHERE course=" . $cid;
    $files = get_recordset_sql($sql);

    foreach ($files as $singlefile) {

        $elm = $doc->createElement("remove");
        $elm->appendChild($doc->createTextNode($singlefile['word']));
        $root->appendChild($elm);
    }
    echo $doc->saveXML();
}

else if($req == "removeword"){
    $doc = new DOMDocument();
    $doc->formatOutput = TRUE;

    $where=$_GET["fromlist"];
    $word=$_GET["word"];
    $isok = 0;
    if($where=="admit"){
        execute_sql("delete from ".$prfx."tc_stopwords_remove WHERE word='".$word."' AND course=".$cid,false);
        $isok=1;
    }
    else if ($where=="block"){
        execute_sql("delete from ".$prfx."tc_stopwords_add WHERE word='".$word."' AND course=".$cid,false);
        $isok=1;
    }

    $root = $doc->createElement("response");
    $doc->appendChild($root);
    $root->setAttribute("result", $isok);
    echo $doc->saveXML();

}

else if($req == "addword"){
    $doc = new DOMDocument();
    $doc->formatOutput = TRUE;

    $where=$_GET["fromlist"];
    $word=$_GET["word"];
    $isok = 0;
    if($where=="admit"){
        execute_sql("insert into ".$prfx."tc_stopwords_remove(word,course) VALUES ('".$word."',".$cid.")",false);
        execute_sql("delete from ".$prfx."tc_stopwords_add WHERE word='".$word."' AND course=".$cid,false);
        $isok=1;
    }
    else if ($where=="block"){
        execute_sql("insert into ".$prfx."tc_stopwords_add(word,course) VALUES ('".$word."',".$cid.")",false);
        execute_sql("delete from ".$prfx."tc_stopwords_remove WHERE word='".$word."' AND course=".$cid,false);
        $isok=1;
    }

    $root = $doc->createElement("response");
    $doc->appendChild($root);
    $root->setAttribute("result", $isok);
    echo $doc->saveXML();
}

?>