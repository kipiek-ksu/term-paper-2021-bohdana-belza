<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
require "../../config.php";

    global $CFG;
    $prfx = $CFG->prefix;
    $docid = $_GET['docid'];
    $doc_name = get_record_sql("SELECT name FROM ".$prfx."resource WHERE id=".$docid)->name;
    $course = get_record_sql("SELECT course FROM ".$prfx."resource WHERE id=".$docid)->course;
    $action = $_GET['action'];
    $message="";
    $iserror=false;
    if($action=="remove"){
        $tagid=$_GET['tagid'];
        $res = execute_sql("DELETE FROM ".$prfx."tc_tag_resource WHERE tag_id=".$tagid." AND resource_id=".$docid,false);
        if($res) {
            $message=get_string("tagref_success","block_textclouds");
            $iserror=false;
        }
        else {
            $message=get_string("tagref_error","block_textclouds");
            $iserror=true;
        }

    }
else if($action=="update"){
    $weight = $_GET['weight'];
    $tagid = $_GET['tagid'];
    $res = execute_sql("UPDATE ".$prfx."tc_tag_resource SET weight=".$weight." WHERE resource_id = ".$docid." AND tag_id=".$tagid,false);
    if($res){
            $message=get_string("tagrefupd_success1","block_textclouds").$doc_name.get_string("tagrefupd_success2","block_textclouds");
            $iserror=false;
        }
        else {
            $message=get_string("tagrefupd_error","block_textclouds");
            $iserror=true;
        }
}

else if($action=="add"){
    $newtag = $_GET['newtag'];
    $newweight = $_GET['newweight'];
    if($newtag==""||$newweight==0){
        $message = get_string("tagempty","block_textclouds");
        $iserror = true;
    }
    else{
         $found = get_record_sql("SELECT * FROM ".$prfx."tc_tag WHERE text='".$newtag."'");
         if($found==false){
             execute_sql("INSERT INTO ".$prfx."tc_tag(text,course_id) VALUES('".$newtag."',".$course.")",false);
         }

         $id = get_record_sql("SELECT * FROM ".$prfx."tc_tag WHERE text='".$newtag."'")->id;

         $check = get_record_sql("SELECT * FROM ".$prfx."tc_tag_resource WHERE tag_id=".$id." AND resource_id=".$docid);
         if($check==false){
             execute_sql("INSERT INTO ".$prfx."tc_tag_resource(tag_id,resource_id,weight) VALUES (".$id.",".$docid.",".$newweight.")",false);
             $message=get_string("tagadd_success","block_textclouds");
             $iserror=false;
         }

        else{
           $message=get_string("tagadd_error","block_textclouds");
           $iserror=true; 
        }
    }
}

?>


<html>

<head>
   <title><?php print_string("managemod","block_textclouds"); echo " ".$doc_name;?></title>
    <link rel="StyleSheet" href="<?php echo $CFG->wwwroot; ?>/blocks/textclouds/css/managedocument.css"/>
</head>
<body>
<?php
if($message!=""){
    ?>
    <div class="<?php if($iserror) echo 'error_message'; else echo 'ok_message';?>" align="center" width="100%">
        <?php echo $message; ?>
    </div>
    <?php
}
?>
    <div class="resource_div">
        <table class="resource_table" cellpadding="0" cellspacing="0">
            <thead class="resource_head">
                <th>Tag</th>
                <th><?php print_string("newtag_weight","block_textclouds");?> </th>
                <th><?php print_string("newtag_remove","block_textclouds");?></th>
            </thead>
            <tbody id="table_body">
            <?php
            $tr = get_recordset_sql("SELECT ".$prfx."tc_tag.id, ".$prfx."tc_tag.text, ".$prfx."tc_tag_resource.weight FROM ".$prfx."tc_tag, ".$prfx."tc_tag_resource WHERE ".$prfx."tc_tag.id = ".$prfx."tc_tag_resource.tag_id AND ".$prfx."tc_tag_resource.resource_id=".$docid." ORDER BY ".$prfx."tc_tag_resource.weight DESC");
            if($tr==false) echo "Errore";
            $count=0;
            foreach($tr as $elm){
                $count++;
                if($count%2==0) echo "<tr class='elm_odd'>";
                else echo "<tr class='elm_even'>";
                    echo "<td>";
                         echo $elm["text"];
                    echo "</td>";
                echo "<td><div class='update_commands'>";
                echo "<form method='GET' action='".$CFG->wwwroot."/blocks/textclouds/managedocument.php'>";
                echo "<input type='hidden' name='docid' value='".$docid."'/>";
                echo "<input type='hidden' name='tagid' value='".$elm['id']."'/>";
                echo "<input type='hidden' name='action' value='update'/>";
                echo "<input type='text' name='weight' size=2 value='".$elm["weight"]."'/>";
                echo "<input type='submit' value='".get_string("newtag_update","block_textclouds")."'/>";
                echo "</form></div></td>";
                echo "<td><a href='".$CFG->wwwroot."/blocks/textclouds/managedocument.php?action=remove&docid=".$docid."&tagid=".$elm["id"]."'>".get_string("newtag_remove","block_textclouds")."</a></td>";
                echo "</tr>";
            }

            ?>
            </tbody>
        </table>
    </div>
    <div class="new_tag_form">
        <form method="GET" action="<?php echo $CFG->wwwroot."/blocks/textclouds/managedocument.php"; ?>">
             <b><?php print_string("newtag_head","block_textclouds");?> </b><br>
             <input type='hidden' name='docid' value='<?php echo $docid; ?>'/>
             <input type='hidden' name='action' value='add'/>
             <?php print_string("newtag_text","block_textclouds");?>  <input type="text" name="newtag" size=10 />
             <?php print_string("newtag_weight","block_textclouds");?>   <input type="text" name="newweight" size=2 />
            <input type="submit" value="add"/>
        </form>
    </div>
</body>
</html>


 
