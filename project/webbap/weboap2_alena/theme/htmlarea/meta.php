<?php function use_html_editor($name='', $editorhidebuttons='', $id='') {
    global $THEME;

    $editor = 'editor_'.md5($name); //name might contain illegal characters
    if ($id === '') {
        $id = 'edit-'.$name;
    }
    echo "\n".'<script type="text/javascript" defer="defer">'."\n";
    echo '//<![CDATA['."\n\n"; // Extra \n is to fix odd wiki problem, MDL-8185
    echo "$editor = new HTMLArea('$id');\n";
    echo "var config = $editor.config;\n";

    echo print_editor_config($editorhidebuttons);

    if (empty($THEME->htmleditorpostprocess)) {
        if (empty($name)) {
            echo "\nHTMLArea.replaceAll($editor.config);\n";
        } else {
            echo "\n$editor.generate();\n";
        }
    } else {
        if (empty($name)) {
            echo "\nvar HTML_name = '';";
        } else {
            echo "\nvar HTML_name = \"$name;\"";
        }
        echo "\nvar HTML_editor = $editor;";
    }
    echo '//]]>'."\n";
    echo '</script>'."\n";
}
function print_textarea($usehtmleditor, $rows, $cols, $width, $height, $name, $value='', $courseid=0, $return=false, $id='') {
/// $width and height are legacy fields and no longer used as pixels like they used to be.
/// However, you can set them to zero to override the mincols and minrows values below.

    global $CFG, $COURSE, $HTTPSPAGEREQUIRED;
    static $scriptcount = 0; // For loading the htmlarea script only once.

    $mincols = 65;
    $minrows = 10;
    $str = '';

    if ($id === '') {
        $id = 'edit-'.$name;
    }

    if ( empty($CFG->editorsrc) ) { // for backward compatibility.
        if (empty($courseid)) {
            $courseid = $COURSE->id;
        }

        if ($usehtmleditor) {
            if (!empty($courseid) and has_capability('moodle/course:managefiles', get_context_instance(CONTEXT_COURSE, $courseid))) {
                $httpsrequired = empty($HTTPSPAGEREQUIRED) ? '' : '&ampt;httpsrequired=1';
                // needed for course file area browsing in image insert plugin
                $str .= ($scriptcount < 1) ? '<script type="text/javascript" src="'.
                        $CFG->httpswwwroot .'/lib/editor/htmlarea/htmlarea.php?id='.$courseid.$httpsrequired.'"></script>'."\n" : '';
            } else {
                $httpsrequired = empty($HTTPSPAGEREQUIRED) ? '' : '?httpsrequired=1';
                $str .= ($scriptcount < 1) ? '<script type="text/javascript" src="'.
                         $CFG->httpswwwroot .'/lib/editor/htmlarea/htmlarea.php'.$httpsrequired.'"></script>'."\n" : '';

            }
            $str .= ($scriptcount < 1) ? '<script type="text/javascript" src="'.
                    $CFG->httpswwwroot .'/lib/editor/htmlarea/lang/en.php"></script>'."\n" : '';
            $scriptcount++;

            if ($height) {    // Usually with legacy calls
                if ($rows < $minrows) {
                    $rows = $minrows;
                }
            }
            if ($width) {    // Usually with legacy calls
                if ($cols < $mincols) {
                    $cols = $mincols;
                }
            }
        }
    }
    $str .= '<textarea class="form-textarea" id="'. $id .'" name="'. $name .'" rows="'. $rows .'" cols="'. $cols .'">';
    if ($usehtmleditor) {
        $str .= htmlspecialchars($value); // needed for editing of cleaned text!
    } else {
        $str .= s($value);
    }
    $str .= '</textarea>'."\n";

    if ($usehtmleditor) {
        // Show shortcuts button if HTML editor is in use, but only if JavaScript is enabled (MDL-9556)
        $str .= '<script type="text/javascript">
//<![CDATA[
document.write(\''.addslashes_js(editorshortcutshelpbutton()).'\');
//]]>
</script>';
    }

    if ($return) {
        return $str;
    }
    echo $str;
}

/**
 * Sets up the HTML editor on textareas in the current page.
 * If a field name is provided, then it will only be
 * applied to that field - otherwise it will be used
 * on every textarea in the page.
 *
 * In most cases no arguments need to be supplied
 *
 * @param string $name Form element to replace with HTMl editor by name
 */

?>
<!--[if IE 7]>
    <link rel="stylesheet" type="text/css" href="<?php echo $CFG->httpswwwroot ?>/theme/standard/styles_ie7.css" />
<![endif]-->
<!--[if IE 6]>
    <link rel="stylesheet" type="text/css" href="<?php echo $CFG->httpswwwroot ?>/theme/standard/styles_ie6.css" />
<![endif]-->
