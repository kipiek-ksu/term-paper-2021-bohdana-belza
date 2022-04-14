<?php // $Id: jsclock.php,v 1.5 2007/01/03 14:44:54 moodler Exp $
defined('MOODLE_INTERNAL') or die('Direct access to this script is forbidden.');
?>

<script text="text/javascript">
//<![CDATA[
/// This Javascript clock provides a little countdown in the title bar

var timerID = null;
var timerRunning = false;
var secondsleft = <?php echo $secondsleft ?>;
var titleafter  = '<?php echo format_string($quiz->name) ?>';
var titlebefore = '<?php echo get_string("countdown", "quiz").": " ?>';
var alertmessage  = '<?php print_string("countdownfinished", "quiz") ?>';
var alertmessage10  = '<?php print_string("countdowntenminutes", "quiz") ?>';

function stopclock() {
    if (timerRunning) {
        clearTimeout(timerID);
        timerRunning = false;
    }
}

function startclock() {
    stopclock();
    showtime();
}

function showtime() {

    secondsleft = secondsleft - 1;

    if (secondsleft == 600) {
        alert(alertmessage10);
    }

    if (secondsleft == 0) {
        stopclock();
        document.title = titleafter;
        return alert(alertmessage);

    } else {
        current = secondsleft;

        var hours = Math.floor( current / 3600 );
        current = current - (hours*3600);

        var minutes =   Math.floor( current / 60 );
        current = current - (minutes*60);

        var seconds = current;

        var timeValue = "" + hours;
        timeValue  += ((minutes < 10) ? ":0" : ":") + minutes;
        timeValue  += ((seconds < 10) ? ":0" : ":") + seconds;

        document.title = titlebefore+timeValue+' '+titleafter;
        timerID = setTimeout("showtime()",1000);
        timerRunning = true;
    }
}

document.onLoad = startclock();


//]]>
</script>
