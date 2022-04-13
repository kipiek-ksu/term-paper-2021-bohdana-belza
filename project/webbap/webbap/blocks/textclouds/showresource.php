<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');


require('../../config.php');

GLOBAL $CFG;
$prfx = $CFG->prefix;
execute_sql("UPDATE " . $prfx . "tc_tag SET clickedtimes=clickedtimes+1 WHERE text='" . $_GET['tag'] . "' AND course_id=" . $_GET['course_id'], false);
?>


<html>
<head><title>Results for tag <?php echo $_GET['tag'] ?></title>
    <link rel="StyleSheet" href="<?php echo $CFG->wwwroot; ?>/blocks/textclouds/css/showresource.css"></link>
</head>

<body>
<table cellpadding="0" cellspacing="0" class="resource_table">
    <thead class="resource_head">
    <tr>
        <th>Name</th>
        <th>Reference</th>
        <th>Type</th>
        <th>Pertinence</th>
    </tr>
    </thead>

    <tbody>

    <?php
    $sql = "SELECT " . $prfx . "tc_tag_resource.resource_id," . $prfx . "resource.name," . $prfx . "resource.type," . $prfx . "resource.reference," . $prfx . "tc_tag_resource.weight, " . $prfx . "course_modules.id as resid FROM " . $prfx . "resource, " . $prfx . "tc_tag, " . $prfx . "tc_tag_resource, " . $prfx . "course_modules WHERE " . $prfx . "tc_tag.id=" . $prfx . "tc_tag_resource.tag_id AND " . $prfx . "tc_tag_resource.resource_id = " . $prfx . "resource.id AND " . $prfx . "tc_tag.course_id = " . $_GET['course_id'] . " AND " . $prfx . "resource.id = " . $prfx . "course_modules.instance AND " . $prfx . "course_modules.course = " . $_GET['course_id'] . " AND " . $prfx . "tc_tag.text='" . $_GET['tag'] . "' order by " . $prfx . "tc_tag_resource.weight desc";
    $files = get_recordset_sql($sql);
    
    $maxweight = get_field_sql("SELECT referstoquantity FROM ".$prfx."tc_tag WHERE ".$prfx."tc_tag.text='".$_GET['tag']."'");
    
    $count = 0;
    foreach ($files as $file) {
        if($count%2==0) echo "<tr class='elm_odd'>";
        else echo "<tr class='elm_even'>";
        $count++;
        echo "<td><a href='" . $CFG->wwwroot . "/mod/resource/view.php?id=" . $file['resid'] . "'>".$file['name']."</a></td>";
        echo "<td>" . $file['reference'] . "</td>";
        echo "<td>" . $file['type'] . "</td>";

        $pertinence = (int) (($file['weight'] / $maxweight) * 100);

        echo "<td>" . $pertinence . "%</td>";
        
        echo "</tr>";
    }

    ?>

    </tbody>
</table>

</body>
</html>


 
