<?php
/* @var $this ArticleController */
/* @var $model Article */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'type'); ?>
		<?php echo $form->textField($model,'type'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>500)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'body'); ?>
		<?php echo $form->textArea($model,'body',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'thumbnail'); ?>
		<?php echo $form->textField($model,'thumbnail',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'created'); ?>
		<?php echo $form->textField($model,'created'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'creator'); ?>
		<?php echo $form->textField($model,'creator'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'last_modify'); ?>
		<?php echo $form->textField($model,'last_modify'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ispublic'); ?>
		<?php echo $form->textField($model,'ispublic'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'public_time'); ?>
		<?php echo $form->textField($model,'public_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'meta_description'); ?>
		<?php echo $form->textField($model,'meta_description',array('size'=>60,'maxlength'=>500)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'meta_keywords'); ?>
		<?php echo $form->textField($model,'meta_keywords',array('size'=>60,'maxlength'=>500)); ?>
	</div>

<div class="restaurant-section">
        <div class="row">
            <?php echo $form->labelEx($model,'res_city'); ?>
            <?php echo $form->textField($model,'res_city',array('size'=>60,'maxlength'=>500)); ?>
        </div>

        <div class="row">
            <?php echo $form->labelEx($model,'res_district'); ?>
            <?php echo $form->textField($model,'res_district',array('size'=>60,'maxlength'=>500)); ?>
        </div>

        <div class="row">
            <?php echo $form->labelEx($model,'res_address'); ?>
            <?php echo $form->textField($model,'res_address',array('size'=>60,'maxlength'=>500)); ?>
        </div>

        <div class="row">
            <?php echo $form->labelEx($model,'res_hotline'); ?>
            <?php echo $form->textField($model,'res_hotline',array('size'=>60,'maxlength'=>500)); ?>
        </div>

        <div class="row">
            <?php echo $form->labelEx($model,'res_year'); ?>
            <?php echo $form->textField($model,'res_year',array('size'=>60,'maxlength'=>500)); ?>
        </div>

        <div class="row">
            <?php echo $form->labelEx($model,'res_website'); ?>
            <?php echo $form->textField($model,'res_website',array('size'=>60,'maxlength'=>500)); ?>
        </div>
        <div class="row">
            <?php echo $form->labelEx($model,'res_setting'); ?>
            <ul style="float:left;">
                <?php
                if($model->res_setting!=""){
                    $model->res_setting=explode(",",$model->res_setting);
                }
                echo ZHtml::enumCheckBoxList($model,'res_setting',array('class'=>'CBLocation', 'template' => '<li>{label} {input}</li>', 'separator'=>false, 'container'=>false));
                ?>
            </ul>
        </div>
        <div class="row">
        <?php echo $form->labelEx($model,'res_cuisine'); ?>
            <ul style="float:left;">
                <?php
                if($model->res_cuisine!="") {
                    $model->res_cuisine = explode(",", $model->res_cuisine);
                }
                echo ZHtml::enumDropDownList($model, 'res_cuisine', array('class' => 'CBLocation', 'template' => '<li>{label} {input}</li>', 'separator' => false, 'container' => false, 'multiple' => 'multiple'));
                ?>
            </ul>
        </div>
        <div class="row">
            <?php echo $form->labelEx($model,'res_rating'); ?>
            <ul style="float:left;">
                <?php echo ZHtml::enumRadioList($model,'res_rating',array('class'=>'CBLocation', 'template' => '<li>{label} {input}</li>', 'separator'=>false, 'container'=>false)); ?>
            </ul>
        </div>
        <div class="row">
            <?php echo $form->labelEx($model,'res_open_hour'); ?>
                <div class="input-wrap input-time">
                    <?php $this->widget('application.extensions.timepicker.timepicker', array('select'=>'time','model'=> $model, 'name'=>'res_open_hour','skin'=>'time', 'options' => array('timeFormat'=>'hh:mm')));?>
                </div>
        </div>
        <div class="row">
            <?php echo $form->labelEx($model,'res_closed_hour'); ?>
            <div class="input-wrap input-time">
                <?php $this->widget('application.extensions.timepicker.timepicker', array('select'=>'time','model'=> $model, 'name'=>'res_closed_hour','skin'=>'time', 'options' => array('timeFormat'=>'hh:mm')));?>
            </div>
        </div>
        <div class="row">
            <?php echo $form->labelEx($model,'res_dress_code'); ?>
            <ul style="float:left;">
                <?php echo ZHtml::enumRadioList($model,'res_dress_code',array('class'=>'CBLocation', 'template' => '<li>{label} {input}</li>', 'separator'=>false, 'container'=>false)); ?>
            </ul>
        </div>
        <div class="row">
            <?php echo $form->labelEx($model,'res_private_room'); ?>
            <ul style="float:left;">
                <?php echo ZHtml::enumRadioList($model,'res_private_room',array('class'=>'CBLocation', 'template' => '<li>{label} {input}</li>','separator'=>false, 'container'=>false)); ?>
            </ul>
        </div>
        <div class="row">
            <?php echo $form->labelEx($model,'res_car_park'); ?>
            <ul style="float:left;">
                <?php echo ZHtml::enumRadioList($model,'res_car_park',array('class'=>'CBLocation', 'template' => '<li>{label} {input}</li>','separator'=>false, 'container'=>false)); ?>
            </ul>
        </div>

        <div class="row">
            <?php echo $form->labelEx($model,'res_smoking_area'); ?>
            <ul style="float:left;">
            <?php echo ZHtml::enumRadioList($model,'res_smoking_area',array('class'=>'CBLocation', 'template' => '<li>{label} {input}</li>','separator'=>false, 'container'=>false)); ?>
            </ul>
        </div>
        <div class="row">
            <?php echo $form->labelEx($model,'res_price'); ?>
            <div class="input-wrap">
                <?php echo $form->textField($model,'res_price',array('size'=>60,'maxlength'=>500)); ?>
                <?php echo $form->error($model,'res_price'); ?>
            </div>
        </div>
</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>


<?php $this->endWidget(); ?>

</div><!-- search-form -->