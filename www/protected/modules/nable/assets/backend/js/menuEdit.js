// menuEdit.js

function AddItem(langs)
{
	var oTblBody = document.getElementById('menuBody');
	var oTr = document.createElement('TR');
	var len = oTblBody.rows.length;
	oTr.className = 'zebra'+(len%2 + 1);
	oTr.setAttribute('id', 'tr_' + len);

	var oTd1 = document.createElement('TD');
	var oTd2 = oTd1.cloneNode(true); // мультиязычность.
	var oTd3 = oTd1.cloneNode(true);
	var oTd4 = oTd1.cloneNode(true);
	var oTd5 = oTd1.cloneNode(true);

	var oUrl = document.getElementById('linkSelected');
	//alert(oUrl.options[oUrl.selectedIndex].value+' '+oUrl.options[oUrl.selectedIndex].label); return false;

	oTd1.innerHTML = '<input type="text" name="url['+len+']" value="'+oUrl.options[oUrl.selectedIndex].value+'"/>';

	var oLangDiv = document.createElement('DIV');
	oLangDiv.style.margin = '7px 2px 2px -5px';
	oLangDiv.style.border = '0px';
	langShow = langs.length > 3 ? true : false;
	
	for(var i = 0; i < langs.length; i += 3)
	{
		var lang_id = langs[i];
		var lang_name = langs[i+1];
		var lang_editable = langs[i+2];
		// id пункта пока нулевой, поскольку пункт только создается.
		oTd2.innerHTML += '<input type="hidden" name="name_passive['+len+']['+parseInt(lang_id)+'][id]" value="0"/><input'+(lang_editable ? '' : 'disabled="disabled"')+' type="text" name="name_passive['+len+']['+parseInt(lang_id)+'][value]" value="'+oUrl.options[oUrl.selectedIndex].label+'" class="d'+(!i ? 'block' : 'none')+'" id="value_'+len+'_'+lang_id+'"/>';
		if(langShow)
		{
			var oA = document.createElement('A');
			oA.setAttribute('href', '#');
			oA.setAttribute('onclick', 'ShowLang(this, \''+lang_id+'\', '+(lang_editable ? 'true' : 'false')+', \''+len+'\')');
			oA.setAttribute('id', "select_lang_"+len+'_'+lang_id);
			oA.appendChild(document.createTextNode(lang_name));
			oA.className = 'select_lang' + (i ? '' : ' bold');
			oLangDiv.appendChild(oA);
		}
	}
	
	oTd2.appendChild(oLangDiv);	// добавляем ссылки на языковые версии.

	oTd3.style.textAlign = 'center';
	oTd3.innerHTML = '<input type="text" size="2" maxlength="2" name="levels['+len+']" value="1" />';

	oTd4.style.textAlign = 'center';
	oTd4.innerHTML = '<input type="checkbox" name="hidden[]" value="'+len+'"/>';

	oTd5.innerHTML = '<a href="" onclick="return DelRow(\''+oTr.id+'\');">Удалить</a>';

	oTr.appendChild(oTd1);
	oTr.appendChild(oTd2);
	oTr.appendChild(oTd3);
	oTr.appendChild(oTd4);
	oTr.appendChild(oTd5);

	oTblBody.appendChild(oTr);

	var tableDnD = new TableDnD();
	tableDnD.init(oTblBody.parentNode);

	return false;
}

function SelectItem(v)
{
	document.getElementById('menuForm').elements[3].value = v == '0' ? 'http://' : v;
}

function AddRole(i, name)
{
	if(i == '')
		return false;
	var oRow = document.createElement("TR");
	oRow.id = i;
	oRow.className = 'zebra'+((q%2)+1);
	
	var oCell0 = document.createElement("TD");
	var oCell1 = oCell0.cloneNode(true);
	var oCell2 = oCell0.cloneNode(true);

	oCell1.innerHTML = name;
	oCell2.innerHTML = '<input type="hidden" name="roles['+i+'][read]" value="1" /><a href="javascript:" onclick="DelRole('+i+'); return false;">'+textDelete+'</a>';

	oRow.appendChild(oCell0);
	oRow.appendChild(oCell1);
	oRow.appendChild(oCell2);

	var oSelectItem = document.getElementById('role_'+i);
	oSelectItem.parentNode.removeChild(oSelectItem);
	var aRole = document.getElementById('aRole');
	document.getElementById('maint').insertBefore(oRow, aRole);
	q++;
}

function DelRole(id)
{
	var oRow = document.getElementById(id);
	var oCol = oRow.childNodes;
	var oRoles = document.getElementById('allroles');
	var oOption = document.createElement('OPTION');
	oOption.value = id;
	oOption.id = 'role_'+id;
	oOption.innerHTML = oCol[1].innerHTML;
	oRoles.appendChild(oOption);
	oRow.parentNode.removeChild(oRow);
}

function DeleteProp(id)
{
	var to_delete = document.getElementById(id);
	to_delete.parentNode.removeChild(to_delete);
}

function AddProp(type)
{
	var oRow = document.createElement("TR");

	if(1 == type)
	{
		type = 'aprop';
		oRow.id = type + '_' + ap;
		oRow.className = 'zebra'+((ap%2)+1);
	} else {
		type = 'pprop';
		oRow.id = type + '_' + pp;
		oRow.className = 'zebra'+((pp%2)+1);
	}

	var oCell1 = document.createElement("TD");
	var oCell2 = oCell1.cloneNode(true);
	var oCell3 = oCell1.cloneNode(true);
	oCell1.innerHTML = '<input type="text" name="item[props_' + ('aprop' == type ? 'active' : 'passive') + '][name][]" />';
	oCell2.innerHTML = '<input type="text" name="item[props_' + ('aprop' == type ? 'active' : 'passive') + '][value][]" />';
	oCell3.innerHTML = "<a href=\"javascript:\" onclick=\"if(confirm('"+textOnDelete+"')){DeleteProp('" + oRow.id + "');}; return false;\">"+textDelete+"</a>";
	oRow.appendChild(oCell1);
	oRow.appendChild(oCell2);
	oRow.appendChild(oCell3);
	var oTable = document.getElementById(type);
	document.getElementById('maint').insertBefore(oRow, oTable);

	if('aprop' ==  type)
	{
		ap++;
	} else {
		pp++;
	}
}