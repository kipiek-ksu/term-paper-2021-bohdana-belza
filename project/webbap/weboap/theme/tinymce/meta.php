<?php function use_html_editor($name='', $editorhidebuttons='', $id='') {
    global $THEME;
}
function print_textarea($usehtmleditor, $rows, $cols, $width, $height, $name, $value='', $courseid=0, $return=false, $id='') {
    global $CFG, $COURSE, $HTTPSPAGEREQUIRED;
    $str = '';
    if ($id === '') {
        $id = 'edit-'.$name;
    }
if (empty($courseid)) {
            $courseid = $COURSE->id;
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
?><script type="text/javascript" src="<?php echo $CFG->wwwroot ?>/lib/editor/tinymce/jscripts/tiny_mce/tiny_mce.js"></script>


<!-- Needs to be seperate script tags! -->
<script type="text/javascript">
tinyMCE.init({

theme : "advanced",

mode : "textareas",

plugins : "table,save,advhr,advimage,advlink,emotions,iespell,preview,zoom,flash,searchreplace,print,paste,directionality,fullscreen,noneditable,contextmenu, equation",
theme_advanced_buttons1_add : "preview,zoom,separator,forecolor,backcolor",
theme_advanced_buttons3_add : "cut,copy,paste,pasteword,separator,emotions,iespell,flash,separator,fullscreen, equation",
theme_advanced_toolbar_location : "top",
theme_advanced_toolbar_align : "left",

theme_advanced_statusbar_location : "bottom",

content_css : "example_full.css",

plugin_insertdate_dateFormat : "%Y-%m-%d",

plugin_insertdate_timeFormat : "%H:%M:%S",

extended_valid_elements : 'a[name|href|target|title|onclick],img[class|src|border="0"|alt|title|hspace|vspace|width|height|align|onmouseover|onmouseout|name],hr[class|width|size|noshade],font[face|size|color|style],span[class|align|style]',

external_link_list_url : "link.php",

external_image_list_url : "inset_image.php",

flash_external_list_url : "example_flash_list.js",

paste_use_dialog : false,

theme_advanced_resizing : true,

theme_advanced_resize_horizontal : true,

theme_advanced_styles : "Header 1=header1;Header 2=header2;Header 3=header3;Table Row=tableRow1",

apply_source_formatting : true,

convert_urls : false,

entity_encoding : "raw",

editor_selector : "form-textarea"

});

// -->
</script>





<!--[if IE 7]>
    <link rel="stylesheet" type="text/css" href="<?php echo $CFG->httpswwwroot ?>/theme/standard/styles_ie7.css" />
<![endif]-->
<!--[if IE 6]>
    <link rel="stylesheet" type="text/css" href="<?php echo $CFG->httpswwwroot ?>/theme/standard/styles_ie6.css" />
<![endif]-->
