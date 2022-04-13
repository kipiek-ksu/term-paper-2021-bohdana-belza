<?PHP  // $Id: view.php,v 1.1 2003/09/30 02:45:19 moodler Exp $

/// This page prints a particular instance of slideshow

    require_once("../../config.php");
    require_once("lib.php");

    $id = optional_param('id',0,PARAM_INT);
    $a = optional_param('a',0,PARAM_INT);
    $img_num = optional_param('img_num',0,PARAM_INT);
    

    if ($id) {
        if (! $cm = get_record("course_modules", "id", $id)) {
            error("Course Module ID was incorrect");
        }

        if (! $course = get_record("course", "id", $cm->course)) {
            error("Course is misconfigured");
        }

        if (! $slideshow = get_record("slideshow", "id", $cm->instance)) {
            error("Course module is incorrect");
        }

    } else {
        if (! $slideshow = get_record("slideshow", "id", $a)) {
            error("Course module is incorrect");
        }
        if (! $course = get_record("course", "id", $slideshow->course)) {
            error("Course is misconfigured");
        }
        if (! $cm = get_coursemodule_from_instance("slideshow", $slideshow->id, $course->id)) {
            error("Course Module ID was incorrect");
        }
    }

    require_login($course->id);
    add_to_log($course->id, "slideshow", "captions", "captions.php?id=$cm->id", "$slideshow->id");
    
    /// 1.8 compatible?
 /// Print header.
    $strslideshows = get_string("modulenameplural", "slideshow");
    $navigation = "<a href=\"index.php?id=$course->id\">$strslideshows</a> ->";
    print_header_simple(format_string($slideshow->name), "",
                 "$navigation <a href=\"view.php?id=$cm->id\">".format_string($slideshow->name).'</a>', "", "", true, $buttontext, navmenu($course, $cm));


/// Print the main part of the page

    $course_dir = $CFG->dataroot.'/'.$course->id;
    $showdir = $slideshow->location;
    
    //echo '<br>$course_dir: '.$course_dir.'<br>$showdir: '.$showdir;
    
    $img_count = 0;
    if($_POST["captions"]){
        echo '<div align="center">';
        if(isteacher($course->id)){
            slideshow_write_captions($_POST);
            //
            //
            echo'<p>'.get_string('saved','slideshow');
        }
        echo '<p><form method = "post" action = "view.php?id='.$cm->id.'"><input type = "submit" value = "'.get_string('continue','slideshow').'"></form></div>';
    } else {
        echo '<p style="margin-left : 5px">'.get_string('captiontext', 'slideshow');
        if ($dh = opendir($course_dir.'/'.$showdir)){
            $img_count = 0;
            $mythumbdir = $course_dir.'/moddata/'.$slideshow_thumbdir.'/'.$showdir;
            if ($CFG->slasharguments) {
                $urlroot = $CFG->wwwroot.'/file.php/'.$course->id;
            } else {
                $urlroot = $CFG->wwwroot.'/file.php?file=/'.$course->id;
            }
            $baseurl = $urlroot.'/'.$showdir;
            //$caption_array = slideshow_array_from_xml($mythumbdir.'/slideshow'.$cm->id.'.xml');
            $caption_array = caption_array($cm->id);
            echo '<form name="form" method="post">';
            echo '<input type = "hidden" name="id" value="'.$cm->id.'">';
            if (extension_loaded('gd')) {
	            echo '<p> <table cellpadding = 5>'."\n";
                //
                // build and order image array $filearray
                while ($filename = readdir($dh)){   
                    if (  eregi("\.jpe?g$", $filename) || eregi("\.gif$", $filename) || eregi("\.png$", $filename)){
                        $filearray[$img_count] = $filename;
                        if(!file_exists($mythumbdir.'/'.$filename)) {
                            slideshow_thumbnail($course_dir,$showdir,$filename);
                        }
                        $img_count ++;
                    }
                }
                sort($filearray);
                    //
                    // display caption form:
                $img_count = 0;
                foreach ($filearray as $filename){
                    //$piclist[$img_count] = $filename;
                    if(!file_exists($my_thumbdir.'/'.$filename)) {
                        slideshow_thumbnail($course_dir,$slideshow->location,$filename);
                    }
                    
                    $currentimage = slideshow_filetidy($filename);
                    if ($caption_array[$currentimage]['image']!=''){
                        $captionstring =  $caption_array[$currentimage]['caption'];
                        $titlestring = $caption_array[$currentimage]['title'];
                    } else {
                        $captionstring = $currentimage;
                        $titlestring = '';
                    }
                    echo '<tr><td align = "right"><img src="'.$urlroot.'/moddata/'.$slideshow_thumbdir.'/'.$slideshow->location.'/'.$filename.'" alt="'.htmlentities($captionstring).'"></td>'."\n";
                    echo '<td>';
                    if(isteacher($course->id)){
                        echo '<input type = "hidden" name="image'.++$img_count.'" value="'.slideshow_filetidy($filename).'"> '."\n";
                        echo 'Title: <input type = "text" name="title'.$img_count.'" value="'.str_replace("\"","&quot;",$titlestring).'" size="40">';
                        echo '<br>Caption: <input type = "text" name="caption'.$img_count.'" value="'.str_replace("\"","&quot;",$captionstring).'" size="80">';
                    } else {
                        echo $captionstring;
                    }
                    echo '</td></tr>'."\n";
                }
                echo '</table>';
            } else {
                // NO GD! ///////////////////////////////////////
                error('Sorry, You need to enable GD to use this module');
            }
            if(isteacher($course->id)){
                echo '<input type = "hidden" name="captions" value="captions">';
                echo '<p><input type = "submit" value="'.get_string('save_changes', 'slideshow').'">';
            }
            echo '</form>';
        } else {
            error(get_string('dir_problem', 'slideshow'));
        }
    }

/// Finish the page
    print_footer($course);


?>
