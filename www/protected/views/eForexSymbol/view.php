<?php
/* @var $this EForexSymbolController */
/* @var $model EForexSymbol */

$this->breadcrumbs=array(
	'Eforex Symbols'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List EForexSymbol', 'url'=>array('index')),
	array('label'=>'Create EForexSymbol', 'url'=>array('create')),
	array('label'=>'Update EForexSymbol', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete EForexSymbol', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage EForexSymbol', 'url'=>array('admin')),
);
?>

<h1>View EForexSymbol #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'symbol',
		'spread',
		'swap_long',
		'swap_short',
	),
)); ?>
