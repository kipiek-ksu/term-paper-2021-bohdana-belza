<?php  /// $Id $
       /// Load IMS required Javascript libraries, adding them
       /// before the standard one ($standard_javascript)

    if (!defined('MOODLE_INTERNAL')) {
        die('Direct access to this script is forbidden.');    ///  It must be included from a Moodle page
    }

/// We use this globals to be able to generate the proper JavaScripts
    global $jsarg, $standard_javascript;

/// Load IMS needed JavaScript
/// The dummy LMS API hack to stop some SCORM packages giving errors.
    echo "<script type=\"text/javascript\" src=\"$CFG->wwwroot/mod/resource/type/ims/dummyapi.js\"></script>\n";
/// The resize iframe script
    echo "    <script type=\"text/javascript\" src=\"$CFG->wwwroot/mod/resource/type/ims/resize.js\"></script>\n";
    echo "    <script type=\"text/javascript\">
        window.onresize = function() {
            resizeiframe($jsarg);
        };
        window.name='ims-cp-page';

        // Set Interval until ims-contentframe or ims-contentframe-no-nav is available
        function waiting() {
            var cf   = document.getElementById('ims-contentframe');
            var cfnv = document.getElementById('ims-contentframe-no-nav');

            if (cf || cfnv) {
                resizeiframe($jsarg);
                clearInterval(ourInterval);
                return true;
            }
            return false;
        }

        var ourInterval = setInterval('waiting()', 100);
    </script>\n";

/// Load standard JavaScript
    include("$standard_javascript");
?>
