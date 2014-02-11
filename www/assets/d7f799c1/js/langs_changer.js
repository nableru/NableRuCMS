// langs_changer.js - прикручиваем переключалку языков
function ShowLang(selectedLang, langId, langEditable, shortname)
{	// отображает поле для выбранного языка.
/*
0 - объект кнопкиязыка на которую нажали
1 - ID языковой версии
2 - есть ли возможность редактировать поле
3 - shortname
*/

	var oLinks = document.getElementsByTagName("A");	// меняем отображение активного языка.
	var toCheck = 'select_lang_' + shortname + '_';
	toCheck = toCheck.length + 2;
	for(i = 0; i < oLinks.length; i++)
	{
		if(toCheck == oLinks[i].id.length && 0 == oLinks[i].id.indexOf('select_lang_' + shortname + '_'))
			oLinks[i].className = 'select_lang';	// прибили bold
	}
	selectedLang.className = 'select_lang bold';	// сделали болдовым активный язык.
	
	showHideTags(document.getElementsByTagName('INPUT'), shortname, langId, false);
	showHideTags(document.getElementsByTagName('DIV'), shortname, langId, false);
	showHideTags(document.getElementsByTagName('TEXTAREA'), shortname, langId, true);
	var oObject = document.getElementById('value_' + shortname + '_' + langId).className = 'dblock';
	//if(isTextArea && editorIsShown()) toggleEditor('value_' + shortname + '_' + langId); 
	return false;	// обязательно.
}

// по новой методике id языка всегда двузначный и находится в конце id. так что проверяем именно таким способом.
function showHideTags(oObjects, shortname, langId, isTextArea)
{
	var toCheck = 'value_' + shortname + '_';
	toCheck = toCheck.length + 2;
	for(var i = 0; i < oObjects.length; i++)
	{
		if(undefined == oObjects[i].id || oObjects[i].id.length != toCheck || 0 != oObjects[i].id.indexOf('value_' + shortname + '_')) continue;	// пропускаем не наши поля.
		if(isTextArea && 'dnone' != oObjects[i].className && editorIsShown()) { toggleEditor(oObjects[i].id); }
		oObjects[i].className = 'dnone';
		if('value_' + shortname + '_' + langId == oObjects[i].id && isTextArea && editorIsShown()) { toggleEditor(oObjects[i].id); }
	}
}