<?php
/* @var $this EPageController */
/* @var $model EPage */

$this->breadcrumbs=array(
	'Epages'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List EPage', 'url'=>array('index')),
	array('label'=>'Manage EPage', 'url'=>array('admin')),
);
?>

<h1>Create EPage</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>