//Simple Splitter Action for Left-Right Splitter
/*
 || ||    *    ||          - true
 ||  *  ||  *  ||          - false
*/
//Simple Splitter Action for Up-Down Splitter Collapse
/*

____
==== - true
*
____
|||||||||||||||||||||||||||||
____
*
==== - false
*
____

*/
var splitterIsAtLeft = false;
var splitterIsAtUp = false;
var htemp;

var oldXsearch, oldYsearch;

function getClientWidth()
{
  return document.compatMode=='CSS1Compat' && !window.opera?document.documentElement.clientWidth:document.body.clientWidth;
}

function getClientHeight()
{
  return document.compatMode=='CSS1Compat' && !window.opera?document.documentElement.clientHeight:document.body.clientHeight;
}

function MoveLeftSplitter()
{
	if (splitterIsAtLeft) {		wvmenu=360;		$('main').style.width = getClientWidth()-wvmenu-180+'px';
		$('def').style.width=getClientWidth()-wvmenu-120+'px';
		$('def').style.left=wvmenu+'px';
		$('alm').style.display='block';
		$('alm').style.visibility = 'visible';

	}
	else {		$('alm').style.visibility = 'hidden';
		$('alm').style.display='none';
		$('def').style.left='0px';
		$('def').style.width=$('virtbook').style.width;
		$('main').style.width=wtemp*0.93+'px';

	}
	splitterIsAtLeft = !splitterIsAtLeft;
}

function MoveUpSplitter()
{
	if (splitterIsAtUp) {

		$('centerbox').style.top='200px';
		$('leftborderbox').style.top='200px';
		$('rightborderbox').style.top='200px';

 		$('virtbook').style.height=htemp*0.95+'px';
 		$('def').style.height=htemp*0.95+'px';
 		$('alm').style.height=htemp*0.95+'px';
 		$('sel').style.height=htemp*0.82+'px';

		//$('myheader').style.height='145px';
		//$('hdmenubuttons').style.position='relative';

		$('myheader').style.display='block';
		$('myheader').style.visibility = 'visible';
		$('mybreadcrumb').style.display='block';
		$('mybreadcrumb').style.visibility = 'visible';

	}
	else {
		$('myheader').style.visibility = 'hidden';
		$('myheader').style.display='none';
		//$('myheader').style.height='1px';
		$('mybreadcrumb').style.display='none';
		$('mybreadcrumb').style.visibility = 'hidden';

		//$('hdmenubuttons').style.position='absolute';
		//$('hdmenubuttons').style.top='0px';

		$('centerbox').style.top='57px';
		$('leftborderbox').style.top='57px';
		$('rightborderbox').style.top='57px';

		hsplit=getClientHeight()-77;
		$('virtbook').style.height=hsplit*0.95+'px';
		$('alm').style.height=hsplit*0.95+'px';
		$('sel').style.height=hsplit*0.82+'px';
		$('def').style.height=hsplit*0.95+'px';

	}

	splitterIsAtUp = !splitterIsAtUp;
}