var course_id;
var currentPath;
var data;
var words_data;

function init() {
	currentPath = document.getElementById("currentPath").value;
	var select_filter = document.getElementById("select_filter");
	select_filter.value = "all";
	course_id = document.getElementsByName("id")[0].value;
	data = makeRequest("action=list");
	words_data = makeRequest("action=listwords");
	createTable();
	create_admitlist_table();
	create_blocklist_table();

	t = setTimeout("refresh_table()", 5000);
	switchPanel("data1");
};

function refresh_table() {
	data = makeRequest("action=list");
	t = setTimeout("refresh_table()", 5000);
	if (document.getElementById("data1"))
		createTable();
}

function createTable() {

	var tableData = document.getElementById("resource_table_data");
	clearNode(tableData);

	var filter = document.getElementById('select_filter').value;
	var resources = data.getElementsByTagName("resource");
	var filtered = new Array();

	// Filtering
	if (filter != "all")

		for ( var i = 0; i < resources.length; i++) {

			var elm = resources[i];
			var elm_type = elm.getElementsByTagName("type")[0].firstChild.data
			if (elm_type == filter)
				filtered.push(resources[i]);

		}
	else
		filtered = resources;

	var status_filter = document.getElementById('select_status').value;
	if (status_filter != undefined)
		if (status_filter != "any") {

			var status_filtered = new Array();

			for ( var i = 0; i < filtered.length; i++) {
				var elm = filtered[i];
				var elm_status = elm.getElementsByTagName("status")[0].firstChild.data
				if (elm_status == status_filter) {
					status_filtered.push(filtered[i]);
				}
			}
			filtered = status_filtered;
		}

	// Rendering
	for ( var i = 0; i < filtered.length; i++) {
		var dataElm = filtered[i];
		var row = document.createElement("tr");

		if (!(i & 1))
			row.setAttribute("class", "elm_odd");
		else
			row.setAttribute("class", "elm_even");
		var col = document.createElement("td");
		col.className = "col_id";
		col.innerHTML = dataElm.getElementsByTagName("id")[0].firstChild.data;
		row.appendChild(col);
		col = document.createElement("td");
		col.innerHTML = dataElm.getElementsByTagName("name")[0].firstChild.data;
		row.appendChild(col);
		col = document.createElement("td");
		col.innerHTML = dataElm.getElementsByTagName("type")[0].firstChild.data;
		row.appendChild(col);
		col = document.createElement("td");
		col.setAttribute("id", "status"
				+ dataElm.getElementsByTagName("id")[0].firstChild.data);
		col.innerHTML = dataElm.getElementsByTagName("status")[0].firstChild.data;
		row.appendChild(col);
		col = document.createElement("td");
		col.innerHTML = dataElm.getElementsByTagName("language")[0].firstChild.data;
		row.appendChild(col);
		col = document.createElement("td");
		var chk = document.createElement("input");
		chk.setAttribute("type", "checkbox");
		chk.setAttribute("id", "check"
				+ dataElm.getElementsByTagName("id")[0].firstChild.data);
		var status = dataElm.getElementsByTagName("status")[0].firstChild.data;

		if (status == "Invisible" || status == "Unsupported") {
			chk.checked = "";
			chk.disabled = true;
		} else {
			chk.disabled = false;

			if (status == "Disabled" || status == "Pending Removal") {
				chk.checked = false;
				chk.setAttribute("onClick", "index("
						+ dataElm.getElementsByTagName("id")[0].firstChild.data
						+ ")");
			} else {
				chk.checked = true;
				chk.setAttribute("onClick", "deindex("
						+ dataElm.getElementsByTagName("id")[0].firstChild.data
						+ ")");
			}
		}
		col.appendChild(chk);
		row.appendChild(col);

		col = document.createElement("td");

		if (status == "Processed") {
			col.innerHTML = "<a href='javascript:manage_document("
					+ dataElm.getElementsByTagName("id")[0].firstChild.data
					+ ")'>manage</a>";
		} else
			col.innerHTML = "";

		row.appendChild(col);

		tableData.appendChild(row);
	}

	if (filtered.length == 0 && filter == 'all')
		document.getElementById("nothingtoshow").style.visibility = "visible";
	else
		document.getElementById("nothingtoshow").style.visibility = "hidden";

};

function create_admitlist_table() {
	var atable = document.getElementById("word_admit_body");
	clearNode(atable);

	var admitwords = words_data.getElementsByTagName("remove");
	for ( var i = 0; i < admitwords.length; i++) {
		var word = admitwords[i].childNodes[0].data;
		var row = document.createElement("tr");

		if (!(i & 1))
			row.setAttribute("class", "elm_odd");
		else
			row.setAttribute("class", "elm_even");

		var elm = document.createElement("td");
		elm.appendChild(document.createTextNode(word));
		elm.style.paddingLeft = "10px";
		row.appendChild(elm);
		elm = document.createElement("td");
		var btn = document.createElement("input");
		btn.setAttribute("type", "button");
		btn.setAttribute("value", "remove");
		btn.setAttribute("onclick", "remove_from_admit('" + word + "')");

		elm.appendChild(btn);
		row.appendChild(elm);

		atable.appendChild(row);
	}
}

