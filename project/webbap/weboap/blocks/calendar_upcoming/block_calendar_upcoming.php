<?PHP //$Id: block_calendar_upcoming.php,v 1.26.6.1 2007/05/06 04:26:37 martinlanghoff Exp $

class block_calendar_upcoming extends block_base {
    function init() {
        $this->title = get_string('upcomingevents', 'calendar');
        $this->version = 2004052600;
    }

    function get_content() {
        global $USER, $CFG, $SESSION, $COURSE;
        $cal_m = optional_param( 'cal_m', 0, PARAM_INT );
        $cal_y = optional_param( 'cal_y', 0, PARAM_INT );

        require_once($CFG->dirroot.'/calendar/lib.php');

        if ($this->content !== NULL) {
            return $this->content;
        }
        // Initialize the session variables
        calendar_session_vars();
        $this->content = new stdClass;
        $this->content->text = '';

        if (empty($this->instance)) { // Overrides: use no course at all
        
            $courseshown = false;
            $filtercourse = array();
            $this->content->footer = '';

        } else {
            $courseshown = $COURSE->id;
            $this->content->footer = '<br /><a href="'.$CFG->wwwroot.
                                     '/calendar/view.php?view=upcoming&amp;course='.$courseshown.'">'.
                                      get_string('gotocalendar', 'calendar').'</a>...';
            $context = get_context_instance(CONTEXT_COURSE, $courseshown);
            if (has_capability('moodle/calendar:manageentries', $context) ||
                has_capability('moodle/calendar:manageownentries', $context)) {
                $this->content->footer .= '<br /><a href="'.$CFG->wwwroot.
                                          '/calendar/event.php?action=new&amp;course='.$courseshown.'">'.
                                           get_string('newevent', 'calendar').'</a>...';
            } 
            if ($courseshown == SITEID) {
                // Being displayed at site level. This will cause the filter to fall back to auto-detecting
                // the list of courses it will be grabbing events from.
                $filtercourse = NULL;
            } else {
                // Forcibly filter events to include only those from the particular course we are in.
                $filtercourse = array($courseshown => 1);
            }
        }

        // We 'll need this later
        calendar_set_referring_course($courseshown);

        // Be VERY careful with the format for default courses arguments!
        // Correct formatting is [courseid] => 1 to be concise with moodlelib.php functions.

        calendar_set_filters($courses, $group, $user, $filtercourse, $filtercourse, false);
        $events = calendar_get_upcoming($courses, $group, $user, 
                                        get_user_preferences('calendar_lookahead', CALENDAR_UPCOMING_DAYS), 
                                        get_user_preferences('calendar_maxevents', CALENDAR_UPCOMING_MAXEVENTS));

        if (!empty($this->instance)) { 
            $this->content->text = calendar_get_sideblock_upcoming($events, 
                                   'view.php?view=day&amp;course='.$courseshown.'&amp;');
        }

        if (empty($this->content->text)) {
            $this->content->text = '<div class="post">'.
                                   get_string('noupcomingevents', 'calendar').'</div>';
        }

        return $this->content;
    }
}

?>
