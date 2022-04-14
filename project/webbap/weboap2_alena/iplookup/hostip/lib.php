<?php  // $Id: lib.php,v 1.2 2007/01/04 15:53:35 moodler Exp $
       // Lookup a user using HostIP

function iplookup_display($ip, $user=0) {

    print_header();
    if ($user) {
        if ($user = get_record('user', 'id', $user)) {
            print_heading(fullname($user).", $user->city, $user->country", 'center', '4');
        }
    }

    echo 'Search results: <iframe src="http://www.hostip.info/api/get.html?ip='.$ip.'" height="60" width="300"></iframe>';

    echo '<object data="http://www.hostip.info/map/frame.html?ip='.$ip.'" '.
         'type="text/html" border="0" width="610" height="330"></object>';

    close_window_button();
    print_footer('none');
}

?>
