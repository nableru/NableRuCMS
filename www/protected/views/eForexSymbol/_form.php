<?php
/* @var $this EForexSymbolController */
/* @var $model EForexSymbol */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'eforex-symbol-form',
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
		<?php echo $form->labelEx($model,'nable_user_id'); ?>
		<?php echo $form->textField($model,'nable_user_id'); ?>
		<?php echo $form->error($model,'nable_user_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nable_role_id'); ?>
		<?php echo $form->textField($model,'nable_role_id'); ?>
		<?php echo $form->error($model,'nable_role_id'); ?>
	</div>
<?php
/*
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
*/?>
	<div class="row">
		<?php echo $form->labelEx($model,'isString'); ?>
		<?php echo $form->textField($model,'isString'); ?>
		<?php echo $form->error($model,'isString'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'isText'); ?>
		<?php echo $form->textField($model,'isText'); ?>
		<?php echo $form->error($model,'isText'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'isInt'); ?>
		<?php echo $form->textField($model,'isInt'); ?>
		<?php echo $form->error($model,'isInt'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'isFloat'); ?>
		<?php echo $form->textField($model,'isFloat'); ?>
		<?php echo $form->error($model,'isFloat'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'isBool'); ?>
		<?php echo $form->textField($model,'isBool'); ?>
		<?php echo $form->error($model,'isBool'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'isCost'); ?>
		<?php echo $form->textField($model,'isCost'); ?>
		<?php echo $form->error($model,'isCost'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'isImage'); ?>
		<?php echo $form->textField($model,'isImage'); ?>
		<?php echo $form->error($model,'isImage'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'isFile'); ?>
		<?php echo $form->textField($model,'isFile'); ?>
		<?php echo $form->error($model,'isFile'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'isDate'); ?>
		<?php echo $form->textField($model,'isDate'); ?>
		<?php echo $form->error($model,'isDate'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'isTime'); ?>
		<?php echo $form->textField($model,'isTime'); ?>
		<?php echo $form->error($model,'isTime'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'isSingle'); ?>
		<?php echo $form->textField($model,'isSingle'); ?>
		<?php echo $form->error($model,'isSingle'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'isMulti'); ?>
		<?php echo $form->textField($model,'isMulti'); ?>
		<?php echo $form->error($model,'isMulti'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'symbol'); ?>
		<?php echo $form->textField($model,'symbol',array('size'=>6,'maxlength'=>6)); ?>
		<?php echo $form->error($model,'symbol'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'spread'); ?>
		<?php echo $form->textField($model,'spread',array('size'=>4,'maxlength'=>4)); ?>
		<?php echo $form->error($model,'spread'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'swap_long'); ?>
		<?php echo $form->textField($model,'swap_long',array('size'=>4,'maxlength'=>4)); ?>
		<?php echo $form->error($model,'swap_long'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'swap_short'); ?>
		<?php echo $form->textField($model,'swap_short',array('size'=>4,'maxlength'=>4)); ?>
		<?php echo $form->error($model,'swap_short'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
