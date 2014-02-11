<?php
/* @var $this EPageController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Epages',
);

$this->menu=array(
	array('label'=>'Create EPage', 'url'=>array('create')),
	array('label'=>'Manage EPage', 'url'=>array('admin')),
);
?>

<h1>Epages</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
