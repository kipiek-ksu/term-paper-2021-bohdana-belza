    <?PHP  // $Id: lib.php,v 1.3 2004/06/09 22:35:27 gustav_delius Exp $    /// Library of functions and constants for module slideshow    // name the subdirectory created to store thumbnails    $slideshow_thumbdir = 'jpgs_data';    $slideshow_ojdir = 'original_imgs';
/*
    // files larger than this (k) will set off a warning    $maxk = 60;    // sensible limits for image on page:    $max_width = 600;    $max_height = 400;
    */
    // whether to copy or delete original images
    $keep_oj_img = "true";
    //this is kludge 1

    if (!isset($CFG->slideshow_maxsize)) {
        set_config('slideshow_maxsize','60');
    // Default maximum size for images
    }
    if (!isset($CFG->slideshow_maxwidth)) {
        set_config('slideshow_maxwidth','600');
    // Default maximum size for images
    }
    if (!isset($CFG->slideshow_maxheight)) {
        set_config('slideshow_maxheight','400');
    // Default maximum size for images
    }
    if (!isset($CFG->slideshow_keeporiginals)) {
        set_config('slideshow_keeporiginals','1');
    }

    // files larger than this (k) will set off a warning    $maxk = $CFG->slideshow_maxsize;    // sensible limits for image on page:    $max_width = $CFG->slideshow_maxwidth;    $max_height = $CFG->slideshow_maxheight;
    // whether to copy or delete original images
    $keep_oj_img = $CFG->slideshow_keeporiginals;
    function slideshow_add_instance($slideshow) {    /// Given an object containing all the necessary data,    /// (defined by the form in mod.html) this function    /// will create a new instance and return the id number    /// of the new instance.        $slideshow->timemodified = time();        # May have to add extra stuff in here #        return insert_record("slideshow", $slideshow);    }    function slideshow_update_instance($slideshow) {    /// Given an object containing all the necessary data,    /// (defined by the form in mod.html) this function    /// will update an existing instance with new data.        $slideshow->timemodified = time();        $slideshow->id = $slideshow->instance;        # May have to add extra stuff in here #        return update_record("slideshow", $slideshow);    }     function slideshow_delete_instance($id) {
    /// Given an ID of an instance of this module,
    /// this function will permanently delete the instance
    /// and any data that depends on it.
        if (! $slideshow = get_record("slideshow", "id", "$id")) {
            return false;
        }
        $result = true;
        # Delete any dependent records here #
        $module_id = get_record("modules","name","slideshow");
        $instance_id = get_record("course_modules","instance","$id","module","$module_id->id");
        if (! delete_records("slideshow_captions", "slideshow", "$instance_id->id")) {
            $result = false;
        } else {
            if (! delete_records("slideshow", "id", "$slideshow->id")) {
                $result = false;
            }
        }
        return $result;
    }
    function slideshow_user_outline($course, $user, $mod, $slideshow) {    /// Return a small object with summary information about what a    /// user has done with a given particular instance of this module    /// Used for user activity reports.    /// $return->time = the time they did it    /// $return->info = a short text description        return $return;    }    function slideshow_user_complete($course, $user, $mod, $slideshow) {    /// Print a detailed representation of what a  user has done with    /// a given particular instance of this module, for user activity reports.        return true;    }    function slideshow_print_recent_activity($course, $isteacher, $timestart) {    /// Given a course and a time, this module should find recent activity    /// that has occurred in slideshow activities and print it out.    /// Return true if there was output, or false is there was none.        global $CFG;        return false;  //  True if anything was printed, otherwise false    }    function slideshow_cron () {    /// Function to be run periodically according to the moodle cron    /// This function searches for things that need to be done, such    /// as sending out mail, toggling flags etc ...        global $CFG;        return true;    }    function slideshow_grades($slideshowid) {    /// Must return an array of grades for a given instance of this module,    /// indexed by user.  It also returns a maximum allowed grade.    ///    ///    $return->grades = array of grades;    ///    $return->maxgrade = maximum allowed grade;    ///    ///    return $return;       return NULL;    }    function slideshow_get_participants($slideshowid) {    //Must return an array of user records (all data) who are participants    //for a given instance of slideshow. Must include every user involved    //in the instance, independient of his role (student, teacher, admin...)    //See other modules as example.        return false;    }    function slideshow_scale_used ($slideshowid,$scaleid) {    //This function returns if a scale is being used by one slideshow    //it it has support for grading and scales. Commented code should be    //modified if necessary. See forum, glossary or journal modules    //as reference.        $return = false;        //$rec = get_record("slideshow","id","$slideshowid","scale","-$scaleid");        //        //if (!empty($rec)  && !empty($scaleid)) {        //    $return = true;        //}        return $return;    }    //////////////////////////////////////////////////////////////////////////////////////    /// Any other slideshow functions go here.  Each of them must have a name that    /// starts with slideshow_
    function slideshow_display_thumbs($filearray){
        global $urlroot,$slideshow_thumbdir,$showdir,$cm,$img_num;
        $this_img = 0;
        $thumb_html_arr = array();
        foreach ($filearray as $filename) {
            if ($this_img == $img_num){
                $bstyle = 'border:3px solid #369';
            } else {
                $bstyle = 'border:2px solid white';
            }
            echo "\n<a href=\"?id=".($cm->id).'&img_num='.$this_img.'#tmb">';
            echo '<img src="'.$urlroot.'/moddata/'.$slideshow_thumbdir.'/'.$showdir.'/'.$filename.'" alt="'.$filename.'" title="'.$filename.'" style="'.$bstyle.'">';
            echo '</a> ';
            $this_img++;
        }
    }
        function slideshow_thumbnail ($coursedir,$myDir,$myThumb){        global $slideshow_thumbdir;        $height = 50;        list($width_orig, $height_orig) = getimagesize($coursedir.'/'.$myDir.'/'.$myThumb);        $width = ($height / $height_orig) * $width_orig;        $newImg = imagecreatetruecolor($width, $height);
        
        if (eregi("\.jpe?g$", $myThumb)){
            $OJImg = imagecreatefromjpeg($coursedir.'/'.$myDir.'/'.$myThumb);
            imagecopyresampled($newImg, $OJImg, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);
            imagejpeg($newImg, $coursedir.'/moddata/'.$slideshow_thumbdir.'/'.$myDir.'/'.$myThumb);
        } elseif (eregi("\.png$", $myThumb)) {
            $OJImg = @imagecreatefrompng($coursedir.'/'.$myDir.'/'.$myThumb);
            imagecopyresampled($newImg, $OJImg, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);
            imagepng($newImg, $coursedir.'/moddata/'.$slideshow_thumbdir.'/'.$myDir.'/'.$myThumb);
        } elseif (eregi("\.gif$", $myThumb)) {
            $OJImg = @imagecreatefromgif($coursedir.'/'.$myDir.'/'.$myThumb);
            imagecopyresampled($newImg, $OJImg, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);
            imagegif($newImg, $coursedir.'/moddata/'.$slideshow_thumbdir.'/'.$myDir.'/'.$myThumb);
        }
              imagedestroy($newImg);        imagedestroy($OJImg);    }
    function slideshow_filetidy ($filename){        return substr($filename, 0, -strlen(strrchr($filename, '.')));        //return $filename;    }
    
    function caption_array($feed){
        $img_array = array();
        //get_records($table, $field='', $value='', $sort='', $fields='*', $limitfrom='', $limitnum='')
        if($caption_object_array = get_records('slideshow_captions', 'slideshow', $feed, $sort='', $fields='*', $limitfrom='', $limitnum='')){
            foreach($caption_object_array as $caption_object ){
                foreach($caption_object as $field => $value){
                    $this_img_array[$field] = $value;
                    if ($field == 'image'){
                        $thisid = $value;
                    }
                }
                $img_array[$thisid] = $this_img_array;
            }
        return ($img_array);
        }
    }
    
    function slideshow_write_captions($captions){
        delete_records_select('slideshow_captions', 'slideshow = '.$captions['id']);
        $i = 0;
        while ($captions['image'.++$i]!=""){
            $newcaption->slideshow = $captions['id'];
            $newcaption->image = $captions['image'.$i];
            $newcaption->title = stripslashes(htmlspecialchars($captions['title'.$i], ENT_QUOTES));
            $newcaption->caption = stripslashes(htmlspecialchars($captions['caption'.$i], ENT_QUOTES));
            if (!$chapter->id = insert_record('slideshow_captions', $newcaption)) {
                error('Could not insert caption');
            }
        }
    }
        function slideshow_sizeme($size){        global $max_width;        global $max_height ;        if ($size[0] > $max_width){            $size[1] = $size[1]*$max_width/$size[0] ;            $size[0] = $max_width;        }        if ($size[1]> $max_height){            $size[0] = $size[0]*$max_height/$size[1];            $size[1] = $max_height;        }        return array($size[0],$size[1]);    }    function slideshow_resizer($imagefile){
        list($width_orig, $height_orig) = getimagesize($imagefile);
        list($nuwidth, $nuheight) = slideshow_sizeme(getimagesize($imagefile));
        $newImg = @imagecreatetruecolor($nuwidth, $nuheight)
            or die("Cannot Initialize new GD image stream");
        //@unlink($imagefile);
        if (eregi("\.jpe?g$", $imagefile)){
            $OgImg = imagecreatefromjpeg($imagefile);
            ImageCopyResampled($newImg, $OgImg, 0, 0, 0, 0, $nuwidth, $nuheight, $width_orig, $height_orig);
            imagejpeg($newImg, $imagefile);
        } elseif (eregi("\.png$", $imagefile)) {
            $OgImg = imagecreatefrompng($imagefile);
            ImageCopyResampled($newImg, $OgImg, 0, 0, 0, 0, $nuwidth, $nuheight, $width_orig, $height_orig);
            imagepng($newImg, $imagefile);
        } elseif (eregi("\.gif$", $imagefile)) {
            $OgImg = imagecreatefromgif($imagefile);
            ImageCopyResampled($newImg, $OgImg, 0, 0, 0, 0, $nuwidth, $nuheight, $width_orig, $height_orig);
            imagegif($newImg, $imagefile);
        }
        imagedestroy($newImg);
        imagedestroy($OgImg);
    }
    
    
    function slideshow_make_thumb_dir($dirpath){
        if(!is_dir($dirpath)){
            $path = explode('/', $dirpath);
            $mypath = '';
            foreach($path as $newdir){
                $mypath.=$newdir;
                if(!is_dir($mypath)){
                    @mkdir($mypath);
                }
                $mypath.='/';
            }
        }
    }
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //
    //  The functions below this line just stay here to fix probelms created by older versions. DOH!
    //

    // the following function is soleley to clear up after an early jpg_slideshow module version has created data in the image directory    function slideshow_datafolder($basedir, $instance_id, $image_dir){        global $slideshow_thumbdir;
        global $slideshow_ojdir;
        echo '<h5>Slideshow created by early version of JPG Slideshow module</h5><p>Consolidating file structure : relevant files (resized images, thumbnails, xml) are being moved into the /moddata directory</p>';    // if exists in old loc copy caption xml to moddata/thumbdir and delete original        if (file_exists($basedir.'/'.$image_dir.'/'.$slideshow_thumbdir.'/slideshow'.$instance_id.'.xml')){            copy($basedir.'/'.$image_dir.'/'.$slideshow_thumbdir.'/slideshow'.$instance_id.'.xml', $basedir.'/moddata/'.$slideshow_thumbdir.'/'.$image_dir.'/slideshow'.$instance_id.'.xml');            unlink($basedir.'/'.$image_dir.'/'.$slideshow_thumbdir.'/slideshow'.$instance_id.'.xml');
        }
    // copy original images to new location, delete and remove dir
        if ($oj = opendir($basedir.'/'.$image_dir.'/'.$slideshow_thumbdir.'/'.$slideshow_ojdir)){
            if(!is_dir($basedir.'/moddata/'.$slideshow_thumbdir.'/'.$image_dir.'/'.$slideshow_ojdir)){
                @mkdir($basedir.'/moddata/'.$slideshow_thumbdir.'/'.$image_dir.'/'.$slideshow_ojdir);
            }
            while ($filename = readdir($oj)){
                if(copy($basedir.'/'.$image_dir.'/'.$slideshow_thumbdir.'/'.$slideshow_ojdir.'/'.$filename, $basedir.'/moddata/'.$slideshow_thumbdir.'/'.$image_dir.'/'.$slideshow_ojdir.'/'.$filename)){
                    unlink($basedir.'/'.$image_dir.'/'.$slideshow_thumbdir.'/'.$slideshow_ojdir.'/'.$filename);
                }
            }
            closedir($oj);
            if(!rmdir($basedir.'/'.$image_dir.'/'.$slideshow_thumbdir.'/'.$slideshow_ojdir)){
                echo '<br>rmdir('.$basedir.'/'.$image_dir.'/'.$slideshow_thumbdir.'/'.$slideshow_ojdir.') failed';
            }
        }    // copy thumbnails to new directory, delete originals and remove dir
        if ($tn = opendir($basedir.'/'.$image_dir.'/'.$slideshow_thumbdir)){
            while ($filename = readdir($tn)){
                if(copy($basedir.'/'.$image_dir.'/'.$slideshow_thumbdir.'/'.$filename, $basedir.'/moddata/'.$slideshow_thumbdir.'/'.$image_dir.'/'.$filename)){
                    unlink($basedir.'/'.$image_dir.'/'.$slideshow_thumbdir.'/'.$filename);
                }
            }
            closedir($tn);
            if(!rmdir($basedir.'/'.$image_dir.'/'.$slideshow_thumbdir)){
                echo '<br>rmdir('.$basedir.'/'.$image_dir.'/'.$slideshow_thumbdir.') failed';
            }
        }    }
    
    
    ///////////////////////////////////////////////
    //
    //  All XML functions are deprecated except these, needed to: 
    //      read slideshow.xml
    //      write to database
    //      delete slideshow.xml
    //
    //  This section of code may be ugly but it is mostly redundant now so I don't care!

    function slideshow_data_from_xml($datadir, $modinstance){
        $xml_file = $datadir.'/slideshow'.$modinstance.'.xml';
        global $img_array;
        $img_array = array();
        $nodearray = array();
        $thisstring = "";
        $xml_parser = xml_parser_create();
        xml_set_character_data_handler ( $xml_parser, "slideshow_contentHandler");
        xml_set_element_handler($xml_parser, "slideshow_startElement", "slideshow_endElement");
        if ($fp = fopen($xml_file, "r")) {
            while ($data = fread($fp, 4096)) {
                if (!xml_parse($xml_parser, $data, feof($fp))) {
                    echo (sprintf("\n<!-- $rss_source : xml error at line %d of $xml_file -->", xml_get_current_line_number($xml_parser)));
                }
            }
            fclose($fp);
        }
        xml_parser_free($xml_parser);
        $caption_array = array();
        delete_records_select('slideshow_captions', 'slideshow = '.$modinstance);
        foreach($img_array as $file => $cap) {
            $newcaption->slideshow = $modinstance;
            $newcaption->image = $file;
            $newcaption->title = '';
            $newcaption->caption = htmlspecialchars($cap, ENT_QUOTES);
            if (!insert_record('slideshow_captions', $newcaption)) {
                error('Could not insert caption');
            }
        }
        unlink($xml_file);
    }
    function slideshow_startElement($parser) {
        global $thisstring;
        $thisstring = "";
    }
    function slideshow_endElement($parser, $name) {
        global $img_array;
        global $thisstring;
        global $nodearray;
        $nodearray[$name] = $thisstring;
        if($name == "IMAGE") {
            $img_array[$nodearray["FILENAME"]] = $nodearray["CAPTION"] ;
        }
        $thisstring = "";
    }
    function slideshow_contentHandler($parser, $content) {
        global $thisstring;
        $thisstring .= $content;
    }
    
?>