/*pages_structure.js - скритп для модуля структуры страниц pages_structure */
var varnum	= -1;
var cvarnum = -1;
var ivarnum = -1; 
function AddNewVar(prefix, langs)
{
	var oNotFound = document.getElementById(prefix+'notfound');
//	alert(oNotFound);
	if(null != oNotFound)	// добавляется первая переменная
		oNotFound.parentNode.removeChild(oNotFound);

	var oTblBody = document.getElementById('t'+prefix+'vars');
	var oTr = document.createElement('TR');
	eval("zebra = "+prefix+"varnum");
	var azebra = Math.abs(zebra);

	oTr.id = 'tr__' + prefix + azebra;
	//oTr.className = 'zebra'+((azebra%2)+1);
	oTr.className = 'zebra'+(oTblBody.rows.length%2 + 1);

	var oTd1 = document.createElement('TD');
	var oTd2 = oTd1.cloneNode(true);
	var oTd3 = oTd1.cloneNode(true);
	var oTd4 = oTd1.cloneNode(true);
	var oTd5 = oTd1.cloneNode(true);
	var oTd6 = oTd1.cloneNode(true);	// мультиязычность.
	var oTd7 = oTd1.cloneNode(true);

	oTd1.innerHTML = '<input type="hidden" name="'+prefix+'vars['+zebra+'][props]" value=""/><input type="text" name="'+prefix+'vars['+zebra+'][varshortname]" size="20" />';

	if(langs.length > 3)
	{
		var oLangDiv = document.createElement('DIV');
		oLangDiv.style.margin = '7px 2px 2px -5px';
		oLangDiv.style.border = '0px';
	}
	for(var i = 0; i < langs.length; i += 3)
	{
		var lang_id = langs[i];
		var lang_name = langs[i+1];
		var lang_editable = langs[i+2];
		var oInput = document.createElement('INPUT');
		oInput.setAttribute('type', 'text');
		oInput.setAttribute('name', prefix + 'vars['+zebra+'][name]['+parseInt(lang_id)+']');
		oInput.setAttribute('size', '30');
		oInput.setAttribute('value', '');
		var shortname = '_'+azebra+prefix+'vars_';
		oInput.setAttribute('id', 'value_'+prefix+shortname+'_'+lang_id);

		if(i) oInput.className = 'dnone';	// отображаем только первый инпут.
		if(!lang_editable) oInput.setAttribute('disabled', 'disabled');
		oTd2.appendChild(oInput);

		if(langs.length == 3) continue; // не вставляем языковую панель поскольку всего один язык.

		var oA = document.createElement('A');
		oA.setAttribute('href', '#');
		oA.setAttribute('onclick', 'ShowLang(this,\''+lang_id+'\','+lang_editable+',\''+prefix+shortname+'\')');
		oA.setAttribute('id', "select_lang_"+prefix+shortname+'_'+lang_id);
		oA.appendChild(document.createTextNode(lang_name));
		oA.className = 'select_lang' + (i ? '' : ' bold');
		oLangDiv.appendChild(oA);
	}
	if(langs.length > 3) oTd2.appendChild(oLangDiv);	// добавляем ссылки на языковые версии.

	var multiLangId = prefix+'vars_multilang'+azebra;

	oTd3.innerHTML = '<select name="'+prefix+'vars['+zebra+'][vartype]" onChange="changeMultiLang(this.options[this.selectedIndex].value, \''+multiLangId+'\', '+zebra+', \''+prefix+'\');"><option value="text">Текст</option><option value="string">Строка</option><option value="int">Целое число</option><option value="float">Число с плавающей запятой</option><option value="bool">Поле &quot;Да/Нет&quot;</option><option value="cost">Цена</option><option value="image">Изображение или Flash</option><option value="file">Файл разрешенного формата</option><option value="date">Дата</option><option value="time">Время</option><option value="single">Список единичного выбора</option><option value="multi">Список множественного выбора</option></select> <select name="'+prefix+'vars['+zebra+'][type]"><option value="NotInherited">Ненаследуемая</option><option value="Inherited">Наследуемая</option><option value="Supplemented">Дополняемая</option></select>';
	oTd6.style.textAlign = 'center';

	oTd5.innerHTML = '<a href="" onclick="return DelVar(\''+oTr.id+'\');">Удалить</a><a id="fieldProps_i'+zebra+'" href="#" onclick="return showImgProps('+zebra+', \''+prefix+'\');">Свойства</a>';
	
	oTd7.style.textAlign = 'center';
	var oInput = document.createElement('INPUT');
	oInput.setAttribute('type', 'checkbox');
	oInput.setAttribute('name', prefix + 'vars['+zebra+'][in_list]');
	oInput.setAttribute('value', '1');
	oTd7.appendChild(oInput);

	oTd6.style.textAlign = 'center';
	var oInput = document.createElement('INPUT');
	oInput.setAttribute('type', 'checkbox');
	oInput.setAttribute('name', prefix + 'vars['+zebra+'][multilang]');
	oInput.setAttribute('value', '1');
	oInput.setAttribute('checked', 'checked');	// поскольку первым в списке данных идет поле типа text
	oInput.setAttribute('id', multiLangId);
	oTd6.appendChild(oInput);

	oTd4.style.textAlign = 'center';
	var oInput = document.createElement('INPUT');
	oInput.setAttribute('type', 'checkbox');
	oInput.setAttribute('name', prefix + 'vars['+zebra+'][required]');
	oInput.setAttribute('value', '1');
	oTd4.appendChild(oInput);

	oTr.appendChild(oTd1);
	oTr.appendChild(oTd2);
	oTr.appendChild(oTd3);
	oTr.appendChild(oTd7);
	oTr.appendChild(oTd4);
	oTr.appendChild(oTd6);
	oTr.appendChild(oTd5);

	oTblBody.appendChild(oTr);

	eval(prefix+"varnum--");
	var tableDnD = new TableDnD();
	tableDnD.init(oTblBody.parentNode);
	return false;
}

