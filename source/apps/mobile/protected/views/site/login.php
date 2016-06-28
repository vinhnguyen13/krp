<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Login';

if(isset($_POST['returnUrl']))
	$returnUrl = $_POST['returnUrl'];
elseif(isset($_SERVER['HTTP_REFERER']))
	$returnUrl = $_SERVER['HTTP_REFERER'];
else
	$returnUrl = Yii::app()->getHomeUrl();
?>
<div class="page-2">
	<div class="page-login">
		<h1>Login</h1>
		<?php
			$form=$this->beginWidget('CActiveForm', array(
				'id'=>'frm-login',
				'action'=>Yii::app()->createUrl('//site/login'),
				'enableClientValidation'=>true,
				'enableAjaxValidation'=>true,
				'clientOptions'=>array(
					'validateOnSubmit'=>true,
				),
			));
		?>
			<div class="field-wrap">
				<?php echo $form->textField($model,'username', array('placeholder'=>$model->getAttributeLabel('username'))) ?>
				<?php echo $form->error($model,'username') ?>
			</div>
			<div class="field-wrap">
				<?php echo $form->passwordField($model,'password', array('placeholder'=>$model->getAttributeLabel('password'))) ?>
				<?php echo $form->error($model,'password') ?>
			</div>
			<div class="rem-login"><?php echo $form->checkBox($model,'rememberMe', array('class'=>'rem_user')); ?><?php echo Yii::t('general', 'Remember me') ?> | <a href="#"><?php echo Yii::t('general', 'Forgot your password')?></a></div>
			<div class="clear"></div>
			<div class="btn-frm">
			
			<input type="hidden" name="returnUrl" value="<?php echo $returnUrl ?>">
			
			<input type="submit" value="<?php echo Lang::t('general', 'Login'); ?>" class="btn-common">
			<a class="btn-cancel" href="<?php echo $returnUrl; ?>"><?php echo Lang::t('general', 'Cancel'); ?></a>
			</div>
		<?php $this->endWidget(); ?>
		<div class="login-social">
			<a class="face-login icon-common" href="<?php echo Yii::app()->createUrl('//site/facebook', array('redirect_url'=>Yii::app()->createAbsoluteUrl(Yii::app()->request->requestUri)))?>">&nbsp;</a>
    		<a class="go-login icon-common" href="<?php echo Yii::app()->createUrl('//site/google', array('redirect_url'=>Yii::app()->createAbsoluteUrl(Yii::app()->request->requestUri)))?>">&nbsp;</a>
		</div>
	  	<div class="clear"></div>
	</div>
</div>