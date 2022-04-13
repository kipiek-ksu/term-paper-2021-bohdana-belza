<!--
// *** COMMON CROSS-BROWSER COMPATIBILITY CODE ***

var isDOM=document.getElementById?1:0;
var isIE=document.all?1:0;
var isNS4=navigator.appName=='Netscape'&&!isDOM?1:0;
var isOp=window.opera?1:0;
var isWin=navigator.platform.indexOf('Win')!=-1?1:0;
var isDyn=isDOM||isIE||isNS4;


function getRef(id, par)
{
 par=!par?document:(par.navigator?par.document:par);
 return isIE ? par.all[id] :
  (isDOM ? (par.getElementById?par:par.ownerDocument).getElementById(id) :
  (isNS4 ? par.layers[id] : null));
}

function getSty(id, par)
{
 var r=getRef(id, par);
 return r?(isNS4?r:r.style):null;
}


if (!window.LayerObj) var LayerObj = new Function('id', 'par',
 'this.ref=getRef(id, par); this.sty=getSty(id, par); return this');
function getLyr(id, par) { return new LayerObj(id, par) }

function LyrFn(fn, fc)
{
 LayerObj.prototype[fn] = new Function('var a=arguments,p=a[0],px=isNS4||isOp?0:"px"; ' +
  'with (this) { '+fc+' }');
}
LyrFn('x','if (!isNaN(p)) sty.left=p+px; else return parseInt(sty.left)');
LyrFn('y','if (!isNaN(p)) sty.top=p+px; else return parseInt(sty.top)');
LyrFn('w','if (p) (isNS4?sty.clip:sty).width=p+px; ' +
 'else return (isNS4?ref.document.width:ref.offsetWidth)');
LyrFn('h','if (p) (isNS4?sty.clip:sty).height=p+px; ' +
 'else return (isNS4?ref.document.height:ref.offsetHeight)');
LyrFn('vis','sty.visibility=p');
LyrFn('write','if (isNS4) with (ref.document){write(p);close()} else ref.innerHTML=p');
LyrFn('alpha','var f=ref.filters,d=(p==null); if (f) {' +
 'if (!d&&sty.filter.indexOf("alpha")==-1) sty.filter+=" alpha(opacity="+p+")"; ' +
 'else if (f.length&&f.alpha) with(f.alpha){if(d)enabled=false;else{opacity=p;enabled=true}} }' +
 'else if (isDOM) sty.MozOpacity=d?"":p+"%"');


var CSSmode=document.compatMode;
CSSmode=(CSSmode&&CSSmode.indexOf('CSS')!=-1)||isDOM&&!isIE||isOp?1:0;

if (!window.page) var page = { win: window, minW: 0, minH: 0, MS: isIE&&!isOp,
 db: CSSmode?'documentElement':'body' }

page.winW=function()
 { with (this) return Math.max(minW, MS?win.document[db].clientWidth:win.innerWidth) }
page.winH=function()
 { with (this) return Math.max(minH, MS?win.document[db].clientHeight:win.innerHeight) }

page.scrollY=function()
 { with (this) return MS?win.document[db].scrollTop:win.pageYOffset }
page.scrollX=function()
 { with (this) return MS?win.document[db].scrollLeft:win.pageXOffset }




// *** TIP FUNCTIONS AND OBJECT ***

function tipTrack(evt, always) { with (this)
{
 // Reference the correct event object.
 evt=evt?evt:window.event;

 // Figure out the mouse co-ordinates and call the position function.
 // Also set sX and sY as the scroll position of the document.
 sX = page.scrollX();
 sY = page.scrollY();
 mX = isNS4 ? evt.pageX : sX + evt.clientX;
 mY = isNS4 ? evt.pageY : sY + evt.clientY;

 // If we've set tip tracking, call the position function.
 if (tipStick == 1) position();
}}

