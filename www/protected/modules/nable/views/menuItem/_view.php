<?php
/* @var $this MenuItemController */
/* @var $data MenuItem */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('menu_num')); ?>:</b>
	<?php echo CHtml::encode($data->menu_num); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sorting')); ?>:</b>
	<?php echo CHtml::encode($data->sorting); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hidden')); ?>:</b>
	<?php echo CHtml::encode($data->hidden); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('url')); ?>:</b>
	<?php echo CHtml::encode($data->url); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('level')); ?>:</b>
	<?php echo CHtml::encode($data->level); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name_active')); ?>:</b>
	<?php echo CHtml::encode($data->name_active); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('name_passive')); ?>:</b>
	<?php echo CHtml::encode($data->name_passive); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nable_pages_id')); ?>:</b>
	<?php echo CHtml::encode($data->nable_pages_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nable_langs_id')); ?>:</b>
	<?php echo CHtml::encode($data->nable_langs_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('data')); ?>:</b>
	<?php echo CHtml::encode($data->data); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('external')); ?>:</b>
	<?php echo CHtml::encode($data->external); ?>
	<br />

	*/ ?>

</div>