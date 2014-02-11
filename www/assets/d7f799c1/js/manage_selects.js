/*pages_structure.js - скритп для модуля структуры страниц pages_structure */
var varnum = 0;
function AddNewVar(prefix)
{
	var oNotFound = document.getElementById(prefix+'notfound');
//	alert(oNotFound);
	if(null != oNotFound)	// добавляется первая переменная
		oNotFound.parentNode.removeChild(oNotFound);

	var oTblBody = document.getElementById('t'+prefix+'vars');
	var oTr = document.createElement('TR');
	eval("zebra = "+prefix+"varnum");

	oTr.id = 'tr_' + prefix + zebra;
	oTr.className = 'zebra'+((zebra%2)+1);

	var oTd1 = document.createElement('TD');
	var oTd2 = oTd1.cloneNode(true);
	var oTd3 = oTd1.cloneNode(true);
	var oTd4 = oTd1.cloneNode(true);

	oTd1.innerHTML = '<input type="text" name="'+prefix+'vars['+zebra+'][value]" size="100" />';
	oTd2.innerHTML = '<input type="text" name="'+prefix+'vars['+zebra+'][sorting]" value="0" size="3" maxlength="5"/>';
	oTd2.style.textAlign = 'center';
	oTd3.innerHTML = '<input type="checkbox" name="'+prefix+'vars['+zebra+'][hidden]" />';
	oTd3.style.textAlign = 'center';

	oTd4.innerHTML = '<a href="" onclick="return DelVar(\''+oTr.id+'\');">Удалить</a>';

	oTr.appendChild(oTd1);
	oTr.appendChild(oTd2);
	oTr.appendChild(oTd3);
	oTr.appendChild(oTd4);

	oTblBody.appendChild(oTr);

	eval(prefix+"varnum++");
//	alert(cvarnum);
//	alert(varnum);
	return false;
}

function DelVar(idname)
{	// удаляет выбранную строку.
	var oTr = document.getElementById(idname);
	oTr.parentNode.removeChild(oTr);
	return false;
}