function changeMultiLang(dataType, multiLangId, id, prefix)
{	// функция призвана менять значение опции ML в зависимости от типа данных поля. поскольку это актуально для большинства полей.
	//alert(multiLangId);
	var oML = document.getElementById(multiLangId);
	switch(dataType)
	{
		case 'text':
		case 'string':
		case 'file':
		case 'single':
		case 'multi':
			oML.setAttribute('checked', 'checked');
			
			// дня новых полей списков устанавливаем по дефолту "Наследуемое"
			if (-1 !== jQuery.inArray(dataType, ['single', 'multi']) && 
				jQuery('tr#tr__' + prefix + Math.abs(id) + ' input[name*="vars[-"]').length) {
				jQuery('tr#tr__' + prefix + Math.abs(id) + ' select[name$="[type]"]').val('Inherited');
			}
			break;
		case 'int':
		case 'float':
		case 'bool':
		case 'cost':
		case 'date':
		case 'time':
		case 'image':
			oML.removeAttribute('checked');
			break;
	}

	if(null == id)	// не передается id. не трогаем свойства. 
		return false;
	// вновь добавленное поле, либо изменяли тип данных для уже существующего. назначаем свойства по умолчанию.
	// alert(id);
	var oInput = document.getElementsByName(prefix+'vars['+id+'][props]')[0];
	
	if (undefined != oInput) {
		switch(dataType)
		{
			case 'image':	// также добавляем ссылку на свойства поля.
				oInput.value = imagesDefault;
				break;
			default: oInput.value = '';	// просто сносим свойства, чтобы не вводить пользователя в заблуждение.
		}
	}
	return false;
}

function DelVar(idname)
{	// удаляет выбранную строку.
	var oTr = document.getElementById(idname);
	var oTable = oTr.parentNode.parentNode;
	oTr.parentNode.removeChild(oTr);
	return false;
}

function showImgProps(id, prefix)
{	// отображает приглашение для изменения свойств конкретного поля-картинки.
	var sValue = document.getElementsByName(prefix+'vars['+id+'][props]')[0].value;
	var aItems = sValue.split(',');	// бьем строку по запятой. будем выводить свойства.
	var oDiv = oInput = document.createElement('DIV');
	oDiv.setAttribute('style', 'text-align: left;');
	for(var i = 0; i < aItems.length; i += 2)
	{
		var oInput = document.createElement('INPUT');
		oInput.setAttribute('name', aItems[i]);
		oInput.setAttribute('type', 'text');
		oInput.setAttribute('size', '2');
		oInput.setAttribute('style', 'text-align: center; margin-right: 10px;');
		oDiv.appendChild(oInput);
		oInput.setAttribute('value', aItems[i+1]);
		switch(aItems[i])
		{
			case 'fullsize_quiality':
				var oText = document.createTextNode('Качество полноразмерной картинки %');
				break;
			case 'preview_quality':
				var oText = document.createTextNode('Качество превьюхи %');
				break;
			case 'fullsize_width':
				var oText = document.createTextNode('Ширина полноразмерной картинки px');
				break;
			case 'fullsize_height':
				var oText = document.createTextNode('Высота полноразмерной картинки px');
				break;
			case 'preview_width':
				var oText = document.createTextNode('Ширина превьюхи px');
				break;
			case 'preview_height':
				var oText = document.createTextNode('Высота превьюхи px');
				break;
		}
		oDiv.appendChild(oText);
		oDiv.appendChild(document.createElement('BR'));
		oDiv.appendChild(document.createElement('BR'));
	}
	var oHref = document.createElement('A');
	oHref.setAttribute('href', '#');
	oHref.setAttribute('onclick', 'setImgProps('+id+', \''+prefix+'\')');
	oHref.appendChild(document.createTextNode('Изменить'));
	oDiv.appendChild(oHref);
	showPrompt(oDiv);
}

function setImgProps(id, prefix)
{
	var oColl = document.getElementById('oAbsDiv').childNodes[0].childNodes[0].childNodes;	// получили доступ к содержимому с инпутами. меняем значения.
	var size = oColl.length;
	var result = ''; // формируем конечную строку.
	for(var i = 0; i < size; i++)
	{
		if(null == oColl[i].tagName || 'INPUT' != oColl[i].tagName.toUpperCase()) continue;
		if(i) result += ',';
		result += oColl[i].getAttribute('name')+','+oColl[i].value;

	}
	var oInput = document.getElementsByName(prefix+'vars['+id+'][props]')[0];
	oInput.value = result;	// меняем значение hidden поля.
	closePrompt();
}