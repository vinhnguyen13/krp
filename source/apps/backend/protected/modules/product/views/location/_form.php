<?php
/* @var $this LocationController */
/* @var $model ProLocation */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'pro-location-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
<div class="col-left">
	<div class="block">
		<h2><?php echo $form->labelEx($model,'city_name'); ?></h2>
		<div class="input-wrap">
		<?php echo $form->textField($model,'city_name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'city_name'); ?>
		</div>
	</div>

	<div class="block">
		<h2><?php echo $form->labelEx($model,'order'); ?></h2>
		<div class="input-wrap">
		<?php echo $form->textField($model,'order'); ?>
		<?php echo $form->error($model,'order'); ?>
		</div>
	</div>

	<div class="block buttons buttons-left">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'btn btn-primary')); ?>
		<?php echo CHtml::submitButton('Save & Continue', array('class'=>'btn btn-primary saveContinue')); ?>
	</div>
</div>
<?php $this->endWidget(); ?>

</div><!-- form -->

<script type="text/javascript">
$(function() {
	$('.saveContinue').live('click', function(){
		$("#pro-location-form").attr("action", $("#pro-location-form").attr("action") + '?flg=true');
		
	});
});
</script>