<?php //$Id: block_social_activities.php,v 1.20 2007/01/08 09:14:23 skodak Exp $

class block_social_activities extends block_list {
    function init(){
        $this->title = get_string('blockname','block_social_activities');
        $this->version = 2004041800;
    }

    function applicable_formats() {
        return array('course-view-social' => true);
    }

    function get_content() {
        global $USER, $CFG;

        if ($this->content !== NULL) {
            return $this->content;
        }

        $this->content = new stdClass;
        $this->content->items = array();
        $this->content->icons = array();
        $this->content->footer = '';

        if (empty($this->instance)) {
            return $this->content;
        }

        $course = get_record('course', 'id', $this->instance->pageid);
        $context = get_context_instance(CONTEXT_COURSE, $course->id);

        // To make our day, we start with an ugly hack
        global $sections, $mods, $modnames;

        $section = $sections[0];
        // That wasn't so bad, was it?

        $groupbuttons = $course->groupmode;
        $groupbuttonslink = (!$course->groupmodeforce);
        $viewhiddenactivities = has_capability('moodle/course:viewhiddenactivities', $context);
        $isediting = isediting($this->instance->pageid);
        $ismoving = ismoving($this->instance->pageid);
        if ($ismoving) {
            $strmovehere = get_string('movehere');
            $strmovefull = strip_tags(get_string('movefull', '', "'$USER->activitycopyname'"));
            $strcancel= get_string('cancel');
            $stractivityclipboard = $USER->activitycopyname;
        }
    /// Casting $course->modinfo to string prevents one notice when the field is null
        $modinfo = unserialize((string)$course->modinfo);
        $editbuttons = '';

        if ($ismoving) {
            $this->content->icons[] = '&nbsp;<img align="bottom" src="'.$CFG->pixpath.'/t/move.gif" class="iconsmall" alt="" />';
            $this->content->items[] = $USER->activitycopyname.'&nbsp;(<a href="'.$CFG->wwwroot.'/course/mod.php?cancelcopy=true&amp;sesskey='.$USER->sesskey.'">'.$strcancel.'</a>)';
        }

        if (!empty($section->sequence)) {
            $sectionmods = explode(',', $section->sequence);
            foreach ($sectionmods as $modnumber) {
                if (empty($mods[$modnumber])) {
                    continue;
                }
                $mod = $mods[$modnumber];
                if ($isediting && !$ismoving) {
                    if ($groupbuttons) {
                        if (! $mod->groupmodelink = $groupbuttonslink) {
                            $mod->groupmode = $course->groupmode;
                        }

                    } else {
                        $mod->groupmode = false;
                    }
                    $editbuttons = '<br />'.make_editing_buttons($mod, true, true);
                } else {
                    $editbuttons = '';
                }
                if ($mod->visible || $viewhiddenactivities) {
                    if ($ismoving) {
                        if ($mod->id == $USER->activitycopy) {
                            continue;
                        }
                        $this->content->items[] = '<a title="'.$strmovefull.'" href="'.$CFG->wwwroot.'/course/mod.php?moveto='.$mod->id.'&amp;sesskey='.$USER->sesskey.'">'.
                            '<img height="16" width="80" src="'.$CFG->pixpath.'/movehere.gif" alt="'.$strmovehere.'" border="0" /></a>';
                        $this->content->icons[] = '';
                    }
                    $instancename = urldecode($modinfo[$modnumber]->name);
                    $instancename = format_string($instancename, true, $this->instance->pageid);
                    $linkcss = $mod->visible ? '' : ' class="dimmed" ';
                    if (!empty($modinfo[$modnumber]->extra)) {
                        $extra = urldecode($modinfo[$modnumber]->extra);
                    } else {
                        $extra = '';
                    }
                    if (!empty($modinfo[$modnumber]->icon)) {
                        $icon = $CFG->pixpath.'/'.urldecode($modinfo[$modnumber]->icon);
                    } else {
                        $icon = $CFG->modpixpath.'/'.$mod->modname.'/icon.gif';
                    }

                    if ($mod->modname == 'label') {
                        $this->content->items[] = format_text($extra, FORMAT_HTML).$editbuttons;
                        $this->content->icons[] = '';
                    } else {
                        $this->content->items[] = '<a title="'.$mod->modfullname.'" '.$linkcss.' '.$extra.
                            ' href="'.$CFG->wwwroot.'/mod/'.$mod->modname.'/view.php?id='.$mod->id.'">'.$instancename.'</a>'.$editbuttons;
                        $this->content->icons[] = '<img src="'.$icon.'" class="icon" alt="'.$mod->modfullname.'" />';
                    }
                }
            }
        }

        if ($ismoving) {
            $this->content->items[] = '<a title="'.$strmovefull.'" href="'.$CFG->wwwroot.'/course/mod.php?movetosection='.$section->id.'&amp;sesskey='.$USER->sesskey.'">'.
                                      '<img height="16" width="80" src="'.$CFG->pixpath.'/movehere.gif" alt="'.$strmovehere.'" border="0" /></a>';
            $this->content->icons[] = '';
        }

        if ($isediting && $modnames) {
            $this->content->footer = print_section_add_menus($course, 0, $modnames, true, true);
        } else {
            $this->content->footer = '';
        }

        return $this->content;
    }
}

?>
