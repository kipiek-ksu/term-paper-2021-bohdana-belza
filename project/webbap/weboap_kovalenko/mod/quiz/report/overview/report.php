<?php
/**
 * This script lists student attempts
 *
 * @version $Id: report.php,v 1.75.2.12 2007/07/30 10:41:18 tjhunt Exp $
 * @author Martin Dougiamas, Tim Hunt and others.
 * @license http://www.gnu.org/copyleft/gpl.html GNU Public License
 * @package quiz
 *//** */

require_once($CFG->libdir.'/tablelib.php');

class quiz_report extends quiz_default_report {

    /**
     * Display the report.
     */
    function display($quiz, $cm, $course) {
        global $CFG, $SESSION, $db, $QTYPES;

        // Define some strings
        $strreallydel  = addslashes(get_string('deleteattemptcheck','quiz'));
        $strtimeformat = get_string('strftimedatetime');
        $strreviewquestion = get_string('reviewresponse', 'quiz');

        // Only print headers if not asked to download data
        if (!$download = optional_param('download', NULL)) {
            $this->print_header_and_tabs($cm, $course, $quiz, $reportmode="overview");
        }

        // Deal with actions
        $action = optional_param('action', '', PARAM_ACTION);

        switch($action) {
            case 'delete': // Some attempts need to be deleted
                $attemptids = optional_param('attemptid', array(), PARAM_INT);

                foreach($attemptids as $attemptid) {
                    if ($attemptid && $todelete = get_record('quiz_attempts', 'id', $attemptid)) {
                        delete_records('quiz_attempts', 'id', $attemptid);
                        delete_attempt($todelete->uniqueid);

                        // Search quiz_attempts for other instances by this user.
                        // If none, then delete record for this quiz, this user from quiz_grades
                        // else recalculate best grade

                        $userid = $todelete->userid;
                        if (!record_exists('quiz_attempts', 'userid', $userid, 'quiz', $quiz->id)) {
                            delete_records('quiz_grades', 'userid', $userid,'quiz', $quiz->id);
                        } else {
                            quiz_save_best_grade($quiz, $userid);
                        }
                    }
                }
            break;
        }

        // Set of format options for teacher-created content, for example overall feedback.
        $nocleanformatoptions = new stdClass;
        $nocleanformatoptions->noclean = true;

        // Set table options
        $noattempts = optional_param('noattempts', 0, PARAM_INT);
        $detailedmarks = optional_param('detailedmarks', 0, PARAM_INT);
        $pagesize = optional_param('pagesize', 10, PARAM_INT);
        $reporturl = $CFG->wwwroot.'/mod/quiz/report.php?mode=overview';
        $reporturlwithoptions = $reporturl . '&amp;id=' . $cm->id . '&amp;noattempts=' . $noattempts .
                '&amp;detailedmarks=' . $detailedmarks . '&amp;pagesize=' . $pagesize;
                
        // Print information on the number of existing attempts
        if (!$download) { //do not print notices when downloading
            if ($attemptnum = count_records('quiz_attempts', 'quiz', $quiz->id, 'preview', 0)) {
                $a = new stdClass;
                $a->attemptnum = $attemptnum;
                $a->studentnum = count_records_select('quiz_attempts', "quiz = '$quiz->id' AND preview = '0'", 'COUNT(DISTINCT userid)');
                $a->studentstring = $course->students;

                notify(get_string('numattempts', 'quiz', $a));
            }
        }

        $context = get_context_instance(CONTEXT_MODULE, $cm->id);
        /// find out current groups mode
        if ($groupmode = groupmode($course, $cm)) { // Groups are being used
            if (!$download) {
                $currentgroup = setup_and_print_groups($course, $groupmode, $reporturlwithoptions);
            } else {
                $currentgroup = get_and_set_current_group($course, $groupmode);
            }
        } else {
            $currentgroup = get_and_set_current_group($course, $groupmode);
        }

        $hasfeedback = quiz_has_feedback($quiz->id) && $quiz->grade > 1.e-7 && $quiz->sumgrades > 1.e-7;
        if ($pagesize < 1) {
            $pagesize = 10;
        }

        // Now check if asked download of data
        if ($download) {
            $filename = clean_filename("$course->shortname ".format_string($quiz->name,true));
            $sort = '';
        }

        // Define table columns
		  $tablecolumns = array('checkbox', 'picture', 'fullname', 'timestart', 'timefinish', 'duration');
          $tableheaders = array(NULL, '', get_string('fullname'), get_string('startedon', 'quiz'), get_string('timecompleted','quiz'), get_string('attemptduration', 'quiz'));

        if ($quiz->grade and $quiz->sumgrades) {
            $tablecolumns[] = 'sumgrades';
            $tableheaders[] = get_string('grade', 'quiz');//.'/'.$quiz->grade;
        }

        if($detailedmarks) {
            // we want to display marks for all questions
            // Start by getting all questions
            $questionlist = quiz_questions_in_quiz($quiz->questions);
            $questionids = explode(',', $questionlist);
            $sql = "SELECT q.*, i.grade AS maxgrade, i.id AS instance".
                    "  FROM {$CFG->prefix}question q,".
                    "       {$CFG->prefix}quiz_question_instances i".
                    " WHERE i.quiz = '$quiz->id' AND q.id = i.question".
                    "   AND q.id IN ($questionlist)";
            if (!$questions = get_records_sql($sql)) {
                error('No questions found');
            }
            $number = 1;
            foreach($questionids as $key => $id) {
                if ($questions[$id]->length) {
                    // Only print questions of non-zero length
                    $tablecolumns[] = '$'.$id;
                    $tableheaders[] = '#'.$number;
                    $questions[$id]->number = $number;
                    $number += $questions[$id]->length;
                } else {
                    // get rid of zero length questions
                    unset($questions[$id]);
                    unset($questionids[$key]);
                }
            }
        }

        if ($hasfeedback) {
            //$tablecolumns[] = 'feedbacktext';
            //$tableheaders[] = get_string('feedback', 'quiz');
        }

        if (!$download) {
            // Set up the table

            $table = new flexible_table('mod-quiz-report-overview-report');

            $table->define_columns($tablecolumns);
            $table->define_headers($tableheaders);
            $table->define_baseurl($reporturlwithoptions);

            $table->sortable(true);
            $table->collapsible(true);

            $table->column_suppress('picture');
            $table->column_suppress('fullname');

            $table->column_class('picture', 'picture');

            $table->set_attribute('cellspacing', '0');
            $table->set_attribute('id', 'attempts');
            $table->set_attribute('class', 'generaltable generalbox');

            // Start working -- this is necessary as soon as the niceties are over
            $table->setup();
        } else if ($download =='ODS') {
            require_once("$CFG->libdir/odslib.class.php");

            $filename .= ".ods";
            // Creating a workbook
            $workbook = new MoodleODSWorkbook("-");
            // Sending HTTP headers
            $workbook->send($filename);
            // Creating the first worksheet
            $sheettitle = get_string('reportoverview','quiz');
            $myxls =& $workbook->add_worksheet($sheettitle);
            // format types
            $format =& $workbook->add_format();
            $format->set_bold(0);
            $formatbc =& $workbook->add_format();
            $formatbc->set_bold(1);
            $formatbc->set_align('center');
            $formatb =& $workbook->add_format();
            $formatb->set_bold(1);
            $formaty =& $workbook->add_format();
            $formaty->set_bg_color('yellow');
            $formatc =& $workbook->add_format();
            $formatc->set_align('center');
            $formatr =& $workbook->add_format();
            $formatr->set_bold(1);
            $formatr->set_color('red');
            $formatr->set_align('center');
            $formatg =& $workbook->add_format();
            $formatg->set_bold(1);
            $formatg->set_color('green');
            $formatg->set_align('center');
            // Here starts workshhet headers

            $headers = array(get_string('fullname'), get_string('startedon', 'quiz'), get_string('timecompleted', 'quiz'), get_string('attemptduration', 'quiz'));

            if ($quiz->grade and $quiz->sumgrades) {
                $headers[] = get_string('grade', 'quiz').'/'.$quiz->grade;
            }
            if($detailedmarks) {
                foreach ($questionids as $id) {
                    $headers[] = '#'.$questions[$id]->number;
                }
            }
            if ($hasfeedback) {
                $headers[] = get_string('feedback', 'quiz');
            }
            $colnum = 0;
            foreach ($headers as $item) {
                $myxls->write(0,$colnum,$item,$formatbc);
                $colnum++;
            }
            $rownum=1;
        } else if ($download =='Excel') {
            require_once("$CFG->libdir/excellib.class.php");

            $filename .= ".xls";
            // Creating a workbook
            $workbook = new MoodleExcelWorkbook("-");
            // Sending HTTP headers
            $workbook->send($filename);
            // Creating the first worksheet
            $sheettitle = get_string('reportoverview','quiz');
            $myxls =& $workbook->add_worksheet($sheettitle);
            // format types
            $format =& $workbook->add_format();
            $format->set_bold(0);
            $formatbc =& $workbook->add_format();
            $formatbc->set_bold(1);
            $formatbc->set_align('center');
            $formatb =& $workbook->add_format();
            $formatb->set_bold(1);
            $formaty =& $workbook->add_format();
            $formaty->set_bg_color('yellow');
            $formatc =& $workbook->add_format();
            $formatc->set_align('center');
            $formatr =& $workbook->add_format();
            $formatr->set_bold(1);
            $formatr->set_color('red');
            $formatr->set_align('center');
            $formatg =& $workbook->add_format();
            $formatg->set_bold(1);
            $formatg->set_color('green');
            $formatg->set_align('center');
            // Here starts workshhet headers

            $headers = array(get_string('fullname'), get_string('startedon', 'quiz'), get_string('timecompleted', 'quiz'), get_string('attemptduration', 'quiz'));

            if ($quiz->grade and $quiz->sumgrades) {
                $headers[] = get_string('grade', 'quiz').'/'.$quiz->grade;
            }
            if($detailedmarks) {
                foreach ($questionids as $id) {
                    $headers[] = '#'.$questions[$id]->number;
                }
            }
            if ($hasfeedback) {
                $headers[] = get_string('feedback', 'quiz');
            }
            $colnum = 0;
            foreach ($headers as $item) {
                $myxls->write(0,$colnum,$item,$formatbc);
                $colnum++;
            }
            $rownum=1;
        } else if ($download=='CSV') {
            $filename .= ".txt";

            header("Content-Type: application/download\n");
            header("Content-Disposition: attachment; filename=\"$filename\"");
            header("Expires: 0");
            header("Cache-Control: must-revalidate,post-check=0,pre-check=0");
            header("Pragma: public");

            $headers = get_string('fullname')."\t".get_string('startedon', 'quiz')."\t".get_string('timecompleted', 'quiz')."\t".get_string('attemptduration', 'quiz');

            if ($quiz->grade and $quiz->sumgrades) {
                $headers .= "\t".get_string('grade', 'quiz')."/".$quiz->grade;
            }
            if($detailedmarks) {
                foreach ($questionids as $id) {
                    $headers .= "\t#".$questions[$id]->number;
                }
            }
            if ($hasfeedback) {
                $headers .= "\t" . get_string('feedback', 'quiz');
            }
            echo $headers." \n";
        }

        $contextlists = get_related_contexts_string(get_context_instance(CONTEXT_COURSE, $course->id));

        // Construct the SQL
        $select = 'SELECT '.sql_concat('u.id', '\'#\'', $db->IfNull('qa.attempt', '0')).' AS uniqueid, '.
            'qa.uniqueid as attemptuniqueid, qa.id AS attempt, u.id AS userid, u.firstname, u.lastname, u.picture, '.
            'qa.sumgrades, qa.timefinish, qa.timestart, qa.timefinish - qa.timestart AS duration ';
        if ($course->id != SITEID) { // this is too complicated, so just do it for each of the four cases.
            if (!empty($currentgroup) && empty($noattempts)) {
                // we want a particular group and we only want to see students WITH attempts.
                // So join on groups_members and do an inner join on attempts.
                $from  = 'FROM '.$CFG->prefix.'user u JOIN '.$CFG->prefix.'role_assignments ra ON ra.userid = u.id '.
                    groups_members_join_sql().
                    'JOIN '.$CFG->prefix.'quiz_attempts qa ON u.id = qa.userid AND qa.quiz = '.$quiz->id;
                $where = ' WHERE ra.contextid ' . $contextlists . ' AND '. groups_members_where_sql($currentgroup) .' AND qa.preview = 0';
            } else if (!empty($currentgroup) && !empty($noattempts)) {
                // We want a particular group and we want to do something funky with attempts
                // So join on groups_members and left join on attempts...
                $from  = 'FROM '.$CFG->prefix.'user u JOIN '.$CFG->prefix.'role_assignments ra ON ra.userid = u.id '.
                    groups_members_join_sql().
                    'LEFT JOIN '.$CFG->prefix.'quiz_attempts qa ON u.id = qa.userid AND qa.quiz = '.$quiz->id;
                $where = ' WHERE ra.contextid ' .$contextlists . ' AND '.groups_members_where_sql($currentgroup);
                if ($noattempts == 1) {
                    // noattempts = 1 means only no attempts, so make the left join ask for only records where the right is null (no attempts)
                    $where .= ' AND qa.userid IS NULL'; // show ONLY no attempts;
                } else {
                    // We are including attempts, so exclude previews.
                    $where .= ' AND qa.preview = 0';
                }
            } else if (empty($currentgroup)) {
                // We don't care about group, and we to do something funky with attempts
                // So do a left join on attempts
                $from  = 'FROM '.$CFG->prefix.'user u JOIN '.$CFG->prefix.'role_assignments ra ON ra.userid = u.id LEFT JOIN '.$CFG->prefix.'quiz_attempts qa ON u.id = qa.userid AND qa.quiz = '.$quiz->id;
                $where = " WHERE ra.contextid $contextlists";
                if (empty($noattempts)) {
                    $where .= ' AND qa.userid IS NOT NULL AND qa.preview = 0'; // show ONLY students with attempts;
                } else if ($noattempts == 1) {
                    // noattempts = 1 means only no attempts, so make the left join ask for only records where the right is null (no attempts)
                    $where .= ' AND qa.userid IS NULL'; // show ONLY students without attempts;
                } else if ($noattempts == 3) {
                    // we want all attempts
                    $from  = 'FROM '.$CFG->prefix.'user u JOIN '.$CFG->prefix.'quiz_attempts qa ON u.id = qa.userid ';
                    $where = ' WHERE qa.quiz = '.$quiz->id.' AND qa.preview = 0';
                } // noattempts = 2 means we want all students, with or without attempts
            }
            $countsql = 'SELECT COUNT(DISTINCT('.sql_concat('u.id', '\'#\'', $db->IfNull('qa.attempt', '0')).')) '.$from.$where;
        } else {
            if (empty($noattempts)) {
                $from   = 'FROM '.$CFG->prefix.'user u JOIN '.$CFG->prefix.'quiz_attempts qa ON u.id = qa.userid ';
                $where = ' WHERE qa.quiz = '.$quiz->id.' AND qa.preview = 0';
                $countsql = 'SELECT COUNT(DISTINCT('.sql_concat('u.id', '\'#\'', $db->IfNull('qa.attempt', '0')).')) '.$from.$where;
            }
        }
        if (!$download) {
            // Add extra limits due to initials bar
            if($table->get_sql_where()) {
                $where .= ' AND '.$table->get_sql_where();
            }

            // Count the records NOW, before funky question grade sorting messes up $from
            if (!empty($countsql)) {
                $totalinitials = count_records_sql($countsql);
                if ($table->get_sql_where()) {
                    $countsql .= ' AND '.$table->get_sql_where();
                }
                $total  = count_records_sql($countsql);

            }

            // Add extra limits due to sorting by question grade
            if($sort = $table->get_sql_sort()) {
                $sortparts    = explode(',', $sort);
                $newsort      = array();
                $questionsort = false;
                foreach($sortparts as $sortpart) {
                    $sortpart = trim($sortpart);
                    if(substr($sortpart, 0, 1) == '$') {
                        if(!$questionsort) {
                            $qid          = intval(substr($sortpart, 1));
                            $select .= ', grade ';
                            $from        .= ' LEFT JOIN '.$CFG->prefix.'question_sessions qns ON qns.attemptid = qa.id '.
                                                'LEFT JOIN '.$CFG->prefix.'question_states qs ON qs.id = qns.newgraded ';
                            $where       .= ' AND ('.sql_isnull('qns.questionid').' OR qns.questionid = '.$qid.')';
                            $newsort[]    = 'grade '.(strpos($sortpart, 'ASC')? 'ASC' : 'DESC');
                            $questionsort = true;
                        }
                    } else {
                        $newsort[] = $sortpart;
                    }
                }

                // Reconstruct the sort string
                $sort = ' ORDER BY '.implode(', ', $newsort);
            }

            // Fix some wired sorting
            if (empty($sort)) {
                $sort = ' ORDER BY uniqueid';
            }

            $table->pagesize($pagesize, $total);
        }

        // If there is feedback, include it in the query.
        if ($hasfeedback) {
            $factor = $quiz->grade/$quiz->sumgrades;
            $select .= ', qf.feedbacktext ';
            $from .= " JOIN {$CFG->prefix}quiz_feedback AS qf ON " .
                    "qf.quizid = $quiz->id AND qf.mingrade <= qa.sumgrades * $factor AND qa.sumgrades * $factor < qf.maxgrade";
        }

        // Fetch the attempts
        if (!empty($from)) { // if we're in the site course and displaying no attempts, it makes no sense to do the query.
            if (!$download) {
                $attempts = get_records_sql($select.$from.$where.$sort,
                                        $table->get_page_start(), $table->get_page_size());
            } else {
                $attempts = get_records_sql($select.$from.$where.$sort);
            }
        } else {
            $attempts = array();
        }

        // Build table rows

        if (!$download) {
            $table->initialbars($totalinitials>20);
        }
        if(!empty($attempts) || !empty($noattempts)) {
            if ($attempts) {
                foreach ($attempts as $attempt) {

                    $picture = print_user_picture($attempt->userid, $course->id, $attempt->picture, false, true);

                    // uncomment the commented lines below if you are choosing to show unenrolled users and
                    // have uncommented the corresponding lines earlier in this script
                    //if (in_array($attempt->userid, $unenrolledusers)) {
                    //    $userlink = '<a class="dimmed" href="'.$CFG->wwwroot.'/user/view.php?id='.$attempt->userid.'&amp;course='.$course->id.'">'.fullname($attempt).'</a>';
                    //}
                    //else {
                        $userlink = '<a href="'.$CFG->wwwroot.'/user/view.php?id='.$attempt->userid.'&amp;course='.$course->id.'">'.fullname($attempt).'</a>';
                    //}
                    if (!$download) {
                        $row = array(
                                '<input type="checkbox" name="attemptid[]" value="'.$attempt->attempt.'" />',
                                $picture,
                                $userlink,
                                empty($attempt->attempt) ? '-' : '<a href="review.php?q='.$quiz->id.'&amp;attempt='.$attempt->attempt.'">'.userdate($attempt->timestart, $strtimeformat).'</a>',
                                empty($attempt->timefinish) ? '-' : '<a href="review.php?q='.$quiz->id.'&amp;attempt='.$attempt->attempt.'">'.userdate($attempt->timefinish, $strtimeformat).'</a>',
                                empty($attempt->attempt) ? '-' : (empty($attempt->timefinish) ? get_string('unfinished', 'quiz') : format_time($attempt->duration))
                        );
                    } else {
                        $row = array(fullname($attempt),
                                empty($attempt->attempt) ? '-' : userdate($attempt->timestart, $strtimeformat),
                                empty($attempt->timefinish) ? '-' : userdate($attempt->timefinish, $strtimeformat),
                                empty($attempt->attempt) ? '-' : (empty($attempt->timefinish) ? get_string('unfinished', 'quiz') : format_time($attempt->duration))
                        );
                    }

                    /*if ($quiz->grade and $quiz->sumgrades) {
                        if (!$download) {
                            $row[] = $attempt->sumgrades === NULL ? '-' : '<a href="review.php?q='.$quiz->id.'&amp;attempt='.$attempt->attempt.'">'.round($attempt->sumgrades / $quiz->sumgrades * $quiz->grade,$quiz->decimalpoints).'</a>';
                        } else {
                            $row[] = $attempt->sumgrades === NULL ? '-' : round($attempt->sumgrades / $quiz->sumgrades * $quiz->grade,$quiz->decimalpoints);
                        }
                    }*/
                    if($detailedmarks) {
                        if(empty($attempt->attempt)) {
                            foreach($questionids as $questionid) {
                                $row[] = '-';
                            }
                        } else {
                            foreach($questionids as $questionid) {
                                if ($gradedstateid = get_field('question_sessions', 'newgraded', 'attemptid', $attempt->attemptuniqueid, 'questionid', $questionid)) {
                                    $grade = round(get_field('question_states', 'grade', 'id', $gradedstateid), $quiz->decimalpoints);
                                } else {
                                    $grade = '--';
                                }
                                if (!$download) {
                                    $row[] = link_to_popup_window ('/mod/quiz/reviewquestion.php?state='.$gradedstateid.'&amp;number='.$questions[$questionid]->number, 'reviewquestion', $grade, 450, 650, $strreviewquestion, 'none', true);
                                } else {
                                $row[] = $grade;
                                }
                            }
                        }
                    }
                    if ($hasfeedback) {
                        if ($attempt->timefinish) {
							
							$text = $attempt->feedbacktext; // �����
							$pieces = explode(" ", $text);
							$text =  $pieces[2].' '.$pieces[3];
							
                            $row[] = '<a href="review.php?q='.$quiz->id.'&amp;attempt='.$attempt->attempt.'">'.$text.'</a>';
							//$row[] = format_text($attempt->feedbacktext, FORMAT_MOODLE, $nocleanformatoptions);
                        } else {
                            $row[] = '-';
                        }
                    }
                    if (!$download) {
                        $table->add_data($row);
                    } else if ($download == 'Excel' or $download == 'ODS') {
                        $colnum = 0;
                        foreach($row as $item){
                            $myxls->write($rownum,$colnum,$item,$format);
                            $colnum++;
                        }
                        $rownum++;
                    } else if ($download=='CSV') {
                        $text = implode("\t", $row);
                        echo $text." \n";
                    }
                }
            }
            if (!$download) {
                // Start form
                echo '<div id="tablecontainer">';
                echo '<form id="attemptsform" method="post" action="' . $reporturlwithoptions . '" onsubmit="var menu = document.getElementById(\'menuaction\'); return (menu.options[menu.selectedIndex].value == \'delete\' ? confirm(\''.$strreallydel.'\') : true);">';
                echo '<div>';

                // Print table
                $table->print_html();

                // Print "Select all" etc.
                if (!empty($attempts)) {
                    echo '<table id="commands">';
                    echo '<tr><td>';
                    echo '<a href="javascript:select_all_in(\'DIV\',null,\'tablecontainer\');">'.get_string('selectall', 'quiz').'</a> / ';
                    echo '<a href="javascript:deselect_all_in(\'DIV\',null,\'tablecontainer\');">'.get_string('selectnone', 'quiz').'</a> ';
                    echo '&nbsp;&nbsp;';
                    $options = array('delete' => get_string('delete'));
                    echo choose_from_menu($options, 'action', '', get_string('withselected', 'quiz'), 'if(this.selectedIndex > 0) submitFormById(\'attemptsform\');', '', true);
                    echo '<noscript id="noscriptmenuaction" style="display: inline;"><div>';
                    echo '<input type="submit" value="'.get_string('go').'" /></div></noscript>';
                    echo '<script type="text/javascript">'."\n<!--\n".'document.getElementById("noscriptmenuaction").style.display = "none";'."\n-->\n".'</script>';
                    echo '</td></tr></table>';
                }
                // Close form
                echo '</div>';
                echo '</form></div>';

                if (!empty($attempts)) {
                    echo '<table class="boxaligncenter"><tr>';
                    $options = array();
                    $options["id"] = $cm->id;
                    $options["q"] = $quiz->id;
                    $options['sesskey'] = sesskey();
                    $options["noheader"] = "yes";
                    $options['noattempts'] = $noattempts;
                    $options['detailedmarks'] = $detailedmarks;
                    echo '<td>';
                    $options["download"] = "ODS";
                    print_single_button($reporturl, $options, get_string("downloadods"));
                    echo "</td>\n";
                    echo '<td>';
                    $options["download"] = "Excel";
                    print_single_button($reporturl, $options, get_string("downloadexcel"));
                    echo "</td>\n";
                    echo '<td>';
                    $options["download"] = "CSV";
                    print_single_button($reporturl, $options, get_string("downloadtext"));
                    echo "</td>\n";
                    echo "<td>";
                    helpbutton('overviewdownload', get_string('overviewdownload', 'quiz_overview'), 'quiz');
                    echo "</td>\n";
                    echo '</tr></table>';
                }
            } else if ($download == 'Excel' or $download == 'ODS') {
                $workbook->close();
                exit;
            } else if ($download == 'CSV') {
                exit;
            }

        } else {
            if (!$download) {
                $table->print_html();
            }
        }
        // Print display options
        echo '<div class="controls">';
        echo '<form id="options" action="' . $reporturl . '" method="get">';
        echo '<div>';
        echo '<p>'.get_string('displayoptions', 'quiz').': </p>';
        echo '<input type="hidden" name="id" value="'.$cm->id.'" />';
        echo '<input type="hidden" name="q" value="'.$quiz->id.'" />';
        echo '<input type="hidden" name="noattempts" value="0" />';
        echo '<input type="hidden" name="detailedmarks" value="0" />';
        echo '<table id="overview-options" class="boxaligncenter">';
        echo '<tr align="left">';
        echo '<td><label for="pagesize">'.get_string('pagesize', 'quiz').'</label></td>';
        echo '<td><input type="text" id="pagesize" name="pagesize" size="3" value="'.$pagesize.'" /></td>';
        echo '</tr>';
        echo '<tr align="left">';
        echo '<td colspan="2">';
        $options = array(0 => get_string('attemptsonly','quiz_overview', $course->students));
        if ($course->id != SITEID) {
            $options[1] = get_string('noattemptsonly', 'quiz_overview', $course->students);
            $options[2] = get_string('allstudents','quiz_overview', $course->students);
            $options[3] = get_string('allattempts','quiz_overview');
        }
        choose_from_menu($options,'noattempts',$noattempts,'');
        echo '</td></tr>';
        echo '<tr align="left">';
        echo '<td colspan="2"><input type="checkbox" id="checkdetailedmarks" name="detailedmarks" '.($detailedmarks?'checked="checked" ':'').'value="1" /> <label for="checkdetailedmarks">'.get_string('showdetailedmarks', 'quiz').'</label> ';
        echo '</td></tr>';
        echo '<tr><td colspan="2" align="center">';
        echo '<input type="submit" value="'.get_string('go').'" />';
        echo '</td></tr></table>';
        echo '</div>';
        echo '</form>';
        echo '</div>';
        echo "\n";

        return true;
    }
}

?>