<?php
$this->breadcrumbs=array(
	'Ejdeals',
);

$this->menu=array(
	array('label'=>'Create EJdeals','url'=>array('create')),
	array('label'=>'Manage EJdeals','url'=>array('admin')),
);
?>

<h1>Ejdeals</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