function tipPosition(forcePos) { with (this)
{
 // Can't position a tip if there isn't one available...
 if (!actTip) return;

 // Pull the window sizes from the page object.
 // In NS we size down the window a little as it includes scrollbars.
 var wW = page.winW()-(isIE?0:15), wH = page.winH()-(isIE?0:15);

 // Pull the compulsory information out of the tip array.
 var t=tips[actTip], tipX=eval(t[0]), tipY=eval(t[1]), tipW=div.w(), tipH=div.h(), adjY = 1;

 // Add mouse position onto relatively positioned tips.
 if (typeof(t[0])=='number') tipX += mX;
 if (typeof(t[1])=='number') tipY += mY;

 // Check the tip is not within 5px of the screen boundaries.
 if (tipX + tipW + 5 > sX + wW) { tipX = sX + wW - tipW - 5; adjY = 2 }
 if (tipY + tipH + 5 > sY + wH) tipY = sY + wH - (adjY*tipH) - 5;
 if (tipX < sX+ 5) tipX = sX + 5;
 if (tipY < sY + 5) tipY = sY + 5;

 // If the tip is currently invisible, show at the calculated position.
 // Also do this if we're passed the 'forcePos' parameter.
 if ((!showTip && (doFades ? !alpha : true)) || forcePos)
 {
  xPos = tipX;
  yPos = tipY;
 }

 // Otherwise move the tip towards the calculated position by the stickiness factor.
 // Low stickinesses will result in slower catchup times.
 xPos += (tipX - xPos) * tipStick;
 yPos += (tipY - yPos) * tipStick;

 div.x(xPos);
 div.y(yPos);
}}

function tipShow(tipN) { with (this)
{
 if (!isDyn) return;

 // If this tip is nested, call the 'show' function of its parent too.
 if (tips[tipN].parentObj) tips[tipN].parentObj.show(tips[tipN].parentTip);

 // My layer object we use.
 if (!div) div = getLyr(myName + 'Layer');
 
 // IE4 requires a small width set otherwise tip divs expand to full body size.
 if (isDOM) div.sty.width = 'auto';

 // If we're mousing over a different or new tip...
 if (actTip != tipN)
 {
  // Remember this tip number as active, for the other functions.
  actTip = tipN;

  // Set tip's onmouseover and onmouseout handlers for static tips.
  if (tipStick == 0)
  {
   if (isNS4) div.ref.captureEvents(Event.MOUSEOVER | Event.MOUSEOUT);
   div.ref.onmouseover = new Function('evt', myName + '.show("' + tipN + '"); ' +
    'if (isNS4) return this.routeEvent(evt)');
   div.ref.onmouseout = new Function('evt', myName + '.hide(); ' +
   'if (isNS4) return this.routeEvent(evt)');
  }

  // Place it somewhere onscreen - pass true to force a complete reposition.
  position(true);

  // Go through and replace %0% with the array's 0 index, %1% with tips[tipN][1] etc...
  var str = template;
  for (var i=0; i<tips[tipN].length; i++) str = str.replace('%'+i+'%', tips[tipN][i]);
  // Write the proper content... the last <br> strangely helps IE5/Mac...?
  div.write(str + ((document.all && !isWin) ? '<small><br></small>' : ''));
 }

 // For non-integer stickiness values, we need to use setInterval to animate the tip,
 // if it's 0 or 1 we can just use onmousemove to position it.
 clearInterval(trackTimer);
 if (tipStick != parseInt(tipStick)) trackTimer = setInterval(myName+'.position()', 50);

 // Finally either fade in immediately or after 'showDelay' milliseconds.
 // NS4 must always delay by a small amount as sometimes hide events come before show events
 // from a previous mouseout (when two tip triggers overlap), because it's a weird browser.
 // So, this show call can cancel a (slightly later) hide.
 clearTimeout(fadeTimer);
 if (showDelay || isNS4)
  fadeTimer = setTimeout('with ('+myName+') { showTip = true; fade() }', showDelay + 10);
 else { showTip = true; fade() }
}}


function tipHide() { with (this)
{
 // We've got to be a DHTML-capable browser that has a tip currently active.
 if (!isDyn || !actTip) return;

 // If the mouse position is within the tip boundaries, we know NS4 is telling us stories
 // as often it makes hide events unaccompanied by overs or in a weird order.
 // Only applies to static tips that we want the user to mouseover...
 if (isNS4 && tipStick==0 && xPos<=mX && mX<=xPos+div.w() && yPos<=mY && mY<=yPos+div.h())
  return;

 // If this tip is nested, call the 'hide' function of its parent too.
 if (tips[actTip].parentObj) tips[actTip].parentObj.hide();

 // Fade out after a delay so another mouseover can cancel this fade.
 // This allows the user to mouseover a static tip before its hides.
 clearTimeout(fadeTimer);
 fadeTimer = setTimeout('with (' + myName + ') { showTip=false; fade() }', hideDelay);
}}


