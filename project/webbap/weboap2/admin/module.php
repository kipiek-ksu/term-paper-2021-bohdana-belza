<?PHP  // $Id: module.php,v 1.23.6.1 2007/04/20 07:49:39 nicolasconnault Exp $
       // module.php - allows admin to edit all local configuration variables for a module

    require_once('../config.php');
    require_once($CFG->libdir.'/adminlib.php');
    $adminroot = admin_get_root();
    admin_externalpage_setup('managemodules', $adminroot);

/// If data submitted, then process and store.

    if ($config = data_submitted()) {
        $module = optional_param('module', '', PARAM_SAFEDIR);

        if (!confirm_sesskey()) {
            error(get_string('confirmsesskeybad', 'error'));
        }

        if ($module != '') {
            require_once("$CFG->dirroot/mod/$module/lib.php");
            // if the config.html contains a hidden form field giving
            // the module name then the form does not have to prefix all
            // its variable names, we will do it here.
            $moduleprefix = $module.'_';
            // let the module process the form data if it has to,
            // $config is passed to this function by reference
            $moduleconfig = $module.'_process_options';
            if (function_exists($moduleconfig)) {
                $moduleconfig($config);
            }
        } else {
            $moduleprefix = '';
        }

        unset($config->sesskey);
        unset($config->module);

        foreach ($config as $name => $value) {
            set_config($moduleprefix.$name, $value);
        }
        redirect("$CFG->wwwroot/$CFG->admin/modules.php", get_string("changessaved"), 1);
        exit;
    }

/// Otherwise print the form.
    $module = required_param('module', PARAM_SAFEDIR);
    require_once("$CFG->dirroot/mod/$module/lib.php");

    $strmodulename = get_string("modulename", $module);

    // $CFG->pagepath is used to generate the body and id attributes for the body tag
    // of the page. It is also used to generate the link to the Moodle Docs for this view.
    $CFG->pagepath = 'mod/' . $module . '/config';

    admin_externalpage_print_header($adminroot);

    print_heading($strmodulename);

    print_simple_box(get_string("configwarning", 'admin'), "center", "60%");
    echo "<br />";

    print_simple_box_start("center", "");
    include("$CFG->dirroot/mod/$module/config.html");
    print_simple_box_end();

    admin_externalpage_print_footer($adminroot);

?>
