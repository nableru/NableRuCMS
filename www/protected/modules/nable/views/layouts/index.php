<?php
if(is_array($this->pageTitle)) $this->pageTitle = join(' :: ', $this->pageTitle);
if(false === strpos($this->pageTitle, '<title')) $this->pageTitle = '<title>'.$this->pageTitle.'</title>';
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <?php
	//<title id="title">Nable.Ru CMS {if is_array($title)}{$title|@join:" :: "}{else}{$title}{/if}</title>
    echo $this->pageTitle;
    ?>
	<link rel="icon" href="<?php echo $this->backendImagesPath; ?>/icons/favico.ico" />
    <script type="text/javascript">var backendImagesPath='<?php echo $this->backendImagesPath; ?>'</script>
</head>

<body onload="init();">
<div id="outerWrapper">
<div id="header">
	<div id="ohead">
		<div id="logo"><?php
        //echo CHtml::image($images['logo'], 'Nable.Ru CMS');
        echo CHtml::image($this->backendImagesPath . '/icons/logo.png', 'Nable.Ru CMS');
        ?></div>
        <?php 
		/*
        {insert name="GetLangs" assign="langs"}{if $langs}{* отображаем меню языков сайта только если установлен модуль мультиязычности *}
		<span style="float: right; margin: 20px 25px 0px 25px;" class="text_white">{foreach from=$langs item=v}{if !$v.url}<span style="font-weight: bold; margin-left: 5px; text-decoration: underline;" class="h_menu">{$v.name|capitalize}</span>{else}<a href="{$v.url}" style="color: #B9CBD7;">{$v.name|capitalize}</a>{/if}&nbsp;{/foreach}</span>
		{/if}
        */
        ?>
		<div class="bvert"></div>
		<div id="user">Система администрирования сайтов 
        <?php echo CHtml::link('Nable.Ru', 'http://nable.ru/'/*{$smarty.const.__LANG}/ тут автоматически должен добавляться в url текущий язык */,
        array(
            'class' => 'text_white bold',
            'onclick' => 'return !window.open(this.href)',
        ));?>
        <br /><strong><?php echo Yii::app()->user->name; ?></strong>
        {if $User->fullName} ({$User->fullName}){/if}</div>
	</div>
	<div id="mmenu">
        <?php /* документация & выход */
        /*
                        echo CHtml::image($this->backendImagesPath .
                        '/skins/default/str_'.(empty(Yii::app()->request->cookies['helpblock']->value) ? 'up' : 'down') .
                        '.gif','свернуть/развернуть подсказку', array(
                            'id' => 'str',
                            'width' => 7,
                            'height' => 7,
                            'onclick' => 'return HelpShowHide();',
                            'title' => 'свернуть/развернуть подсказку',
                        ));

        */
        //{insert name="ShowMenu" num=3}
        $this->widget('zii.widgets.CMenu', array(
          'id' => 'menu3',
          'firstItemCssClass' => 'first',
           'lastItemCssClass' => 'last',
                'encodeLabel' => false,
          'items'=>array(
            array('label'=>'Login', 'url'=>array('/user/auth'), 'visible'=>Yii::app()->user->isGuest),
		    array('label'=>'Выход', 'url'=>array('/site/logout'), 'visible'=>Yii::app()->user->isAdmin()),
            array(
                'label' =>
                CHtml::image($this->backendImagesPath . '/skins/default/knopka.gif', 'Показать/Скрыть лого',
                    array(
                        'title' =>  'Показать/Скрыть лого',
                        'id' => 'knopka',
                        'width' => '12',
                        'height' => '24',
                )),
                'url' => '#',
                'linkOptions' => array(
                    'onclick' => 'return ShapkaShowHide();',
                ),
            ),
          )));
        ?>
<?php
$this->widget('zii.widgets.CMenu', array(
//    'type'=>'pills', // '', 'tabs', 'pills' (or 'list')
//    'stacked'=>false, // whether this is a stacked menu
    'id' => 'menu1',
    'firstItemCssClass' => 'first',
    'lastItemCssClass' => 'last',
    'activeCssClass' => 'active',
    'items'=>array(
    /*
    <a href="/admin/" class="first bold">Главная</a>
    <a href="/admin/pages/" class="">Страницы</a>
    <a href="/admin/pages/menu/" class="">Меню</a>
    <a href="/admin/modules/" class="">Модули</a>
    <a href="/admin/configs/" class="last">Настройки</a>
    */
        array('label'=>'Меню', 'url' => array($this->createUrl('/'.$this->module->getId().'/menu/index')), 'visible'=>Yii::app()->user->isAdmin()),
        //array('label'=>'Меню', 'url' => '/nable/menu/index', 'visible'=>Yii::app()->user->isAdmin()),
        array('label'=>'Types of Entities', 'url' => array('/entity/admin'), 'visible'=>Yii::app()->user->isAdmin()),
        array('label'=>'Manage Routes', 'url'=>array('/route/admin'), 'visible'=>Yii::app()->user->isAdmin()),
        array('label'=>'Manage Site Pages', 'url'=>array('/ePage/admin'), 'visible'=>Yii::app()->user->isAdmin()),
        array('label'=>'Manage Users', 'url'=>array('/user/user/index'), 'visible'=>Yii::app()->user->isAdmin()),
        array('label'=>'sRBAC', 'url'=>array('/srbac/authitem/frontpage'), 'visible'=>Yii::app()->user->isAdmin()),
      ),
));
//        {insert name="ShowMenu" num=1}
?>
	</div>
