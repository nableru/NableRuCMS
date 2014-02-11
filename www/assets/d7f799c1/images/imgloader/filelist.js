/**
 * filelist.js
 *
 * @author Moxiecode
 * @copyright Copyright © 2005, Moxiecode Systems AB, All rights reserved.
 */

var selectedFiles = new Array();
var selectedDirs = new Array();

function isDisabled(command) {
	for (var i=0; i<disabledTools.length; i++) {
		if (command == disabledTools[i])
			return true;
	}

	return false;
}

function keepSessionAlive() {
	var img = new Image();

	img.src = "session_keepalive.php?rnd=" + new Date().getTime();

	window.setTimeout('keepSessionAlive();', 1000 * 60);
}

keepSessionAlive();

function execFileCommand(command) {
	var formObj = document.forms['filelistForm'];

	if (isDisabled(command))
		return;

	// If command disabled then do nothing
	if (!isCommandEnabled(command))
		return;

	switch (command) {
		case "toggleall":
			for (var i=0; i<formObj.elements.length; i++) {
				if (formObj.elements[i].type == "checkbox" && !formObj.elements[i].disabled)
					formObj.elements[i].checked = formObj.elements[i].checked ? false : true;
			}

			updateTools();
			break;

		case "createdir":
			openPop("createdir.php?path=" + escape(path), 330, 160);
			break;

		case "createdoc":
			openPop("createdoc.php?path=" + escape(path), 565, 270);
//			openPop("createdoc.php?path=" + escape(path), 700, 400);
			break;

		case "upload":
			openPop("upload.php?path=" + escape(path), 325, 160);
			break;

		case "imagemanager":
			top.switchToImageManager(imageManagerURLPrefix, path);
			break;

		case "props":
			var selPath = "";

			if (selectedFiles.length > 0)
				selPath = selectedFiles[0];

			if (selectedDirs.length > 0)
				selPath = selectedDirs[0];

			openPop("fileprops.php?path=" + escape(selPath), 280, 120);
			break;

		case "cut":
			if (confirm("Are you sure you want to cut/move the selected files?")) {
				document.forms['filelistForm'].action.value = "cut";
				document.forms['filelistForm'].submit();
			}
			break;

		case "copy":
			if (confirm("Are you sure you want to copy the selected files?")) {
				document.forms['filelistForm'].action.value = "copy";
				document.forms['filelistForm'].submit();
			}
			break;

		case "paste":
			if (demo) {
				alert(demoMsg);
				return;
			}

			if (confirm("Are you sure you want to paste the files from clipboard here?")) {
				document.forms['filelistForm'].action.value = "paste";
				document.forms['filelistForm'].submit();
			}
			break;

		case "delete":
			if (demo) {
				alert(demoMsg);
				return;
			}

			showPreview(path);

			if (confirm("Are you sure you want to delete the selected files?")) {
				document.forms['filelistForm'].action.value = "delete";
				document.forms['filelistForm'].submit();
			}

			break;

		case "refresh":
			if (!document.forms['filelistForm'].x) {
				document.forms['filelistForm'].action.value = "refresh";
				document.forms['filelistForm'].submit();
				document.forms['filelistForm'].x = true;
			}
			break;

		case "unzip":
			if (demo) {
				alert(demoMsg);
				return;
			}

			if (confirm("Are you sure you want to unzip the selected files?")) {
				document.forms['filelistForm'].action.value = "unzip";
				document.forms['filelistForm'].submit();
			}

			break;
	}
}

function isCommandEnabled(command) {
	var elm = document.getElementById(command);

	return elm && elm.commandEnabled;
}

function setCommandEnabled(command, state) {
//	if (isDisabled(command))
//		return;

	var elm = document.getElementById(command);
	if (elm)
		elm.commandEnabled = state;

	if (command == "toggleall")
		return;

	if (state) {
		setClassLock(command, false);
		switchClass(command, 'mceButtonNormal');
	} else {
		switchClass(command, 'mceButtonDisabled');
		setClassLock(command, true);
	}
}

function addButtonHandlers(element_id) {
	var targetElm = document.getElementById(element_id);
	if (targetElm) {
		targetElm.onmouseover = buttonEventHandler;
		targetElm.onmouseout = buttonEventHandler;
		targetElm.onmouseup = buttonEventHandler;
		targetElm.onmousedown = buttonEventHandler;
	}
}

function buttonEventHandler(e) {
	var isMSIE = (navigator.appName == "Microsoft Internet Explorer");
	e = isMSIE ? window.event : e;
	var srcElm = isMSIE ? e.srcElement : e.target;

	if (typeof(isDisabled) == "undefined")
		return;

	if (isDisabled(srcElm.getAttribute('id')))
		return;

	switch (e.type) {
		case "mouseover":
			switchClass(srcElm.getAttribute('id'), 'mceButtonOver');
			break;

		case "mouseup":
		case "mouseout":
			switchClass(srcElm.getAttribute('id'), 'mceButtonNormal');
			break;

		case "mousedown":
			switchClass(srcElm.getAttribute('id'), 'mceButtonDown');
			break;
	}
}

function resizeColumn(name1, name2) {
	var elm1 = document.getElementById(name1);
	var elm2 = document.getElementById(name2);

	if (elm2.clientWidth > elm1.clientWidth)
		elm1.width = elm2.clientWidth + 2;
}

function init(error_msg) {
	setCommandEnabled('createdir');

	addButtonHandlers('createdir');

	fixImagesBug();

	if (error_msg != "")
		alert(error_msg);
}

function showPreview(path) {
	if (top.frames && top.frames['preview'])
		top.frames['preview'].document.location = "preview.php?path=" + path;
}

function updateTools() {
	selectedFiles = new Array();
	selectedDirs = new Array();
	var previewPath;

	var formElm = document.forms['filelistForm'];

	for (var i=0; i<formElm.elements.length; i++) {
		var element = formElm.elements[i];
		if (element.checked) {
			if (element.name.indexOf('dir_') != -1)
				selectedDirs[selectedDirs.length] = element.value;
			else
				selectedFiles[selectedFiles.length] = element.value;
		}
	}

	// Show hide tools
	if (selectedDirs.length > 0 || selectedFiles.length > 0) {
		if (hasWriteAccess) {
			setCommandEnabled('cut', true);
			setCommandEnabled('delete', true);
			setCommandEnabled('unzip', true);

			if ((selectedDirs.length + selectedFiles.length) == 1)
				setCommandEnabled('props', true);
			else
				setCommandEnabled('props', false);
		}

		setCommandEnabled('copy', true);
	} else {
		setCommandEnabled('cut', false);
		setCommandEnabled('copy', false);
		setCommandEnabled('delete', false);
		setCommandEnabled('props', false);
		setCommandEnabled('unzip', false);
	}
}

function triggerSelect(elm) {
	var previewPath;

	updateTools();

	if (selectedDirs.length == 0 && selectedFiles.length == 0)
		previewPath = path;
	else
		previewPath = elm.value;

	showPreview(previewPath);
}

function openFile(path) {
}
