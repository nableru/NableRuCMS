<?php
/* @var $this MenuController */
/* @var $model Menu */

$this->breadcrumbs=array(
	'Menus'=>array('index'),
	'Create',
);

$this->leftMenu=array(
	array('label'=>'Управление меню (различными)', 'url'=>array('index')),
	array('label'=>'Manage Menu', 'url'=>array('admin')),
);
?>

<h1>Create Menu</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
