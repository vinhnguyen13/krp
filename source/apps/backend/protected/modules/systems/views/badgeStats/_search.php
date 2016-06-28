<?php
/* @var $this BadgeStatsController */
/* @var $model BadgeStats */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'user_id'); ?>
		<?php echo $form->textField($model,'user_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'total_like'); ?>
		<?php echo $form->textField($model,'total_like'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'total_comment'); ?>
		<?php echo $form->textField($model,'total_comment'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'total_following'); ?>
		<?php echo $form->textField($model,'total_following'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'total_friend'); ?>
		<?php echo $form->textField($model,'total_friend'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->