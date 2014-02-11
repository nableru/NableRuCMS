<?php
/* @var $this EForexSymbolController */
/* @var $model EForexSymbol */

$this->breadcrumbs=array(
	'Eforex Symbols'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List EForexSymbol', 'url'=>array('index')),
	array('label'=>'Create EForexSymbol', 'url'=>array('create')),
	array('label'=>'View EForexSymbol', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage EForexSymbol', 'url'=>array('admin')),
);
?>

<h1>Update EForexSymbol <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>