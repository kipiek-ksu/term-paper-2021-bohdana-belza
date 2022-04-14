<?php  //$Id: define.class.php,v 1.3 2007/01/26 13:49:33 skodak Exp $

class profile_define_text extends profile_define_base {

    function define_form_specific(&$form) {
        /// Default data
        $form->addElement('text', 'defaultdata', get_string('profiledefaultdata', 'admin'), 'size="50"');
        $form->setType('defaultdata', PARAM_MULTILANG);

        /// Param 1 for text type is the size of the field
        $form->addElement('text', 'param1', get_string('profilefieldsize', 'admin'), 'size="6"');
        $form->setDefault('param1', 30);
        $form->setType('param1', PARAM_INT);

        /// Param 2 for text type is the maxlength of the field
        $form->addElement('text', 'param2', get_string('profilefieldmaxlength', 'admin'), 'size="6"');
        $form->setDefault('param2', 2048);
        $form->setType('param2', PARAM_INT);
    }

}

?>