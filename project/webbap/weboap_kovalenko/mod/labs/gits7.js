window.onload = function()
{
	ScreenResize();
	if (typeof(Dvintanimax1) != 'undefined')
	{
	//	Dvintanimax1.width = window.screen.width - 250;
	//	Dvintanimax1.height = window.screen.height - 370;
		Dvintanimax1.UpdateOptions('<?xml version="1.0" encoding="windows-1251"?><options><option key="UseMultiAgoritms" value="true"/></options>');		
		window.setTimeout("loadTask();", 150);
	}
	else
	{
		alert("empty :(  ");
	}
}

function loadTask()
{
	if (Dvintanimax1 != null)
	{
		var ctrl = document.getElementById("taskText");
		var result = Dvintanimax1.LoadTask(ctrl.innerText, "Book Task");
		// result = 0 esli false, -1 esli true
	}
}

function getClientWidth()
{
  return document.compatMode=='CSS1Compat' && !window.opera?document.documentElement.clientWidth:document.body.clientWidth;
}

function getClientHeight()
{
  return document.compatMode=='CSS1Compat' && !window.opera?document.documentElement.clientHeight:document.body.clientHeight;
}


function ScreenResize() {

 var w=getClientWidth();
 var h=getClientHeight();
 window.status='Width: '+w+'----Height: '+h;
 
 if(w>500){
  Dvintanimax1.Width=w;
  document.getElementById("Dvintanimax1").style.width=w;
 } else {
  Dvintanimax1.Width=500;
  document.getElementById("Dvintanimax1").style.width=500;
 }
 if(h>600){
  Dvintanimax1.Height=h-40;
  document.getElementById("Dvintanimax1").style.height=h-40;
 } else {
  Dvintanimax1.Height=600;
  document.getElementById("Dvintanimax1").style.height=600;
 }

}