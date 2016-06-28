<?php
/* @var $this BadgeConfigController */
/* @var $data BadgeConfig */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('title')); ?>:</b>
	<?php echo CHtml::encode($data->title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('total_like')); ?>:</b>
	<?php echo CHtml::encode($data->total_like); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('total_comment')); ?>:</b>
	<?php echo CHtml::encode($data->total_comment); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('total_following')); ?>:</b>
	<?php echo CHtml::encode($data->total_following); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('total_friend')); ?>:</b>
	<?php echo CHtml::encode($data->total_friend); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('image')); ?>:</b>
	<?php echo CHtml::encode($data->image); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('enable')); ?>:</b>
	<?php echo CHtml::encode($data->enable); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('type')); ?>:</b>
	<?php echo CHtml::encode($data->type); ?>
	<br />

	*/ ?>

</div>