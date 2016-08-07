<?php
/* @var $this CmsArticleRatingController */
/* @var $data CmsArticleRating */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('rating_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->rating_id), array('view', 'id'=>$data->rating_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('article_id')); ?>:</b>
	<?php echo CHtml::encode($data->article_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rating_number')); ?>:</b>
	<?php echo CHtml::encode($data->rating_number); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('total_points')); ?>:</b>
	<?php echo CHtml::encode($data->total_points); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created')); ?>:</b>
	<?php echo CHtml::encode($data->created); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('modified')); ?>:</b>
	<?php echo CHtml::encode($data->modified); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />


</div>