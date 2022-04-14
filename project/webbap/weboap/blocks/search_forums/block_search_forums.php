<?PHP //$Id: block_search_forums.php,v 1.21.2.1 2007/05/11 11:29:48 nfreear Exp $

require_once(dirname(dirname(dirname(__FILE__))).'/config.php');
require_once($CFG->dirroot.'/mod/forum/lib.php');

class block_search_forums extends block_base {
    function init() {
        $this->title = get_string('blocktitle', 'block_search_forums');
        $this->version = 2005030900;
    }

    function get_content() {
        global $CFG, $THEME;

        if($this->content !== NULL) {
            return $this->content;
        }

        $this->content = new stdClass;
        $this->content->footer = '';

        if (empty($this->instance)) {
            $this->content->text   = '';
            return $this->content;
        }

        $advancedsearch = get_string('advancedsearch', 'block_search_forums');

        $search = get_string('search');

        //Accessibility: replaced <input value=" />" type="submit"> with configurable text/'silent' character.
        // Theme config, $CFG->block_search_button = link_arrow_right(get_string('search'), $url='', $accesshide=true);
        $button = (isset($CFG->block_search_button)) ? $CFG->block_search_button : get_string('go');
        
        $this->content->text  = '<div class="searchform">';
        $this->content->text .= '<form action="'.$CFG->wwwroot.'/mod/forum/search.php" style="display:inline"><fieldset class="invisiblefieldset">';
        $this->content->text .= '<input name="id" type="hidden" value="'.$this->instance->pageid.'" />';  // course
        $this->content->text .= '<label class="accesshide" for="searchform_search">'.$search.'</label>'.
                                '<input id="searchform_search" name="search" type="text" size="16" />';
        $this->content->text .= '<button id="searchform_button" type="submit" title="'.$search.'">'.$button.'</button><br />'; 
        $this->content->text .= '<a href="'.$CFG->wwwroot.'/mod/forum/search.php?id='.$this->instance->pageid.'">'.$advancedsearch.'</a>';
        $this->content->text .= helpbutton('search', $advancedsearch, 'moodle', true, false, '', true);
        $this->content->text .= '</fieldset></form></div>';

        return $this->content;
    }

    function applicable_formats() {
        return array('site' => true, 'course' => true);
    }
}

?>
