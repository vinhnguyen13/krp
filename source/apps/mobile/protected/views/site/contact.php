<?php
/* @var $this SiteController */
/* @var $model ContactForm */
/* @var $form CActiveForm */

$this->pageTitle=Yii::app()->name . ' - Contact Us';
$this->breadcrumbs=array(
	'Contact',
);
?>
<div class="page-contactus">
	<h1><?php echo Lang::t('general', 'Contact Us'); ?></h1>
	<div class="box-address">
		<h2>VIETNAM REP OFFICE</h2>
		<p><?php echo Lang::t('general', 'Dream Weavers Online Services JSC'); ?></p>
		<ul>
			<li class="add-icon"><i class="icon-common">&nbsp;</i> <?php echo Lang::t('general', 'Ground Fl, Blk C, Phuc Thinh Bldg'); ?> | <?php echo Lang::t('general', '341 Cao Dat, District 5, Ho Chi Minh City, Vietnam'); ?></li>
			<li class="phone-icon"><i class="icon-common">&nbsp;</i> (848) 5405 1168</li>
			<li class="email-icon"><i class="icon-common">&nbsp;</i>Info@kelreport.com</li>
		</ul>
		<div class="clear"></div>
	</div>
	<?php if(Yii::app()->user->hasFlash('contact')): ?>
	<div class="flash-success">
		<?php echo Yii::app()->user->getFlash('contact'); ?>
	</div>
	<?php else: ?>
	<?php
		$form=$this->beginWidget('CActiveForm', array(
			'id'=>'frm-contact',
			'enableClientValidation'=>true,
			'clientOptions'=>array(
				'validateOnSubmit'=>true,
				'afterValidate'=>'js:afterValidate'
			),
		));
	?>
		<div class="field-wrap">
			<?php echo $form->textField($model,'name', array('placeholder'=>Lang::t('settings', 'Full name'))) ?>
			<?php echo $form->error($model,'name') ?>
		</div>
		<div class="field-wrap">
			<?php echo $form->textField($model,'email', array('placeholder'=>Lang::t('settings', 'Email'))) ?>
			<?php echo $form->error($model,'email') ?>
		</div>
		<div class="field-wrap">
			<?php echo $form->textField($model,'phone_number', array('placeholder'=>Lang::t('settings', 'Phone'))) ?>
			<?php echo $form->error($model,'phone_number') ?>
		</div>
		<div class="field-wrap">
			<div class="box-select left">
				<?php echo $form->dropDownList($model,'subject', $subjectOptions) ?>
				<span class="arrow icon-common">&nbsp;</span>
			</div>
			<?php echo $form->error($model,'subject') ?>
		</div>
		<div class="field-wrap">
			<?php echo $form->textArea($model,'body', array('placeholder'=>Lang::t('settings', 'Your Message'))) ?>
			<?php echo $form->error($model,'body') ?>
		</div>
		<?php if(CCaptcha::checkRequirements()): ?>
            <div class="capcha-box">
				<?php echo $form->textField($model,'verifyCode',array('placeholder'=>Yii::t('settings', 'Verification Code'))); ?>
				<div class="wrap-capcha">
					<?php $this->widget('CCaptcha', array(
    		            'buttonLabel'=>'',
                        'imageOptions' => array(
                            'style'=>'height: 24px;width: 60px;',
                        ),
						'buttonOptions' => array(
							'class'=>"reload-capcha icon-common",
						),
    		        )); ?>
				</div>
				<div class="clear"></div>
				<?php echo $form->error($model,'verifyCode'); ?>
			</div>
		<?php endif;?>
		<div class="btn-frm">
		<?php echo CHtml::submitButton(Lang::t('settings', 'Send now'), array('id' => 'btn-contact', 'class'=>'btn-common')); ?>
		</div>
	<?php $this->endWidget(); ?>
	<?php endif; ?>
	<div class="clear"></div>
</div>
<?php
$message = Lang::t('settings', 'Phone Number is not valid');
$js = <<<SCRIPT
function afterValidate(form) {
	var phone = form.find('#ContactForm_phone_number');
	phone.next().find('.errorMessage').eq(1).remove();
	var preg = /^[0-9 \.-]+$/;
	if(phone.val() != "" && !phone.val().match(preg)) {
		phone.next().find('.errorMessage').after('<div class="errorMessage" id="ContactForm_phone_number_em_" style="">$message</div>');
		return false;
	}
	else {
		phone.next().find('.errorMessage').eq(1).remove();
		return true;
	}
}
SCRIPT;
Yii::app()->clientScript->registerScript('afterValidate', $js);
?> 



