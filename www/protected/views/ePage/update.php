<?php
/* @var $this EPageController */
/* @var $model EPage */

$this->breadcrumbs=array(
	'Epages'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List EPage', 'url'=>array('index')),
	array('label'=>'Create EPage', 'url'=>array('create')),
	array('label'=>'View EPage', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage EPage', 'url'=>array('admin')),
);
?>

<h1>Update EPage <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>