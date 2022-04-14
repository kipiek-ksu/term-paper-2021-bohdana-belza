<?php  //$Id: override.php,v 1.27.2.3 2007/03/06 22:03:18 skodak Exp $

    require_once('../../config.php');

    $contextid = required_param('contextid', PARAM_INT);   // context id
    $roleid    = optional_param('roleid', 0, PARAM_INT);   // requested role id
    $userid    = optional_param('userid', 0, PARAM_INT);   // needed for user tabs
    $courseid  = optional_param('courseid', 0, PARAM_INT); // needed for user tabs
    $cancel    = optional_param('cancel', 0, PARAM_BOOL);

    if (!$context = get_record('context', 'id', $contextid)) {
        error('Bad context ID');
    }

    if (!$sitecontext = get_context_instance(CONTEXT_SYSTEM)) {
        error('No site ID');
    }

    if ($context->id == $sitecontext->id) {
        error('Can not override base role capabilities');
    }

    if (!has_capability('moodle/role:override', $context)) {
        error('You do not have permission to change overrides in this context!');
    }

    if ($courseid) {
        if (!$course = get_record('course', 'id', $courseid)) {
            error('Bad course ID');
        }
    } else {
        $course = clone($SITE);
        $courseid = SITEID;
    }

    require_login($course);

    $baseurl = 'override.php?contextid='.$context->id;
    if (!empty($userid)) {
        $baseurl .= '&amp;userid='.$userid;
    }
    if ($courseid != SITEID) {
        $baseurl .= '&amp;courseid='.$courseid;
    }

    if ($cancel) {
        redirect($baseurl);
    }

/// needed for tabs.php
    $overridableroles = get_overridable_roles($context);
    $assignableroles  = get_assignable_roles($context);

/// Get some language strings

    $strroletooverride = get_string('roletooverride', 'role');
    $stroverrideusers  = get_string('overrideusers', 'role');
    $straction         = get_string('overrideroles', 'role');
    $strcurrentrole    = get_string('currentrole', 'role');
    $strcurrentcontext = get_string('currentcontext', 'role');
    $strparticipants   = get_string('participants');

/// Make sure this user can override that role

    if ($roleid) {
        if (!user_can_override($context, $roleid)) {
            error ('you can not override this role in this context');
        }
    }

    if ($userid) {
        $user = get_record('user', 'id', $userid);
        $fullname = fullname($user, has_capability('moodle/site:viewfullnames', $context));
    }

/// get all cababilities
    $capabilities = fetch_context_capabilities($context);

/// Process incoming role override
    if ($data = data_submitted() and $roleid and confirm_sesskey()) {
        $allowed_values = array(CAP_INHERIT, CAP_ALLOW, CAP_PREVENT, CAP_PROHIBIT);

        $localoverrides = get_records_select('role_capabilities', "roleid = $roleid AND contextid = $context->id",
                                             '', 'capability, permission, id');

        foreach ($capabilities as $cap) {

            if (!isset($data->{$cap->name})) {
                //cap not specified in form
                continue;
            }

            if (islegacy($data->{$cap->name})) {
                continue;
            }

            $capname = $cap->name;
            $value = clean_param($data->{$cap->name}, PARAM_INT);
            if (!in_array($value, $allowed_values)) {
                 continue;
            }

            if (isset($localoverrides[$capname])) {    // Something exists, so update it
                if ($value == CAP_INHERIT) {       // inherit = delete
                    delete_records('role_capabilities', 'roleid', $roleid, 'contextid', $context->id,
                                                        'capability', $capname);
                } else {
                    $localoverride = new object();
                    $localoverride->id = $localoverrides[$capname]->id;
                    $localoverride->permission = $value;
                    $localoverride->timemodified = time();
                    $localoverride->modifierid = $USER->id;
                    if (!update_record('role_capabilities', $localoverride)) {
                        error('Could not update a capability!');
                    }
                }

            } else { // insert a record
                if ($value != CAP_INHERIT) {    // Ignore inherits
                    $localoverride = new object();
                    $localoverride->capability = $capname;
                    $localoverride->contextid = $context->id;
                    $localoverride->roleid = $roleid;
                    $localoverride->permission = $value;
                    $localoverride->timemodified = time();
                    $localoverride->modifierid = $USER->id;
                    if (!insert_record('role_capabilities', $localoverride)) {
                        error('Could not insert a capability!');
                    }
                }
            }
        }
        redirect($baseurl);
    }


