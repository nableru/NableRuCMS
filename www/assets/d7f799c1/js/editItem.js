// editItem.js - скрипт для любого модуля где используются итемы (напр. каталог или статьи)

function delParent(id) {	// удаляет привязку к заданному родителю.
	var oItem = document.getElementById('parent_'+id);
	var oTbody = oItem.parentNode;
	oTbody.removeChild(oItem);
	if(oTbody.rows.length)	// значит еще есть привязки.
	{
		ReZebra(oTbody);
		return false;
	}

	var oTr = document.createElement('TR');
	oTr.setAttribute('id', 'parentsNotFound');
	var oTd = document.createElement('TD');
	oTd.setAttribute('colspan', '3');
	oTd.setAttribute('class', 'zebra1 bold center');
	oTd.appendChild(document.createTextNode('Родители не найдены'));
	oTr.appendChild(oTd);
	oTbody.appendChild(oTr);
	return false;
}

function selectParent() {	// добавляет привязку к родителю.
	oItem = document.getElementById('parentsNotFound');
	if(null != oItem) oItem.parentNode.removeChild(oItem);	// удаляем строку "Родители не найдены"
	
	
	var oSelect = document.createElement('SELECT');
	oSelect.setAttribute('onchange', 'addParent(this.options[this.selectedIndex].value)');
	oSelect.setAttribute('name', 'parent');
	oSelect.setAttribute('id', 'addParent');
	var oOption = document.createElement('OPTION');
	oOption.appendChild(document.createTextNode(' '));
	oSelect.appendChild(oOption);
	var size = parents.length/2;
	for(var i = 0; i < size; i++)
	{
		var oOption = document.createElement('OPTION');
		oOption.setAttribute('value', i);
		oOption.appendChild(document.createTextNode(parents[i+size]));
		oSelect.appendChild(oOption);
	}
	showPrompt(oSelect);
	return false;
}

function addParent(parent)
{	// формирует нужную строку таблицы, закрывает див вопроса.

	var oTbody = document.getElementById('parentsBody');

	var oTr = document.createElement('TR');
	oTr.setAttribute('id', 'parent_'+parents[parseInt(parent)]);
	oTr.setAttribute('class', 'zebra'+(oTbody.rows.length%2+1));

	var oTd = document.createElement('TD');
	oTd.className = 'center';
	oTd.innerHTML = '<input type="radio" name="prime" value="'+parents[parseInt(parent)]+'"/>';
	oTr.appendChild(oTd);
	var oTd = document.createElement('TD');
	oTd.innerHTML = '<input type="hidden" name="parents[]" value="'+parents[parseInt(parent)]+'"/> '+parents[parseInt(parent)+parents.length/2];
	oTr.appendChild(oTd);
	var oTd = document.createElement('TD');
	oTd.innerHTML = '<a href="#" onclick="return delParent('+parents[parseInt(parent)]+')">Удалить</a>';
	oTr.appendChild(oTd);
	oTbody.appendChild(oTr);
	closePrompt();
}