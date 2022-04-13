<?php //$Id: edit_form.php,v 1.10 2007/01/05 04:51:48 jamiesensei Exp $

require_once $CFG->libdir.'/formslib.php';

class mod_vinttaskbook_edit_cat_form extends moodleform {
    function definition() {
        $mform =& $this->_form;

        $mform->addElement('header', 'category', get_string('category', 'vinttaskbook'));
        // visible elements
        //Number
        $mform->addElement('text', 'number',get_string('number', 'vinttaskbook'));
        $mform->addRule('number', get_string('required'), 'required', null, 'client');
        $mform->addRule('number', get_string('numeric'), 'numeric', null, 'client');
        //$mform->setType('number', PARAM_INT); // processed by trusttext or cleaned before the display
        //Name
        $mform->addElement('text', 'catname',get_string('catname', 'vinttaskbook'));
        $mform->addRule('catname', get_string('required'), 'required', null, 'client');
        $mform->setType('catname', PARAM_RAW); // processed by trusttext or cleaned before the display
        //$mform->setHelpButton('name', array('writing', 'richtext'), false, 'editorhelpbutton');

        // hidden optional params
        $mform->addElement('hidden', 'id', 0);
        $mform->setType('id', PARAM_INT);
        
        $mform->addElement('hidden', 'cid', 0);
        $mform->setType('cid', PARAM_INT);
        
        $mform->addElement('hidden', 'vinttaskbook', 0);
        $mform->setType('vinttaskbook', PARAM_INT);

        $mform->addElement('hidden', 'action', '');
        $mform->setType('action', PARAM_ACTION);
        
        $mform->addElement('hidden', 'type', 'category');
        $mform->setType('type', PARAM_TEXT);

//-------------------------------------------------------------------------------
        // buttons
        $this->add_action_buttons(true);
    }
}

class mod_vinttaskbook_edit_task_form extends moodleform {
    var $categories;
    function mod_vinttaskbook_edit_task_form($categories, $langs){
      $this->categories = $categories;
			$this->langs = $langs;
      parent::moodleform();
    }
    function definition() {
        $mform =& $this->_form;

        $mform->addElement('header', 'task', get_string('task', 'vinttaskbook'));
        // visible elements
        //Number
        $mform->addElement('text', 'number',get_string('number', 'vinttaskbook'));
        $mform->addRule('number', get_string('required'), 'required', null, 'client');
        $mform->addRule('number', get_string('numeric'), 'numeric', null, 'client');
        $mform->setType('number', PARAM_INT); // processed by trusttext or cleaned before the display
        //Name
        $mform->addElement('text', 'taskname',get_string('taskname', 'vinttaskbook'));
        $mform->addRule('taskname', get_string('required'), 'required', null, 'client');
        $mform->setType('taskname', PARAM_RAW); // processed by trusttext or cleaned before the display
        //$mform->setHelpButton('entrycomment', array('writing', 'richtext'), false, 'editorhelpbutton');
        //Category
        $mform->addElement('select', 'taskcategories',get_string('taskcategories', 'vinttaskbook'), $this->categories);
        $mform->addRule('taskcategories', get_string('required'), 'required', null, 'client');
        //Summary
        $mform->addElement('htmleditor', 'summary', get_string('summary'));
        $mform->setType('summary', PARAM_RAW);
        $mform->addRule('summary', get_string('required'), 'required', null, 'client');
        $mform->setHelpButton('summary', array('writing', 'questions', 'richtext'), false, 'editorhelpbutton');
        //Input data    
        $mform->addElement('textarea', 'input_data',get_string('input_data', 'vinttaskbook'), array('rows'=>5, 'cols'=>20));
        //$mform->addRule('input_data', get_string('required'), 'required', null, 'client');
        //Output data    
        $mform->addElement('textarea', 'output_data',get_string('output_data', 'vinttaskbook'), array('rows'=>5, 'cols'=>20));
        $mform->addRule('output_data', get_string('required'), 'required', null, 'client');
        //Description data
        $mform->addElement('htmleditor', 'description_data', get_string('description_data', 'vinttaskbook'));
        $mform->setType('description_data', PARAM_RAW);
        $mform->addRule('description_data', get_string('required'), 'required', null, 'client');
        $mform->setHelpButton('description_data', array('writing', 'questions', 'richtext'), false, 'editorhelpbutton');
        //Input example    
        $mform->addElement('textarea', 'input_example',get_string('input_example', 'vinttaskbook'), array('rows'=>5, 'cols'=>20));
        //$mform->addRule('input_example', get_string('required'), 'required', null, 'client');
        //Output example    
        $mform->addElement('textarea', 'output_example',get_string('output_example', 'vinttaskbook'), array('rows'=>5, 'cols'=>20));
        $mform->addRule('output_example', get_string('required'), 'required', null, 'client');
        //Original solution
        $mform->addElement('htmleditor', 'original_solution', get_string('original_solution', 'vinttaskbook'), array('rows'=>20));
        $mform->setType('original_solution', PARAM_RAW);
        $mform->addRule('original_solution', get_string('required'), 'required', null, 'client');
        $mform->setHelpButton('original_solution', array('writing', 'questions', 'richtext'), false, 'editorhelpbutton');
        //Original Compiler
        $mform->addElement('select', 'original_compilator',get_string('original_compilator', 'vinttaskbook'), $this->langs);
        //$mform->addRule('original_compilator', get_string('optional'), 'optional', null, 'client');
        
        // hidden optional params
        $mform->addElement('hidden', 'id', 0);
        $mform->setType('id', PARAM_INT);
        
        $mform->addElement('hidden', 'cid', 0);
        $mform->setType('cid', PARAM_INT);
        
        $mform->addElement('hidden', 'tid', 0);
        $mform->setType('tid', PARAM_INT);
        
        $mform->addElement('hidden', 'vinttaskbook', 0);
        $mform->setType('vinttaskbook', PARAM_INT);

        $mform->addElement('hidden', 'action', '');
        $mform->setType('action', PARAM_ACTION);
        
        $mform->addElement('hidden', 'type', 'task');
        $mform->setType('type', PARAM_TEXT);

//-------------------------------------------------------------------------------
        // buttons
        $this->add_action_buttons(true);
    }
}

