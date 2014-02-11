var sleep_menu = 250;		// "залипание" левого меню в миллисекундах.
var sleep_menu_long = 1500  // скрываем верхнее меню через 1,5 секунды
var shmenu = 0;				// сообщает о необходимости показа меню (1 - необходимо отобразить)
var logo_status = false;	// сообщает о необходимости показа блока логотипа (true - необходимо отобразить)
var currenttable = false;	// объект класса TableDnD (перетаскивание строк таблицы мышью)
var expDate = new Date();
var isIE = false;			// работаем ли с админкой в браузере Internet Explorer. содержит либо номер версии браузер, либо false если работаем не в IE.
expDate.setTime(expDate.getTime() + 86400*60*1000);	// необходимо для установки время жизни cookies 60 дней.

function MenuShowHide()
{
	var action = GetCookie('lmenu');
	var skin = GetCurrentSkin();

	if('1' != action)
	{
		SetCookie('lmenu', '1', expDate, '/');
        $('#i_menu').css('background-image', "url("+backendImagesPath+"/skins/"+skin+"/sv_menu_r.gif)");
		shmenu = 0;
		HideMenu();
	}
	else
	{
		SetCookie('lmenu', '0', expDate, '/');
		$('#i_menu').css('background-image', "url("+backendImagesPath+"/skins/"+skin+"/sv_menu.gif)");
        shmenu = 1;
		ShowMenu();
	}
	return false;
}

function ShowMenu()
{
	if(0 == shmenu)	// случайное наведение мышкой на область меню.
		return false;
	$('#main').css('left', '307px');
	$('#main').css('width', (document.body.clientWidth - 308)+'px');
}

function HideMenu()
{
	if(1 == shmenu)	// случайный уход мышки с меню.
		return false;
	$('#main').css('left', '19px');
	$('#main').css('width', (document.body.clientWidth - 18)+'px');
}

function FlowMenu(action)
{	// функция занимается раскрыванием/сворачиванием меню при наведении мыши.
	var menu = GetCookie('lmenu');
	if(menu != 1)
	{	// работаем только если меню скрыто, иначе ничего не делаем
		return false;
	}
    shmenu = true == action ? 1 : 0;
    window.setTimeout((true == action ? "ShowMenu();" : 'HideMenu();'), sleep_menu);
	return false;
}



function HelpShowHide()
{
	var action = GetCookie('helpblock');
	var helpblk = $('#text_help');
	var skin = GetCurrentSkin();
    helpblk.toggleClass("visible");
    helpblk.toggleClass("hidden");
    var gifName = '1' != action ? 'down' : 'up';
    $('#str').attr('src', backendImagesPath+"/skins/"+skin+"/str_"+gifName+".gif");
    SetCookie('helpblock', ('1' != action ? '1' : '0'), expDate, '/');
	return false;
}

function ShapkaShowHide()
{
	var shapka = $('#ohead');
	var ii_menu = $('#i_menu');
    shapka.toggleClass('visible');
    ii_menu.css('top', (shapka.hasClass('visible') ? '119' : '34')+'px');
    $('#mc2').css('top', ii_menu.css('top'));
    $('#main').css('top', ii_menu.css('top'));
	return false;
}

function SetCookie(name, value, expires, path, domain, secure)
{	// функция установки куки с переданными параметрами (имя, значени, другие параметры)
	if(GetCookie(name) != null) ClearCookie(name);
	var expString = ((expires == null) ? "" : ("; expires=" + expires.toGMTString()));
	var pathString = ((path == null) ? "" : ("; path=" + path));
	var domainString = ((domain == null) ? "" : ("; domain=" + domain));
	var secureString = ((secure == true) ? "; secure" : "");
	document.cookie = name + "=" + escape(value) + expString + pathString + domainString + secureString;
}

function ClearCookie(name)
{	// удаление куки с переданным именем
	var expDate = new Date();
	expDate.setTime (expDate.getTime() - 86400 * 1000 * 3);
	document.cookie = name + "=ImOutOfHere; expires=" + expDate.toGMTString();
}

function GetCookie(name)
{	// получает значение куки с переданным именем
	var result = null;
	var myCookie = " " + document.cookie + ";";
	var searchName = " " + name + "=";
	var startOfCookie = myCookie.indexOf(searchName);
	var endOfCookie;
	if (startOfCookie != -1)
	{
		startOfCookie += searchName.length;
			// пропустить последнее имя cookie
		endOfCookie = myCookie.indexOf(";", startOfCookie);
		result = unescape(myCookie.substring(startOfCookie, endOfCookie));
	}
	return result;
}

function setActiveStyleSheet(title)
{
    $('link[rel="stylesheet"]').each(function(index)
    {
        //alert($(this).attr('href'))
        if($(this).attr('href').indexOf('/skins/') != -1)
        {
            //alert(title);
            if($(this).attr('href').indexOf(title) != -1)
                $(this).prop('disabled', false); 
            else
                $(this).prop('disabled', true);
        }
    });
    SetCookie('skin', title, expDate, '/');
    var name = GetCookie('lmenu');
	if('1' != name) {
		name = '';
	} else {
		name = '_r';
	}
    $('#i_menu').css('background-image', "url("+backendImagesPath+"/skins/"+title+"/sv_menu"+name+".gif)");
	if($('#knopka'))
        $('#knopka').attr('src', backendImagesPath+"/skins/"+title+"/knopka.gif");

	return false;
}

function GetCurrentSkin()
{
	var action = GetCookie('skin');
	if(null == action) { action = 'default'; }
	return action;
}

tree_loaded = false;	// просто инициализация

