function grade_view_lab_category_grades($view_by_student) {
    global $CFG;
    global $course;
    global $USER;
    global $preferences;
	
	echo '!!!!!!!!!!!!!!!!!!!!!!!!!!!!!';

    $context = get_context_instance(CONTEXT_COURSE, $course->id);
    
    // if can't see course grades, print single grade view
    if (!has_capability('moodle/course:viewcoursegrades', $context)) {
        $view_by_student = $USER->id;
    }
    
    $csol=clean_param($_REQUEST['csol'], PARAM_CLEAN);
    $curuserid=clean_param($_REQUEST['user'], PARAM_CLEAN);
	    
    if ($csol)
    {
			$currstudent = get_record("user", "id", $curuserid);
			$currstudlink = get_one_student_link($currstudent);
			
            //one chapter for current course-id from vinttaskbook 
            $mybook = get_record("labs", "course", $course->id);     
         
            //get categories for current vinttaskbook-id from vinttaskbook_categories
            $select = "lab =".$mybook->id; 
            $labcategories = get_records_select('lab_categories', $select, 'id', 'id, number, name');
            
            //get tasks for onecategory-id from vinttaskbook_tasks
            $select = "vinttaskbook =".$mybook->id; 
            $labtasks = get_records_select('labs_users', '', 'user_id', 'id, user_id, task_id');
            
            //all solutions from vinttaskbook
            $select = "vinttaskbook =".$mybook->id; 
            $labtaskSolutionGrade = get_records_select('vinttaskbook_solutions ', $select, 'userid', 'id, userid, vinttasktask, grade, timecreated, timemodified');
			
			echo '///////////';

    }

            // to keep track of what we've output
            $colcount = 0;
            
            $headerArray=null;
            $categoryTask=null;
            $studentcategory=null;
			$studArray=null;
     
            //fill student header title
            $headerArray[sizeof($headerArray)]->headerviewlink = get_string('student','grades');

            if ($csol)
            {
			echo '*************';
						$studentviewlink = get_one_student_link($onestudent);
                        
                        $ctrowcount=sizeof($categoryTask);
                        $ctcolcount=sizeof($categoryTask[$ctrowcount]->item);
			$totalCount='0';
			$totalSum='0';
			//bad choise :( , but only this work for 100%
			echo '6666666666';
			foreach ($labcategories as $onecategory)
		    {
			echo '!!!!!!!!!';
				$size=sizeof($headerArray);
				$headerArray[$size]->headerviewlink = $onecategory->name;
				$headerArray[$size]->id = $onecategory->id;
				foreach ($labtasks as $onetask)
				{	
					$mycategory = get_record('vinttaskbook_categories', 'number', $onecategory->number);
					$mytask = get_record('vinttaskbook_tasks', 'vinttaskcategories', $mycategory->id, 'number', $onetask->task_id);
					foreach ($labtaskSolutionGrade as $onesolution)
						{
							if (($onesolution->userid==$curuserid)&&($mytask->id == $onesolution->vinttasktask)&&($onesolution->grade !='0'))
							{
								$categoryTask[$size]->item[$onetask->id]->grade = $onesolution->grade;
								$totalCount++;
								$totalSum += $onesolution->grade;
								$categoryTask[$size]->item[$onetask->id]->link = '<a '; 
								$categoryTask[$size]->item[$onetask->id]->link .= 'href="'.$CFG->wwwroot.'/mod/vinttaskbook/edit.php?id=35&amp;cid=';
								$categoryTask[$size]->item[$onetask->id]->link .= $onecategory->id.'&amp;tid='.$onetask->id.'&amp;solid=';
								$categoryTask[$size]->item[$onetask->id]->link .= $onesolution->id.'&amp;type=solution&amp;action=view">';
								$categoryTask[$size]->item[$onetask->id]->link .= $onesolution->grade.' [ '.$onetask->id.' | '.userdate($onesolution->timemodified).' ]</a><br>';
							}
						}
					}
				}
            } else
            {
                    $ctrowcount=sizeof($categoryTask);
                    $ctcolcount=sizeof($categoryTask[$ctrowcount]->item);

					$cur_quiz = get_all_cur_quiz();
    
					$allstudents = get_all_students($view_by_student);
					$quizGrades = get_quiz_grades();
					
					foreach ($cur_quiz as $onequiz)
					{
						$size=sizeof($headerArray);
						$headerArray[$size]->headerviewlink = $onequiz->name;
						$headerArray[$size]->id = $onequiz->id;
					}

					foreach($allstudents as $onestudent ) 
					{
							$quiz_curr_Sum = '0';
							$quiz_curr_Sr = '0';
							$ctrowcount=sizeof($categoryTask);
							$studArray[$ctrowcount]->id = $onestudent->id;
							$studArray[$ctrowcount]->name = $onestudent->firstname." ".$onestudent->lastname;
							$ctcolcount = '0';
							foreach ($cur_quiz as $onequiz)
							{
								$ctcolcount++;

								foreach ($quizGrades as $oneQuizGrades)
								{
										if (($oneQuizGrades->userid==$onestudent->id)&&($oneQuizGrades->quiz == $onequiz->id))
										{
											$categoryTask[$ctrowcount]->item[$ctcolcount]->grade = $oneQuizGrades->grade;
											$quiz_curr_Num ++;
											$quiz_curr_Sum += $oneQuizGrades->grade/2;
											echo "quizid= ".$onequiz->id." userid= ".$onestudent->id." name=".$onequiz->name; 
											echo "[".$ctrowcount." ".$ctcolcount."]".$oneQuizGrades->grade."<br>";
										}
								}
							}
							
							if ($quiz_curr_Num != '0')
							{
								$quiz_curr_Sr = $quiz_curr_Sum/$quiz_curr_Num;
							}
							else
							{
								$quiz_curr_Sr = '0';
							}

					}
	}

if ($csol)
{
            echo "<script>
            function headerInit() {
                return new Array(";

            $length=sizeof($headerArray);
            echo "{text:'".$headerArray[0]->headerviewlink."',align:'left',title:'title', width:'20%'}";
            for ($i=1;$i<$length;$i++)
            {
                echo ',';
                echo "{text:'".get_string('specnumber','grades')." ".$i."',align:'left',title:'".$headerArray[$i]->headerviewlink."',width:'5%'}";     
            }
            echo ',';
            echo "{text:'".get_string('total','grades')."',align:'left',title:'".get_string('total','grades')."',width:'20%'}";
            echo ");
            }
            function DataPropsInit()
            {
                return new Array(";        

            echo "{align:'left'},{align:'left'}";
            for ($i=1;$i<$length;$i++)
            {
                echo ',';        
                echo "{align:'left'}";
            }
            
            echo ");
            }
            </script>";

            echo '<div id="bsDpDivDataGrid"><br/></div>';
            echo "<script>DataGridinit();</script>";
    
            //draw secound datagrid
            echo "<br>
            <script type=\"text/javascript\">
                    function DataGridinit2() {
                            ssDataGrid = new Bs_DataGrid('secDataGrid');
                            ssDataGrid.buttonsDefaultPath = '". $CFG->wwwroot ."/grade/script/components/datagrid/img/ms/';
                            ssDataGrid.bHeaderFix = true;
                            ssDataGrid.height     = '50';
                            ssDataGrid.width      = '1000';
                            ssDataGrid.setDataProps(DataPropsInit2());
                            ssDataGrid.setHeaderProps(headerInit2());
            }
            </script>
            ";
            
            echo "<script>
            function headerInit2() {
                return new Array(";

            $length=sizeof($headerArray);
            echo "{text:'".get_string('categories','grades')."',align:'left',title:'".get_string('categories','grades')."',width:'20%'}";
            echo ',';
            echo "{text:'".get_string('tasks','grades')."',align:'left',title:'".get_string('tasks','grades')."',width:'60%'}";     
            echo ',';
            echo "{text:'".get_string('total','grades')."',align:'left',title:'".get_string('total','grades')."',width:'20%'}";       
            echo ");
            }
            function DataPropsInit2()
            {
                return new Array( {align:'left'},{align:'left'},{align:'left'} );
            }
            </script>";
            
            echo '<div id="secDataGrid"><br/></div>';
            echo "<script>DataGridinit2();</script>
    		<script>
			var data2 = new Array();";
            
            $length=sizeof($headerArray);
            $SrSummCount='0';
            $SrSummArray=null;

            for ($i=1;$i<$length;$i++)
            {
                /*echo "data2[data2.length] = new Array('".
                '<a href="'.$CFG->wwwroot.'/mod/labs/view.php?id=35&cid='.$headerArray[$i]->id.'">'.$headerArray[$i]->headerviewlink.'</a>'."'";
                echo ",'";*/
                $tt=sizeof($categoryTask[$i]->item);
                $count='0';
                
                if ($tt!='0')
                {
                        foreach ($categoryTask[$i]->item as $onetask)
                        {
                            $count++;
                            $SrSummArray[$SrSummCount]+=$onetask->grade;
								echo $onetask->link;
                        }                
                }
                
                if ($count=='0')
                {
                        echo "0',";
                        echo "'".number_format($SrSummArray[$SrSummCount], 2, ',', ' ')."'";
                        $SrSummArray[$SrSummCount]=number_format($SrSummArray[$SrSummCount], 2, ',', ' ');
                } else
                {
                        echo "',";
                        echo "'".number_format($SrSummArray[$SrSummCount]/$count, 2, ',', ' ')."'";
                        $SrSummArray[$SrSummCount]=number_format($SrSummArray[$SrSummCount]/$count, 2, ',', ' ');//забить массив чтоб посчитать среднее значение
                }
                echo ");";
                $SrSummCount++;
            }

            echo "
                        ssDataGrid.setData(data2);
			ssDataGrid.drawInto('secDataGrid');
            </script>";

            //fill data first datagrid
            $length=sizeof($SrSummArray);
            echo "<script>
			var data = new Array();";
            
            echo "data[data.length] = new Array('".format_string($currstudlink,true)."'";
            
            for ($i=0;$i<$length;$i++)
            {
                 echo ',';
                 echo "'".$SrSummArray[$i]."'";
            }
            echo ',';

			if ($totalCount!='0')
            {
                echo "'".number_format($totalSum/$totalCount, 2, ',', ' ')."'";//среднее арифметическое по всем оценкам
            } else
            {
                echo "'".number_format($totalSum, 2, ',', ' ')."'";
            }
            echo ");";
            
            echo "
                        bsDpDataGrid.setData(data);
			bsDpDataGrid.drawInto('bsDpDivDataGrid');
            </script>";
}
else
{
			$allquizcount = all_cur_quiz_count();
            echo "<script>
            function headerInit() {
                return new Array(";

            $length=sizeof($headerArray);
            echo "{text:'".$headerArray[0]->headerviewlink."',align:'left',title:'title',sort:'alpha',width:'20%'}";
            for ($i=1;$i<$length;$i++)
            {
                echo ',';
                echo "{text:'".get_string('specnumber','grades')."".$i."',align:'left',title:'".$headerArray[$i]->headerviewlink."',sort:'number',width:'5%'}";     
            }
            echo ',';
            echo "{text:'".get_string('total','grades')."',align:'left',title:'".get_string('total','grades')."',sort:'number',width:'20%'}"; 
            echo ");
            }
            function DataPropsInit()
            {
                return new Array(";        

            echo "{align:'left'},{align:'left'}";
            for ($i=1;$i<$length;$i++)
            {
                echo ',';        
                echo "{align:'left'}";
            }
            
            echo ");
            }
            </script>";

            echo '<div id="bsDpDivDataGrid"><br/></div>';
            echo "<script>DataGridinit();</script>
    		<script>
			var data = new Array();";

			$studlength = sizeof($studArray);

			for ($i=0;$i<$studlength;$i++)
            {
                /*echo "data[data.length] = new Array('".
                '<a href="'.$CFG->wwwroot.'/mod/labs/view.php?id=35&cid='.$studArray[$i]->id.'">'.$studArray[$i]->name.'</a>'."'";
                echo ",";*/
                $tasklength=sizeof($categoryTask[$i]->item);
                $count='0';
                
				for ($j=0;$j<$allquizcount-1;$j++)
				{
                            if ($categoryTask[$i]->item[$j]->grade > '0')
							{
								$count++;
								$SrSummArray[$SrSummCount]+=$categoryTask[$i]->item[$j]->grade;
							} else
							{
								echo "'0',";
							}
                }
                if ($count=='0')
                {
                        echo "'0',";
                        echo "'".number_format($SrSummArray[$SrSummCount], 2, ',', ' ')."'";
                        $SrSummArray[$SrSummCount]=number_format($SrSummArray[$SrSummCount], 2, ',', ' ');
                } else
                {
                        echo ",";
                        echo "'".number_format($SrSummArray[$SrSummCount]/$count, 2, ',', ' ')."'";
                        $SrSummArray[$SrSummCount]=number_format($SrSummArray[$SrSummCount]/$count, 2, ',', ' ');
                }
                echo ");";
                $SrSummCount++;
            }

            echo "
                        bsDpDataGrid.setData(data);
			bsDpDataGrid.drawInto('bsDpDivDataGrid');
            </script>";
}
}