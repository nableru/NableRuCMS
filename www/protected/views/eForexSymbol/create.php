<?php
/* @var $this EForexSymbolController */
/* @var $model EForexSymbol */

$this->breadcrumbs=array(
	'Eforex Symbols'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List EForexSymbol', 'url'=>array('index')),
	array('label'=>'Manage EForexSymbol', 'url'=>array('admin')),
);
?>

<h1>Create EForexSymbol</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>