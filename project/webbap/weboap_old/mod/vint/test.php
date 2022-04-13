<?php  // $Id: view.php,v 1.4 2006/08/28 16:41:20 mark-nielsen Exp $
/**
 * This page prints a particular instance of vint
 * 
 * @author 
 * @version $Id: view.php,v 1.4 2006/08/28 16:41:20 mark-nielsen Exp $
 * @package vint
 **/

/// (Replace vint with the name of your module)

echo execProgram("dir");

function execProgram ($prog = "") {
    // Declare my variables
    $out = $search_results = "";

    // Run the NT find command - search all files in the current working directory
    exec ($prog, $command_output);
    
    // Loop through the lines of output one line at a time
    foreach ($command_output as $line) {
		echo $line;
		echo "<br/>";
    }
}

?>
  ?>
Test
<?php

/// Finish the page

?>
