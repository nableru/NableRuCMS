var q = 1;

function AddRole(i, name)
{
	if(i == '')
		return false;
	var oRow = document.createElement("TR");
	oRow.id = 'role_'+i;
	oRow.className = 'zebra'+((q%2)+1);
	
	var oCell0 = document.createElement("TD");
	var oCell1 = oCell0.cloneNode(true);
	oCell1.align= 'center';
	var oCell2 = oCell1.cloneNode(true);
	var oCell3 = oCell1.cloneNode(true);
	var oCell4 = oCell1.cloneNode(true);
	var oCell5 = oCell1.cloneNode(true);
	var oCell6 = oCell1.cloneNode(true);

	oCell0.innerHTML = name;
	oCell1.innerHTML = '<input type="checkbox" name="roles['+i+'][read]" value="1" checked="checked" />';	// по-умолчанию, доступ на чтение.
	oCell2.innerHTML = '<input type="checkbox" name="roles['+i+'][add]" value="1" />';
	oCell3.innerHTML = '<input type="checkbox" name="roles['+i+'][modify]" value="1" />';
	oCell4.innerHTML = '<input type="checkbox" name="roles['+i+'][delete]" value="1" />';
	oCell5.innerHTML = '<input type="checkbox" name="roles['+i+'][execute]" value="1" />';
	oCell6.align= 'left';
	oCell6.innerHTML = '<a href="javascript:" onclick="DelRole('+i+'); return false;">'+text_delete+'</a>';

	
	oRow.appendChild(oCell0);
	oRow.appendChild(oCell1);
	oRow.appendChild(oCell2);
	oRow.appendChild(oCell3);
	oRow.appendChild(oCell4);
	oRow.appendChild(oCell5);
	oRow.appendChild(oCell6);
	var oTable = document.getElementById('oTable');
	var oSelectItem = document.getElementById('role_'+i);
	oSelectItem.parentNode.removeChild(oSelectItem);
	//oTable.appendChild(oRow);
	insertAfter(oTable, oRow);
	q++;
}

function DelRole(id)
{
	var oRow = document.getElementById('role_'+id);
	var oCol = oRow.childNodes;
	var oRoles = document.getElementById('allroles');
	var oOption = document.createElement('OPTION');
	oOption.value = id;
	oOption.id = 'role_'+id;
	oOption.innerHTML = oCol[0].innerHTML;
	oRoles.appendChild(oOption);
	oRow.parentNode.removeChild(oRow);
}

var std = 1;
var user = 1;

function AddModule(oid, value, name, type)
{
	if(oid == '')
		return false;

	var varname = "modules[" + (type == true ? 'system' : 'user') + "][installed][]";
	var type = (type == true ? 'std' : 'user');

	var oRow = document.createElement("TR");
	id = type + "_" + eval(type);
	oRow.id = id;
	var oCell1 = document.createElement("TD");
	var oCell2 = oCell1.cloneNode(true);

	oCell1.innerHTML = name;
	oCell2.innerHTML = "<input type=\"hidden\" name=\"" + varname + "\" value=\""+ value +"\" /><a href=\"javascript:\" onclick=\"return DelModule('" + id + "', '" + value + "', '" + type + "');\">удалить</a>";

	oRow.appendChild(oCell1);
	oRow.appendChild(oCell2);

	var oTable = document.getElementById('all'+ type +'_modules');
	oTable.appendChild(oRow);

	var oSelectItem = document.getElementById(oid);
	oSelectItem.parentNode.removeChild(oSelectItem);
	eval(type + "++;");
	return false;
}

function DelModule(id, value, type)
{
	var oRow = document.getElementById(id);
	var oCol = oRow.childNodes;
	var oModules = document.getElementById('all'+ type +'_modules_o');
	var oOption = document.createElement('OPTION');
	oOption.innerHTML = oCol[0].innerHTML;
	oOption.id = id;
	oOption.value = value;
	oModules.appendChild(oOption);
	oRow.parentNode.removeChild(oRow);
	return false;
}