function remove_from_admit(word) {
	var result = makeRequest("action=removeword&fromlist=admit&word=" + word);
	if (result.getElementsByTagName("response")[0].getAttribute("result") == 1) {
		words_data = makeRequest("action=listwords");
		create_admitlist_table();
	}
}

function create_blocklist_table() {
	var btable = document.getElementById("word_block_body");
	clearNode(btable);

	var blockwords = words_data.getElementsByTagName("add");

	for ( var i = 0; i < blockwords.length; i++) {
		var word = blockwords[i].childNodes[0].data;
		var row = document.createElement("tr");

		if (!(i & 1))
			row.setAttribute("class", "elm_odd");
		else
			row.setAttribute("class", "elm_even");

		var elm = document.createElement("td");
		elm.appendChild(document.createTextNode(word));
		elm.style.paddingLeft = "10px";
		row.appendChild(elm);
		elm = document.createElement("td");
		var btn = document.createElement("input");
		btn.setAttribute("type", "button");
		btn.setAttribute("value", "remove");
		btn.setAttribute("onclick", "remove_from_block('" + word + "')");
		elm.appendChild(btn);
		row.appendChild(elm);

		btable.appendChild(row);
	}
}

function remove_from_block(word) {
	var result = makeRequest("action=removeword&fromlist=block&word=" + word);
	if (result.getElementsByTagName("response")[0].getAttribute("result") == 1) {
		words_data = makeRequest("action=listwords");
		create_blocklist_table();
	}
}

function addword(kind) {
	var word;
	if (kind == "admit")
		word = document.getElementById("newword_admit").value;
	else
		word = document.getElementById("newword_block").value;
	var result = makeRequest("action=addword&fromlist=" + kind + "&word="
			+ word);
	if (result.getElementsByTagName("response")[0].getAttribute("result") == 1) {
		words_data = makeRequest("action=listwords");
		create_blocklist_table();
		create_admitlist_table();
		document.getElementById("newword_admit").value = "";
		document.getElementById("newword_block").value = "";
	}
}

function manage_document(id) {
	var winl = (screen.width - 800) / 2;
	var wint = (screen.height - 500) / 2;
	if (winl < 0)
		winl = 0;
	if (wint < 0)
		wint = 0;
	var stile = "top=" + wint + ", left=" + winl
			+ ", width=430, height=550, status=no, menubar=no, toolbar=no";

	window.open(currentPath
			+ "/blocks/textclouds/managedocument.php?action=list&docid=" + id,
			"", stile);
}

function clearNode(e) {
	if (!e) {
		return false;
	}
	if (typeof (e) == 'string') {
		e = xGetElementById(e);
	}
	while (e.hasChildNodes()) {
		e.removeChild(e.firstChild);
	}
	return true;
};

function index(id) {
	var result = makeRequest("action=index&resid=" + id);
	if (result.getElementsByTagName("response")[0].getAttribute("result") == 1) {
		document.getElementById("status" + id).innerHTML = "Pending";
		document.getElementById("check" + id).setAttribute("onClick",
				"deindex(" + id + ")");
		data = makeRequest("action=list");
	}
}

function deindex(id) {
	var result = makeRequest("action=deindex&resid=" + id);
	if (result.getElementsByTagName("response")[0].getAttribute("result") == 1) {
		if (document.getElementById("status" + id).innerHTML == "Pending")
			document.getElementById("status" + id).innerHTML = "Disabled";
		else
			document.getElementById("status" + id).innerHTML = "Pending Removal";
		document.getElementById("check" + id).setAttribute("onClick",
				"index(" + id + ")");
		data = makeRequest("action=list");
	}
}

function makeRequest(params) {
	var xhReq = createXMLHttpRequest();
	xhReq.open("GET", currentPath
			+ "/blocks/textclouds/config_service.php?courseid=" + course_id
			+ "&" + params, false);
	xhReq.send(null);
	return xhReq.responseXML;

}

function createXMLHttpRequest() {
	try {
		return new XMLHttpRequest();
	} catch (e) {
	}
	try {
		return new ActiveXObject("Msxml2.XMLHTTP");
	} catch (e) {
	}
	alert("XMLHttpRequest not supported");
	return null;
}

function switchPanel(which) {
	clearNode(cntin);
	if (which == "data1")
		cntin.appendChild(data1);
	if (which == "data2")
		cntin.appendChild(data2);
	if (which == "data3")
		cntin.appendChild(data3);
	document.getElementById("mdata1").style.background = "#999999";
	document.getElementById("mdata2").style.background = "#999999";
	document.getElementById("mdata3").style.background = "#999999";
	document.getElementById("m" + which).style.background = "#EEEEEE";

}

var data1 = document.getElementById("data1");
var data2 = document.getElementById("data2");
var data3 = document.getElementById("data3");
var cntin = document.getElementById("panel-container");

addonload(init);