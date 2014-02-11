<?php
/* @var $this EForexSymbolController */
/* @var $data EForexSymbol */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('symbol')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->symbol), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('spread')); ?>:</b>
	<?php echo CHtml::encode($data->spread); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('swap_long')); ?>:</b>
	<?php echo CHtml::encode($data->swap_long); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('swap_short')); ?>:</b>
	<?php echo CHtml::encode($data->swap_short); ?>
	<br />


	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('addedby')); ?>:</b>
	<?php echo CHtml::encode($data->addedby); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('updatedby')); ?>:</b>
	<?php echo CHtml::encode($data->updatedby); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nable_user_id')); ?>:</b>
	<?php echo CHtml::encode($data->nable_user_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nable_role_id')); ?>:</b>
	<?php echo CHtml::encode($data->nable_role_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('modifydate')); ?>:</b>
	<?php echo CHtml::encode($data->modifydate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('adddate')); ?>:</b>
	<?php echo CHtml::encode($data->adddate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('isString')); ?>:</b>
	<?php echo CHtml::encode($data->isString); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('isText')); ?>:</b>
	<?php echo CHtml::encode($data->isText); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('isInt')); ?>:</b>
	<?php echo CHtml::encode($data->isInt); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('isFloat')); ?>:</b>
	<?php echo CHtml::encode($data->isFloat); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('isBool')); ?>:</b>
	<?php echo CHtml::encode($data->isBool); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('isCost')); ?>:</b>
	<?php echo CHtml::encode($data->isCost); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('isImage')); ?>:</b>
	<?php echo CHtml::encode($data->isImage); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('isFile')); ?>:</b>
	<?php echo CHtml::encode($data->isFile); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('isDate')); ?>:</b>
	<?php echo CHtml::encode($data->isDate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('isTime')); ?>:</b>
	<?php echo CHtml::encode($data->isTime); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('isSingle')); ?>:</b>
	<?php echo CHtml::encode($data->isSingle); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('isMulti')); ?>:</b>
	<?php echo CHtml::encode($data->isMulti); ?>
	<br />

	*/ ?>

</div>
