<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Login',
);
?>
<div id="login_user">
  <div class="login_page">
    <h1>Login</h1>
    <?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'login-form',
		'enableClientValidation'=>true,
		'clientOptions'=>array(
			'validateOnSubmit'=>true,
		),
		'htmlOptions'=>array(
			'class'=>'frm_login_page',
		),
	)); ?>
        <div>
        <label>Email *</label>
        <?php echo $form->textField($model,'username'); ?>
		<?php echo $form->error($model,'username'); ?>
        </div>
        <div>
        <?php echo $form->labelEx($model,'password'); ?>
    	<?php echo $form->passwordField($model,'password'); ?>
    	<?php echo $form->error($model,'password'); ?>
        </div>
      <label></label>
      <?php echo $form->checkBox($model,'rememberMe', array('class'=>'rem_user')); ?>  
      <p>Remember me | <a href="#">Forgot your password?</a></p>
      <label></label>
      <div class="btn_sigin">
        <input type="submit" id="" value="Login">
      </div>
      
      <label></label>
      <div class="left btn_sign_social">
        <a class="lg-fb icon_common" href="">&nbsp;</a> 
        <a class="lg-g icon_common" href="/site/google">&nbsp;</a>
      </div>
      <div class="clear"></div>
    <?php $this->endWidget(); ?>
    <div class="clear"></div>
  </div>
</div>




<div class="page page-register page-login" style="display: none;">
	<div class="head">
		<h1>User Login</h1>
	</div>
	<div class="login">
	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'login-form',
		'enableClientValidation'=>true,
		'clientOptions'=>array(
			'validateOnSubmit'=>true,
		),
	)); ?>
		<ul>
			<li>
				<!-- <?php echo $form->labelEx($model,'username'); ?> -->
				<label for="LoginForm_username" class="required">Email <span class="required">*</span></label>
				<?php echo $form->textField($model,'username'); ?>
				<?php echo $form->error($model,'username'); ?>
			</li>
			<li>
				<?php echo $form->labelEx($model,'password'); ?>
				<?php echo $form->passwordField($model,'password'); ?>
				<?php echo $form->error($model,'password'); ?>
			</li>
			<!-- <li>
				<?php echo $form->checkBox($model,'rememberMe'); ?>
				<?php echo $form->label($model,'rememberMe'); ?>
				<?php echo $form->error($model,'rememberMe'); ?>
			</li> -->
			<li class="buttons">
				<?php echo CHtml::submitButton('Log In'); ?>
			</li>
			<li class="info">
				<p><a href="#">forgot your password?</a><br/>Or don't have an account? <a href="#" class="highlight">Register here</a></p>
			</li>
		</ul>
	</div>
	<!-- Login info -->
	<?php $this->endWidget(); ?>
</div>
