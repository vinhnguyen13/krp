<?php
/* @var $this AdsZoneController */
/* @var $model AdsZone */
/* @var $form CActiveForm */
?>

<div class="form form-simple">
<div class="col-left">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'ads-zone-form',
    'enableAjaxValidation'=>false,
    'clientOptions'=> array(
        'validateOnSubmit'=>true,
    ),
    'enableClientValidation'=>true,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="block">
        <h2><?php echo $form->labelEx($model,'name'); ?></h2>
        <div class="input-wrap">
            <?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255)); ?>
            <?php echo $form->error($model,'name'); ?>
        </div>
	</div>

	<div class="block">
        <h2><?php echo $form->labelEx($model,'description'); ?></h2>
        <div class="input-wrap">
            <?php echo $form->textField($model,'description',array('size'=>60,'maxlength'=>255)); ?>
            <?php echo $form->error($model,'description'); ?>
        </div>
	</div>

	<div class="block">
        <h2><?php echo $form->labelEx($model,'position'); ?></h2>
        <div class="input-wrap">
            <?php echo CHtml::activeDropDownList($model, 'position', CHtml::listData(AdsPosition::model()->findAll(), 'code', 'name' ), array('empty' => 'None'));	?>
            <?php echo $form->error($model,'position'); ?>
        </div>
	</div>

    <div class="block">
        <h2><?php echo $form->labelEx($model,'width'); ?></h2>
        <div class="input-wrap">
            <?php echo $form->textField($model,'width',array('size'=>10,'maxlength'=>10, 'placeholder' => '0px')); ?>
            <?php echo $form->error($model,'width'); ?>
        </div>
    </div>

    <div class="block">
        <h2><?php echo $form->labelEx($model,'height'); ?></h2>
        <div class="input-wrap">
            <?php echo $form->textField($model,'height',array('size'=>10,'maxlength'=>10, 'placeholder' => '0px')); ?>
            <?php echo $form->error($model,'height'); ?>
        </div>
    </div>

    <div class="block">
        <h2><?php echo $form->labelEx($model,'is_active'); ?></h2>
        <div class="input-wrap">
            <?php echo CHtml::activeDropDownList($model, 'is_active', array('1' => 'Enable', '0' => 'Disable'));	?>
            <?php echo $form->error($model,'is_active'); ?>
        </div>
    </div>

    <div class="block buttons buttons-left">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class'=>'btn btn-primary')); ?>
    </div>

<?php $this->endWidget(); ?>
</div>
</div><!-- form -->