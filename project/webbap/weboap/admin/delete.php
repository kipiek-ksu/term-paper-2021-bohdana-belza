<?PHP //$Id: delete.php,v 1.12 2006/09/25 20:22:56 skodak Exp $

// Deletes the moodledata directory, COMPLETELY!!
// BE VERY CAREFUL USING THIS!

    require_once('../config.php');
    require_once($CFG->libdir.'/adminlib.php');
    $adminroot = admin_get_root();
    admin_externalpage_setup('purgemoodledata', $adminroot);

    require_login();

    $sure       = optional_param('sure', 0, PARAM_BOOL);
    $reallysure = optional_param('reallysure', 0, PARAM_BOOL);

    require_capability('moodle/site:config', get_context_instance(CONTEXT_SYSTEM, SITEID));

    $deletedir = $CFG->dataroot;   // The directory to delete!

    admin_externalpage_print_header($adminroot);
    print_heading('Purge moodledata');

    if (empty($sure)) {
        $optionsyes = array('sure'=>'yes', 'sesskey'=>sesskey());
        notice_yesno ('Are you completely sure you want to delete everything inside the directory '. $deletedir .' ?',
            'delete.php', 'index.php', $optionsyes, NULL, 'post', 'get');
        admin_externalpage_print_footer($adminroot);
        exit;
    }

    if (!data_submitted() or empty($reallysure)) {
        $optionsyes = array('sure'=>'yes', 'sesskey'=>sesskey(), 'reallysure'=>'yes');
        notice_yesno ('Are you REALLY REALLY completely sure you want to delete everything inside the directory '. $deletedir .' (this includes all user images, and any other course files that have been created) ?',
            'delete.php', 'index.php', $optionsyes, NULL, 'post', 'get');
        admin_externalpage_print_footer($adminroot);
        exit;
    }

    if (!confirm_sesskey()) {
        error('This script was called wrongly');
    }

    /// OK, here goes ...

    delete_subdirectories($deletedir);

    echo '<h1 align="center">Done!</h1>';
    print_continue($CFG->wwwroot);
    admin_externalpage_print_footer($adminroot);
    exit;


function delete_subdirectories($rootdir) {

    $dir = opendir($rootdir);

    while ($file = readdir($dir)) {
        if ($file != '.' and $file != '..') {
            $fullfile = $rootdir .'/'. $file;
            if (filetype($fullfile) == 'dir') {
                delete_subdirectories($fullfile);
                echo 'Deleting '. $fullfile .' ... ';
                if (rmdir($fullfile)) {
                    echo 'Done.<br />';
                } else {
                    echo 'FAILED.<br />';
                }
            } else {
                echo 'Deleting '. $fullfile .' ... ';
                if (unlink($fullfile)) {
                    echo 'Done.<br />';
                } else {
                    echo 'FAILED.<br />';
                }
            }
        }
    }
    closedir($dir);
}

?>
