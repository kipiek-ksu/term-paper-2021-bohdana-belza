<?php  // $Id: default.php,v 1.6 2006/04/05 05:53:22 gustav_delius Exp $ 

////////////////////////////////////////////////////////////////////
/// Default class for report plugins                            
///                                                               
/// Doesn't do anything on it's own -- it needs to be extended.   
/// This class displays quiz reports.  Because it is called from 
/// within /mod/quiz/report.php you can assume that the page header
/// and footer are taken care of.
/// 
/// This file can refer to itself as report.php to pass variables 
/// to itself - all these will also be globally available.  You must 
/// pass "id=$cm->id" or q=$quiz->id", and "mode=reportname".
////////////////////////////////////////////////////////////////////

// Included by ../report.php

class quiz_default_report {

    function display($cm, $course, $quiz) {     /// This function just displays the report
        return true;
    }

    function print_header_and_tabs($cm, $course, $quiz, $reportmode="overview", $meta=""){
        global $CFG;
    /// Define some strings
        $strquizzes = get_string("modulenameplural", "quiz");
        $strquiz  = get_string("modulename", "quiz");
    /// Print the page header
        print_header_simple(format_string($quiz->name), "",
                     "<a href=\"index.php?id=$course->id\">$strquizzes</a>
                      -> ".format_string($quiz->name),
                     '', $meta, true, update_module_button($cm->id, $course->id, $strquiz), navmenu($course, $cm));
    /// Print the tabs    
        $currenttab = 'reports';
        $mode = $reportmode;
        include('tabs.php');
    }
}

?>
