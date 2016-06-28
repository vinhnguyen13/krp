<?php
/* @var $this AdsBannerController */
/* @var $data AdsBanner */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('link')); ?>:</b>
	<?php echo CHtml::encode($data->link); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('upload')); ?>:</b>
	<?php echo CHtml::encode($data->upload); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('target')); ?>:</b>
	<?php echo CHtml::encode($data->target); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('weight')); ?>:</b>
	<?php echo CHtml::encode($data->weight); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('start')); ?>:</b>
	<?php echo CHtml::encode($data->start); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('end')); ?>:</b>
	<?php echo CHtml::encode($data->end); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('number_click')); ?>:</b>
	<?php echo CHtml::encode($data->number_click); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('count_click')); ?>:</b>
	<?php echo CHtml::encode($data->count_click); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('number_view')); ?>:</b>
	<?php echo CHtml::encode($data->number_view); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('count_view')); ?>:</b>
	<?php echo CHtml::encode($data->count_view); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('is_active')); ?>:</b>
	<?php echo CHtml::encode($data->is_active); ?>
	<br />

	*/ ?>

</div>