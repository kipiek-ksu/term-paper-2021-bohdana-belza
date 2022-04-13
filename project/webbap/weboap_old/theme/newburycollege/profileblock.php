<div class="profilepic" id="profilepic">
        <?PHP

echo '<a href="'.$CFG->wwwroot.'/user/view.php?id='.$USER->id.'&amp;course='.$COURSE->id.'"><img src="'.$CFG->httpsthemewww .'/'. current_theme().'/images/usericon.png" width="80px" height="80px" title="'.$USER->firstname.' '.$USER->lastname.'" alt="'.$USER->firstname.' '.$USER->lastname.'" /></a>'; 

?>
      </div>


    <?PHP
	
	    function get_content () {
        global $USER, $CFG, $SESSION, $COURSE;
        $wwwroot = '';
        $signup = '';}

        if (empty($CFG->loginhttps)) {
            $wwwroot = $CFG->wwwroot;
        } else {
            $wwwroot = str_replace("http://", "https://", $CFG->wwwroot);
        }
        
	

if (!isloggedin() or isguestuser()) {
echo '<div class="profilelogin" id="profilelogin">';
echo '<ul><form class="loginform" id="login" method="post" action="'.$wwwroot.'/login/index.php">';
echo '<li><label for="login_username">'.get_string('username').'</label><input class="loginform" type="text" name="username" id="login_username" value="" /></li><br />';
echo '<li><label for="login_password">'.get_string('password').'</label><input class="loginform" type="password" name="password" id="login_password" value="" /></li><br />';
echo '<li><input type="submit" value="&nbsp;&nbsp;'.get_string('login').'&nbsp;&nbsp;" /></li>';
echo '</form></ul>';
echo '</div>';


} else {
echo '<div class="profilename" id="profilename">';
echo '<a href="'.$CFG->wwwroot.'/user/view.php?id='.$USER->id.'&amp;course='.$COURSE->id.'">'.$USER->firstname.' '.$USER->lastname.'</a>';
echo '</div>';

}		


?>

    
    
 
      
      <div class="profileoptions" id="profileoptions">
    
    
    

 <?PHP
				
if (!isloggedin() or isguestuser()) {




} else {
echo '<ul>';

echo '<li><a href="'.$CFG->wwwroot.'/login/logout.php?sesskey='.sesskey().'">'.get_string('logout').'</a></li>';
echo '</ul>';

}
?>
<p class="menulang">
<?php echo $menu ?></p>

    
    </div>

