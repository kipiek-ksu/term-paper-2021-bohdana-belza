<?php  // $Id: mod.php,v 1.4 2007/01/15 21:28:25 skodak Exp $

    if (!defined('MOODLE_INTERNAL')) {
        die('Direct access to this script is forbidden.');    ///  It must be included from a Moodle page
    }

    echo '<p>';
    $activityreport = get_string( 'activityreport' );
    echo "<a href=\"{$CFG->wwwroot}/course/report/outline/index.php?id={$course->id}\">";
    echo "$activityreport</a>\n";
    echo '</p>';
?>