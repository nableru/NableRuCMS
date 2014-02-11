<?php
/* @var $this JDealsController */
/* @var $model EJdeals */

$this->breadcrumbs=array(
	'Ejdeals'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List EJdeals', 'url'=>array('index')),
	array('label'=>'Create EJdeals', 'url'=>array('create')),
	array('label'=>'Update EJdeals', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete EJdeals', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage EJdeals', 'url'=>array('admin')),
);
?>

<h1>View EJdeals #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'balance',
		'symbol',
		'otime',
		'ctime',
		'oprice',
		'cprice',
		'swap',
		'lot',
		'osl',
		'csl',
		'otp',
		'ctp',
		'lpips',
		'ppips',
		'dealrisk',
		'oreason',
		'creason',
		'analysis',
		'id',
		'addedby',
		'updatedby',
		'nable_user_id',
		'nable_role_id',
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