function tipFade() { with (this)
{
 // Clear to stop existing fades.
 clearTimeout(fadeTimer);

 // Show it and optionally increment alpha from minAlpha to maxAlpha or back again.
 if (showTip)
 {
  div.vis('visible');
  if (doFades)
  {
   alpha += fadeSpeed;
   if (alpha > maxAlpha) alpha = maxAlpha;
   div.alpha(alpha);
   // Call this function again shortly, fading tip in further.
   if (alpha < maxAlpha) fadeTimer = setTimeout(myName + '.fade()', 50);
  }
 }

 else
 {
  // Similar to before but counting down and hiding at the end.
  if (doFades && alpha > minAlpha)
  {
   alpha -= fadeSpeed;
   if (alpha < minAlpha) alpha = minAlpha;
   div.alpha(alpha);
   fadeTimer = setTimeout(myName + '.fade()', 50);
   return;
  }
  div.vis('hidden');
  // Clear the active tip flag so it is repositioned next time.
  actTip = '';
  // Stop any sticky-tip tracking if it's invisible.
  clearInterval(trackTimer);
 }
}}



function TipObj(myName)
{
 // Holds the properties the functions above use.
 this.myName = myName;
 this.tips = new Array();
 this.template = '';
 this.actTip = '';
 this.showTip = false;
 this.tipStick = 1;
 this.showDelay = 50;
 this.hideDelay = 250;
 this.xPos = this.yPos = this.sX = this.sY = this.mX = this.mY = 0;

 this.track = tipTrack;
 this.position = tipPosition;
 this.show = tipShow;
 this.hide = tipHide;
 this.fade = tipFade;
 
 this.div = null;
 this.trackTimer = this.fadeTimer = 0;
 this.alpha = 0;
 this.doFades = true;
 this.minAlpha = 0;
 this.maxAlpha = 100;
 this.fadeSpeed = 10;
}















// *** START EDITING HERE ***

// This script is object orientated. That means we create 'tip objects', with a collection
// of settings, a template to display tips, and a list of tips to show in that template.
// Here are some examples:

// First, create a new tip object, and pass it its own name so it can reference itself.
var docTips = new TipObj('docTips');
with (docTips)
{
 // Next, set its properties like the tips it will display.
 
 // We organise tips in arrays like so: tips.name = new Array(X, Y, width, text, ....);
 // The first two parameters, X and Y, are the distances of the tip from the mouse cursor position
 // if they're set as numbers. If they're strings (with quotes ''), the script calculates them as
 // formulae and ignores the mouse position. They are the only compulsory parameters.
 // So that means you can use the page object included with this script for fancy positioning
 // effects. Functions include page.winW() and page.winH() for the window area dimensions,
 // and page.scrollX() and page.scrollY() for the current scroll position -- see the examples.

 tips.mysite = new Array(-75, 15, 150, 'Visit this for updates, help and more info');
 tips.welcome = new Array(5, 5, 100, 'Hope you like it...');
 tips.useful = new Array(5, 5, 150, 'This can add important context information to any link...');
 // This next tip uses a formula to position the tip 110 pixels from the right edge of the screen.
 tips.formulae = new Array('page.scrollX() + page.winW() - 110', -20, 100,
  'This tip is always on the right edge...');
 tips.format = new Array(5, 5, 150, 'That means <i>italics</i>...<br /><hr />...etc<hr/><table border="3px"><tr><td>ffff</td><td>eeee</td></tr></table>');

 // Now, set the appearance and style of the tips displayed by this tip object.
 // Each tip object must have a string called 'template' that contains some specially-formatted
 // HTML to write to the document. This example is two nested tables, a border and a background.
 // The special bits are the %2%, %3% and so on halfway through. These correspond to values we
 // set in the tip.tipName arrays above -- %0% is the X value, %1% is Y, and %2% onwards are
 // whatever other info we have in there (width, text etc...). This example sets the width %2%
 // of the table, and inserts some content which is the text %3%.
 // You might want to put extra information in the arrays above, and use %4%, %5% onwards in the
 // template for tip headers, footers, customisable colours etc... see the next tip object for
 // another example.

 template = '<table bgcolor="#003366" cellpadding="1" cellspacing="0" width="%2%" border="0">' +
  '<tr><td><table bgcolor="#6699CC" cellpadding="3" cellspacing="0" width="100%" border="0">' +
  '<tr><td class="tipClass">%3%</td></tr></table></td></tr></table>';

 // Finally, you can set some optional properties to customise the behavious of this object.

 // How much of a delay do you want between pointing and action? Defaults are:
 //showDelay = 50;
 //hideDelay = 200;

 // False will hide tips instantaneously. Fading only works under IE/Win and NS6+.
 //doFades = false;
 // You can change the minimum and maximum opacity percentages, defaults:
 //minAlpha = 0;
 //maxAlpha = 100;

 // How fast the transparency changes (between 1 and 100), higher means faster fades.
 //fadeSpeed = 10;

 // Tip stickiness, from 0 to 1, defines how readily the tip follows the cursor. 1 means it
 // follows it perfectly (the default), 0 is a static tip, and decimals are 'floating' tips.
 //tipStick = 0;
}


