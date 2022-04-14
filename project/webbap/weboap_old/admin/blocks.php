<?PHP // $Id: blocks.php,v 1.32.2.3 2007/02/22 18:47:18 stronk7 Exp $

    // Allows the admin to configure blocks (hide/show, delete and configure)

    require_once('../config.php');
    require_once($CFG->libdir.'/adminlib.php');
    require_once($CFG->libdir.'/blocklib.php');
    require_once($CFG->libdir.'/tablelib.php');
    require_once($CFG->libdir.'/ddllib.php');

    $adminroot = admin_get_root();
    admin_externalpage_setup('manageblocks', $adminroot);

    $confirm  = optional_param('confirm', 0, PARAM_BOOL);
    $hide     = optional_param('hide', 0, PARAM_INT);
    $show     = optional_param('show', 0, PARAM_INT);
    $delete   = optional_param('delete', 0, PARAM_INT);
    $multiple = optional_param('multiple', 0, PARAM_INT);

/// Print headings

    $strmanageblocks = get_string('manageblocks');
    $strdelete = get_string('delete');
    $strversion = get_string('version');
    $strhide = get_string('hide');
    $strshow = get_string('show');
    $strsettings = get_string('settings');
    $strcourses = get_string('blockinstances', 'admin');
    $strname = get_string('name');
    $strmultiple = get_string('blockmultiple', 'admin');
    $strshowblockcourse = get_string('showblockcourse');

    admin_externalpage_print_header($adminroot);

    print_heading($strmanageblocks);

/// If data submitted, then process and store.

    if (!empty($hide) && confirm_sesskey()) {
        if (!$block = get_record('block', 'id', $hide)) {
            error("Block doesn't exist!");
        }
        set_field('block', 'visible', '0', 'id', $block->id);      // Hide block
    }

    if (!empty($show) && confirm_sesskey() ) {
        if (!$block = get_record('block', 'id', $show)) {
            error("Block doesn't exist!");
        }
        set_field('block', 'visible', '1', 'id', $block->id);      // Show block
    }

    if (!empty($multiple) && confirm_sesskey()) {
        if (!$block = blocks_get_record($multiple)) {
            error("Block doesn't exist!");
        }
        $block->multiple = !$block->multiple;
        update_record('block', $block);
    }

    if (!empty($delete) && confirm_sesskey()) {

        if (!$block = blocks_get_record($delete)) {
            error("Block doesn't exist!");
        }

        if (!block_is_compatible($block->name)) {
            $strblockname = $block->name;
        }
        else {
            $blockobject = block_instance($block->name);
            $strblockname = $blockobject->get_title();
        }

        if (!$confirm) {
            notice_yesno(get_string('blockdeleteconfirm', '', $strblockname),
                         'blocks.php?delete='.$block->id.'&amp;confirm=1&amp;sesskey='.$USER->sesskey,
                         'blocks.php');
            admin_externalpage_print_footer($adminroot);
            exit;

        } else {
            // Inform block it's about to be deleted
            $blockobject = block_instance($block->name);
            if ($blockobject) {
                $blockobject->before_delete();  //only if we can create instance, block might have been already removed
            }

            // First delete instances and then block
            $instances = get_records('block_instance', 'blockid', $block->id);
            if(!empty($instances)) {
                foreach($instances as $instance) {
                    blocks_delete_instance($instance);
                    blocks_delete_instance($instance, true);
                }
            }

            // Delete block
            if (!delete_records('block', 'id', $block->id)) {
                notify("Error occurred while deleting the $strblockname record from blocks table");
            }

            // Then the tables themselves
            if ($tables = $db->Metatables()) {
                $prefix = $CFG->prefix.$block->name;
                $prefix2 = $CFG->prefix.'block_'.$block->name;
                foreach ($tables as $table) {
                    if (strpos($table, $prefix) === 0 || strpos($table, $prefix2) === 0) {
                    /// If the match has been due to the 1st condition, debug to developers
                        if (strpos($table, $prefix) === 0) {
                            debugging('This block has some wrongly named tables. See Moodle Docs coding guidelines (and MDL-6786)', DEBUG_DEVELOPER);
                        }
                    /// Strip prefix from $table
                        $table = preg_replace("/^{$CFG->prefix}/", '', $table);
                        $xmldb_table = new XMLDBTable($table);
                        if (!drop_table($xmldb_table, true, false)) {
                            notify("ERROR: while trying to drop table $table");
                        }
                    }
                }
            }
            // Delete the capabilities that were defined by this block
            capabilities_cleanup('block/'.$block->name);

            $a->block = $strblockname;
            $a->directory = $CFG->dirroot.'/blocks/'.$block->name;
            notice(get_string('blockdeletefiles', '', $a), 'blocks.php');
        }
    }

/// Main display starts here

