<?php
/* @var $this BadgeStatsController */
/* @var $model BadgeStats */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'badge-stats-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'user_id'); ?>
		<?php echo $form->textField($model,'user_id'); ?>
		<?php echo $form->error($model,'user_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'total_like'); ?>
		<?php echo $form->textField($model,'total_like'); ?>
		<?php echo $form->error($model,'total_like'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'total_comment'); ?>
		<?php echo $form->textField($model,'total_comment'); ?>
		<?php echo $form->error($model,'total_comment'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'total_following'); ?>
		<?php echo $form->textField($model,'total_following'); ?>
		<?php echo $form->error($model,'total_following'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'total_friend'); ?>
		<?php echo $form->textField($model,'total_friend'); ?>
		<?php echo $form->error($model,'total_friend'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->