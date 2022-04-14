<?php
// $Id: forgot_password.php,v 1.38.2.4 2007/03/22 12:40:23 skodak Exp $
// forgot password routine.
// find the user and call the appropriate routine for their authentication
// type.

require_once('../config.php');
require_once('forgot_password_form.php');

$p_secret   = optional_param('p', false, PARAM_RAW);
$p_username = optional_param('s', false, PARAM_RAW);

httpsrequired();

$sitecontext = get_context_instance(CONTEXT_SYSTEM);

// setup text strings
$strforgotten = get_string('passwordforgotten');
$strlogin     = get_string('login');

// if you are logged in then you shouldn't be here!
if (isloggedin() and !isguestuser()) {
    redirect($CFG->wwwroot.'/index.php', get_string('loginalready'), 5);
}

if ($p_secret !== false) {
///=====================
/// user clicked on link in email message
///=====================

    update_login_count();

    $user = get_complete_user_data('username', $p_username);

    if (!empty($user) and $user->secret === '') {
        print_header($strforgotten, $strforgotten,
            "<a href=\"{$CFG->wwwroot}/login/index.php\">{$strlogin}</a>->{$strforgotten}");
        error(get_string('secretalreadyused'));

    } else if (!empty($user) and $user->secret == stripslashes($p_secret)) {
        // make sure that url relates to a valid user

        // check this isn't guest user
        // TODO: add change password capability so that we can prevent participants to change password
        if (has_capability('moodle/legacy:guest', $sitecontext, $user->id, false)) {
            error('You cannot reset the guest password');
        }

        // override email stop and mail new password
        $user->emailstop = 0;
        if (!reset_password_and_mail($user)) {
            error('Error resetting password and mailing you');
        }

        // Clear secret so that it can not be used again
        $user->secret = '';
        if (!set_field('user', 'secret', $user->secret, 'id', $user->id)) {
            error('Error resetting user secret string');
        }

        reset_login_count();

        $changepasswordurl = "{$CFG->httpswwwroot}/login/change_password.php";
        $a = new object();
        $a->email = $user->email;
        $a->link = $changepasswordurl;

        print_header($strforgotten, $strforgotten,
            "<a href=\"{$CFG->wwwroot}/login/index.php\">{$strlogin}</a>->{$strforgotten}");
        notice(get_string('emailpasswordsent', '', $a), $changepasswordurl);

    } else {
        print_header($strforgotten, $strforgotten,
            "<a href=\"{$CFG->wwwroot}/login/index.php\">{$strlogin}</a>->{$strforgotten}");
        error(get_string('forgotteninvalidurl'));
    }

    die; //never reached
}

$mform = new login_forgot_password_form();

if ($mform->is_cancelled()) {
    redirect($CFG->httpswwwroot.'/login/index.php');

} else if ($data = $mform->get_data()) {
/// find the user in the database and mail info

    // first try the username
    if (!empty($data->username)) {
        $user = get_complete_user_data('username', $data->username);
    } else {

        $user = get_complete_user_data('email', $data->email);
    }

    if ($user and !empty($user->confirmed)) {

        $userauth = get_auth_plugin($user->auth);

        if ($userauth->can_reset_password()) {
            // reset internal password and notify user

            // set 'secret' string
            $user->secret = random_string(15);
            if (!set_field('user', 'secret', $user->secret, 'id', $user->id)) {
                error('error setting user secret string');
            }

            // send email (make sure mail block is off)
            $user->mailstop = 0;
            if (!send_password_change_confirmation_email($user)) {
                error('error sending password change confirmation email');
            }

        } else {
            // send email (make sure mail block is off)
            $user->mailstop = 0;
            if (!send_password_change_info($user)) {
                error('error sending password change confirmation email');
            }
        }
    }

    print_header($strforgotten, $strforgotten,
        "<a href=\"{$CFG->wwwroot}/login/index.php\">{$strlogin}</a>->{$strforgotten}");

    if (empty($user->email) or !empty($CFG->protectusernames)) {
        // Print general confirmation message
        notice(get_string('emailpasswordconfirmmaybesent'), $CFG->wwwroot.'/index.php');

    } else {
        // Confirm email sent
        $protectedemail = preg_replace('/([^@]*)@(.*)/', '******@$2', $user->email); // obfuscate the email address to protect privacy
        $stremailpasswordconfirmsent = get_string('emailpasswordconfirmsent', '', $protectedemail);
        notice($stremailpasswordconfirmsent, $CFG->wwwroot.'/index.php');
    }

    die; // never reached
}


/// DISPLAY FORM
print_header($strforgotten, $strforgotten,
    "<a href=\"{$CFG->wwwroot}/login/index.php\">{$strlogin}</a>->{$strforgotten}", 'id_email');

print_box(get_string('passwordforgotteninstructions'), 'generalbox boxwidthnormal boxaligncenter');
$mform->display();

print_footer();

?>