<?PHP // $Id: restorelib.php,v 1.2 2006/03/29 06:21:56 skodak Exp $
    //This php script contains all the stuff to backup/restore
    //labs mods

    //This is the "graphical" structure of the labs mod:
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


    //This function executes all the restore procedure about this mod
    function labs_restore_mods($mod,$restore) {

        global $CFG;

        $status = true;

        //Get record from backup_ids
        $data = backup_getid($restore->backup_unique_code,$mod->modtype,$mod->id);

        if ($data) {
            //Now get completed xmlized object
            $info = $data->info;
            //traverse_xmlize($info);                                                                     //Debug
            //print_object ($GLOBALS['traverse_array']);                                                  //Debug
            //$GLOBALS['traverse_array']="";                                                              //Debug

            //Now, build the labs record structure
            $labs->course = $restore->course_id;
            $labs->name = backup_todb($info['MOD']['#']['NAME']['0']['#']);
            $labs->summary = backup_todb($info['MOD']['#']['SUMMARY']['0']['#']);
            $labs->numbering = backup_todb($info['MOD']['#']['NUMBERING']['0']['#']);
            $labs->disableprinting = backup_todb($info['MOD']['#']['DISABLEPRINTING']['0']['#']);
            $labs->customtitles = backup_todb($info['MOD']['#']['CUSTOMTITLES']['0']['#']);
            $labs->timecreated = $info['MOD']['#']['TIMECREATED']['0']['#'];
            $labs->timemodified = $info['MOD']['#']['TIMEMODIFIED']['0']['#'];

            //The structure is equal to the db, so insert the labs
            $newid = insert_record ('labs',$labs);

            //Do some output
            if (!defined('RESTORE_SILENTLY')) {
                echo '<ul><li>'.get_string('modulename','labs').' "'.$labs->name.'"<br>';
            }
            backup_flush(300);

            if ($newid) {
                //We have the newid, update backup_ids
                backup_putid($restore->backup_unique_code,$mod->modtype,
                             $mod->id, $newid);
                //now restore chapters
                $status = labs_chapters_restore($mod->id,$newid,$info,$restore);

            } else {
                $status = false;
            }
            //Finalize ul
            if (!defined('RESTORE_SILENTLY')) {
                echo "</ul>";
            }

        } else {
            $status = false;
        }

        return $status;
    }

    //This function restores the labs_chapters
    function labs_chapters_restore($old_labs_id, $new_labs_id,$info,$restore) {

        global $CFG;

        $status = true;

        //Get the chapters array
        $chapters = $info['MOD']['#']['CHAPTERS']['0']['#']['CHAPTER'];

        //Iterate over chapters
        for($i = 0; $i < sizeof($chapters); $i++) {
            $sub_info = $chapters[$i];
            //traverse_xmlize($sub_info);                                                                 //Debug
            //print_object ($GLOBALS['traverse_array']);                                                  //Debug
            //$GLOBALS['traverse_array']="";                                                              //Debug

            //We'll need this later!!
            $old_id = backup_todb($sub_info['#']['ID']['0']['#']);

            //Now, build the ASSIGNMENT_CHAPTERS record structure
            $chapter->labsid = $new_labs_id;
            $chapter->pagenum = backup_todb($sub_info['#']['PAGENUM']['0']['#']);
            $chapter->subchapter = backup_todb($sub_info['#']['SUBCHAPTER']['0']['#']);
            $chapter->title = backup_todb($sub_info['#']['TITLE']['0']['#']);
            $chapter->content = backup_todb($sub_info['#']['CONTENT']['0']['#']);
            $chapter->hidden = backup_todb($sub_info['#']['HIDDEN']['0']['#']);
            $chapter->timecreated = backup_todb($sub_info['#']['TIMECREATED']['0']['#']);
            $chapter->timemodified = backup_todb($sub_info['#']['TIMEMODIFIED']['0']['#']);
            $chapter->importsrc = backup_todb($sub_info['#']['IMPORTSRC']['0']['#']);

            //The structure is equal to the db, so insert the labs_chapters
            $newid = insert_record ('labs_chapters',$chapter);

            //Do some output
            if (($i+1) % 50 == 0) {
                if (!defined('RESTORE_SILENTLY')) {
                    echo '.';
                    if (($i+1) % 1000 == 0) {
                        echo '<br>';
                    }
                }
                backup_flush(300);
            }

            if ($newid) {
                //We have the newid, update backup_ids
                backup_putid($restore->backup_unique_code,'labs_chapters',$old_id,
                             $newid);
            } else {
                $status = false;
            }
        }
        return $status;
    }

    //This function returns a log record with all the necessay transformations
    //done. It's used by restore_log_module() to restore modules log.
    function labs_restore_logs($restore,$log) {

        $status = false;

        //Depending of the action, we recode different things
        switch ($log->action) {
            case "update":
            case "view": //TO DO ... verify!!!
               if ($log->cmid) {
                    //Get the new_id of the chapter (to recode the url field)
                    $ch = backup_getid($restore->backup_unique_code,"labs_chapters",$log->info);
                    if ($pag) {
                        $log->url = "view.php?id=".$log->cmid."&chapterid=".$ch->new_id;
                        $log->info = $ch->new_id;
                        $status = true;
                    }
                }
                break;
            case "view all":
                if ($log->cmid) {
                    //Get the new_id of the module (to recode the info field)
                    $mod = backup_getid($restore->backup_unique_code,$log->module,$log->info);
                    if ($mod) {
                        $log->url = "view.php?id=".$log->cmid;
                        $log->info = $mod->new_id;
                        $status = true;
                    }
                }
                break;
            case "export":
                if ($log->cmid) {
                    //Get the new_id of the module (to recode the info field)
                    $mod = backup_getid($restore->backup_unique_code,$log->module,$log->info);
                    if ($mod) {
                        $log->url = "export.php?id=".$log->cmid;
                        $log->info = $mod->new_id;
                        $status = true;
                    }
                }
                break;
            case "print":
                if ($log->cmid) {
                    //Get the new_id of the module (to recode the info field)
                    $mod = backup_getid($restore->backup_unique_code,$log->module,$log->info);
                    if ($mod) {
                        $log->url = "print.php?id=".$log->cmid;
                        $log->info = $mod->new_id;
                        $status = true;
                    }
                }
                break;
            default:
                if (!defined('RESTORE_SILENTLY')) {
                    echo "action (".$log->module."-".$log->action.") unknown. Not restored<br>";                 //Debug
                }
                break;
        }

        if ($status) {
            $status = $log;
        }
        return $status;
    }

    //Return a content decoded to support interactivities linking. Every module
    //should have its own. They are called automatically from
    //labs_decode_content_links_caller() function in each module
    //in the restore process
    function labs_decode_content_links ($content,$restore) {

        global $CFG;

        $result = $content;

        //Link to the list of labss

        $searchstring='/\$@(labsINDEX)\*([0-9]+)@\$/';
        //We look for it
        preg_match_all($searchstring,$content,$foundset);
        //If found, then we are going to look for its new id (in backup tables)
        if ($foundset[0]) {
            //print_object($foundset);                                     //Debug
            //Iterate over foundset[2]. They are the old_ids
            foreach($foundset[2] as $old_id) {
                //We get the needed variables here (course id)
                $rec = backup_getid($restore->backup_unique_code,"course",$old_id);
                //Personalize the searchstring
                $searchstring='/\$@(labsINDEX)\*('.$old_id.')@\$/';
                //If it is a link to this course, update the link to its new location
                if($rec->new_id) {
                    //Now replace it
                    $result= preg_replace($searchstring,$CFG->wwwroot.'/mod/labs/index.php?id='.$rec->new_id,$result);
                } else {
                    //It's a foreign link so leave it as original
                    $result= preg_replace($searchstring,$restore->original_wwwroot.'/mod/labs/index.php?id='.$old_id,$result);
                }
            }
        }


        //Links to specific chapters of labss

        $searchstring='/\$@(labsCHAPTER)\*([0-9]+)\*([0-9]+)@\$/';
        //We look for it
        preg_match_all($searchstring,$result,$foundset);
        //If found, then we are going to look for its new id (in backup tables)
        if ($foundset[0]) {
            //print_object($foundset);                                     //Debug
            //Iterate over foundset[2] and foundset[3]. They are the old_ids
            foreach($foundset[2] as $key => $old_id) {
                $old_id2 = $foundset[3][$key];
                //We get the needed variables here (discussion id and post id)
                $rec = backup_getid($restore->backup_unique_code,'course_modules',$old_id);
                $rec2 = backup_getid($restore->backup_unique_code,'labs_chapters',$old_id2);
                //Personalize the searchstring
                $searchstring='/\$@(labsCHAPTER)\*('.$old_id.')\*('.$old_id2.')@\$/';
                //If it is a link to this course, update the link to its new location
                if($rec->new_id && $rec2->new_id) {
                    //Now replace it
                    $result= preg_replace($searchstring,$CFG->wwwroot.'/mod/labs/view.php?id='.$rec->new_id.'&chapterid='.$rec2->new_id,$result);
                } else {
                    //It's a foreign link so leave it as original
                    $result= preg_replace($searchstring,$restore->original_wwwroot.'/mod/labs/view.php?id='.$old_id.'&chapterid='.$old_id2,$result);
                }
            }
        }


        //Links to first chapters of labss

        $searchstring='/\$@(labsSTART)\*([0-9]+)@\$/';
        //We look for it
        preg_match_all($searchstring,$result,$foundset);
        //If found, then we are going to look for its new id (in backup tables)
        if ($foundset[0]) {
            //print_object($foundset);                                     //Debug
            //Iterate over foundset[2]. They are the old_ids
            foreach($foundset[2] as $old_id) {
                //We get the needed variables here (course_modules id)
                $rec = backup_getid($restore->backup_unique_code,"course_modules",$old_id);
                //Personalize the searchstring
                $searchstring='/\$@(labsSTART)\*('.$old_id.')@\$/';
                //If it is a link to this course, update the link to its new location
                if($rec->new_id) {
                    //Now replace it
                    $result= preg_replace($searchstring,$CFG->wwwroot.'/mod/labs/view.php?id='.$rec->new_id,$result);
                } else {
                    //It's a foreign link so leave it as original
                    $result= preg_replace($searchstring,$restore->original_wwwroot.'/mod/labs/view.php?id='.$old_id,$result);
                }
            }
        }

        return $result;
    }

    //This function makes all the necessary calls to xxxx_decode_content_links()
    //function in each module, passing them the desired contents to be decoded
    //from backup format to destination site/course in order to mantain inter-activities
    //working in the backup/restore process. It's called from restore_decode_content_links()
    //function in restore process
    function labs_decode_content_links_caller($restore) {
        global $CFG;
        $status = true;

        //Decode every labs (summary) in the coure
        if ($labss = get_records_sql ("SELECT b.id, b.summary
                                   FROM {$CFG->prefix}labs b
                                   WHERE b.course = $restore->course_id")) {
            //Iterate over each labs->summary
            $i = 0;   //Counter to send some output to the browser to avoid timeouts
            foreach ($labss as $labs) {
                //Increment counter
                $i++;
                $content = $labs->summary;
                $result = restore_decode_content_links_worker($content,$restore);
                if ($result != $content) {
                    //Update record
                    $labs->summary = addslashes($result);
                    $status = update_record('labs',$labs);
                    if ($CFG->debug>7) {
                        if (!defined('RESTORE_SILENTLY')) {
                            echo '<br /><hr />'.htmlentities($content).'<br />changed to<br />'.htmlentities($result).'<hr /><br />';
                        }
                    }
                }
                //Do some output
                if (($i+1) % 5 == 0) {
                    if (!defined('RESTORE_SILENTLY')) {
                        echo '.';
                        if (($i+1) % 100 == 0) {
                            echo '<br />';
                        }
                    }
                    backup_flush(300);
                }
            }
        }

        //Decode every CHAPTER in the course
        if ($chapters = get_records_sql ("SELECT ch.id, ch.content
                                   FROM {$CFG->prefix}labs b,
                                        {$CFG->prefix}labs_chapters ch
                                   WHERE b.course = $restore->course_id AND
                                         ch.labsid = b.id")) {
            //Iterate over each chapter->content
            $i = 0;   //Counter to send some output to the browser to avoid timeouts
            foreach ($chapters as $chapter) {
                //Increment counter
                $i++;
                $content = $chapter->content;
                $result = restore_decode_content_links_worker($content,$restore);
                if ($result != $content) {
                    //Update record
                    $chapter->content = addslashes($result);
                    $status = update_record('labs_chapters',$chapter);
                    if ($CFG->debug>7) {
                        if (!defined('RESTORE_SILENTLY')) {
                            echo '<br /><hr />'.htmlentities($content).'<br />changed to<br />'.htmlentities($result).'<hr /><br />';
                        }
                    }
                }
                //Do some output
                if (($i+1) % 5 == 0) {
                    if (!defined('RESTORE_SILENTLY')) {
                        echo '.';
                        if (($i+1) % 100 == 0) {
                            echo '<br />';
                        }
                    }
                    backup_flush(300);
                }
            }
        }

        return $status;
    }


?>
