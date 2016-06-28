<?php
/* @var $this BrandsController */
/* @var $model ProBrands */
/* @var $form CActiveForm */
?>

<div class="form form-simple">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'pro-brands-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); 
$cri = new CDbCriteria();
$cri->alias = "c";
$cri->select = "c.id, CONCAT(l.`city_name`, ' - ' , c.`title`) AS title";
$cri->join = "JOIN pro_location  l ON l.id = c.`city_id`";
?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
<div class="col-left">

	<div class="block">
		<h2><?php echo $form->labelEx($model,'company_id'); ?></h2>
		<div class="input-wrap">
		<?php echo $form->dropDownList($model, 'company_id', CHtml::listData( ProCompanies::model()->findAll($cri), 'id', 'title' ), array('empty' => '-- Select Company --')); ?>
		<?php echo $form->error($model,'company_id'); ?>
		</div>
	</div>
	
	<div class="block">
		<h2><?php echo $form->labelEx($model,'title'); ?></h2>
		<div class="input-wrap">
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'title'); ?>
		</div>
	</div>

	<div class="block">
		<h2><?php echo $form->labelEx($model,'description'); ?></h2>
		<div class="input-wrap">
		<?php echo $form->textArea($model,'description',array('size'=>60,'maxlength'=>500)); ?>
		<?php echo $form->error($model,'description'); ?>
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
		$("#pro-brands-form").attr("action", $("#pro-brands-form").attr("action") + '?flg=true');
		
	});
});
</script>