/// Get and sort the existing blocks

    if (false === ($blocks = get_records('block'))) {
        error('No blocks found!');  // Should never happen
    }

    $incompatible = array();

    foreach ($blocks as $block) {
        if(!block_is_compatible($block->name)) {
            notify('Block '. $block->name .' is not compatible with the current version of Moodle and needs to be updated by a programmer.');
            $incompatible[] = $block;
            continue;
        }
        if(($blockobject = block_instance($block->name)) === false) {
            // Failed to load
            continue;
        }
        $blockbyname[$blockobject->get_title()] = $block->id;
        $blockobjects[$block->id] = $blockobject;
    }

    if(empty($blockbyname)) {
        error('One or more blocks are registered in the database, but they all failed to load!');
    }

    ksort($blockbyname);

/// Print the table of all blocks

    $table = new flexible_table('admin-blocks-compatible');

    $table->define_columns(array('name', 'instances', 'version', 'hideshow', 'multiple', 'delete', 'settings'));
    $table->define_headers(array($strname, $strcourses, $strversion, $strhide.'/'.$strshow, $strmultiple, $strdelete, $strsettings));
    $table->define_baseurl($CFG->wwwroot.'/'.$CFG->admin.'/blocks.php');
    $table->set_attribute('id', 'blocks');
    $table->set_attribute('class', 'generaltable generalbox boxaligncenter boxwidthwide');
    $table->setup();

    foreach ($blockbyname as $blockname => $blockid) {

        $blockobject = $blockobjects[$blockid];

        $delete = '<a href="blocks.php?delete='.$blockid.'&amp;sesskey='.$USER->sesskey.'">'.$strdelete.'</a>';

        $settings = ''; // By default, no configuration
        if($blockobject->has_config()) {
            $settings = '<a href="block.php?block='.$blockid.'">'.$strsettings.'</a>';
        }

        $count = count_records('block_instance', 'blockid', $blockid);
        if ($count>0) {
            $blocklist = "<a href=\"{$CFG->wwwroot}/course/search.php?blocklist=$blockid&amp;sesskey={$USER->sesskey}\" ";
            $blocklist .= "title=\"$strshowblockcourse\" >$count</a>";
        }
        else {
            $blocklist = "$count";
        }
        $class = ''; // Nothing fancy, by default

        if ($blocks[$blockid]->visible) {
            $visible = '<a href="blocks.php?hide='.$blockid.'&amp;sesskey='.$USER->sesskey.'" title="'.$strhide.'">'.
                       '<img src="'.$CFG->pixpath.'/i/hide.gif" class="icon" alt="'.$strhide.'" /></a>';
        } else {
            $visible = '<a href="blocks.php?show='.$blockid.'&amp;sesskey='.$USER->sesskey.'" title="'.$strshow.'">'.
                       '<img src="'.$CFG->pixpath.'/i/show.gif" class="icon" alt="'.$strshow.'" /></a>';
            $class = ' class="dimmed_text"'; // Leading space required!
        }
        if ($blockobject->instance_allow_multiple()) {
            if($blocks[$blockid]->multiple) {
                $multiple = '<span style="white-space: nowrap;">'.get_string('yes').' (<a href="blocks.php?multiple='.$blockid.'&amp;sesskey='.$USER->sesskey.'">'.get_string('change', 'admin').'</a>)</span>';
            }
            else {
                $multiple = '<span style="white-space: nowrap;">'.get_string('no').' (<a href="blocks.php?multiple='.$blockid.'&amp;sesskey='.$USER->sesskey.'">'.get_string('change', 'admin').'</a>)</span>';
            }
        }
        else {
            $multiple = '';
        }

        $table->add_data(array(
            '<span'.$class.'>'.$blockobject->get_title().'</span>',
            $blocklist,
            '<span'.$class.'>'.$blockobject->get_version().'</span>',
            $visible,
            $multiple,
            $delete,
            $settings
        ));
    }

    $table->print_html();

    if(!empty($incompatible)) {
        print_heading(get_string('incompatibleblocks', 'admin'));

        $table = new flexible_table('admin-blocks-incompatible');

        $table->define_columns(array('block', 'delete'));
        $table->define_headers(array($strname, $strdelete));
        $table->define_baseurl($CFG->wwwroot.'/'.$CFG->admin.'/blocks.php');

        $table->set_attribute('id', 'incompatible');
        $table->set_attribute('class', 'generaltable generalbox boxaligncenter boxwidthwide');

        $table->setup();

        foreach ($incompatible as $block) {
            $table->add_data(array(
                $block->name,
                '<a href="blocks.php?delete='.$block->id.'&amp;sesskey='.$USER->sesskey.'">'.$strdelete.'</a>',
            ));
        }
        $table->print_html();
    }

    admin_externalpage_print_footer($adminroot);

?>