/// Print the header and tabs

    if ($context->contextlevel == CONTEXT_USER) {

        /// course header
        if ($course->id != SITEID) {
            print_header("$fullname", "$fullname",
                     "<a href=\"$CFG->wwwroot/course/view.php?id=$course->id\">$course->shortname</a> ->
                      <a href=\"$CFG->wwwroot/user/index.php?id=$course->id\">$strparticipants</a> -> <a href=\"$CFG->wwwroot/user/view.php?id=$userid&amp;course=$course->id\">$fullname</a> -> $straction",
                      "", "", true, "&nbsp;", navmenu($course));

        /// site header
        } else {
            print_header("$course->fullname: $fullname", $course->fullname,
                        "<a href=\"$CFG->wwwroot/user/view.php?id=$userid&amp;course=$course->id\">$fullname</a> -> $straction", "", "", true, "&nbsp;", navmenu($course));
        }
        $showroles = 1;
        $currenttab = 'override';
        include_once($CFG->dirroot.'/user/tabs.php');
    } else if ($context->contextlevel==CONTEXT_COURSE and $context->instanceid == SITEID) {
        require_once($CFG->libdir.'/adminlib.php');
        $adminroot = admin_get_root();
        admin_externalpage_setup('frontpageroles', $adminroot);
        admin_externalpage_print_header($adminroot);
        $currenttab = '';
        $tabsmode = 'override';
        include_once('tabs.php');
    } else {
        $currenttab = '';
        $tabsmode = 'override';
        include_once('tabs.php');
    }

    print_heading_with_help(get_string('overrides', 'role'), 'overrides');

    if ($roleid) {
    /// prints a form to swap roles
        echo '<div class="selector">';
        echo $strcurrentcontext.': '.print_context_name($context).'<br/>';
        $overridableroles = array('0'=>get_string('listallroles', 'role').'...') + $overridableroles;
        popup_form("$CFG->wwwroot/$CFG->admin/roles/override.php?userid=$userid&amp;courseid=$courseid&amp;contextid=$contextid&amp;roleid=",
            $overridableroles, 'switchrole', $roleid, '', '', '', false, 'self', $strroletooverride);
        echo '</div>';

        $parentcontexts = get_parent_contexts($context);
        if (!empty($parentcontexts)) {
            $parentcontext = array_shift($parentcontexts);
            $parentcontext = get_context_instance_by_id($parentcontext);
        } else {
            $parentcontext = $context; // site level in override??
        }

        $r_caps = role_context_capabilities($roleid, $parentcontext);

        $localoverrides = get_records_select('role_capabilities', "roleid = $roleid AND contextid = $context->id",
                                             '', 'capability, permission, id');

        $lang = str_replace('_utf8', '', current_language());

        if (!empty($capabilities)) {
            // Print the capabilities overrideable in this context
            print_simple_box_start('center');
            include_once('override.html');
            print_simple_box_end();

        } else {
            notice(get_string('nocapabilitiesincontext', 'role'),
                    $CFG->wwwroot.'/'.$CFG->admin.'/roles/'.$baseurl);
        }

    } else {   // Print overview table

        $table->tablealign = 'center';
        $table->cellpadding = 5;
        $table->cellspacing = 0;
        $table->width = '60%';
        $table->head = array(get_string('roles', 'role'), get_string('description'), get_string('overrides', 'role'));
        $table->wrap = array('nowrap', '', 'nowrap');
        $table->align = array('right', 'left', 'center');

        foreach ($overridableroles as $roleid => $rolename) {
            $countusers = 0;
            $overridecount = count_records_select('role_capabilities', "roleid = $roleid AND contextid = $context->id");
            $description = format_string(get_field('role', 'description', 'id', $roleid));
            $table->data[] = array('<a href="'.$baseurl.'&amp;roleid='.$roleid.'">'.$rolename.'</a>', $description, $overridecount);
        }

        print_table($table);
    }

    if ($context->contextlevel == CONTEXT_SYSTEM or ($context->contextlevel==CONTEXT_COURSE and $context->instanceid == SITEID)) {
        admin_externalpage_print_footer($adminroot);
    } else {
        print_footer($course);
    }

?>