class mod_vinttaskbook_edit_test_form extends moodleform {
    function definition() {
        $mform =& $this->_form;

        $mform->addElement('header', 'test', get_string('test', 'vinttaskbook'));
        // visible elements
        //Number
        $mform->addElement('text', 'number', get_string('number', 'vinttaskbook'));
        $mform->addRule('number', get_string('required'), 'required', null, 'client');
        $mform->addRule('number', get_string('numeric'), 'numeric', null, 'client');
        $mform->setType('number', PARAM_INT); // processed by trusttext or cleaned before the display
        //Input Data
        $mform->addElement('textarea', 'input_data',get_string('input_data', 'vinttaskbook'), array('rows'=>5, 'cols'=>20));
        //$mform->addRule('input_data', get_string('required'), 'required', null, 'client');
        $mform->setType('input_data', PARAM_RAW); // processed by trusttext or cleaned before the display
        //Output Data
        $mform->addElement('textarea', 'output_data',get_string('output_data', 'vinttaskbook'), array('rows'=>5, 'cols'=>20));
        $mform->addRule('output_data', get_string('required'), 'required', null, 'client');
        $mform->setType('output_data', PARAM_RAW); // processed by trusttext or cleaned before the display
        //Time
        //$mform->addElement('text', 'time', get_string('time', 'vinttaskbook'));
        //$mform->addRule('time', get_string('numeric'), 'numeric', null, 'client');
        //$mform->setType('number', PARAM_INT); // processed by trusttext or cleaned before the display
        
        
        // hidden optional params
        $mform->addElement('hidden', 'id', 0);
        $mform->setType('id', PARAM_INT);
        
        $mform->addElement('hidden', 'cid', 0);
        $mform->setType('cid', PARAM_INT);
        
        $mform->addElement('hidden', 'tid', 0);
        $mform->setType('tid', PARAM_INT);
        
        $mform->addElement('hidden', 'testid', 0);
        $mform->setType('testid', PARAM_INT);
        
        $mform->addElement('hidden', 'vinttaskbook', 0);
        $mform->setType('vinttaskbook', PARAM_INT);

        $mform->addElement('hidden', 'action', '');
        $mform->setType('action', PARAM_ACTION);
        
        $mform->addElement('hidden', 'type', 'test');
        $mform->setType('type', PARAM_TEXT);

//-------------------------------------------------------------------------------
        // buttons
        $this->add_action_buttons(true);
    }
}

class mod_vinttaskbook_submit_task_form extends moodleform {
    function definition() {
        $mform =& $this->_form;

        $mform->addElement('header', 'solving_task', get_string('solving_task', 'vinttaskbook'));
        // visible elements
        //Task Solution Text
        $mform->addElement('textarea', 'tasktext',get_string('your_code_descr', 'vinttaskbook'), array('rows'=>10, 'cols'=>35));
        //Task Solution File
        $mform->addElement('file', 'taskfile',get_string('your_file_descr', 'vinttaskbook'));
				
				//language
				$mform->addElement('select', 'tasklanguage',get_string('your_language', 'vinttaskbook'), array('0'=>'Pascal', '1'=>'C'));
				
        $mform->addRule('output_data', get_string('required'), 'required', null, 'client');
        $mform->setType('output_data', PARAM_RAW); // processed by trusttext or cleaned before the display
        
        
        // hidden optional params
        $mform->addElement('hidden', 'id', 0);
        $mform->setType('id', PARAM_INT);
        
        $mform->addElement('hidden', 'cid', 0);
        $mform->setType('cid', PARAM_INT);
        
        $mform->addElement('hidden', 'tid', 0);
        $mform->setType('tid', PARAM_INT);
        
        $mform->addElement('hidden', 'vinttaskbook', 0);
        $mform->setType('vinttaskbook', PARAM_INT);

//-------------------------------------------------------------------------------
        // buttons
        $this->add_action_buttons(false);
    }
}

?>