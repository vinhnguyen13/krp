<?php
/* @var $this CompaniesController */
/* @var $model ProCompanies */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'pro-companies-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
<div class="col-left">
	<div class="block form-list">
		<h2>Companies</h2>
		<ul>
		<li>
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'title'); ?>
		</li>
		<li>
		<?php echo $form->labelEx($model,'city_id'); ?>
		<?php echo $form->dropDownList($model, 'city_id', CHtml::listData( ProLocation::model()->findAll(), 'id', 'city_name' ), array('empty' => '-- Select City --')); ?>
		<?php echo $form->error($model,'city_id'); ?>
		</li>
		<li>
		<?php echo $form->labelEx($model,'address'); ?>
		<?php echo $form->textField($model,'address',array('size'=>60,'maxlength'=>500)); ?>
		<?php echo $form->error($model,'address'); ?>
		</li>
		<li>
		<?php echo $form->labelEx($model,'fax'); ?>
		<?php echo $form->textField($model,'fax',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'fax'); ?>
		</li>
		<li>
		<?php echo $form->labelEx($model,'contact_person'); ?>
		<?php echo $form->textField($model,'contact_person',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'contact_person'); ?>
		</li>
		<li>
		<?php echo $form->labelEx($model,'position'); ?>
		<?php echo $form->textField($model,'position',array('size'=>60,'maxlength'=>500)); ?>
		<?php echo $form->error($model,'position'); ?>
		</li>
		<li>
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'email'); ?>
		</li>
		<li>
		<?php echo $form->labelEx($model,'phone_1'); ?>
		<?php echo $form->textField($model,'phone_1',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'phone_1'); ?>
		</li>
		<li>
		<?php echo $form->labelEx($model,'phone_2'); ?>
		<?php echo $form->textField($model,'phone_2',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'phone_2'); ?>
		</li>
		<li>
		<?php echo $form->labelEx($model,'mobile'); ?>
		<?php echo $form->textField($model,'mobile',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'mobile'); ?>
		</li>
		</ul>
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
		$("#pro-companies-form").attr("action", $("#pro-companies-form").attr("action") + '?flg=true');
		
	});
});
</script>