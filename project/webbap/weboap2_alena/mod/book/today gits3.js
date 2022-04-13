window.onload = function()
{
	if (typeof(Dvintanimax1) != 'undefined')
	{
	//	Dvintanimax1.width = window.screen.width - 250;
	//	Dvintanimax1.height = window.screen.height - 370;
		Dvintanimax1.UpdateOptions('<?xml version="1.0" encoding="windows-1251"?><options><option key="UseMultiAgoritms" value="true"/></options>');		
//alert(document.getElementById("taskText"));
/*document.getElementById("taskText").innerHTML="program Test; </br>"+
"var z:char;</br>"+
"const n=20; </br>"+
"var </br>"+
"a:array[1..200] of Data;</br>"+
"s:string;</br>"+
"s1:string;<br/>"+
"c:char;</br>"+
"begin </br>"+
"end.</br>";*/
//alert(document.getElementById("taskText").innerHTML);
/*"program Test; </br>"+
"var z:char;</br>"+
"const n=20; </br>"+
"var </br>"+
"a:array[1..200] of Data;</br>"+
"s:string;</br>"+
"s1:string;<br/>"+
"c:char;</br>"+
"begin </br>"+
"s:='12345sdsssssss ksgfas hgdfa hsgd a9';<br/>"+
"s1:='12345';<br/>"+
"if (s1 = s) then"+
   "s1 := s;"+
"if s[2] = '3' then<br/>"+
	"z:='q';<br/>"+
"z:=s[2];</br>"+
"s:='123456';<br/>"+
"z:=s[5];<br/>"+
"s[1]:='z';<br/>"+
"s:='sdsss asdh alksjh dlkash dlkjhsassss ksgfas hgdfa hsgd a';<br/>"+
"s:='fff';<br/>"+
"s:='';<br/>"+
"end.</br>";
*/
		window.setTimeout("loadTask();", 150);
	}
	else
	{
		alert("empty :(  ");
	}
	ScreenResize();
}

function loadTask()
{
	if (Dvintanimax1 != null)
	{
		var ctrl = document.getElementById("taskText");
		//ctrl = "Program NFactorial;\n Var  a,b: Integer;\n Begin\n a:=4;\n b:=a+4;\n End.\n";
		var result = Dvintanimax1.LoadTask(ctrl.innerText, "алгоритм задачника");
		// result = 0 esli false, -1 esli true
		//JSUpdateUI();
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