<?php
/* @var $this ProductsController */
/* @var $model ProProducts */
/* @var $form CActiveForm */
?>

<div class="form form-simple">
<div class="col-left">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'pro-products-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

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
		<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'description'); ?>
		</div>
	</div>

	<div class="block">
		<h2><?php echo $form->labelEx($model,'gallery_id'); ?></h2>
		<div class="input-wrap">
		<?php 
		$gallery = new Gallery();
		if(!empty($model->gallery)){
			$gallery = $model->gallery;
		}
		$this->widget('zii.widgets.jui.CJuiAutoComplete',array(
				'model'=>$gallery,
				'attribute'=>'name',
				'name'=>'gallery',
				'source'=>$this->createUrl('/product/products/galleries'),
				'options'=>array(
						'minLength'=>'2',
						'select'=>"js:function(event, ui) {
                                          $('#gallery_id').val(ui.item.id);
                                        }"
				),
				'htmlOptions'=>array(
						'style'=>'height:20px;',
				),
		));
		?>
		<?php echo CHtml::activeHiddenField($model, 'gallery_id', array('id'=>'gallery_id')); ?>
		<?php echo $form->error($model,'gallery_id'); ?>
		</div>
	</div>
	
	<div class="block">
		<h2><?php echo $form->labelEx($model,'brand_id'); ?></h2>
		<div class="input-wrap">
		<?php 
		$brand = new ProBrands();
		if(!empty($model->brand)){
			$brand = $model->brand;
		}
		$this->widget('zii.widgets.jui.CJuiAutoComplete',array(
				'model'=>$brand,
				'attribute'=>'title',
				'name'=>'brand',
				'source'=>$this->createUrl('/product/products/brands'),
				'options'=>array(
						'minLength'=>'2',
						'select'=>"js:function(event, ui) {
                                          $('#brand_id').val(ui.item.id);
                                        }"
				),
				'htmlOptions'=>array(
						'style'=>'height:20px;',
				),
		));
		?>
		<?php echo CHtml::activeHiddenField($model, 'brand_id', array('id'=>'brand_id')); ?>
		<?php echo $form->error($model,'brand_id'); ?>
		</div>
	</div>

	<!-- <div class="block">
		<h2><?php echo $form->labelEx($model,'published'); ?></h2>
		<div class="input-wrap">
		<?php echo $form->radioButtonList($model, 'published', array(1 => 'Yes', 0 => 'No'), array('separator' => '')); ?>
		<?php echo $form->error($model,'published'); ?>
		</div>
	</div> -->
	
	<div class="block">
		<h2><?php echo $form->labelEx($model,'price'); ?></h2>
		<div class="input-wrap">
		<?php echo $form->textField($model,'price',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'price'); ?>
		</div>
	</div>

	<div class="block">
		<h2><?php echo $form->labelEx($model,'ordering'); ?></h2>
		<div class="input-wrap">
		<?php echo $form->textField($model,'ordering'); ?>
		<?php echo $form->error($model,'ordering'); ?>
		</div>
	</div>

	<div class="block buttons buttons-left">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'btn btn-primary')); ?>
	</div>
</div>
<?php $this->endWidget(); ?>

</div><!-- form -->