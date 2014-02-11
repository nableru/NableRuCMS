<?php
/* @var $this EForexSymbolController */
/* @var $model EForexSymbol */
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
		<?php echo $form->label($model,'nable_user_id'); ?>
		<?php echo $form->textField($model,'nable_user_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nable_role_id'); ?>
		<?php echo $form->textField($model,'nable_role_id'); ?>
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
		<?php echo $form->textField($model,'isString'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'isText'); ?>
		<?php echo $form->textField($model,'isText'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'isInt'); ?>
		<?php echo $form->textField($model,'isInt'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'isFloat'); ?>
		<?php echo $form->textField($model,'isFloat'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'isBool'); ?>
		<?php echo $form->textField($model,'isBool'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'isCost'); ?>
		<?php echo $form->textField($model,'isCost'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'isImage'); ?>
		<?php echo $form->textField($model,'isImage'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'isFile'); ?>
		<?php echo $form->textField($model,'isFile'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'isDate'); ?>
		<?php echo $form->textField($model,'isDate'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'isTime'); ?>
		<?php echo $form->textField($model,'isTime'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'isSingle'); ?>
		<?php echo $form->textField($model,'isSingle'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'isMulti'); ?>
		<?php echo $form->textField($model,'isMulti'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'symbol'); ?>
		<?php echo $form->textField($model,'symbol',array('size'=>6,'maxlength'=>6)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'spread'); ?>
		<?php echo $form->textField($model,'spread',array('size'=>4,'maxlength'=>4)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'swap_long'); ?>
		<?php echo $form->textField($model,'swap_long',array('size'=>4,'maxlength'=>4)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'swap_short'); ?>
		<?php echo $form->textField($model,'swap_short',array('size'=>4,'maxlength'=>4)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->