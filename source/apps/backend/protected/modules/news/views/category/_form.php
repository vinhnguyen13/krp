<?php
/* @var $this CategoryController */
/* @var $model Category */
/* @var $form CActiveForm */
$cri = new CDbCriteria();
$cri->addCondition('is_default = 0');
$cri->order = 'is_default DESC';
$languages = Language::model()->findAll($cri);
$languageDefault = Language::model()->find("is_default = 1");
if(!empty($languages)){
	$modelTransDefault = CategoryTranslation::model()->findAllByAttributes(array('category_id'=>$model->id, 'language_code'=>$languageDefault->code));
?>
<div class="tabs language-art">
	<ul>
		<li class="active"><a href="#" data-toggle="tab" data-target="#language-id-<?php echo $languageDefault->code;?>"><?php echo $languageDefault->title;?></a></li>
		<?php	foreach ($languages as $language){?>
			<li><a href="#" data-toggle="tab" data-target="#language-id-<?php echo $language->code;?>"><?php echo $language->title;?></a></li>
		<?php }?>
	</ul>
</div>
<?php } ?>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'category-form',
	'enableAjaxValidation'=>false,
	'htmlOptions' => array('enctype'=>'multipart/form-data')
)); ?>
<div class="form">
	<div class="tabs-content active" id="language-id-<?php echo $languageDefault->code;?>">
		<div class="col-left">
		
			<p class="note">Fields with <span class="required">*</span> are required.</p>
		
			<?php echo $form->errorSummary($model); ?>
		
			<div class="block">
				<h2><?php echo $form->labelEx($model,'section_id'); ?></h2>
				<div class="input-wrap">
				<?php echo CHtml::dropDownList('Category[section_id]',$model->section_id, CHtml::listData(Section::getAll(), 'id', 'title' ), array('empty' => 'None'));	?>
				<?php echo $form->error($model,'section_id'); ?>
				</div>
			</div>
			
			<div class="block">
				<h2><?php echo $form->labelEx($model,'parent_id'); ?></h2>
				<div class="input-wrap">
				<?php echo CHtml::dropDownList('Category[parent_id]',$model->parent_id, CHtml::listData( $model->getAll(), 'id', 'title' ), array('empty' => 'None'));	?>
				<?php echo $form->error($model,'parent_id'); ?>
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
				<?php echo $form->textArea($model,'description',array('rows'=>2,'cols'=>56)); ?>
				<?php echo $form->error($model,'description'); ?>
				</div>
			</div>
			
			<div class="block">
				<h2><?php echo $form->labelEx($model,'status'); ?></h2>
				<div class="input-wrap">
				<?php echo CHtml::dropDownList('Category[status]',$model->status, array('1' => 'Enable', '2' => 'Disable'));	?>
				<?php echo $form->error($model,'status'); ?>
				</div>
			</div>
			
			<div class="block">
				<h2><?php echo $form->labelEx($model,'displayorder'); ?></h2>
				<div class="input-wrap">
				<?php echo $form->textField($model,'displayorder'); ?>
				<?php echo $form->error($model,'displayorder'); ?>
				</div>
			</div>
		
			<div class="block buttons">
				<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class'=>'btn btn-primary')); ?>
			</div>
		</div>
	</div>
	
	<!-- Tab Vietnam -->
	<?php if(!empty($languages)){?>
		<?php 
			foreach ($languages as $language){
				$modelTrans = CategoryTranslation::model()->findByAttributes(array('category_id'=>$model->id, 'language_code'=>$language->code));
				if(empty($modelTrans)){
					$modelTrans = new SectionTranslation();
				}
		?>
			<div class="tabs-content" id="language-id-<?php echo $language->code;?>">
				<div class="col-left">
					
					<p class="note">Fields with <span class="required">*</span> are required.</p>
			
					<?php echo $form->errorSummary($modelTrans); ?>
				
					<div class="block">
						<h2><?php echo $form->labelEx($modelTrans,'title'); ?></h2>
						<div class="input-wrap">
						<?php echo $form->textField($modelTrans,'title',array('size'=>60,'maxlength'=>500, 'name' => 'CategoryTranslation['.$language->code.'][title]')); ?>
						<?php echo $form->error($model,'title'); ?>
						</div>
					</div>
				
					<div class="block buttons">
						<?php echo CHtml::submitButton($modelTrans->isNewRecord ? 'Create' : 'Save', array('class'=>'btn btn-primary')); ?>
					</div>
				</div>
			</div>
		<?php }?>
	<?php }?>
</div><!-- form -->
<?php $this->endWidget(); ?>
