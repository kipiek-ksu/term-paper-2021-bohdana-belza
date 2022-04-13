<?php // $Id: assignment.class.php,v 1.7.14.1 2007/02/15 08:15:59 toyomoyo Exp $

/**
 * Extend the base assignment class for offline assignments
 *
 */
class assignment_offline extends assignment_base {

    function assignment_offline($cmid=0) {
        parent::assignment_base($cmid);
    }

    function display_lateness($timesubmitted) {
        return '';
    }
    function print_student_answer($studentid){
        return '';//does nothing!
    }
    
    function prepare_new_submission($userid) {
        $submission = new Object; 
        $submission->assignment   = $this->assignment->id;
        $submission->userid       = $userid;
        $submission->timecreated  = time(); // needed for offline assignments
        $submission->timemodified = $submission->timecreated;
        $submission->numfiles     = 0;
        $submission->data1        = '';
        $submission->data2        = '';
        $submission->grade        = -1;
        $submission->submissioncomment      = '';
        $submission->format       = 0;
        $submission->teacher      = 0;
        $submission->timemarked   = 0;
        $submission->mailed       = 0;
        return $submission;
    }
    
    // needed for the timemodified override
    function process_feedback() {

        global $USER;

        if (!$feedback = data_submitted()) {      // No incoming data?
            return false;
        }

        ///For save and next, we need to know the userid to save, and the userid to go
        ///We use a new hidden field in the form, and set it to -1. If it's set, we use this
        ///as the userid to store
        if ((int)$feedback->saveuserid !== -1){
            $feedback->userid = $feedback->saveuserid;
        }

        if (!empty($feedback->cancel)) {          // User hit cancel button
            return false;
        }

        $submission = $this->get_submission($feedback->userid, true);  // Get or make one

        $submission->grade      = $feedback->grade;
        $submission->submissioncomment    = $feedback->submissioncomment;
        $submission->format     = $feedback->format;
        $submission->teacher    = $USER->id;
        $submission->mailed     = 0;       // Make sure mail goes out (again, even)
        $submission->timemarked = time();

        unset($submission->data1);  // Don't need to update this.
        unset($submission->data2);  // Don't need to update this.

        if (empty($submission->timemodified)) {   // eg for offline assignments
            $submission->timemodified = time();
        }

        if (! update_record('assignment_submissions', $submission)) {
            return false;
        }

        add_to_log($this->course->id, 'assignment', 'update grades', 
                   'submissions.php?id='.$this->assignment->id.'&user='.$feedback->userid, $feedback->userid, $this->cm->id);
        
        return $submission;

    }

}

?>
