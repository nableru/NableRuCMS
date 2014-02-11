<?php
/* @var $this EPageController */
/* @var $model EPage */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'addedby'); ?>
		<?php echo $form->textField($model,'addedby'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'updatedby'); ?>
		<?php echo $form->textField($model,'updatedby'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'user_id'); ?>
		<?php echo $form->textField($model,'user_id',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'role_id'); ?>
		<?php echo $form->textField($model,'role_id',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'page_pid'); ?>
		<?php echo $form->textField($model,'page_pid',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'hidden'); ?>
		<?php echo $form->textField($model,'hidden'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'modifydate'); ?>
		<?php echo $form->textField($model,'modifydate'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'adddate'); ?>
		<?php echo $form->textField($model,'adddate'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'isString'); ?>
		<?php echo $form->textField($model,'isString',array('size'=>5,'maxlength'=>5)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'isText'); ?>
		<?php echo $form->textField($model,'isText',array('size'=>5,'maxlength'=>5)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'isInt'); ?>
		<?php echo $form->textField($model,'isInt',array('size'=>5,'maxlength'=>5)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'isFloat'); ?>
		<?php echo $form->textField($model,'isFloat',array('size'=>5,'maxlength'=>5)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'isBool'); ?>
		<?php echo $form->textField($model,'isBool',array('size'=>5,'maxlength'=>5)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'isCost'); ?>
		<?php echo $form->textField($model,'isCost',array('size'=>5,'maxlength'=>5)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'isImage'); ?>
		<?php echo $form->textField($model,'isImage',array('size'=>5,'maxlength'=>5)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'isFile'); ?>
		<?php echo $form->textField($model,'isFile',array('size'=>5,'maxlength'=>5)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'isDate'); ?>
		<?php echo $form->textField($model,'isDate',array('size'=>5,'maxlength'=>5)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'isTime'); ?>
		<?php echo $form->textField($model,'isTime',array('size'=>5,'maxlength'=>5)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'isSingle'); ?>
		<?php echo $form->textField($model,'isSingle',array('size'=>5,'maxlength'=>5)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'isMulti'); ?>
		<?php echo $form->textField($model,'isMulti',array('size'=>5,'maxlength'=>5)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->