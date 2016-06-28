<?php
/* @var $this WidgetController */
/* @var $model Widget */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'widget-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'class'); ?>
		<?php echo $form->textField($model,'class',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'class'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'path_alias'); ?>
		<?php echo $form->textField($model,'path_alias',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'path_alias'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'params'); ?>
		<?php echo $form->textField($model,'params',array('cols'=>48,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'params'); ?>
		<p class="hint" style="font-size: 11px;font-style: italic;">Example: limit: 5, type: news</p>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'enable'); ?>
		<?php echo $form->dropDownList($model, 'enable', array(0 => Yii::t(null,'No'),1 => Yii::t(null,'Yes'))); ?>
		<?php echo $form->error($model,'enable'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->