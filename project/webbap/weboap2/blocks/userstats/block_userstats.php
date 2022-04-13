<?php

//*code from http://moodle.org/blocks/HOWTO.html-->
// Code adapted by J RICKARD <jrickard@penair.cornwall.sch.uk>

class block_userstats extends block_list {
    // The init() method does not need to change at all

    function init() {
	$this->title = get_string('userstats');
        $this->version = 2006150300;
	}
	
	function preferred_width() {
    // The preferred value is in pixels
    return 120;
}

function get_content() {
    if ($this->content !== NULL) {
        return $this->content;}

	$date=date("d.m.Y");

	global $CFG;
	
	$query='SELECT COUNT( * ) FROM `mdl_log` WHERE `time` > UNIX_TIMESTAMP( UTC_DATE ) AND `action` = "login"';
	$res = mysql_query($query);
	list($count) = mysql_fetch_row($res);
	
    $this->content->items = array();
 	$this->content->icons = array();
    $this->content->footer = "<div align='center'><p><strong>".$date." </strong><br /></p></div>";
	
	$Users =  count_records('user','deleted',0,'confirmed',1);
    $Courses = count_records('course','visible',1);
	
	$this->content->items[] = 
	
'<br /><table  border="0" align="center">
  	<tr>
    	<td width="133"> <div align="left">'.get_string('TotalUsers').' </div></td>
    	<td width="42"><div align="left">' .$Users. '</div></td>
  	</tr>
 	<!--<tr>
    	<td width="133"> <div align="left">'.get_string('TotalCourses').'</div></td>
    	<td><div align="left">'.$Courses.'</div></td>
  	</tr>-->
  	<tr>
    	<td width="133"> <div align="left">'.get_string('LoginToday').' </div></td>
    	<td><div align="left">'.$count.'</div></td>
  	</tr>
	<!--<tr>
    	<td width="133"> <div align="left">'.get_string('us_visitors').'</div></td>
    	<td><div align="left"> <a href="/blocks/userstats/details.php" target="_blank">'.get_string('us_detals').'</a> </div></td>    
  	</tr>-->
</table>';

    return $this->content;
}
}

?>