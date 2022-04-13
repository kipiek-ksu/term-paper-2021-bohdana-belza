/********************************************************************************************
* BlueShoes Framework; This file is part of the php application framework.
* NOTE: This code is stripped (obfuscated). To get the clean documented code goto 
*       www.blueshoes.org and register for the free open source *DEVELOPER* version or 
*       buy the commercial version.
*       
*       In case you've already got the developer version, then this is one of the few 
*       packages/classes that is only available to *PAYING* customers.
*       To get it go to www.blueshoes.org and buy a commercial version.
* 
* @copyright www.blueshoes.org
* @author    sam blum <sam-at-blueshoes-dot-org>
* @author    Andrej Arn <andrej-at-blueshoes-dot-org>
*/
if (!Bs_Objects) {var Bs_Objects = [];};function Bs_DataGrid(objectName) {
this.bHeaderFix = true;this.height = 600;this.width='100%';this.buttonsDefaultPath = '/_bsJavascript/components/datagrid/img/';this.rowClick;this.sortIgnoreCase = true;this.useNoDataText = false;this.noDataText = 'No data.';this._id;this._objectId;this._tagId;this._header;this._td;this._data;this._objectName = objectName;this._attachedEvents;this._constructor = function() {
this._id = Bs_Objects.length;Bs_Objects[this._id] = this;this._objectId = "Bs_DateGrid_"+this._id;}
this.setHeaderProps = function(properties) {
this._header = properties;}
this.setDataProps = function(properties) {
this._td = properties;}
this.rowClick;this.setData = function(data) {
this._data = data;}
this.getData = function() {
return this._data;}
this.getNumRows = function() {
return this._data.length;}
this.addRow = function(row) {
this._data[this._data.length] = row;if (typeof(bs_dg_globalColumn) == 'undefined') {
this.drawInto(this._tagId);} else {
this.orderByColumn(bs_dg_globalColumn);}
}
this.removeRow = function(rowNumber) {
var status = this._data.deleteItem(rowNumber -1);if (status) {
if (typeof(bs_dg_globalColumn) == 'undefined') {
this.drawInto(this._tagId);} else {
this.orderByColumn(bs_dg_globalColumn);}
}
return status;}
this.switchSort = function() {
if (this.bHeaderFix) {
bs_dg_sort_asc = !bs_dg_sort_asc;}
}
this.switchOverflow = function() {
if (this.bHeaderFix) {
if (document.getElementById('bsTb' + this._objectId).style.overflow == 'auto') {
this.expand();} else {
this.collapse();}
}
}
this.collapse = function() {
if (this.bHeaderFix) {
document.getElementById('overflowButtonImg_' + this._id).src=this.buttonsDefaultPath+'expand.gif';document.getElementById('overflowButtonImg_' + this._id).alt='Expand';document.getElementById('bsTb' + this._objectId).style.overflow = 'auto';}
}
this.expand = function() {
if (this.bHeaderFix) {
document.getElementById('overflowButtonImg_' + this._id).src=this.buttonsDefaultPath+'collapse.gif';document.getElementById('overflowButtonImg_' + this._id).alt='Collapse';document.getElementById('bsTb' + this._objectId).style.overflow = 'visible';}
}
this.render = function() {
var out        = new Array();var tdSettings = new Array();if (this.height > screen.height) this.height = screen.height - 100;out[out.length] = '<table id="bsDg_table' + this._objectId + '" bs_dg_objectId="' + this._objectId + '" class="bsDg_table" cellspacing="0" cellpadding="2" width="'+this.width+'" border="0"';if (ie && this.bHeaderFix) {
}
out[out.length] = ' headerCSS="bsDb_tr_header"';out[out.length] = '>';if (typeof(this._header) == 'object') {
out[out.length] = '<thead><tr class="bsDb_tr_header">';for (var i=0; i<this._header.length; i++) {
tdSettings[i] = new Array();if (typeof(this._header[i]) == 'object') {
var text     = this._header[i]['text'];var hasProps = true;} else {
var text     = this._header[i];var hasProps = false;}
out[out.length] = '<td';if (typeof(this._header[i]['title']) != 'undefined') {
out[out.length] = ' title="' + this._header[i]['title'] + '"';}
out[out.length] = ' id="' + this._objectId + '_title_td_' + i + '"';out[out.length] = ' style="';if (this._header[i]['sort'] != false) {
out[out.length] = 'cursor:hand;cursor:pointer;';}
if (hasProps) {
if (!bs_isEmpty(this._header[i]['align'])) {
out[out.length] = 'text-align:' + this._header[i]['align'] + ';';tdSettings[i]['align'] = this._header[i]['align'];if (typeof(this._td) == 'object') {
if (!bs_isEmpty(this._td[i]['align'])) tdSettings[i]['align'] = this._td[i]['align'];}
}
if (!bs_isEmpty(this._header[i]['width'])) {
out[out.length] = 'width:' + this._header[i]['width'] + ';';}
}
out[out.length] = '"';if (!bs_isEmpty(this._header[i]['nowrap']) && this._header[i]['nowrap']) {
out[out.length] = ' nowrap';}
if (this._header[i]['sort'] != false) {
out[out.length] = ' onclick="Bs_Objects['+this._id+'].orderByColumn(' + i + ');'+this._objectName+'.switchSort();"';}
out[out.length] = ' class="bsDb_td_header"';out[out.length] = '>' + text + '</td>';}
out[out.length] = '</tr></thead>';out[out.length] = '<tbody id="bsTb' + this._objectId + '"';if (moz && this.bHeaderFix) {
out[out.length] = ' style="overflow:auto; max-height:'+this.height+';">';} else {
out[out.length] = '>';}
}
if (typeof(this._data) == 'object') {
if (this._data.length == 0) {
if (this.useNoDataText) {
out[out.length] = '<tr><td colspan="100%">' + this.noDataText + '</td></tr>';}
} else {
for (var i=0; i<this._data.length; i++) {
out[out.length] = '<tr';out[out.length] = ' onmouseover="Bs_Objects['+this._id+'].onMouseOver(this, ' + (i+1) + ', ' + (i % 2) + ');"';out[out.length] = ' onmouseout="Bs_Objects['+this._id+'].onMouseOut(this, '   + (i+1) + ', ' + (i % 2) + ');"';out[out.length] = ' class="bsDg_tr_row_zebra_' + (i % 2) + '"';if (typeof(this.rowClick) != 'undefined') {
out[out.length] = ' onclick="document.location.href=\'' + this.rowClick.baseUrl + this._data[i][this.rowClick.key] + '\';"';}
out[out.length] = '>';for (var j=0; j<this._data[i].length; j++) {
if ((typeof(this._td) != 'undefined') && this._td[j]['hide']) {
continue;}
var isClickable = false;if (bs_isNull(this._data[i][j])) continue;if (typeof(this._data[i][j]) == 'object') {
var text = (typeof(this._data[i][j]['text']) != 'undefined') ? this._data[i][j]['text'] : '';} else if (typeof(this._data[i][j]) == 'undefined') {
this._data[i][j] = '';var text = this._data[i][j];} else {
var text = this._data[i][j];}
out[out.length] = '<td';if ((typeof(this._td) != 'undefined') && (typeof(this._td[j]['onclick']) != 'undefined')) {
isClickable = true;out[out.length] = ' onclick="' + this._td[j]['onclick'] + '(' + (i+1) + ');"';}
if (typeof(this._data[i][j]['title']) != 'undefined') {
out[out.length] = ' title="' + this._data[i][j]['title'] + '"';}
out[out.length] = ' style="';if ((typeof(tdSettings[j]) != 'undefined') && !bs_isEmpty(tdSettings[j]['align'])) {
out[out.length] = 'text-align:' + tdSettings[j]['align'] + ';';}
if ((typeof(this.rowClick) != 'undefined') || isClickable) {
out[out.length] = 'cursor:hand;cursor:pointer;';} else {
out[out.length] = 'cursor:default;';}
out[out.length] = '"';if (typeof(this._data[i][j]['onclick']) != 'undefined') {
out[out.length] = ' onclick="' + this._data[i][j]['onclick'] + '"';style = ' style=cursor:hand;cursor:pointer;';} else {
style = '';}
var zebraRowTdClass = 'bsDg_td_row_zebra_' + (i % 2);out[out.length] = ' class="' + zebraRowTdClass + ' bsDg_row_' + i + ' bsDg_col_' + j + '"';out[out.length] = style;out[out.length] = '>';out[out.length] = (text.length == 0) ? '&nbsp;' : text;out[out.length] = '</td>';}
out[out.length] = '</tr>' + "\n";}
}
}
out[out.length] = '</tbody></table>';return out.join('');}
this.drawInto = function(tagId) {
this._tagId = tagId;
overflowbuttonHtml = '';
document.getElementById(tagId).innerHTML = overflowbuttonHtml + this.render();var tblElm = document.getElementById('bsDg_table' + this._objectId);if (tblElm.offsetHeight > this.height) {
if (ie && this.bHeaderFix) {
tblElm.bodyHeight = this.height;}
}
}
this.orderByColumn = function(column) {
	bs_dg_globalColumn = column;
	if ((typeof(this._header[column]['sort']) != 'undefined') && (this._header[column]['sort'] == 'numeric')) {
		bs_dg_sort = 'numeric';
	} else {
		bs_dg_sort = 'alpha';
	}
	bs_dg_sort_ignoreCase = this.sortIgnoreCase;
	this._data.sort(bs_datagrid_sort);
	this.drawInto(this._tagId);
	document.getElementById(this._objectId + '_title_td_' + column).className += ' bsDb_td_header_sort';
}

this.GetFixButton = function(buttonName) {
this._getFixButton(buttonName);}
this._getFixButton = function(buttonName) {
var top   = (moz) ? '0' : '16';var styletag = '';if (this.width.search('%') < 1) {
top = '20';var dynawidth = parseInt(this.width);dynawidth = dynawidth-22;styletag='style="left:'+dynawidth+'; position:relative;';} else if (this.width == "100%") {
styletag='style="float:right; position:relative;';} else {
top = '0';styletag='style="left:0; position:relative;';}
styletag += ' top:' + top + ';';styletag += '"';overflowbuttonHtml = '<span id="overflowButtonDiv_' + this._id + '" ' + styletag + '><a href="#" onclick="'+this._objectName+'.switchOverflow();window.event.returnValue = false; return false;"><img id="overflowButtonImg_' + this._id + '" alt="Expand" src="'+this.buttonsDefaultPath+buttonName+'.gif" border="0"></a></span>';return overflowbuttonHtml;}
this.onMouseOver = function(trElm, rowNumber, colorI) {
trElm.className = 'bsDg_tr_row_zebraover_' + colorI;this.fireEvent('onMouseOver', rowNumber);}
this.onMouseOut = function(trElm, rowNumber, colorI) {
trElm.className = 'bsDg_tr_row_zebra_' + colorI;this.fireEvent('onMouseOut', rowNumber);}
this.attachEvent = function(trigger, yourEvent) {
if (typeof(this._attachedEvents) == 'undefined') {
this._attachedEvents = new Array();}
if (typeof(this._attachedEvents[trigger]) == 'undefined') {
this._attachedEvents[trigger] = new Array(yourEvent);} else {
this._attachedEvents[trigger][this._attachedEvents[trigger].length] = yourEvent;}
}
this.hasEventAttached = function(trigger) {
return (this._attachedEvents && this._attachedEvents[trigger]);}
this.fireEvent = function(trigger, params) {
if (this._attachedEvents && this._attachedEvents[trigger]) {
var e = this._attachedEvents[trigger];if ((typeof(e) == 'string') || (typeof(e) == 'function')) {
e = new Array(e);}
for (var i=0; i<e.length; i++) {
if (typeof(e[i]) == 'function') {
var status = e[i](this, params);} else if (typeof(e[i]) == 'string') {
var status = eval(e[i]);}
if (status == false) return false;}
}
return true;}
this._constructor();}
var bs_dg_globalColumn;var bs_dg_sort;var bs_dg_sort_asc=true;var bs_dg_sort_ignoreCase=true;function bs_datagrid_sort(a,b) {
if (bs_dg_sort_asc) {
if (typeof(a[bs_dg_globalColumn]) == 'object') {
if (typeof(a[bs_dg_globalColumn]['order']) != 'undefined') {
valA = a[bs_dg_globalColumn]['order'];} else {
valA = a[bs_dg_globalColumn]['text'];}
} else {
valA = a[bs_dg_globalColumn];}
if (typeof(b[bs_dg_globalColumn]) == 'object') {
if (typeof(b[bs_dg_globalColumn]['order']) != 'undefined') {
valB = b[bs_dg_globalColumn]['order'];} else {
valB = b[bs_dg_globalColumn]['text'];}
} else {
valB = b[bs_dg_globalColumn];}
} else {
if (typeof(a[bs_dg_globalColumn]) == 'object') {
if (typeof(a[bs_dg_globalColumn]['order']) != 'undefined') {
valB = a[bs_dg_globalColumn]['order'];} else {
valB = a[bs_dg_globalColumn]['text'];}
} else {
valB = a[bs_dg_globalColumn];}
if (typeof(b[bs_dg_globalColumn]) == 'object') {
if (typeof(b[bs_dg_globalColumn]['order']) != 'undefined') {
valA = b[bs_dg_globalColumn]['order'];} else {
valA = b[bs_dg_globalColumn]['text'];}
} else {
valA = b[bs_dg_globalColumn];}
}
if (bs_dg_sort == 'numeric') {
	valA = parseFloat(valA);
	valB = parseFloat(valB);
	if (valA < valB) {
		return 1;
	} else if (valA > valB) {
		return -1;
	} else {
		return 0;
	}
} else {
var re = /<a href.*/;
if (re.test(valA)) {
	re=/(\d,\d\d)/
    var arr=re.exec(valA);
	var temp = valB;
	valB = arr[0];
	arr=re.exec(temp);
	valA = arr[0];
} else {
	if (bs_dg_sort_ignoreCase) {
		valA = valA.toLowerCase();
		valB = valB.toLowerCase();
	}
}
	if (valA > valB) {
		return 1;
	} else if (valA < valB) {
		return -1;
	} else {
		return 0;
	}
}
}
