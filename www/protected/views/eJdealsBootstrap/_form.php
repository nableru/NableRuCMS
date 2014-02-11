<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'ejdeals-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'balance',array('class'=>'span5','maxlength'=>11)); ?>

	<?php echo $form->textFieldRow($model,'symbol',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'otime',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'ctime',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'oprice',array('class'=>'span5','maxlength'=>8)); ?>

	<?php echo $form->textFieldRow($model,'cprice',array('class'=>'span5','maxlength'=>8)); ?>

	<?php echo $form->textFieldRow($model,'swap',array('class'=>'span5','maxlength'=>8)); ?>

	<?php echo $form->textFieldRow($model,'lot',array('class'=>'span5','maxlength'=>5)); ?>

	<?php echo $form->textFieldRow($model,'osl',array('class'=>'span5','maxlength'=>8)); ?>

	<?php echo $form->textFieldRow($model,'csl',array('class'=>'span5','maxlength'=>8)); ?>

	<?php echo $form->textFieldRow($model,'otp',array('class'=>'span5','maxlength'=>8)); ?>

	<?php echo $form->textFieldRow($model,'ctp',array('class'=>'span5','maxlength'=>8)); ?>

	<?php echo $form->textFieldRow($model,'lpips',array('class'=>'span5','maxlength'=>5)); ?>

	<?php echo $form->textFieldRow($model,'ppips',array('class'=>'span5','maxlength'=>5)); ?>

	<?php echo $form->textFieldRow($model,'dealrisk',array('class'=>'span5','maxlength'=>5)); ?>

	<?php echo $form->textAreaRow($model,'oreason',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textAreaRow($model,'creason',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textAreaRow($model,'analysis',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textFieldRow($model,'addedby',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'updatedby',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'nable_user_id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'nable_role_id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'modifydate',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'adddate',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'isString',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'isText',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'isInt',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'isFloat',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'isBool',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'isCost',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'isImage',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'isFile',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'isDate',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'isTime',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'isSingle',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'isMulti',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
