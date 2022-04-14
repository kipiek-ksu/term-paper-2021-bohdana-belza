<?php
/**
 * Defines the editing form for the essay question type.
 *
 * @copyright &copy; 2007 Jamie Pratt
 * @author Jamie Pratt me@jamiep.org
 * @license http://www.gnu.org/copyleft/gpl.html GNU Public License
 * @package questions
 */

/**
 * essay editing form definition.
 */
class question_edit_essay_form extends question_edit_form {
    /**
     * Add question-type specific form fields.
     *
     * @param MoodleQuickForm $mform the form being built.
     */
    function definition_inner(&$mform) {
        $mform->addElement('htmleditor', 'feedback', get_string("feedback", "quiz"));
        $mform->setType('feedback', PARAM_RAW);

        $mform->addElement('hidden', 'fraction', 0);

        //don't need this default element.
        $mform->removeElement('penalty');
        $mform->addElement('hidden', 'penalty', 0);
    }

    function set_data($question) {
        if (isset($question->options) && isset($question->options->answers)) {
            $answer = reset($question->options->answers);
            $question->feedback = $answer->feedback;
        }
        $question->penalty = 0;
        parent::set_data($question);
    }

    function qtype() {
        return 'essay';
    }
}
?>
