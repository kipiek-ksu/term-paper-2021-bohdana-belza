<?php function use_html_editor($name='', $editorhidebuttons='', $id='') {
    global $CFG, $THEME;

    $editor = 'editor'.md5($name); //name might contain illegal characters
    if ($id === '') {
        $id = 'edit-'.$name;
    }
    echo "\n".'<script type="text/javascript" defer="defer">'."\n";
    echo '//<![CDATA['."\n\n"; // Extra \n is to fix odd wiki problem, MDL-8185
    echo "$editor = new HTMLArea('$id');\n";
    echo "var config = $editor.config;\n";

    echo print_editor_config($editorhidebuttons);


   echo "\n$editor.generate('$id');\n";

    echo '//]]>'."\n";
    echo '</script>'."\n";
}
function print_textarea($usehtmleditor, $rows, $cols, $width, $height, $name, $value='', $courseid=0, $return=false, $id='') {
    global $CFG, $COURSE, $HTTPSPAGEREQUIRED;
 static $scriptcount = 0;
    $str = '';
    if ($id === '') {
        $id = 'edit-'.$name;
    }

if (empty($courseid)) {
            $courseid = $COURSE->id;
        }
if ($usehtmleditor) {
            if (!empty($courseid) and has_capability('moodle/course:managefiles', get_context_instance(CONTEXT_COURSE, $courseid))) {
                $httpsrequired = empty($HTTPSPAGEREQUIRED) ? '' : '&ampt;httpsrequired=1';
                // needed for course file area browsing in image insert plugin
                $str .= ($scriptcount < 1) ? '<script type="text/javascript" src="'.
                        $CFG->httpswwwroot .'/lib/editor/Xinha/XinhaCore.js?id='.$courseid.$httpsrequired.'"></script>'."\n" : '';
            } else {
                $httpsrequired = empty($HTTPSPAGEREQUIRED) ? '' : '?httpsrequired=1';
                $str .= ($scriptcount < 1) ? '<script type="text/javascript" src="'.
                         $CFG->httpswwwroot .'/lib/editor/Xinha/XinhaCore.js'.$httpsrequired.'"></script>'."\n" : '';

            }
$scriptcount++;
    $str .= '<textarea class="form-textarea" id="'. $id .'" name="'. $name .'" rows="'. $rows .'" cols="'. $cols .'">';
    $str .= htmlspecialchars($value); 
    $str .= '</textarea>'."\n";
    $str .= '<script type="text/javascript">
//<![CDATA[
document.write(\''.addslashes_js(editorshortcutshelpbutton()).'\');
//]]>
</script>';
    if ($return) {
        return $str;
    }
    echo $str;
       }
else
{
    $str .= '<textarea class="alltext" id="'. $id .'" name="'. $name .'" rows="'. $rows .'" cols="'. $cols .'">';  
    $str .= s($value);
    $str .= '</textarea>'."\n";
    if ($return) {
        return $str;
    }
    echo $str;
}
}
?><script type="text/javascript">
    _editor_url  = "<?php echo $CFG->wwwroot .'/lib/editor/Xinha/' ?>";
    _editor_lang = "en";
  </script>
<script type="text/javascript">
xinha_editors = null;
    xinha_init    = null;
    xinha_config  = null;
    xinha_plugins = null;

    // This contains the names of textareas we will make into Xinha editors
    xinha_init = xinha_init ? xinha_init : function()
    {

      xinha_plugins = xinha_plugins ? xinha_plugins :
      [
       'CharacterMap',
       'ContextMenu',
       'ListType',
       'SpellChecker',
       'Stylist',
       'SuperClean',
       'TableOperations'
      ];
             if(!Xinha.loadPlugins(xinha_plugins, xinha_init)) return;

      xinha_editors = xinha_editors ? xinha_editors :
      [
        'form-textarea'
      ];

      xinha_config = xinha_config ? xinha_config() : new Xinha.Config();
      xinha_editors   = Xinha.makeEditors(xinha_editors, xinha_config, xinha_plugins);
      Xinha.startEditors(xinha_editors);
    }
</script><!--[if IE 7]>
    <link rel="stylesheet" type="text/css" href="<?php echo $CFG->httpswwwroot ?>/theme/standard/styles_ie7.css" />
<![endif]-->
<!--[if IE 6]>
    <link rel="stylesheet" type="text/css" href="<?php echo $CFG->httpswwwroot ?>/theme/standard/styles_ie6.css" />
<![endif]-->
