<?php
/* @var $this EPageController */
/* @var $model EPage */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'epage-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'addedby'); ?>
		<?php echo $form->textField($model,'addedby'); ?>
		<?php echo $form->error($model,'addedby'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'updatedby'); ?>
		<?php echo $form->textField($model,'updatedby'); ?>
		<?php echo $form->error($model,'updatedby'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'user_id'); ?>
		<?php echo $form->textField($model,'user_id',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'user_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'role_id'); ?>
		<?php echo $form->textField($model,'role_id',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'role_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'page_pid'); ?>
		<?php echo $form->textField($model,'page_pid',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'page_pid'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'hidden'); ?>
		<?php echo $form->textField($model,'hidden'); ?>
		<?php echo $form->error($model,'hidden'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'modifydate'); ?>
		<?php echo $form->textField($model,'modifydate'); ?>
		<?php echo $form->error($model,'modifydate'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'adddate'); ?>
		<?php echo $form->textField($model,'adddate'); ?>
		<?php echo $form->error($model,'adddate'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'isString'); ?>
		<?php echo $form->textField($model,'isString',array('size'=>5,'maxlength'=>5)); ?>
		<?php echo $form->error($model,'isString'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'isText'); ?>
		<?php echo $form->textField($model,'isText',array('size'=>5,'maxlength'=>5)); ?>
		<?php echo $form->error($model,'isText'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'isInt'); ?>
		<?php echo $form->textField($model,'isInt',array('size'=>5,'maxlength'=>5)); ?>
		<?php echo $form->error($model,'isInt'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'isFloat'); ?>
		<?php echo $form->textField($model,'isFloat',array('size'=>5,'maxlength'=>5)); ?>
		<?php echo $form->error($model,'isFloat'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'isBool'); ?>
		<?php echo $form->textField($model,'isBool',array('size'=>5,'maxlength'=>5)); ?>
		<?php echo $form->error($model,'isBool'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'isCost'); ?>
		<?php echo $form->textField($model,'isCost',array('size'=>5,'maxlength'=>5)); ?>
		<?php echo $form->error($model,'isCost'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'isImage'); ?>
		<?php echo $form->textField($model,'isImage',array('size'=>5,'maxlength'=>5)); ?>
		<?php echo $form->error($model,'isImage'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'isFile'); ?>
		<?php echo $form->textField($model,'isFile',array('size'=>5,'maxlength'=>5)); ?>
		<?php echo $form->error($model,'isFile'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'isDate'); ?>
		<?php echo $form->textField($model,'isDate',array('size'=>5,'maxlength'=>5)); ?>
		<?php echo $form->error($model,'isDate'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'isTime'); ?>
		<?php echo $form->textField($model,'isTime',array('size'=>5,'maxlength'=>5)); ?>
		<?php echo $form->error($model,'isTime'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'isSingle'); ?>
		<?php echo $form->textField($model,'isSingle',array('size'=>5,'maxlength'=>5)); ?>
		<?php echo $form->error($model,'isSingle'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'isMulti'); ?>
		<?php echo $form->textField($model,'isMulti',array('size'=>5,'maxlength'=>5)); ?>
		<?php echo $form->error($model,'isMulti'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->