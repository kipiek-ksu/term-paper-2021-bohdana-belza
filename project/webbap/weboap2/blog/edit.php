<?php //$Id: edit.php,v 1.43.2.1 2007/03/19 07:51:13 toyomoyo Exp $

require_once('../config.php');
include_once('lib.php');

$action   = required_param('action', PARAM_ALPHA);
$id       = optional_param('id', 0, PARAM_INT);
$confirm  = optional_param('confirm', 0, PARAM_BOOL);
$courseid = optional_param('courseid', 0, PARAM_INT); // needed for user tab - does nothing here

require_login();

if (empty($CFG->bloglevel)) {
    error('Blogging is disabled!');
}

if (isguest()) {
    error(get_string('noguestpost', 'blog'));
}

$sitecontext = get_context_instance(CONTEXT_SYSTEM, SITEID);
if (!has_capability('moodle/blog:create', $sitecontext) and !has_capability('moodle/blog:manageentries', $sitecontext)) {
    error('You can not post or edit blogs.');
}

// Make sure that the person trying to edit have access right
if ($id) {
    if (!$existing = get_record('post', 'id', $id)) {
        error('Wrong blog post id');
    }

    if (!blog_user_can_edit_post($existing)) {
        error(get_string('notallowedtoedit', 'blog'));
    }
    $userid    = $existing->userid;
    $returnurl = $CFG->wwwroot.'/blog/index.php?userid='.$existing->userid;
} else {
    if (!has_capability('moodle/blog:create', $sitecontext)) {
        error(get_string('nopost', 'blog')); // manageentries is not enough for adding
    }
    $existing  = false;
    $userid    = $USER->id;
    $returnurl = 'index.php?userid='.$USER->id;
}
if (!empty($courseid)) {
    $returnurl .= '&amp;courseid='.$courseid;
}


$strblogs = get_string('blogs','blog');

if ($action=='delete'){
    if (!$existing) {
        error('Incorrect blog post id');
    }
    if (data_submitted() and $confirm and confirm_sesskey()) {
        do_delete($existing);
        redirect($returnurl);
    } else {
        $optionsyes = array('id'=>$id, 'action'=>'delete', 'confirm'=>1, 'sesskey'=>sesskey(), 'courseid'=>$courseid);
        $optionsno = array('userid'=>$existing->userid, 'courseid'=>$courseid);
        print_header("$SITE->shortname: $strblogs", $SITE->fullname);
        blog_print_entry($existing);
        echo '<br />';
        notice_yesno(get_string('blogdeleteconfirm', 'blog'), 'edit.php', 'index.php', $optionsyes, $optionsno, 'post', 'get');
        print_footer();
        die;
    }
}

require_once('edit_form.php');
$blogeditform = new blog_edit_form(null, compact('existing', 'sitecontext'));

if ($blogeditform->is_cancelled()){
    redirect($returnurl);
} else if ($blogeditform->no_submit_button_pressed()) {
    no_submit_button_actions($blogeditform, $sitecontext);


} else if ($fromform = $blogeditform->get_data()){
    //save stuff in db
    switch ($action) {
        case 'add':
            do_add($fromform, $blogeditform);
        break;

        case 'edit':
            if (!$existing) {
                error('Incorrect blog post id');
            }
            do_edit($fromform, $blogeditform);
        break;
        default :
            error('Unknown action!');
    }
    redirect($returnurl);
}


