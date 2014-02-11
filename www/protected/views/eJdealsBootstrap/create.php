<?php
$this->breadcrumbs=array(
	'Ejdeals'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List EJdeals','url'=>array('index')),
	array('label'=>'Manage EJdeals','url'=>array('admin')),
);
?>

<h1>Create EJdeals</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>