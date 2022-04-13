<script type="text/javascript">
        <!--
function replacealltextareas()
      {
                var alltextareas = document.getElementsByTagName("textarea");
for (var i=0; i < alltextareas.length; i++) {
if(alltextareas[i].className=='form-textarea') { 
                var oFCKeditor = new FCKeditor(alltextareas[i].name) ;
                oFCKeditor.BasePath = "<?php echo $CFG->wwwroot .'/lib/editor/fckeditor/' ?>" ;
        oFCKeditor.Height	= 400 ;
        oFCKeditor.Width	= 600 ;
                oFCKeditor.ReplaceTextarea(alltextareas[i].name) ;}            
        }
}
        // -->
        </script>
<?php function use_html_editor($name='', $editorhidebuttons='', $id='') {
    global $CFG, $THEME;
    $editor = 'editor_'.md5($name); //name might contain illegal characters
    if ($id === '') {
        $id = 'edit-'.$name;
    }
}
function print_textarea($usehtmleditor, $rows, $cols, $width, $height, $name, $value='', $courseid=0, $return=false, $id='') {
/// $width and height are legacy fields and no longer used as pixels like they used to be.
/// However, you can set them to zero to override the mincols and minrows values below.

    global $CFG, $COURSE, $HTTPSPAGEREQUIRED;
    static $scriptcount = 0; // For loading the htmlarea script only once.

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
                        $CFG->httpswwwroot .'/lib/editor/fckeditor/fckeditor.js?id='.$courseid.$httpsrequired.'"></script>'."\n" : '';
            } else {
                $httpsrequired = empty($HTTPSPAGEREQUIRED) ? '' : '?httpsrequired=1';
                $str .= ($scriptcount < 1) ? '<script type="text/javascript" src="'.
                         $CFG->httpswwwroot .'/lib/editor/fckeditor/fckeditor.js '.$httpsrequired.'"></script>'."\n" : '';

            }
            $scriptcount++;

        }
    }
if ($usehtmleditor) {
    $str .= '<textarea class="form-textarea" id="'. $id .'" name="'. $name .'" rows="'. $rows .'" cols="'. $cols .'">';
    $str .= htmlspecialchars($value); 
    $str .= '</textarea>'."\n";
    $str .= '<script type="text/javascript">
//<![CDATA[
document.write(\''.addslashes_js(editorshortcutshelpbutton()).'\');
//]]>
</script>';
       }
else
{
    $str .= '<textarea class="alltext" id="'. $id .'" name="'. $name .'" rows="'. $rows .'" cols="'. $cols .'">';  
    $str .= s($value);
    $str .= '</textarea>'."\n";
}
    if ($return) {
        return $str;
    }
    echo $str;
}

?><!--[if IE 7]>
    <link rel="stylesheet" type="text/css" href="<?php echo $CFG->httpswwwroot ?>/theme/standard/styles_ie7.css" />
<![endif]-->
<!--[if IE 6]>
    <link rel="stylesheet" type="text/css" href="<?php echo $CFG->httpswwwroot ?>/theme/standard/styles_ie6.css" />
<![endif]-->
