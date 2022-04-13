function MyToogle(parentNode) {
	childNode = $(parentNode + 'content');
	if (childNode.style.display == 'none')
		childNode.style.display = 'block';
	else
		childNode.style.display = 'none';
}

function ScreenResize() {
	
	wclient=getClientWidth();
	if (wclient>1024) wclient=1024;

	htemp=getClientHeight()-181-50;
	wtemp=wclient-100-10;

	$('virtbook').style.height=htemp*0.95+'px';
	$('virtbook').style.width=wtemp*0.99+'px';


	$('def').style.height=htemp*0.95+'px';
	$('def').style.width=wclient-350-130+'px';
	$('main').style.width = wclient-350-190+'px';

	$('sel').style.height=htemp*0.82+'px';
	$('alm').style.height=htemp*0.95+'px';
}

var global_name = '';
	global_parent = '';
	global_edit = '';
	global_book = '';
	global_skey = '';
	//global_prev = '';
	global_path = '';
	global_arr = new Array(15);

function hiden(button, table, parent, edit, book, skey) {
	childNode = $(table);
	btn = $(button);
	global_parent = parent;
	global_name = table;
	global_edit = edit;
	global_book = book;
	global_skey = skey;

	if (childNode.style.display == 'none') {
		childNode.style.display = 'block';
		btn.src = 'pix/minus.gif';
		if (global_arr[parent]!=1) {
			expandData();
			global_arr[parent]=1;
		}
	}
	else {
		childNode.style.display = 'none';
		btn.src = 'pix/plus.gif';
	}
}

function simplehiden(button, table/*, parent, edit, book, skey*/) {
	childNode = $(table);
	btn = $(button);

	if (childNode.style.display == 'none') {
		childNode.style.display = 'block';
		btn.src = 'pix/minus.gif';
	}
	else {
		childNode.style.display = 'none';
		btn.src = 'pix/plus.gif';
	}
}

/*AJAX*/

function expandData () {
	new Ajax.Updater('','pjax_chapter.php?curparent='+global_parent+'&edit='+global_edit+'&book='+global_book+'&sesskey='+global_skey,{ method:'GET' , onComplete: succesChapter, onFailure: erreurRetourAjax, onLoading: showLoading});
}

function succesChapter (t) {
	$(global_name).innerHTML = t.responseText;
}

function showLoading (t) {
	$(global_name).innerHTML = '<div align="center">wait loading ...</div><div align="center"><img src="pix/loader.gif" alt="loader..."/></div>';
}

function gotoContent(parent, path) {
	global_path = path;
	/*if (parent != global_prev) {
		global_prev = parent;
	*/	new Ajax.Updater('','pjax_content.php?curparent='+parent,{ method:'GET' , onComplete: succesRetourAjax, onFailure: erreurRetourAjax});
	/*} else {
		set_Url();
	}*/
}

function succesRetourAjax (t) {
	$('main').innerHTML = t.responseText;
	CodePress.run();
	id = setTimeout("set_Url()",500);
}
function set_Url () {
	document.location.href = global_path;
}

function erreurRetourAjax (t) {
  $('main').innerHTML = "fail to connect";
}


///search
function search() {
	searchtext=$('query').value;
	new Ajax.Updater('','pjax_search.php?search='+searchtext,{ method:'GET' , onComplete: succesSearch, onFailure: errorSearch, onLoading: LoadSearch});
}

function errorSearch(t) {
	$('main').innerHTML = t.responseText;
}
function succesSearch(t) {
	$('main').innerHTML = t.responseText;
}
function LoadSearch (t) {
   	$('main').innerHTML = '<div align="center">wait loading ...</div><div align="center"><img src="pix/loader.gif" alt="loader..."/></div>';
}