</div>

<div id="main"<?php echo empty(Yii::app()->request->cookies['lmenu']->value) ? '' : 'style="left: 19px;"' ?>>
	<div id="cwrapper">
		<div id="dn"><?php
        /* {plugin name="reserveNavigation" varname="title" std="1"} */
            if(isset($this->breadcrumbs))
            {
                $this->widget('zii.widgets.CBreadcrumbs', array(
                    'links'=>$this->breadcrumbs,
                    'homeLink'=>CHtml::link('Nable','/nable/' ),
            ));
            } ?>
        </div>
		<?php /* {insert name="ShowErrors"}{* /Сообщения и ошибки *} */ ?>
		<div id="content"><?php echo $content; ?></div>
        <?php /* выводим блок подсказки только если есть сама подсказка */ ?>
		<div id="ohelp" style="display: <?php echo empty($helpText) ? 'none' : 'block'; ?>;">
			<div class="helph">
				<div>
                    <?php
                        //<img src="/admin/images/skins/default/str_{if $smarty.cookies.helpblock}down{else}up{/if}.gif
                        echo CHtml::image($this->backendImagesPath .
                        '/skins/default/str_'.(empty(Yii::app()->request->cookies['helpblock']->value) ? 'up' : 'down') .
                        '.gif','свернуть/развернуть подсказку', array(
                            'id' => 'str',
                            'width' => 7,
                            'height' => 7,
                            'onclick' => 'return HelpShowHide();',
                            'title' => 'свернуть/развернуть подсказку',
                        ));
                        echo CHtml::image($this->backendImagesPath . '/icons/podskazka.gif', 'Подсказка',
                        array(
                            'width' => 81,
                            'height' => 26,
                        ));
                    ?>
				</div>
			</div>
            <?php
            echo CHtml::tag('div', array('id'=> 'text_help', 'class' =>
            empty(Yii::app()->request->cookies['helpblock']->value) ? 'hidden' : 'visible'),
            empty($helpText) ? '' : $helpText
            );
            //<div id="text_help"{if $smarty.cookies.helpblock} style="display: none; visibility: hidden;"{/if}>
            //</div>
            ?>
		</div>
	</div>
</div>

<div title="показать/скрыть меню" id="i_menu" onclick="MenuShowHide();"></div>
<div id="mc2" onmouseout="return FlowMenu();" onmouseover="return FlowMenu(true);">
<?php
 /* данный див необходим для удобной работы с содержимым меню через DOM HTML */ 
$this->widget('zii.widgets.CMenu', array(
    'id' => 'menu2',
    'firstItemCssClass' => 'first',
    'lastItemCssClass' => 'last',
    'activeCssClass' => 'active',
    'items'=> $this->leftMenu,
));
/*
{foreach from=$menu item=v}
<div class="menu_punkt"><a href="{if $v.url}{$v.url}{$v.getstr}{else}{$smarty.const.__URL}{$v.getstr}{/if}"{* rel="ajax"*} style="margin: 0px;{if !$v.url} font-weight: bold;{/if}"{if $isAjax} onclick="{$isAjax}"{/if}>{$v.name}</a></div>
{/foreach}
*/
        /*
		{insert name="ShowMenu" num=2} // отображаем боковое меню
		{getPlugins block='menu2'}
        */
        /*
		{if $javascript_siteMap}
		{$javascript_siteMap}
        */
		/*<p class="center"><a href="#" onclick="d.openAll();">open all</a> | <a href="#" onclick="d.closeAll();">close all</a></p>
		</div>*/
        /*
		{/if}
        */
?>
</div>
<div id="lmenu" onmouseout="return FlowMenu();" onmouseover="return FlowMenu(true);">
	<div id="skins">
        <?php
        echo CHtml::link(
        'Toggle WYSIWYG Editor'
        , '#',
        array(
            'onclick' => 'return toggleTinyMCE();',
        ));
        ?>
		<br/><br/>
		Скин: <a href="#" onclick="return setActiveStyleSheet('default');">Default</a> <a href="#" onclick="return setActiveStyleSheet('blue');">Blue</a> <a href="#" onclick="return setActiveStyleSheet('green');">Green</a>
	</div>
	<div id="copy">
		Система администрирования<br />
		сайтов <span class="bold">Nable.Ru</span> (v. <?php echo $this->module->version; ?>)
	</div>
</div>
</div>
</body>
</html>
