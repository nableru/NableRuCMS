<?xml version="1.0"?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="utf8" lang="utf8">
<head>
	<title id="title">Nable.Ru CMS Главная</title>

	<link rel="alternate stylesheet" href="/admin/css/skins/default/screen.css" type="text/css" media="all" title="default" />
	<link rel="alternate stylesheet" href="/admin/css/skins/blue/screen.css" type="text/css" media="all" title="blue" />
	<link rel="alternate stylesheet" href="/admin/css/skins/green/screen.css" type="text/css" media="all" title="green" />
	<link rel="stylesheet" href="/admin/css/common.css" type="text/css" media="all" />
	    <link rel="stylesheet" href="/admin/css/na_simple_tree.css" type="text/css" media="all" />

	<link rel="icon" href="/admin/images/icons/favico.ico" />
	
</head>

<body onload="init();">
<div id="outerWrapper">
<div id="header">
	<div id="ohead">
		<div id="logo">
			<img src="/admin/images/icons/logo.png" alt="Nable.Ru CMS" width="212" height="53" />
		</div>
				<span style="float: right; margin: 20px 25px 0px 25px;" class="text_white"><span style="font-weight: bold; margin-left: 5px; text-decoration: underline;" class="h_menu">Русский</span>&nbsp;</span>
				<div class="bvert" style="margin-top: 11px; float: left;"></div>
		<div id="user">Система администрирования сайтов <a href="http://nable.ru/rus/" class="text_white bold">Nable.Ru</a><br /><strong>kpect</strong> (Анатолий Митрофанов)</div>
	</div>
	<div id="mmenu">
		<div>?<a href="/admin?debug=1" class="first">Вкл. режим отладки</a><a href="/admin?debug=0" class="">ВЫкл. режим отладки</a><a href="/admin/modules/bugs/" class="">Сообщить об ошибке</a><a href="http://nable.ru/support/docs/" class="">Документация</a><a href="/admin/logout/" class="">Выход</a><a href="/admin/" onclick="ShapkaShowHide(); return false;" class="last"><img id="knopka" src="/admin/images/skins/default/knopka.gif" width="12" height="24" alt="Показать/Скрыть лого" title="Показать/Скрыть лого" style="margin-top: -4px;"/></a></div>
		<div id="menu1"><a href="/admin/" class="first bold">Главная</a><a href="/admin/pages/" class="">Страницы</a><a href="/admin/pages/menu/" class="">Меню</a><a href="/admin/modules/" class="">Модули</a><a href="/admin/configs/" class="last">Настройки</a></div>
	</div>
</div>

<div id="main">
	<div id="cwrapper">
		<div id="dn"></div>
		
		<div id="content"><div style="text-align: justify; padding: 50px;">Видимая область администратора сайта разделена на три основных зоны - верхнее меню, левое меню и самая большая рабочая область.<br />
Возле левой границы экрана находится вертикальная полоса которая прендазначена для того, чтобы показывать/скрывать левое меню, увеличивая таким образом рабочую область. Например, это можно понадобится для удобства редактирования текста большого объема.<br />В скрытом состоянии доступ к левому меню также возможен. Для этого необходимо навести на него мышью.<br /><br />
Над верхнем меню расположена область в котором содержится логотип, информация о текущем зарегистрированном в администраторе пользователе, а также меню смены текущего языка для мультиязычных версий Nable.Ru CMS. По-умолчанию эта область скрыта, но автоматически появляется если курсор мыши находится в области верхнего меню более 1,5 секунды.<br />
При возврате курсора мыши в рабочую область область логотипа автоматически скрывается.<br /><br />
Текст блока "Подсказка" тоже может быть скрыт. Для этого предназначена стрелочка, расположенная в правом верхнем углу блока "Подсказка".<br />
Повторное нажатие на стрелочку вновь отображает текст подсказки.
</div>
</div>

		<div id="ohelp" style="display: block;">
			<div class="helph">
				<div>
					<a href="#" onclick="return HelpShowHide();"><img src="/admin/images/skins/default/str_up.gif" width="7" height="7" alt="свернуть/развернуть подсказку" id="str" /></a>
					<img src="/admin/images/icons/podskazka.gif" width="81" height="26" alt="Подсказка" />
				</div>
			</div>
			<div id="text_help">
				<p>
Блок &quot;Подсказка&quot;, расположенный в нижней части каждой страницы администратора предназначен для вывода кратких подсказок и основных приемов работы<br />
<br />
Подробная документация по использованию и функциональным возможностям находится в разделе <a href="http://nable.ru/support/docs/" target="_blank" title="Документация">Документация</a><br />
 Все интересующие вопросы по работе администратора можно задать по адресу <a href="mailto:support@nable.ru" target="_self" title="support@nable.ru">support@nable.ru</a> <br />
<br />
В связи с тем, что на протяжении более 5ти лет при разработке браузера Internet Explorer не учитываются официальные стандарты HTML &amp; XHTML корректное отображение и работа администратора в этом браузере более не гарантируется (даже в 7ой версии Internet Explorer). Хотя определенные шаги для обеспечения совместимости с нестандартным браузером с нашей стороны все же были предприняты их может оказаться недостаточно. Также возможно различное отображение администратора сайта в различных версиях Internet Explorer.<br />
Работа с администратором в браузере Internet Explorer не рекомендуется. 
</p>
Для работы в администраторе рекомендуются браузеры, поддерживающие стандарты HTML &amp; XHTML, такие как <a href="http://www.mozilla-europe.org/ru/products/firefox/" target="_blank">FireFox</a> (версия не ниже 1.5) или <a href="http://ru.opera.com/" target="_blank">Opera</a> (версия не ниже 9.0)
			</div>
		</div><div style="height: 6px;"></div>
	</div>
</div>

<div title="показать/скрыть меню" id="i_menu" onclick="MenuShowHide();"></div>
<div id="mc2" onmouseout="return FlowMenu();" onmouseover="return FlowMenu(true);">
	<div id="menu2">
		
		
			</div>
</div>
<div id="lmenu4" onmouseout="return FlowMenu();" onmouseover="return FlowMenu(true);">
	<div id="skins">
		<a href="#" onclick="return toggleTinyMCE();">Toggle WYSIWYG Editor</a><br/><br/>
		Скин: <a href="#" onclick="return setActiveStyleSheet('default');">Default</a> <a href="#" onclick="return setActiveStyleSheet('blue');">Blue</a> <a href="#" onclick="return setActiveStyleSheet('green');">Green</a>
	</div>
	<div id="copy">
		Система администрирования<br />
		сайтов <span class="bold">Nable.Ru</span> (v. 1.6)
	</div>
</div>
<script type="text/javascript" charset="UTF-8" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script type="text/javascript" charset="UTF-8" src="/js/jquery.cookie.js"></script>
<script type="text/javascript" charset="UTF-8" src="/admin/js/jquery.simple.tree.js"></script>
<script type="text/javascript" charset="UTF-8" src="/admin/js/jquery.simplecover-0.1.js"></script>
<script type="text/javascript" charset="UTF-8" src="/admin/js/script.js"></script>
</div>
</body>
</html>