function SetDefaultSkin()
{
	// выставляем скин по умолчанию
	var action = GetCurrentSkin();
	setActiveStyleSheet(action);
	// данный код необходим только для страницы отображения страниц. формирует дерево в левом меню.
	if(true == tree_loaded)
	{
		document.getElementById('mc2').innerHTML = document.getElementById('pagestree').innerHTML;
		document.getElementById('pagestree').innerHTML = '';
	}
}

function showErrors(errors)
{	// отображает блок ошибок при их появлении.
	document.getElementById('omess').style.display = 'block';	 // прибиваем содержимое блока ошибок.
	document.getElementById('errors').innerHTML = errors.join('<br/>');
}


function init()
{
	SetDefaultSkin();
	check_browser();
}

function editorIsShown()
{	// перевертыш. не показывать визуальный редактор если кука установлена в 1.
	var shown = GetCookie('showTinyMCE');
	return '1' == shown ? false : true;
}

function toggleTinyMCE()
{
	var shown = editorIsShown();
	SetCookie('showTinyMCE', shown ? '1' : '0', expDate, '/');
	
	var oTextAreas = document.getElementsByTagName('TEXTAREA');
	for(var i = 0; i < oTextAreas.length; i++)
	{
		//alert(oTextAreas[i].className);
		if(-1 == oTextAreas[i].className.indexOf('dnone') && oTextAreas[i].id)	// переключаем редактор только для видимых textarea.
			toggleEditor(oTextAreas[i].id);
	}
	return false;
}

function toggleEditor(id) { tinyMCE.execCommand('mceToggleEditor', false, id); }

// предназначена для удаления строки таблицы по ее id.
function DelRow(idname)
{	// удаляет выбранную строку.
	var oTr = document.getElementById(idname);
	var oBody = oTr.parentNode;
	oTr.parentNode.removeChild(oTr);
	ReZebra(oBody)
	return false;
}
// по новой проставляет классы зебры для таблицы
function ReZebra(oBody)
{
	for(i = 0; i < oBody.rows.length; i++)
	{
		oBody.rows[i].className = 'zebra'+(i%2+1);
	}
}

function insertAfter(referenceNode, node) {
	// добавление ноды после известной.
      referenceNode.parentNode.insertBefore(node, referenceNode.nextSibling);
}

function showHideRequired(visible)
{	// показывает/скрывает необязательные поля.
	var oColl = document.getElementsByTagName('TR');	// все поля выводятся в строках.
	for(i = 0; i < oColl.length; i++)
	{
		if(null == oColl[i].className || -1 == oColl[i].className.indexOf('nonRequired')) continue;	
		oColl[i].style.display = visible ? (false != isIE ? 'block' : 'table-row') : 'none';
	}
	if(visible)
		SetCookie('allFields', '1', expDate, '/');
	else
		SetCookie('allFields', '0', expDate, '/');
}

function showPrompt(data)
{
	var oAbsDiv = document.createElement('DIV');
	oAbsDiv.setAttribute('id', 'oAbsDiv');

	var oDiv = document.createElement('DIV');
	oDiv.className = 'border prompt';
	oDiv.appendChild(data);
	oAbsDiv.appendChild(oDiv);
	document.getElementsByTagName('body')[0].appendChild(oAbsDiv);
}

function closePrompt()
{
	var oDiv = document.getElementById('oAbsDiv');
	oDiv.parentNode.removeChild(oDiv);
}

document.onmousemove = function(ev){
    if (currenttable && currenttable.dragObject) {
        ev   = ev || window.event;
        var mousePos = currenttable.mouseCoords(ev);
        var y = mousePos.y - currenttable.mouseOffset.y;
        if (y != currenttable.oldY) {
            // work out if we're going up or down...
            var movingDown = y > currenttable.oldY;
            // update the old value
            currenttable.oldY = y;
            // update the style to show we're dragging
            currenttable.dragObject.style.backgroundImage = 'url(../images/trans50.png)';
            // If we're over a row then move the dragged row to there so that the user sees the
            // effect dynamically
            var currentRow = currenttable.findDropTargetRow(y);
            if (currentRow) {
                if (movingDown && currenttable.dragObject != currentRow) {
                    currenttable.dragObject.parentNode.insertBefore(currenttable.dragObject, currentRow.nextSibling);
                } else if (! movingDown && currenttable.dragObject != currentRow) {
                    currenttable.dragObject.parentNode.insertBefore(currenttable.dragObject, currentRow);
                }
				// changing classes
				if(currentRow.className && currenttable.dragObject.className) {
					className = currentRow.className;
					currentRow.className = currenttable.dragObject.className;
					currenttable.dragObject.className = className;
				}
            }
        }

        return false;
    }
}

function check_browser()
{
		if (navigator.userAgent.indexOf ("MSIE 5") != -1)
			isIE = 5;
		else if (navigator.userAgent.indexOf("MSIE 4") != -1)
			isIE = 4;
		else if (navigator.userAgent.indexOf ("MSIE 6") != -1)
			isIE = 6;
		else if (navigator.userAgent.indexOf ("MSIE 7") != -1)
			isIE = 7;
}

$(document).ready(function(){
		if('undefined'!==typeof(window.siteMap)){
			siteMap.simpleTreeCollection = $('ul#'+siteMap.treeID+'.simpleTree').simpleTree({
				autoclose:false,
				animate:true,
				docToFolderConvert:true,
				afterClick:siteMap.afterClick,
				afterDblClick:siteMap.afterDblClick,
				afterContextMenu:siteMap.afterContextMenu,
				afterMove:siteMap.afterMove
			});
			$(document).bind("click",function(e){
				$('.contextMenu').hide();
			});
		}
});
