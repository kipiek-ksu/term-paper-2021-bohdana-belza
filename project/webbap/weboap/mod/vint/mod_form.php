<?php
require_once($CFG->dirroot.'/mod/vint/lib.php');
require_once('moodleform_mod.php');

class mod_vint_mod_form extends moodleform_mod {

    function definition() {

        global $CFG;
        $mform =& $this->_form;

//-------------------------------------------------------------------------------
        $mform->addElement('header', 'general', get_string('general', 'form'));

        $mform->addElement('text', 'name', get_string('name'), array('size'=>'64'));
        $mform->setType('name', PARAM_TEXT);
        $mform->addRule('name', null, 'required', null, 'client');

        $mform->addElement('htmleditor', 'summary', get_string('summary'));
        $mform->setType('summary', PARAM_RAW);
        $mform->addRule('summary', null, 'required', null, 'client');
        $mform->setHelpButton('summary', array('writing', 'questions', 'richtext'), false, 'editorhelpbutton');
/*
        $mform->addElement('select', 'numbering', get_string('numbering', 'vint'), vint_get_numbering_types());
        $mform->setHelpButton('numbering', array('numberingtype', get_string('numbering', 'vint'), 'vint'));
/*
        $mform->addElement('checkbox', 'disableprinting', get_string('disableprinting', 'vint'));
        $mform->setHelpButton('disableprinting', array('disableprinting', get_string('disableprinting', 'vint'), 'vint'));
        $mform->setDefault('disableprinting', 0);

        $mform->addElement('checkbox', 'customtitles', get_string('customtitles', 'vint'));
        $mform->setHelpButton('customtitles', array('customtitles', get_string('customtitles', 'vint'), 'vint'));
        $mform->setDefault('customtitles', 0);
*/
        $this->standard_coursemodule_elements();

//-------------------------------------------------------------------------------
        // buttons
        $this->add_action_buttons();
    }


}
?>