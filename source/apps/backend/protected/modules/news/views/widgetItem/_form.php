<?php
/* @var $this WidgetItemController */
/* @var $model WidgetItem */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'widget-item-form',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('enctype' => 'multipart/form-data'),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'widget_id'); ?>
		<?php echo $form->dropDownList($model, 'widget_id', CHtml::listData(Widget::model()->findAll(), 'id', 'class'), array('prompt'=> '- Select a Widget -')); ?>
		<?php echo $form->error($model,'widget_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('cols'=>80,'rows'=>10)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'url'); ?>
		<?php echo $form->textField($model,'url',array('size'=>60,'maxlength'=>500)); ?>
		<?php echo $form->error($model,'url'); ?>
	</div>
	
	<!-- 
	<div class="row">
		<?php echo $form->labelEx($model,'tags'); ?>
		<?php
		$this->widget('CAutoComplete', array(
		    'name' => 'tags',
		    'value' => $model->mtags->toString(),
		    'url'=> $this->createAbsoluteUrl('/news/article/tags'), //path to autocomplete URL
		    'multiple'=>true,
		    'mustMatch'=>false,
		    'matchCase'=>false,
			'inputClass' => 'textbox',
			'selectFirst' => false,
			'htmlOptions' => array(
				'style' => "width:39%"
			)
		)) ?>
		<?php echo $form->error($model,'tags'); ?>
	</div>
 	-->
	<div class="row">
		<?php echo $form->labelEx($model,'image'); ?>
		<?php echo $form->fileField($model, 'image'); ?>
		<?php echo $form->error($model,'image'); ?>
		<br /><?php echo $model->getImage(); ?><br /><br />
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'display_order'); ?>
		<?php echo $form->dropDownList($model, 'display_order', array(1=>1,2=>2,3=>3,4=>4,5=>5), array('prompt'=> '---   Choose   ---')); ?>
		<?php echo $form->error($model,'display_order'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'enabled'); ?>
		<?php echo $form->dropDownList($model, 'enabled', array(WidgetItem::STATUS_ENABLE => 'Yes', WidgetItem::STATUS_DISABLE => 'No'), array('prompt'=> '---   Choose   ---')); ?>
		<?php echo $form->error($model,'enabled'); ?>
	</div>
	
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->