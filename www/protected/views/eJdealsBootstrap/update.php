<?php
$this->breadcrumbs=array(
	'Ejdeals'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List EJdeals','url'=>array('index')),
	array('label'=>'Create EJdeals','url'=>array('create')),
	array('label'=>'View EJdeals','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage EJdeals','url'=>array('admin')),
);
?>

<h1>Update EJdeals <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>