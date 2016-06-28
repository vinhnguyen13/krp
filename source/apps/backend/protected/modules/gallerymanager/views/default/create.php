<h1>Create album</h1>
<?php $this->pageTitle=Yii::app()->name; ?>
<div class="form album-create">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>
	<div class="block">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name'); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>
	
	<div class="block">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textField($model,'description'); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>
	<div class="block">
		<?php echo $form->labelEx($model,'versions_data'); ?>
		<?php if($model->isNewRecord) { ?>
			<?php echo CHtml::dropDownList('type', null, array('horizontal' => 'Horizontal', 'vertical' => 'Vertical')); ?>
		<?php } else { ?>
			<?php $type = (isset($model->versions['type'])) ? $model->versions['type'] : null;?>
			<?php echo CHtml::dropDownList('type', $type , array('horizontal' => 'Horizontal', 'vertical' => 'Vertical')); ?>
		<?php } ?>
	</div>
	
	<div class="block buttons">
		<?php echo CHtml::submitButton('Save', array('class'=>'btn btn-primary')); ?>
	</div>
<?php $this->endWidget(); ?>
</div>