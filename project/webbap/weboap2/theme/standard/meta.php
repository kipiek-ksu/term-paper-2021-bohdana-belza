<?php 
		echo '

<script type="text/javascript">

	var _editor_url  = "'. $CFG->httpswwwroot .'/lib/editor/xinha";
	var _editor_lang = "en";
</script>
<script type="text/javascript" src="'. $CFG->httpswwwroot .'/lib/editor/xinha/XinhaCore.js"></script>
<script type="text/javascript">
	var xinha_plugins = [
		\'CharCounter\',
	  \'EditTag\',
	  \'Equation\',
	  \'ExtendedFileManager\',
	  \'FindReplace\',
	  \'ImageManager\',
	  \'InsertAnchor\',
	  \'InsertMarquee\',
	  \'QuickTag\',
	  \'SuperClean\',
	  \'TableOperations\',
	  \'Template\'
	];
	var xinha_editors = [
		\'edit-content\'
	];

	function xinha_init()
	{
		if(!Xinha.loadPlugins(xinha_plugins, xinha_init)) return;
		var xinha_config = new Xinha.Config();
		xinha_editors = Xinha.makeEditors(xinha_editors, xinha_config, xinha_plugins);
		Xinha.startEditors(xinha_editors);
	}
	window.onload = xinha_init;
</script>
<link type="text/css" rel="alternate stylesheet" title="green-look" href="'. $CFG->httpswwwroot .'/lib/editor/xinha/skins/green-look/skin.css"/>
<!--link type="text/css" rel="alternate stylesheet" title="xp-green" href="../skins/xp-green/skin.css"-->
		';
		
function use_html_editor($name='', $editorhidebuttons='', $id='') {
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
    
		
		
		global $CFG, $COURSE, $HTTPSPAGEREQUIRED;
		static $scriptcount = 0;
    
		
				
		$str = '';
    
		if ($id === '') {
        $id = 'edit-'.$name;
    }

	/*	if (empty($courseid)) {
			$courseid = $COURSE->id;
    }*/
		if ( empty($CFG->editorsrc) ) { // for backward compatibility.
        if (empty($courseid)) {
            $courseid = $COURSE->id;
        }

				if ($usehtmleditor) {
        /*    if (!empty($courseid) and has_capability('moodle/course:managefiles', get_context_instance(CONTEXT_COURSE, $courseid))) {
                $httpsrequired = empty($HTTPSPAGEREQUIRED) ? '' : '&ampt;httpsrequired=1';
                // needed for course file area browsing in image insert plugin
                $str .= ($scriptcount < 1) ? '<script type="text/javascript" src="'.
                        $CFG->httpswwwroot .'/lib/editor/Xinha/XinhaCore.js?id='.$courseid.$httpsrequired.'"></script>'."\n" : '';
            } else {
                $httpsrequired = empty($HTTPSPAGEREQUIRED) ? '' : '?httpsrequired=1';
                $str .= ($scriptcount < 1) ? '<script type="text/javascript" src="'.
                         $CFG->httpswwwroot .'/lib/editor/Xinha/XinhaCore.js'.$httpsrequired.'"></script>'."\n" : '';

            }
*/
				$scriptcount++;
		   }
    }	
			 $str .= '<textarea class="form-textarea" id="'. $id .'" name="'. $name .'" rows="'. $rows .'" cols="'. $cols .'">';
		    if ($usehtmleditor) {
		        $str .= htmlspecialchars($value); // needed for editing of cleaned text!
		    } else {
		        $str .= s($value);
		    }
		    $str .= '</textarea>'."\n";


		    if ($return) {
		        return $str;
		    }
		    echo $str;
}		
?>

<!--[if IE 7]>
    <link rel="stylesheet" type="text/css" href="<?php echo $CFG->httpswwwroot ?>/theme/standard/styles_ie7.css" />
<![endif]-->
<!--[if IE 6]>
    <link rel="stylesheet" type="text/css" href="<?php echo $CFG->httpswwwroot ?>/theme/standard/styles_ie6.css" />
<![endif]-->

<script src="http://www.google-analytics.com/urchin.js" type="text/javascript">
</script>
<script type="text/javascript">
_uacct = "UA-642112-10";
urchinTracker();
</script>