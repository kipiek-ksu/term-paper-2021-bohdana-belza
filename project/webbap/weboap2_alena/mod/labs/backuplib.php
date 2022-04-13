<?PHP // $Id: backuplib.php,v 1.1 2006/03/12 18:39:59 skodak Exp $
    //This php script contains all the stuff to backup/restore
    //labs mods

    //This is the 'graphical' structure of the labs mod:
    //
    //                       labs
    //                     (CL,pk->id)
    //                        |
    //                        |
    //                        |
    //                     labs_chapters
    //               (CL,pk->id, fk->labsid)
    //
    // Meaning: pk->primary key field of the table
    //          fk->foreign key to link with parent
    //          nt->nested field (recursive data)
    //          CL->course level info
    //          UL->user level info
    //          files->table may have files)
    //
    //-----------------------------------------------------------

    //This function executes all the backup procedure about this mod
    function labs_backup_mods($bf,$preferences) {
        global $CFG;

        $status = true;

        ////Iterate over labs table
        if ($labss = get_records ('labs', 'course', $preferences->backup_course, 'id')) {
            foreach ($labss as $labs) {
                if (backup_mod_selected($preferences,'labs',$labs->id)) {
                    $status = labs_backup_one_mod($bf,$preferences,$labs);
                }
            }
        }
        return $status;
    }

    function labs_backup_one_mod($bf,$preferences,$labs) {

        global $CFG;

        if (is_numeric($labs)) {
            $labs = get_record('labs','id',$labs);
        }

        $status = true;

        //Start mod
        fwrite ($bf,start_tag('MOD',3,true));
        //Print labs data
        fwrite ($bf,full_tag('ID',4,false,$labs->id));
        fwrite ($bf,full_tag('MODTYPE',4,false,'labs'));
        fwrite ($bf,full_tag('NAME',4,false,$labs->name));
        fwrite ($bf,full_tag('SUMMARY',4,false,$labs->summary));
        fwrite ($bf,full_tag('NUMBERING',4,false,$labs->numbering));
        fwrite ($bf,full_tag('DISABLEPRINTING',4,false,$labs->disableprinting));
        fwrite ($bf,full_tag('CUSTOMTITLES',4,false,$labs->customtitles));
        fwrite ($bf,full_tag('TIMECREATED',4,false,$labs->timecreated));
        fwrite ($bf,full_tag('TIMEMODIFIED',4,false,$labs->timemodified));
        //back up the chapters
        $status = backup_labs_chapters($bf,$preferences,$labs);
        //End mod
        $status = fwrite($bf,end_tag('MOD',3,true));

        return $status;
    }

    //Backup labs_chapters contents (executed from labs_backup_mods)
    function backup_labs_chapters($bf,$preferences,$labs) {

        global $CFG;

        $status = true;
        //Print labs's chapters
        if ($chapters = get_records('labs_chapters', 'labsid', $labs->id, 'id')) {
            //Write start tag
            $status =fwrite ($bf,start_tag('CHAPTERS',4,true));
            foreach ($chapters as $ch) {
                //Start chapter
                fwrite ($bf,start_tag('CHAPTER',5,true));
                //Print chapter data
                fwrite ($bf,full_tag('ID',6,false,$ch->id));
                fwrite ($bf,full_tag('PAGENUM',6,false,$ch->pagenum));
                fwrite ($bf,full_tag('SUBCHAPTER',6,false,$ch->subchapter));
                fwrite ($bf,full_tag('TITLE',6,false,$ch->title));
                fwrite ($bf,full_tag('CONTENT',6,false,$ch->content));
                fwrite ($bf,full_tag('HIDDEN',6,false,$ch->hidden));
                fwrite ($bf,full_tag('TIMECREATED',6,false,$ch->timecreated));
                fwrite ($bf,full_tag('TIMEMODIFIED',6,false,$ch->timemodified));
                fwrite ($bf,full_tag('IMPORTSRC',6,false,$ch->importsrc));
                //End chapter
                $status = fwrite ($bf,end_tag('CHAPTER',5,true));
            }
            //Write end tag
            $status = fwrite ($bf,end_tag('CHAPTERS',4,true));
        }
        return $status;
    }

    //Return a content encoded to support interactivities linking. Every module
    //should have its own. They are called automatically from the backup procedure.
    function labs_encode_content_links ($content,$preferences) {

        global $CFG;

        $base = preg_quote($CFG->wwwroot,"/");

        $result = $content;

        //Link to the list of labss
        $buscar="/(".$base."\/mod\/labs\/index.php\?id\=)([0-9]+)/";
        $result= preg_replace($buscar,'$@labsINDEX*$2@$',$result);

        //Link to labs's specific chapter
        $buscar="/(".$base."\/mod\/labs\/view.php\?id\=)([0-9]+)\&chapterid\=([0-9]+)/";
        $result= preg_replace($buscar,'$@labsCHAPTER*$2*$3@$',$result);

        //Link to labs's first chapter
        $buscar="/(".$base."\/mod\/labs\/view.php\?id\=)([0-9]+)/";
        $result= preg_replace($buscar,'$@labsSTART*$2@$',$result);

        return $result;
    }


    ////Return an array of info (name,value)
    function labs_check_backup_mods($course,$user_data=false,$backup_unique_code,$instances=null) {

        if (!empty($instances) && is_array($instances) && count($instances)) {
            $info = array();
            foreach ($instances as $id => $instance) {
                $info += labs_check_backup_mods_instances($instance,$backup_unique_code);
            }
            return $info;
        }

         //First the course data
         $info[0][0] = get_string('modulenameplural','labs');
         $info[0][1] = count_records('labs', 'course', $course);

         //No user data for labss ;-)

         return $info;
    }

    ////Return an array of info (name,value)
    function labs_check_backup_mods_instances($instance,$backup_unique_code) {
         $info[$instance->id.'0'][0] = '<b>'.$instance->name.'</b>';
         $info[$instance->id.'0'][1] = '';

         return $info;
    }

?>