// gui setup
switch ($action) {
    case 'add':
        // prepare new empty form
        $post->publishstate = 'draft';
        $strformheading = get_string('addnewentry', 'blog');
        $post->action       = $action;
    break;

    case 'edit':
        if (!$existing) {
            error('Incorrect blog post id');
        }
        $post->id           = $existing->id;
        $post->subject      = $existing->subject;
        $post->summary      = $existing->summary;
        $post->publishstate = $existing->publishstate;
        $post->format       = $existing->format;
        $post->action       = $action;
        $strformheading = get_string('updateentrywithid', 'blog');

        if ($ptags = get_records_sql_menu("SELECT t.id, t.text FROM
                                     {$CFG->prefix}tags t,
                                     {$CFG->prefix}blog_tag_instance bti
                                     WHERE t.id = bti.tagid
                                     AND t.type = 'personal'
                                     AND bti.entryid = {$post->id}")) {

            $post->ptags = implode(', ', $ptags);
        } else {
            //$idsql = " AND bti.entryid = 0";
            //was used but seems redundant.
            $post->ptags = '';
        }
        if ($otags = get_records_sql_menu("SELECT t.id, t.text FROM
                                     {$CFG->prefix}tags t,
                                     {$CFG->prefix}blog_tag_instance bti
                                     WHERE t.id = bti.tagid
                                     AND t.type = 'official'
                                     AND bti.entryid = {$post->id}")){
            $post->otags = array_keys($otags);
        }
    break;
    default :
        error('Unknown action!');
}

// done here in order to allow deleting of posts with wrong user id above
if (!$user = get_record('user', 'id', $userid)) {
    error('Incorrect user id');
}

print_header("$SITE->shortname: $strblogs", $SITE->fullname,
                '<a href="'.$CFG->wwwroot.'/user/view.php?id='.$userid.'">'.fullname($user).'</a> ->
                <a href="'.$CFG->wwwroot.'/blog/index.php?userid='.$userid.'">'.$strblogs.'</a> -> '.$strformheading,'','',true);
$blogeditform->set_data($post);
$blogeditform->display();


print_footer();


die;

/*****************************   edit.php functions  ***************************/
function no_submit_button_actions(&$blogeditform, $sitecontext){
    $mform =& $blogeditform->_form;
    $data = $mform->exportValues();
    //sesskey has been checked already no need to check that
    //check for official tags to add
    if (!empty($data['addotags']) && !empty($data['otagsadd'])){ // adding official tag
        $error = add_otag($data['otagsadd']);
    }
    if (!empty($error)){
        $mform->setElementError('otagsgrp', $error);
    }
    if (!empty($data['deleteotags']) && !empty($data['otags'])){ // adding official tag
        delete_otags($data['otags'], $sitecontext);
    }
    $blogeditform->otags_select_setup();
}

function delete_otags($tagids, $sitecontext){
    foreach ($tagids as $tagid) {

        if (!$tag = get_record('tags', 'id', $tagid)) {
            error('Can not delete tag, tag doesn\'t exist');
        }

        if ($tag->type == 'official' and !has_capability('moodle/blog:manageofficialtags', $sitecontext)) {
            //can not delete
            error('Can not delete tag, you don\'t have permission to delete an official tag');
        }

        if ($tag->type == 'personal' and !has_capability('moodle/blog:managepersonaltags', $sitecontext)) {
            //can not delete
            error('Can not delete tag, you don\'t have permission to delete a personal tag');
        }

        // Delete the tag itself
        if (!delete_records('tags', 'id', $tagid)) {
            error('Can not delete tag');
        }

        // Deleteing all references to this tag
        if (!delete_records('blog_tag_instance', 'tagid', $tagid)) {
            error('Can not delete blog tag instances');
        }


    }
}

function add_otag($otag){
    global $USER;
    $error = '';
    if ($tag = get_record('tags', 'text', $otag)) {
        if ($tag->type == 'official') {
            // official tag already exist
            $error = get_string('tagalready');
        } else {
            $tag->type = 'official';
            update_record('tags', $tag);
            $tagid = $tag->id;
        }
    } else { // Brand new offical tag

        $tag = new object();
        $tag->userid = $USER->id;
        $tag->text   = $otag;
        $tag->type   = 'official';

        if (!$tagid = insert_record('tags', $tag)) {
            error('Can not create tag!');
        }
    }
    return $error;
}

/*
* Delete blog post from database
*/
function do_delete($post) {
    global $returnurl;

    $status = delete_records('post', 'id', $post->id);
    $status = delete_records('blog_tag_instance', 'entryid', $post->id) and $status;
    
    blog_delete_old_attachments($post);
    
    add_to_log(SITEID, 'blog', 'delete', 'index.php?userid='. $post->userid, 'deleted blog entry with entry id# '. $post->id);

    if (!$status) {
        error('Error occured while deleting post', $returnurl);
    }
}

/**
 * Write a new blog entry into database
 */
function do_add($post, $blogeditform) {
    global $CFG, $USER, $returnurl;

    $post->module       = 'blog';
    $post->userid       = $USER->id;
    $post->lastmodified = time();
    $post->created      = time();

    // Insert the new blog entry.
    if ($id = insert_record('post', $post)) {
        $post->id = $id;
        // add blog attachment
        $dir = blog_file_area_name($post);
        if ($blogeditform->save_files($dir) and $newfilename = $blogeditform->get_new_filename()) {
            set_field("post", "attachment", $newfilename, "id", $post->id);
        }
        add_tags_info($post->id);
        add_to_log(SITEID, 'blog', 'add', 'index.php?userid='.$post->userid.'&postid='.$post->id, $post->subject);

    } else {
        error('There was an error adding this post in the database', $returnurl);
    }

}

/**
 * @param . $post argument is a reference to the post object which is used to store information for the form
 * @param . $bloginfo_arg argument is reference to a blogInfo object.
 * @todo complete documenting this function. enable trackback and pingback between entries on the same server
 */
function do_edit($post, $blogeditform) {

    global $CFG, $USER, $returnurl;


    $post->lastmodified = time();

    $dir = blog_file_area_name($post);
    if ($blogeditform->save_files($dir) and $newfilename = $blogeditform->get_new_filename()) {
        $post->attachment = $newfilename;
    }

    // update record
    if (update_record('post', $post)) {
        // delete all tags associated with this entry
        delete_records('blog_tag_instance', 'entryid', $post->id);
        // add them back
        add_tags_info($post->id);


        add_to_log(SITEID, 'blog', 'update', 'index.php?userid='.$post->userid.'&postid='.$post->id, $post->subject);

    } else {
        error('There was an error updating this post in the database', $returnurl);
    }
}

/**
 * function to attach tags into a post
 * @param int postid - id of the blog
 */
function add_tags_info($postid) {

    global $USER;

    $post = get_record('post', 'id', $postid);

    $tag = new object();
    $tag->entryid = $post->id;
    $tag->userid = $post->userid;
    $tag->timemodified = time();

    /// Attach official tags
    if ($otags = optional_param('otags', '', PARAM_INT)) {
        foreach ($otags as $otag) {
            $tag->tagid = $otag;
            insert_record('blog_tag_instance', $tag);
        }
    }

    /// Attach Personal Tags
    if ($ptags = optional_param('ptags', '', PARAM_NOTAGS)) {
        $ptags = explode(',', $ptags);
        foreach ($ptags as $ptag) {
            $ptag = trim($ptag);
            // check for existance
            // it does not matter whether it is an offical tag or personal tag
            // we do not want to have 1 copy of offical tag and 1 copy of personal tag (for the same tag)
            if ($ctag = get_record('tags', 'text', $ptag)) {
                $tag->tagid = $ctag->id;
                insert_record('blog_tag_instance', $tag);
            } else { // create a personal tag
                $ctag = new object;
                $ctag->userid = $USER->id;
                $ctag->text = $ptag;
                $ctag->type = 'personal';
                if ($tagid = insert_record('tags', $ctag)) {
                    $tag->tagid = $tagid;
                    insert_record('blog_tag_instance', $tag);
                }
            }
        }
    }
}
?>