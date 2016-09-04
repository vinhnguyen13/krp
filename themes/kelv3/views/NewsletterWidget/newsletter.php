<div class="bar-email box-slidebar">
	<h3><?php echo Lang::t('general', 'be an insider'); ?></h3>
	<p><?php echo Lang::t('general', 'From our editors to your inbox. Sign up for our newsletter today.'); ?></p>
	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'subcribe-form',
		'action'=>Yii::app()->createUrl('//site/subscribe'),
		'enableAjaxValidation'=>false,
		'enableClientValidation'=>true,
        'clientOptions'=>array(
        	'validateOnSubmit'=>true,
			'afterValidate'=> 'js:Subcribe'
		),
	)); ?>
	<div>
		<?php echo $form->textField($model,'email', array('placeholder' => Lang::t('general', 'Your email address'))); ?>
		<?php echo CHtml::submitButton('btn-email', array('id' => 'btn-email')); ?>
	</div>
	<?php echo $form->error($model,'email'); ?>
	<?php $this->endWidget(); ?>
</div>