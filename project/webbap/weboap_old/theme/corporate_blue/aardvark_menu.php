<div id="aardvark_menu_date">
<a href="<?php echo $CFG->wwwroot; ?>/calendar/view.php"><script language="Javascript" type="text/javascript">
//<![CDATA[
<!--


//<meta http-equiv="Content-Type" content="text/html; charset=windows-1251" />


// Get today's current date.
var now = new Date();

// Array list of days.
var days = new Array('Неділя','Понеділок','Вівторок','Середа','Четвер','П&#039ятниця','Субота');

// Array list of months.
var months = new Array('Січень','Лютий','Березень','Квітень','Травень','Червень','Липень','Серпень','Вересень','Жовтень','Листопад','Грудень');

// Calculate the number of the current day in the week.
var date = ((now.getDate()<10) ? "0" : "")+ now.getDate();

// Calculate four digit year.
function fourdigits(number)     {
        return (number < 1000) ? number + 1900 : number;
                                                                }

// Join it all together
today =  days[now.getDay()] + " " +
              date + " " +
                          months[now.getMonth()] + " " +               
                (fourdigits(now.getYear())) ;

// Print out the data.
document.write("" +today+ " ");
  
//-->
//]]>
</script></a>
	
	</div>

<div id="dropdown" class="yuimenubar yuimenubarnav">
      <div class="bd">
        <ul class="first-of-type">
        	<li class="yuimenubaritem first-of-type"><a class="yuimenubaritemlabel" href="<?php echo $CFG->wwwroot; ?>"><img width="18" height="17" src="<?php echo $CFG->httpswwwroot.'/theme/'.current_theme() ?>/images/menu/home_icon.png" alt=""/></a></li>
          
		  <li class="yuimenubaritem"><a class="yuimenubaritemlabel" href="/mod/resource/view.php?id=2">Робоча <br> програма</a>
          
            <div class="yuimenu">
              <div class="bd">
                <ul>
                  <li class="yuimenuitem"><a class="yuimenuitemlabel" href="/mod/resource/view.php?id=22">Пояснювальна записка</a></li>
                  <li class="yuimenuitem"><a class="yuimenuitemlabel" href="/mod/resource/view.php?id=21">Навчально-тематичний план</a></li>
                  <li class="yuimenuitem"><a class="yuimenuitemlabel" href="/mod/resource/view.php?id=23">Програма курсу</a></li>
                 
                </ul>
              </div>
            </div>      
            
          </li>
		  
          <li class="yuimenubaritem"><a class="yuimenubaritemlabel" href="/mod/resource/view.php?id=3">Змістовні<br> модулі</a>
          
            <div class="yuimenu">
              <div class="bd">                    
                <ul>
                  <li class="yuimenuitem"><a class="yuimenuitemlabel" href="/mod/resource/view.php?id=27">І змістовний модуль</a>
				  
				  <div class="yuimenu">
                      <div class="bd">
                        <ul class="first-of-type">
                          <li class="yuimenuitem"><a class="yuimenuitemlabel" href="/mod/resource/view.php?id=28">Лекційні блоки</a></li>
                          <li class="yuimenuitem"><a class="yuimenuitemlabel" href="/mod/resource/view.php?id=29">Семінарські блоки</a></li>
                          <li class="yuimenuitem"><a class="yuimenuitemlabel" href="/mod/resource/view.php?id=30">Блоки самостійної роботи</a></li>
						  <li class="yuimenuitem"><a class="yuimenuitemlabel" href="/mod/resource/view.php?id=31">Підсумкова тека</a></li>
                        </ul>            
                      </div>
                  </div> 
				  </li>
				  		  
                  <li class="yuimenuitem"><a class="yuimenuitemlabel" href="/mod/resource/view.php?id=36">ІІ змістовний модуль</a>
				  
				  <div class="yuimenu">
                      <div class="bd">
                        <ul class="first-of-type">
                          <li class="yuimenuitem"><a class="yuimenuitemlabel" href="/mod/resource/view.php?id=37">Лекційні блоки</a></li>
                          <li class="yuimenuitem"><a class="yuimenuitemlabel" href="/mod/resource/view.php?id=38">Семінарські блоки</a></li>
                          <li class="yuimenuitem"><a class="yuimenuitemlabel" href="/mod/resource/view.php?id=75">Блоки самостійної роботи</a></li>
						  <li class="yuimenuitem"><a class="yuimenuitemlabel" href="/mod/resource/view.php?id=76">Підсумкова тека</a></li>
                        </ul>            
                      </div>
                  </div> 
				  
				  </li>
				  
                  <li class="yuimenuitem"><a class="yuimenuitemlabel" href="/mod/resource/view.php?id=78">ІІІ змістовний модуль</a>
				  
				  <div class="yuimenu">
                      <div class="bd">
                        <ul class="first-of-type">
                          <li class="yuimenuitem"><a class="yuimenuitemlabel" href="/mod/resource/view.php?id=79">Лекційні блоки</a></li>
                          <li class="yuimenuitem"><a class="yuimenuitemlabel" href="/mod/resource/view.php?id=80">Семінарські блоки</a></li>
                          <li class="yuimenuitem"><a class="yuimenuitemlabel" href="/mod/resource/view.php?id=81">Блоки самостійної роботи</a></li>
						  <li class="yuimenuitem"><a class="yuimenuitemlabel" href="/mod/resource/view.php?id=82">Підсумкова тека</a></li>
                        </ul>            
                      </div>
                  </div> 
				  </li>
				  
                  <li class="yuimenuitem"><a class="yuimenuitemlabel" href="#">ІV змістовний модуль</a>
				  
				  <div class="yuimenu">
                      <div class="bd">
                        <ul class="first-of-type">
                          <li class="yuimenuitem"><a class="yuimenuitemlabel" href="#">Лекційні блоки</a></li>
                          <li class="yuimenuitem"><a class="yuimenuitemlabel" href="#">Семінарські блоки</a></li>
                          <li class="yuimenuitem"><a class="yuimenuitemlabel" href="#">Блоки самостійної роботи</a></li>
						  <li class="yuimenuitem"><a class="yuimenuitemlabel" href="#">Підсумкова тека</a></li>
                        </ul>            
                      </div>
                  </div> 
				  </li>
				  
                 </ul>
              </div>
            </div>
         </li>                  
		 
          <li class="yuimenubaritem"><a class="yuimenubaritemlabel" href="/mod/resource/view.php?id=4">Тека творчих <br>завдань</a>
		  
		  
		  
		  
          
            <div class="yuimenu">
              <div class="bd">                    
                <ul>
                  <li class="yuimenuitem"><a class="yuimenuitemlabel" href="/mod/resource/view.php?id=41">Відеофрагменти</a></li>
                  <li class="yuimenuitem"><a class="yuimenuitemlabel" href="/mod/resource/view.php?id=136">Кросворди</a></li>
				  <li class="yuimenuitem"><a class="yuimenuitemlabel" href="/mod/resource/view.php?id=140">Приклади</a></li>
                </ul>                    
              </div>
            </div>                                        

          </li>
          <li class="yuimenubaritem"><a class="yuimenubaritemlabel" href="/mod/glossary/view.php?id=138">Мультимедіа<br> галерея</a>

          </li>
		  
		  <li class="yuimenubaritem"><a class="yuimenubaritemlabel" href="/mod/resource/view.php?id=7">Екзаменаційний <br>мінімум</a>

          </li>
		  
		  <li class="yuimenubaritem"><a class="yuimenubaritemlabel" href="/mod/resource/view.php?id=6">Презентації</a>
                                                    
          </li>

		  <li class="yuimenubaritem"><a class="yuimenubaritemlabel" href="/mod/resource/view.php?id=8">Тестовий <br>контроль</a>
	           
            <div class="yuimenu">
              <div class="bd">                    
                <ul>
                  <li class="yuimenuitem"><a class="yuimenuitemlabel" href="/mod/resource/view.php?id=189">І змістовний модуль</a></li>
                  <li class="yuimenuitem"><a class="yuimenuitemlabel" href="/mod/resource/view.php?id=196">ІІ змістовний модуль</a></li>
                  <li class="yuimenuitem"><a class="yuimenuitemlabel" href="/mod/resource/view.php?id=197">ІІІ змістовний модуль</a></li>
				  <li class="yuimenuitem"><a class="yuimenuitemlabel" href="/mod/resource/view.php?id=198">ІV змістовний модуль</a></li>
	  
                 </ul>
              </div>
            </div>
         </li>   
  	  
		  <li class="yuimenubaritem"><a class="yuimenubaritemlabel" href="/mod/glossary/view.php?id=9">Глосарій</a>
                                                    
          </li>

		  
        </ul>     
               
      </div>
    </div>
