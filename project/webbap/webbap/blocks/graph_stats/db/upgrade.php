<?php  //$Id: upgrade.php, v 1 2007/08/21 E. Bugnet  Exp $

// This file keeps track of upgrades to 
// the graph_stats block
//
// Sometimes, changes between versions involve
// alterations to database structures and other
// major things that may break installations.
//
// The upgrade function in this file will attempt
// to perform all the necessary actions to upgrade
// your older installtion to the current version.
//
// If there's something it cannot do itself, it
// will tell you what you need to do.
//
// The commands in here will all be database-neutral,
// using the functions defined in lib/ddllib.php

function xmldb_block_graph_stats_upgrade($oldversion=0) {

    global $CFG, $THEME, $db;

    $result = true;
 
	if ($result && $oldversion < 2006051300) {
		
		$graphwidth->name = 'block_graph_stats_graphwidth';
		$graphwidth->value = 180;
		insert_record('config', $graphwidth);
		
		$graphheight->name = 'block_graph_stats_graphheight';
		$graphheight->value = 150;
		insert_record('config', $graphheight);
		
		$daysnb->name = 'block_graph_stats_daysnb';
		$daysnb->value = 30;	
		insert_record('config', $daysnb);
		
		$result = true;
	}
		
	if ($result && $oldversion < 2007082200) {
		
		$color1->name = 'block_graph_stats_color1';
		$color1->value = 'blue';
		insert_record('config', $color1);
		
		$color2->name = 'block_graph_stats_color2';
		$color2->value = 'green';
		insert_record('config', $color2);
		
		$multi->name = 'block_graph_stats_multi';
		$multi->value = 1;
		insert_record('config', $multi);
			
		$result = true;
	}

    return $result;
}

?>