// Here's a second tip object. Feel free to delete it, but be sure to remove it from the
// onmousemove event section below and its DIV from the body of the page if you do!
// I've included a tip header here in this template, %3% is the header text and %4% is
// now the main text. As you can see you can basically format your tips any way you want.
// This tip also includes mouse event handlers to show a second-level tip, just like in
// the body of the page below, so you can nest tips within tips.
var staticTip = new TipObj('staticTip');
with (staticTip)
{
 tips.links = new Array(5, 5, 100, 'Extra Links',
  '- <a href="javascript:alert(\'Useful indeed...\')">Section 1</a> -<br />' +
  '- <a href="#" name="nest1trig" onmouseover="nestTip.show(\'nest1\')" onmouseout="nestTip.hide()">' +
  'NESTED TIP 1 &gt;</a> -<br />' +
  '- <a href="#" name="nest2trig" onmouseover="nestTip.show(\'nest2\')" onmouseout="nestTip.hide()">' +
  'NESTED TIP 2 &gt;</a> -<br />');

 template = '<table bgcolor="#000000" cellpadding="0" cellspacing="0" width="%2%" border="0">' +
  '<tr><td><table cellpadding="3" cellspacing="1" width="100%" border="0">' +
  '<tr><td bgcolor="#336666" align="center" height="18" class="tipClass">%3%</td></tr>' +
  '<tr><td bgcolor="#009999" align="center" height="*" class="tipClass">%4%</td></tr>' +
  '</table></td></tr></table>';

 tipStick = 0;
}

// Here's another example tip object -- multilevel static tips within tips...
var nestTip = new TipObj('nestTip');
with (nestTip)
{
 tips.nest1 = new Array(10, 0, 90,
  '<a href="javascript:alert(\'A regular popup menu...\')">Relative Position</a>');
 // If you're using nested tips, for each tip you have to tell the script its parent tip
 // object and tip name within that object, so it knows to sync their showing and hiding.
 tips.nest1.parentObj = staticTip;
 tips.nest1.parentTip = 'links';

 // This tip is positioned via formulae based on its parent tip's position...
 tips.nest2 = new Array('staticTip.xPos + 95', 'staticTip.yPos + 50', 120,
  '<a href="javascript:alert(\'Nested tip 2\')">Absolutely positioned static tip...</a>');
 tips.nest2.parentObj = staticTip;
 tips.nest2.parentTip = 'links';

 template = '<table bgcolor="#000000" cellpadding="1" cellspacing="0" width="%2%" border="0">' +
  '<tr><td><table bgcolor="#009999" cellpadding="3" cellspacing="0" width="100%" border="0">' +
  '<tr><td class="tipClass">%3%</td></tr></table></td></tr></table>';

 tipStick = 0;
}


// Here's one illustrating a decimal tipStick value so it tags along behind the cursor.
var stickyTip = new TipObj('stickyTip');
with (stickyTip)
{
 tips.floating = new Array(5, 5, 100, 'Floating tips can have extra effect!');

 template = '<table bgcolor="#000000" cellpadding="1" cellspacing="0" width="%2%" border="0">' +
  '<tr><td><table bgcolor="#339966" cellpadding="4" cellspacing="0" width="100%" border="0">' +
  '<tr><td align="center" class="tipClass">%3%</td></tr></table></td></tr></table>';

 tipStick = 0.2;
}



// Capture the onmousemove event so tips can follow the mouse. Add in all your tip objects here
// and also any functions from other scripts that need this event (e.g. my DHTML Scroller) too.
if (isNS4) document.captureEvents(Event.MOUSEMOVE);
document.onmousemove = function(evt)
{

 // Add or remove all your tip objects from here!
 docTips.track(evt);
 staticTip.track(evt);
 nestTip.track(evt);
 stickyTip.track(evt);

 if (isNS4) return document.routeEvent(evt);
}


// A small function that refreshes NS4 on horizontal resize.
var nsWinW = window.innerWidth, nsWinH = window.innerHeight;
function ns4BugCheck()
{
 if (isNS4 && (nsWinW!=innerWidth || nsWinH!=innerHeight)) location.reload()
}

window.onresize = function()
{
 ns4BugCheck();
}


//-->