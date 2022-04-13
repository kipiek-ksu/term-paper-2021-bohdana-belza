<?PHP //$Id: block_graph_stats.php by E. Bugnet, from LiveStat block
	
/**
 * This block needs to be reworked.
 * The new roles system does away with the concepts of rigid student and
 * teacher roles.
 */

class block_graph_stats extends block_base {
    function init() {
        $this->title = get_string('title','block_graph_stats');
        $this->version = 2007082200;
    }
	
    function has_config() {return true;}	

	function get_content() {
		global $CFG,$COURSE;
		$daysnb = $CFG->block_graph_stats_daysnb;
		
		if($this->content !== NULL) {
			return $this->content;
		}
		
		$this->content = new stdClass;
		
		$this->content->footer = '';
		
		if (empty($this->instance)) {
			$this->content->text   = '';
			return $this->content;
		}

		$this->content->text = '<center><font size=1>'.get_string('graphtitle','block_graph_stats', $daysnb).'</center>';
		
		
		if ((isadmin()) OR (isteacher($COURSE->id))) {
			$name = 'popup';
			$title = get_string('connectedtoday','block_graph_stats');
			$url = '/blocks/'.$this->name().'/details.php';
			$options = 'menubar=0,location=0,scrollbars,resizable,width=400,height=500';
			$fullscreen = 0;
			$linkname =  '<img src="'.$CFG->wwwroot.'/blocks/'.$this->name().'/graph.php?course_id='.$COURSE->id.'" alt="'.get_string('graphtitle','block_graph_stats', $daysnb).'" />';
			$this->content->text .= '<center><a target="'. $name .'" title="'. $title .'" href="'. $CFG->wwwroot . $url .'" '. "onclick=\"return openpopup('$url', '$name', '$options', $fullscreen);\">$linkname</a></center>";
		} else {
			$this->content->text .= '<center><img src="'.$CFG->wwwroot.'/blocks/'.$this->name().'/graph.php?course_id='.$COURSE->id.'" alt="'.get_string('graphtitle','block_graph_stats', $daysnb).'" /></center>';
		}
		
		
		// Check if we are in a course or on the first page
		if ($COURSE->id>1) { 
			// In a course
			$connections = count_records_select('log', 'time > '.mktime(0, 0, 0, date("m") , date("d"), date("Y")).' AND action = "view" AND course = '.$COURSE->id.' ', 'COUNT(DISTINCT(userid))');
			$this->content->text .= '<center><font size=1>'.get_string('connectedtoday','block_graph_stats').$connections.'</font></center>';
			
		} else {
			// On the first page
			$connections = count_records_select('log', 'time > '.mktime(0, 0, 0, date("m") , date("d"), date("Y")).' AND action = "login"', 'COUNT(userid)');
			$this->content->text .= '<center><font size=1>'.get_string('connectedtoday','block_graph_stats').$connections.'</font></center>';
			// Show details
			$users = count_records('user','deleted',0,'confirmed',1);
			$courses = count_records('course','visible',1);
			$this->content->text .= '<hr />';
			$this->content->text .= get_string('membersnb','block_graph_stats').$users. '<br />';
			$this->content->text .= get_string('coursesnb','block_graph_stats').$courses.'<br />';
		}
		

			
			
	    return $this->content;
	}
}
?>