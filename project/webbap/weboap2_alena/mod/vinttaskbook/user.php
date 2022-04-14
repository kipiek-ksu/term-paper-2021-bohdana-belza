<?php // $Id: user.php,v 1.21.2.5 2007/07/13 03:04:25 moodler Exp $

// Display user activity reports for a course

    require_once('../../config.php');
    require_once('lib.php');

    $course  = required_param('course', PARAM_INT);          // course id
    $id      = optional_param('id', 0, PARAM_INT);           // user id
    $mode    = optional_param('mode', 'posts', PARAM_ALPHA);
    $page    = optional_param('page', 0, PARAM_INT);
    $perpage = optional_param('perpage', 5, PARAM_INT);

    if (empty($id)) {         // See your own profile by default
        require_login();
        $id = $USER->id;
    }

    if (! $user = get_record("user", "id", $id)) {
        error("User ID is incorrect");
    }

    if (! $course = get_record("course", "id", $course)) {
        error("Course id is incorrect.");
    }

    $syscontext = get_context_instance(CONTEXT_SYSTEM, SITEID);
    $usercontext   = get_context_instance(CONTEXT_USER, $id);
    
    // do not force parents to enrol
    if (!get_record('role_assignments', 'userid', $USER->id, 'contextid', $usercontext->id)) {
        require_course_login($course);
    }

    add_to_log($course->id, "forum", "user report", "user.php?id=$course->id&amp;user=$user->id&amp;mode=$mode", "$user->id"); 

    $strforumposts   = get_string('forumposts', 'forum');
    $strparticipants = get_string('participants');
    $strmode         = get_string($mode, 'forum');
    $fullname        = fullname($user, has_capability('moodle/site:viewfullnames', $syscontext));

    if ($course->id != SITEID) {
        print_header("$course->shortname: $fullname: $strmode", $course->fullname,
                 "<a href=\"$CFG->wwwroot/course/view.php?id=$course->id\">$course->shortname</a> ->
                  <a href=\"$CFG->wwwroot/user/index.php?id=$course->id\">$strparticipants</a> ->
                  <a href=\"$CFG->wwwroot/user/view.php?id=$user->id&amp;course=$course->id\">$fullname</a> -> 
                  $strforumposts -> $strmode");
    } else {
        print_header("$course->shortname: $fullname: $strmode", $course->fullname,
                 "<a href=\"$CFG->wwwroot/user/view.php?id=$user->id&amp;course=$course->id\">$fullname</a> -> 
                  $strforumposts -> $strmode");
    }

    $currenttab = 'vinttaskbook';
    $showroles = 1;
    include($CFG->dirroot.'/user/tabs.php');   /// Prints out tabs as part of user page



    $solutions = get_records('vinttaskbook_solutions', 'userid', $id);
    echo solution_user_table($solutions);
    /*
    echo '<div class="user-content">';
    
    if ($course->id == SITEID) {
        if (empty($CFG->forceloginforprofiles) || isloggedin()) {
            // Search throughout the whole site.
            $searchcourse = 0;
        } else {
            $searchcourse = SITEID;
        }
    } else {
        // Search only for posts the user made in this course.
        $searchcourse = $course->id;
    }
    
    // Get the posts.
    if ($posts = forum_search_posts($searchterms, $searchcourse, $page*$perpage, $perpage, 
                                    $totalcount, $extrasql)) {
        
        print_paging_bar($totalcount, $page, $perpage, 
                         "user.php?id=$user->id&amp;course=$course->id&amp;mode=$mode&amp;perpage=$perpage&amp;");
        
        foreach ($posts as $post) {
    
            if (! $discussion = get_record('forum_discussions', 'id', $post->discussion)) {
                error('Discussion ID was incorrect');
            }
            if (! $forum = get_record('forum', 'id', "$discussion->forum")) {
                error("Could not find forum $discussion->forum");
            }
            
            $fullsubject = "<a href=\"view.php?f=$forum->id\">".format_string($forum->name,true)."</a>";
            if ($forum->type != 'single') {
                $fullsubject .= " -> <a href=\"discuss.php?d=$discussion->id\">".format_string($discussion->name,true)."</a>";
                if ($post->parent != 0) {
                    $fullsubject .= " -> <a href=\"discuss.php?d=$post->discussion&amp;parent=$post->id\">".format_string($post->subject,true)."</a>";
                }
            }
            
            $context = get_context_instance(CONTEXT_SYSTEM, SITEID);
            if ($course->id == SITEID && has_capability('moodle/site:config', $context)) {
                $postcoursename = get_field('course', 'shortname', 'id', $forum->course);
                $fullsubject = '<a href="'.$CFG->wwwroot.'/course/view.php?id='.$forum->course.'">'.$postcoursename.'</a> -> '. $fullsubject;
            }

            $post->subject = $fullsubject;

            $fulllink = "<a href=\"discuss.php?d=$post->discussion#p$post->id\">".
                         get_string("postincontext", "forum")."</a>";

            forum_print_post($post, $course->id, false, false, false, false, $fulllink);
            echo "<br />";
        }
    
        print_paging_bar($totalcount, $page, $perpage, 
                         "user.php?id=$user->id&amp;course=$course->id&amp;mode=$mode&amp;perpage=$perpage&amp;");
    } else {
        if ($mode == 'posts') {
            print_heading(get_string('noposts', 'forum'));
        } else {
            print_heading(get_string('nodiscussionsstartedby', 'forum'));
        }
    }
    echo '</div>';*/
    print_footer($course);

?>
