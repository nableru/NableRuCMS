<?php
/* @var $this EPageController */
/* @var $model EPage */

$this->breadcrumbs=array(
	'Epages'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List EPage', 'url'=>array('index')),
	array('label'=>'Create EPage', 'url'=>array('create')),
	array('label'=>'Update EPage', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete EPage', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage EPage', 'url'=>array('admin')),
);
?>

<h1>View EPage #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'addedby',
		'updatedby',
		'user_id',
		'role_id',
		'page_pid',
		'hidden',
		'modifydate',
		'adddate',
		'isString',
		'isText',
		'isInt',
		'isFloat',
		'isBool',
		'isCost',
		'isImage',
		'isFile',
		'isDate',
		'isTime',
		'isSingle',
		'isMulti',
	),
)); ?>
