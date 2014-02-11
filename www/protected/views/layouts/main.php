<!doctype html>
<html>
<head>
    <meta charset=utf-8>
<?php

// хак для обхода проблемы того, что стандартные модули не содержат тэг в
// переменной, а модуль редактирования автоматически заворачивает содержимое в
// тэг.
if(false === strpos($this->pageTitle, '<title'))
{
    $this->pageTitle = '<title>'.$this->pageTitle.'</title>';
}
if(!Yii::app()->user->isGuest)
{
    Yii::app()->getModule('nable');
    Yii::app()->clientScript->registerScriptFile(Yii::app()->assetManager->publish(Yii::getPathOfAlias('NableModule').'/assets/script.js'), CClientScript::POS_END);
}
?>

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />

    <?php echo $this->pageTitle; ?>
</head>

<body>
<div class="container" id="page">
<?php
$this->widget('zii.widgets.CMenu', array(
//    'type'=>'pills', // '', 'tabs', 'pills' (or 'list')
//    'stacked'=>false, // whether this is a stacked menu
    'id' => 'mainmenu',
    'items'=>array(
        //array('label'=>'Журнал сделок', 'url'=>array('/jDeals/index'), 'visible'=>!Yii::app()->user->isGuest),
        array('label'=>'Home', 'url'=>array('/indexPage')),
        array('label'=>'Types of Entities', 'url' => '/entity/admin', 'visible'=>Yii::app()->user->isAdmin()),
        array('label'=>'Manage Routes', 'url'=>array('/route/admin'), 'visible'=>Yii::app()->user->isAdmin()),
        array('label'=>'Manage Site Pages', 'url'=>array('/ePage/admin'), 'visible'=>Yii::app()->user->isAdmin()),
        array('label'=>'Manage Users', 'url'=>array('/user/user/index'), 'visible'=>Yii::app()->user->isAdmin()),
        array('label'=>'sRBAC', 'url'=>array('/srbac/authitem/frontpage'), 'visible'=>Yii::app()->user->isAdmin()),
        array('label'=>'Login', 'url'=>array('/user/auth'), 'visible'=>Yii::app()->user->isGuest),
		array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>Yii::app()->user->isAdmin()),
    
      ),
));
       
?>

	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by My Company.<br/>
		All Rights Reserved.<br/>
		<?php echo Yii::powered(); ?>
	</div><!-- footer -->

</div><!-- page -->
<?php $this->widget('NableModule.widgets.nableAdminWidget'); ?>
</body>
</html>
