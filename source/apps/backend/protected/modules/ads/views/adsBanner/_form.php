<?php
/* @var $this AdsBannerController */
/* @var $model AdsBanner */
/* @var $form CActiveForm */
?>

<div class="form form-simple">
    <div class="col-left">

    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'ads-banner-form',
        'enableAjaxValidation'=>false,
        'htmlOptions' => array('enctype'=>'multipart/form-data')
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
            <h2><?php echo $form->labelEx($model,'link'); ?></h2>
            <div class="input-wrap">
                <?php echo $form->textField($model,'link',array('size'=>60,'maxlength'=>1024)); ?>
                <?php echo $form->error($model,'link'); ?>
            </div>
        </div>

        <div class="block">
            <h2><?php echo $form->labelEx($model,'type'); ?></h2>
            <div class="input-wrap">
                <?php echo CHtml::activeDropDownList($model, 'type', array('img' => 'IMAGE', 'flash' => 'FLASH'));	?>
                <?php echo $form->error($model,'type'); ?>
            </div>
        </div>

        <div class="block">
            <h2><?php echo $form->labelEx($model,'upload'); ?></h2>
            <div class="input-wrap">
                <?php echo CHtml::activeFileField($model, 'upload'); // see comments below ?>
                <?php echo !$model->isNewRecord ? CHtml::hiddenField('AdsBanner[upload]', $model->upload) : ""; // see comments below ?>
                <?php echo $form->error($model,'upload'); ?>
            </div>
        </div>

        <div class="block">
            <h2><?php echo $form->labelEx($model,'zone_id'); ?></h2>
            <div class="input-wrap">
                <?php echo CHtml::activeDropDownList($model, 'zone_id', CHtml::listData(AdsZone::model()->getAll(), 'id', 'name'));	?>
                <?php echo $form->error($model,'zone_id'); ?>
            </div>
        </div>

        <div class="block">
            <h2><?php echo $form->labelEx($model,'target'); ?></h2>
            <div class="input-wrap">
                <?php echo CHtml::activeDropDownList($model, 'target', array('_blank' => '_blank', '_parent' => '_parent', '_self' => '_self', '_top' => '_top'));	?>
                <?php echo $form->error($model,'target'); ?>
            </div>
        </div>

        <div class="block">
            <h2><?php echo $form->labelEx($model,'weight'); ?></h2>
            <div class="input-wrap">
                <?php echo $form->textField($model,'weight'); ?>
                <?php echo $form->error($model,'weight'); ?>
            </div>
        </div>

        <div class="block">
            <h2><?php echo $form->labelEx($model,'start'); ?></h2>
            <div class="input-wrap">
                <?php echo $form->textField($model,'start', array("id"=>"AdsBanner_start")); ?>
                <?php $this->widget('backend.extensions.calendar.SCalendar',
                    array(
                        'inputField'=>'AdsBanner_start',
                        'ifFormat'=>'%d-%m-%Y',
                    ));
                ?>
                <?php echo $form->error($model,'start'); ?>
            </div>
        </div>

        <div class="block">
            <h2><?php echo $form->labelEx($model,'end'); ?></h2>
            <div class="input-wrap">
                <?php echo $form->textField($model,'end', array('id' => 'AdsBanner_end')); ?>
                <?php $this->widget('backend.extensions.calendar.SCalendar',
                    array(
                        'inputField'=>'AdsBanner_end',
                        'ifFormat'=>'%d-%m-%Y',
                    ));
                ?>
                <?php echo $form->error($model,'end'); ?>
            </div>
        </div>

        <div class="block">
            <h2><?php echo $form->labelEx($model,'number_click'); ?></h2>
            <div class="input-wrap">
                <?php echo $form->textField($model,'number_click'); ?>
                <?php echo $form->error($model,'number_click'); ?>
            </div>
        </div>

        <div class="block">
            <h2><?php echo $form->labelEx($model,'number_view'); ?></h2>
            <div class="input-wrap">
                <?php echo $form->textField($model,'number_view'); ?>
                <?php echo $form->error($model,'number_view'); ?>
            </div>
        </div>

        <div class="block buttons buttons-left">
            <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class'=>'btn btn-primary')); ?>
        </div>

    <?php $this->endWidget(); ?>
    </div>
</div><!-- form -->