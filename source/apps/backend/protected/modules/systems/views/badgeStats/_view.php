<?php
/* @var $this BadgeStatsController */
/* @var $data BadgeStats */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_id')); ?>:</b>
	<?php echo CHtml::encode($data->user_id); ?>
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


</div>