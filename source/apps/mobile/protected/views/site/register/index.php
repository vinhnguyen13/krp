<?php 
	/**
	 * @var RegisterForm $model
	 */

	$this->pageTitle=Yii::app()->name . ' - Register';
?>
<div class="page-2">
	<div class="page-regis">
		<h1><?php echo Lang::t('general', 'Register'); ?></h1>
		<div class="login-social">
			<a class="face-login icon-common" href="<?php echo Yii::app()->createUrl('//site/facebook', array('redirect_url'=>Yii::app()->createAbsoluteUrl(Yii::app()->request->requestUri)))?>">&nbsp;</a>
    		<a class="go-login icon-common" href="<?php echo Yii::app()->createUrl('//site/google', array('redirect_url'=>Yii::app()->createAbsoluteUrl(Yii::app()->request->requestUri)))?>">&nbsp;</a>
		</div>
		<p class="or-regis">
			<span>or</span>
		</p>
		<?php
			$form=$this->beginWidget('CActiveForm', array(
				'id'=>'frm-signup',
				'enableClientValidation'=>true,
				'clientOptions'=>array(
					'validateOnSubmit'=>true,
				),
			));
		?>
			<div class="field-wrap">
				<?php echo $form->textField($model,'firstname', array('placeholder'=>$model->getAttributeLabel('firstname'))) ?>
				<?php echo $form->error($model,'firstname') ?>
			</div>
			<div class="field-wrap">
				<?php echo $form->textField($model,'lastname', array('placeholder'=>$model->getAttributeLabel('lastname'))) ?>
				<?php echo $form->error($model,'lastname') ?>
			</div>
			<div class="field-wrap">
				<?php echo $form->textField($model,'email', array('placeholder'=>$model->getAttributeLabel('email'))) ?>
				<?php echo $form->error($model,'email') ?>
			</div>
			<div class="field-wrap">
				<?php echo $form->passwordField($model,'password', array('placeholder'=>$model->getAttributeLabel('password'))) ?>
				<?php echo $form->error($model,'password') ?>
			</div>
			<div class="field-wrap">
				<?php echo $form->passwordField($model,'confirm_password', array('placeholder'=>$model->getAttributeLabel('confirm_password'))) ?>
				<?php echo $form->error($model,'confirm_password') ?>
			</div>
			
			<div class="gender-regis">
				<span><?php echo $form->radioButton($model,'gender',array('value'=>'0', 'id'=>'rd1', 'class'=>'gt-rd', 'checked'=>'checked')); ?><?php echo Lang::t('settings', 'Male') ?></span>
				<span><?php echo $form->radioButton($model,'gender',array('value'=>'1', 'id'=>'rd2', 'class'=>'gt-rd')); ?><?php echo Lang::t('settings', 'Female') ?></span>
			</div>
			<div class="birth">
				<div class="box-select drop-month-regis left">
					<?php echo $form->dropDownList($model,'month', BirthdayHelper::model()->getMonth()); ?>
					<span class="arrow icon-common">&nbsp;</span>
				</div>
				<div class="box-select left">
					<?php echo $form->dropDownList($model,'day', BirthdayHelper::model()->getDates()); ?>
					<span class="arrow icon-common">&nbsp;</span>
				</div>
				<div class="box-select right">
					<?php echo $form->dropDownList($model,'year', BirthdayHelper::model()->getYears()); ?>
					<span class="arrow icon-common">&nbsp;</span>
				</div>
				<div class="clear"></div>
			</div>
			<div class="box-select select-loca">
				<?php echo $form->dropDownList($model,'location', CHtml::listData(GeoCountry::model()->findAll(), 'country_id', 'short_name'),array('options' => array('243'=>array('selected'=>true)), 'id'=>'location', 'class'=>'sl-location')); ?>
				<span class="arrow icon-common">&nbsp;</span>
			</div>
			<?php if(CCaptcha::checkRequirements()): ?>
            <div class="capcha-box">
				<?php echo $form->textField($model,'verifyCode',array('placeholder'=>$model->getAttributeLabel('verifyCode'))); ?>
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
			
			<p>
				<?php 
					$link_termsofservice	=	'<a href="#">' . Lang::t('general', 'Terms of Service') . '</a>';
					$link_privacy_policy	=	'<a href="#">' . Lang::t('general', 'Privacy Policy') . '</a>';
					echo sprintf(Lang::t('general', 'By clicking Sign Up you confirm that you agreed to our %s and %s'), $link_termsofservice, $link_privacy_policy); 
				?>
			</p>
			<div class="btn-frm">
				<input type="submit" class="btn-common" value="<?php echo Lang::t('general', 'Sign up now'); ?>"/>
			</div>
		<?php $this->endWidget(); ?>
		<div class="clear"></div>
	</div>
</div>
<div class="clear"></div>