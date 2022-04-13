<?php  // $Id: view.php,v 1.4 2006/08/28 16:41:20 mark-nielsen Exp $
/**
 * This page prints a particular instance of vint
 * 
 * @author 
 * @version $Id: view.php,v 1.4 2006/08/28 16:41:20 mark-nielsen Exp $
 * @package vint
 **/

/// (Replace vint with the name of your module)

    require_once("../../config.php");
    require_once("lib.php");

    $id = optional_param('id', 0, PARAM_INT); // Course Module ID, or
    $a  = optional_param('a', 0, PARAM_INT);  // vint ID

    if ($id) {
        if (! $cm = get_record("course_modules", "id", $id)) {
            error("Course Module ID was incorrect");
        }
    
        if (! $course = get_record("course", "id", $cm->course)) {
            error("Course is misconfigured");
        }
    
        if (! $vint = get_record("vint", "id", $cm->instance)) {
            error("Course module is incorrect");
        }

    } else {
        if (! $vint = get_record("vint", "id", $a)) {
            error("Course module is incorrect");
        }
        if (! $course = get_record("course", "id", $vint->course)) {
            error("Course is misconfigured");
        }
        if (! $cm = get_coursemodule_from_instance("vint", $vint->id, $course->id)) {
            error("Course Module ID was incorrect");
        }
    }

    require_login($course->id);

    add_to_log($course->id, "vint", "view", "view.php?id=$cm->id", "$vint->id");

/// Print the page header

    if ($course->category) {
        $navigation = "<a href=\"../../course/view.php?id=$course->id\">$course->shortname</a> ->";
    } else {
        $navigation = '';
    }

    $strvints = get_string("modulenameplural", "vint");
    $strvint  = get_string("modulename", "vint");

    /*print_header("$course->shortname: $vint->name", "$course->fullname",
                 "$navigation <a href=index.php?id=$course->id>$strvints</a> -> $vint->name", 
                  "", "", true, update_module_button($cm->id, $course->id, $strvint), 
                  navmenu($course, $cm));*/
    print_header_simple(format_string($vint->name), "",
                 "<a href=\"index.php?id=$course->id\">$strvints</a> ->
                  ".format_string($vint->name,true), "",
                  '', true, "", navmenu($course, $cm), false, 'onLoad="MyOnLoad()" onResize="ScreenResize()"');

  $options1 = '<?xml version="1.0" encoding="windows-1251"?><options><option key="UseMultiAgoritms" value="true"/>	</options>';
  $options2 = '<?xml version="1.0" encoding="windows-1251"?><options><option key="UseMultiAgoritms" value="false"/>	</options>';
  ?>
<script language="javascript" type="text/javascript">
// <!CDATA[

    function JSUpdateUI()
    {
	    var str =Dvintanimax1.GetUI();
        if (str == null || str.length != 10) return;

    }

function MyOnLoad() {  
/*    document.getElementById("myheader").style.display = "none";
    document.getElementById("myheader").style.visibility = "hidden";
    
    document.getElementById("footer").style.display = "none";
    document.getElementById("footer").style.visibility = "hidden";
    
    document.getElementById("wrapper").style.width = "100%";
    */
    if (typeof(Dvintanimax1) != 'undefined')
    {
    //Dvintanimax1.width = window.screen.width - 50;
    //Dvintanimax1.height = window.screen.height - 300;
    ScreenResize();
		Dvintanimax1.UpdateOptions('<?php echo $options1;?>');		
		JSUpdateUI();
    }
}

/*function OptionMulti_onclick(){
  if (optionMulti.checked) {Dvintanimax1.UpdateOptions('<?php echo $options1;?>');}
  else {Dvintanimax1.UpdateOptions('<?php echo $options2;?>');}
}*/


function getClientWidth()
{
  return document.compatMode=='CSS1Compat' && !window.opera?document.documentElement.clientWidth:document.body.clientWidth;
}

function getClientHeight()
{
  return document.compatMode=='CSS1Compat' && !window.opera?document.documentElement.clientHeight:document.body.clientHeight;
}


function ScreenResize() {
    /*htemp=getClientHeight();
    wtemp=getClientWidth();

    //document.getElementById('vint_div').style.z-index = 2;
    document.getElementById('vint_div').style.height=htemp + 'px';
    document.getElementById('vint_div').style.width=wtemp + 'px';
	
	*/
	
	var w=getClientWidth();
	var h=getClientHeight();
	
	if(w>500){
		Dvintanimax1.Width=w;
		document.getElementById("Dvintanimax1").style.width=w;
	}	else	{
		Dvintanimax1.Width=500;
		document.getElementById("Dvintanimax1").style.width=500;
	}
	if(h>600){
		Dvintanimax1.Height=h-40;
		document.getElementById("Dvintanimax1").style.height=h-40;
	}	else	{
		Dvintanimax1.Height=600;
		document.getElementById("Dvintanimax1").style.height=600;
	}

}

</script>
            <div id="vint_div" style="position:absolute; top:40px; left:0;">
	            <OBJECT id="Dvintanimax1" name="Dvintanimax1" classid="clsid:EF8D5138-4416-40EA-AAB0-C5561272C1D2" 
			codebase="VinTAnimAx.cab#Version=1,0,0,18"   "VIEWASTEXT">
		    		<PARAM NAME="_Version" VALUE="65536" />
	    			<PARAM NAME="_ExtentX" VALUE="23283" />
				    <PARAM NAME="_ExtentY" VALUE="13547" />
    			    <PARAM NAME="_StockProps" VALUE="0" />
			    </OBJECT>
          </div>

<script type="text/javascript">

    function Dvintanimax1::UpdateUI()
    {
        JSUpdateUI();
    }   
    
</script>

<?php

/// Finish the page
    print_footer($course);

?>
