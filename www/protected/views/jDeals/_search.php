<?php
/* @var $this JDealsController */
/* @var $model EJdeals */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'balance'); ?>
		<?php echo $form->textField($model,'balance',array('size'=>11,'maxlength'=>11)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'symbol'); ?>
		<?php echo $form->textField($model,'symbol',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'otime'); ?>
		<?php echo $form->textField($model,'otime'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ctime'); ?>
		<?php echo $form->textField($model,'ctime'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'oprice'); ?>
		<?php echo $form->textField($model,'oprice',array('size'=>8,'maxlength'=>8)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cprice'); ?>
		<?php echo $form->textField($model,'cprice',array('size'=>8,'maxlength'=>8)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'swap'); ?>
		<?php echo $form->textField($model,'swap',array('size'=>8,'maxlength'=>8)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'lot'); ?>
		<?php echo $form->textField($model,'lot',array('size'=>5,'maxlength'=>5)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'osl'); ?>
		<?php echo $form->textField($model,'osl',array('size'=>8,'maxlength'=>8)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'csl'); ?>
		<?php echo $form->textField($model,'csl',array('size'=>8,'maxlength'=>8)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'otp'); ?>
		<?php echo $form->textField($model,'otp',array('size'=>8,'maxlength'=>8)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ctp'); ?>
		<?php echo $form->textField($model,'ctp',array('size'=>8,'maxlength'=>8)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'lpips'); ?>
		<?php echo $form->textField($model,'lpips',array('size'=>5,'maxlength'=>5)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ppips'); ?>
		<?php echo $form->textField($model,'ppips',array('size'=>5,'maxlength'=>5)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'dealrisk'); ?>
		<?php echo $form->textField($model,'dealrisk',array('size'=>5,'maxlength'=>5)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'oreason'); ?>
		<?php echo $form->textArea($model,'oreason',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'creason'); ?>
		<?php echo $form->textArea($model,'creason',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'analysis'); ?>
		<?php echo $form->textArea($model,'analysis',array('rows'=>6, 'cols'=>50)); ?>
	</div>

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

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->