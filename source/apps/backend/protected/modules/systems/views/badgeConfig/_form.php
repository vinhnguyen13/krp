<?php
/* @var $this BadgeConfigController */
/* @var $model BadgeConfig */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'badge-config-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'description'); ?>
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

	<div class="row">
		<?php echo $form->labelEx($model,'image'); ?>
		<?php echo $form->textField($model,'image',array('size'=>60,'maxlength'=>500)); ?>
		<?php echo $form->error($model,'image'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'enable'); ?>
		<?php echo $form->textField($model,'enable'); ?>
		<?php echo $form->error($model,'enable'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'type'); ?>
		<?php echo $form->textField($model,'type',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'type'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->