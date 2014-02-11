<?php
/* @var $this MenuItemController */
/* @var $model MenuItem */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'menu-item-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'menu_num'); ?>
		<?php echo $form->textField($model,'menu_num'); ?>
		<?php echo $form->error($model,'menu_num'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sorting'); ?>
		<?php echo $form->textField($model,'sorting'); ?>
		<?php echo $form->error($model,'sorting'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'hidden'); ?>
		<?php echo $form->textField($model,'hidden',array('size'=>5,'maxlength'=>5)); ?>
		<?php echo $form->error($model,'hidden'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'url'); ?>
		<?php echo $form->textField($model,'url',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'url'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'level'); ?>
		<?php echo $form->textField($model,'level'); ?>
		<?php echo $form->error($model,'level'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'name_active'); ?>
		<?php echo $form->textField($model,'name_active',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'name_active'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'name_passive'); ?>
		<?php echo $form->textField($model,'name_passive',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'name_passive'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nable_pages_id'); ?>
		<?php echo $form->textField($model,'nable_pages_id',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'nable_pages_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nable_langs_id'); ?>
		<?php echo $form->textField($model,'nable_langs_id'); ?>
		<?php echo $form->error($model,'nable_langs_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'data'); ?>
		<?php echo $form->textArea($model,'data',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'data'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'external'); ?>
		<?php echo $form->textField($model,'external',array('size'=>5,'maxlength'=>5)); ?>
		<?php echo $form->error($model,'external'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->