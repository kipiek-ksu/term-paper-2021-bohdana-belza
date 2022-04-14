<?php  // $Id: faq_format.php,v 1.12 2007/01/12 06:57:34 toyomoyo Exp $

function glossary_show_entry_faq($course, $cm, $glossary, $entry, $mode="", $hook="", $printicons=1, $ratings=NULL, $aliases=true) {
    global $USER;
    $return = false;
    if ( $entry ) {

        echo '<table class="glossarypost faq" cellspacing="0">';

        echo '<tr valign="top">';
        echo '<td class="entryheader">';
        $entry->course = $course->id;

        echo '<span class="concept">' . get_string('question','glossary') . ': ';
        glossary_print_entry_concept($entry);
        echo '</span><br />';

        echo '<span class="time">('.get_string('lastedited').': '.
             userdate($entry->timemodified).')</span>';
        echo '</td>';
        echo '<td class="entryattachment">';

        glossary_print_entry_approval($cm, $entry, $mode);
        glossary_print_entry_attachment($entry,'html','right');
        echo '</td>';

        echo '</tr>';

        echo "\n<tr>";
        echo '<td colspan="2" class="entry">';
        echo '<b>'.get_string('answer','glossary').':</b> ';

        glossary_print_entry_definition($entry);

        echo '</td></tr>';
        echo '<tr valign="top"><td colspan="3" class="entrylowersection">';
        $return = glossary_print_entry_lower_section($course, $cm, $glossary, $entry, $mode, $hook, $printicons, $ratings, $aliases);
        echo '</td></tr></table>';

    } else {
        echo '<div style="text-align:center">';
        print_string('noentry', 'glossary');
        echo '</div>';
    }
    return $return;
}

function glossary_print_entry_faq($course, $cm, $glossary, $entry, $mode='', $hook='', $printicons=1, $ratings=NULL) {

    //The print view for this format is exactly the normal view, so we use it

    //Take out autolinking in definitions un print view
    $entry->definition = '<span class="nolink">'.$entry->definition.'</span>';

    //Call to view function (without icons, ratings and aliases) and return its result
    return glossary_show_entry_faq($course, $cm, $glossary, $entry, $mode, $hook, false, false, false);

}

?>
