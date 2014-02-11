<?php
/* @var $this EForexSymbolController */
/* @var $model EForexSymbol */

$this->breadcrumbs=array(
	'Eforex Symbols'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List EForexSymbol', 'url'=>array('index')),
	array('label'=>'Create EForexSymbol', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('eforex-symbol-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Eforex Symbols</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'eforex-symbol-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		/*
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
		*/
		'symbol',
		'spread',
		'swap_long',
		'swap_short',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
