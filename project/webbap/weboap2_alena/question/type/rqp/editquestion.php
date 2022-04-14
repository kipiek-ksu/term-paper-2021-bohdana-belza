<?php // $Id: editquestion.php,v 1.1 2006/03/24 19:31:48 gustav_delius Exp $

    require_once($CFG->dirroot . '/question/type/rqp/lib.php');

    if (empty($question->id)) {
        if (!isset($typeid)) {
            error('No remote question type specified');
        }
        $question->options->type = $typeid;
        $question->options->source = '';
        $question->options->format = '';
    }
    else if (!$QTYPES[$question->qtype]->get_question_options($question)) {
        error("Could not load the options for this question");
    }

    if (!$type = get_record('question_rqp_types', 'id', $question->options->type)) {
        error("Invalid remote question type");
    }

    print_heading_with_help(get_string('editingrqp', 'quiz', $type->name), 'rqp', 'quiz');
    require('editquestion.html');

?>
