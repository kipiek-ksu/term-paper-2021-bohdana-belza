<?PHP
/**
 * File for graphstat block, for Moodle
 * File contents : all needed to publish graph on the block
 * 
 * @author Eric Bugnet
 * @version $Id: graph.php, v 1 2007/08/21 E. Bugnet  Exp $
 * @license http://www.gnu.org/copyleft/gpl.html GNU Public License
 * @package planification module
 */
 
require_once("../../config.php");
require_once($CFG->libdir."/graphlib.php");
global $CFG;

$course_id = optional_param('course_id', 1, PARAM_INT);
$graphwidth = $CFG->block_graph_stats_graphwidth;
$graphheight = $CFG->block_graph_stats_graphheight;
$daysnb = $CFG->block_graph_stats_daysnb;
$color1 = $CFG->block_graph_stats_color1;
$color2 = $CFG->block_graph_stats_color2;
$multi = $CFG->block_graph_stats_multi;

$days = array();
$logs = array();
$logs_multi = array();
$a=0;
if ($course_id>1) { 
	For ($i=$daysnb;$i>-1;$i--) { // on compte les jours 
		$countgraph_multi = count_records_select('log', 'time > '.mktime(0, 0, 0, date("m") , date("d") - $i, date("Y")).' AND time < '.mktime(0, 0, 0, date("m") , date("d") - ($i-1), date("Y")).' AND action = "view" AND course = '.$course_id.' ', 'COUNT(DISTINCT(userid))');
		$days[$a] = '';
		$logs_multi[$a] = $countgraph_multi;
		$a = $a+1;
	}
} else {
	For ($i=$daysnb;$i>-1;$i--) { // on compte les jours 
		$countgraph = count_records_select('log', 'time > '.mktime(0, 0, 0, date("m") , date("d") - $i, date("Y")).' AND time < '.mktime(0, 0, 0, date("m") , date("d") - ($i-1), date("Y")).' AND action = "login"', 'COUNT(DISTINCT(userid))');
		$days[$a] = '';
		$logs[$a] = $countgraph;
		if ($multi==1) {
			$countgraph_multi = count_records_select('log', 'time > '.mktime(0, 0, 0, date("m") , date("d") - $i, date("Y")).' AND time < '.mktime(0, 0, 0, date("m") , date("d") - ($i-1), date("Y")).' AND action = "login"', 'COUNT(userid)');
			$logs_multi[$a] = $countgraph_multi;
		}
		$a = $a+1;
	}
}


$graph = new graph($graphwidth, $graphheight);
$graph->parameter['title'] 			= false;
$graph->x_data           			= $days;
$graph->y_data['logs']   			= $logs;
$graph->y_data['logs_multi']   		= $logs_multi;
if ($course_id>1) { 
	$graph->y_order 				= array('logs_multi');
} else {
	$graph->y_order 				= array('logs_multi','logs');
}
$graph->y_format['logs_multi'] 		= array('colour' => $color1,'bar' => 'fill','bar_size' => 0.6);
$graph->y_format['logs'] 			= array('colour' => $color2,'line' => 'line');
$graph->parameter['bar_spacing'] 	= 0;
$graph->parameter['y_label_left']   = '';
$graph->parameter['label_size']		= '1';
$graph->parameter['x_axis_angle']	= 90;
$graph->parameter['x_label_angle']  = 0;
$graph->parameter['tick_length'] 	= 0;
$graph->parameter['shadow']         = 'none'; 
error_reporting(5); // ignore most warnings such as font problems etc
$graph->draw_stack();

?>