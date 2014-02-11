<?php
/* @var $this EForexSymbolController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Eforex Symbols',
);

$this->menu=array(
	array('label'=>'Create EForexSymbol', 'url'=>array('create')),
	array('label'=>'Manage EForexSymbol', 'url'=>array('admin')),
);
?>

<h1>Eforex Symbols</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
