<?php if(Yii::app()->user->isGuest){?>
	<!--
<div id="popup-login" class="popup-block">
	<?php
	/*
		$form=$this->beginWidget('CActiveForm', array(
				'id'=>'login-form',
				'action'=>Yii::app()->createUrl('/site/ajaxLogin'),
				'enableClientValidation'=>true,
				'enableAjaxValidation'=>true,
				'clientOptions'=>array(
					'validateOnSubmit'=>true,
					'afterValidate'=> 'js:PopupLogin'
				),
		));
	?>
        <span class="close_popup icon_common">&nbsp;</span>
        <div>
        	<?php echo $form->textField($model,'username', array('placeholder'=> Lang::t('general', 'Email'))); ?>
			<?php echo $form->error($model,'username'); ?>
        </div>
        <div>
        	<?php echo $form->passwordField($model,'password', array('placeholder'=>Lang::t('general', 'Password'))); ?>
			<?php echo $form->error($model,'password'); ?>    
        </div>
        <?php echo $form->checkBox($model,'rememberMe', array('id'=>'check-rem-popup')); ?>
        <p><?php echo Lang::t('general', 'Remember me');?> | <a href="#"><?php echo Lang::t('general', 'Forgot your password?');?></a></p>

        <div class="btn_sigin">
            <input type="submit" class="btn-common" value="<?php echo Lang::t('general', 'Login');?>">
            <span class="btn-close"><?php echo Lang::t('general', 'Close');?></span>
        </div>
        <div class="clear"></div>
        <a class="lg-fb icon_common" href="<?php echo Yii::app()->createUrl('//site/facebook')?>">&nbsp;</a>
        <a class="lg-g icon_common" href="<?php echo Yii::app()->createUrl('//site/google')?>">&nbsp;</a>
    <?php $this->endWidget();

	*/ ?>
    <div class="clear"></div>
</div>
-->

	<div class="modal fade popup-common" id="popup-sign-up" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="fa fa-close" aria-hidden="true"></i></button>
				<div class="modal-body">
					<div class="text-uper font-centuB fs-29 lh-100 text-center pdT-30 pdB-30">sign up</div>
					<?php

						$form=$this->beginWidget('CActiveForm', array(
								'id'=>'register-form',
								'action'=>Yii::app()->createUrl('/site/Register'),
								'enableClientValidation'=>true,
								'enableAjaxValidation'=>true,
								'clientOptions'=>array(
									'validateOnSubmit'=>true,
									'afterValidate'=> 'js:PopupRegister'
								),
						));

//			'firstname'=> Lang::t('settings', 'First name'),
//			'lastname'=> Lang::t('settings', 'Last name'),
//			'email'=> Lang::t('settings', 'Email'),
//			'password'=> Lang::t('settings', 'Password'),
//			'confirm_password'=> Lang::t('settings', 'Confirm Password'),
//			'gender'=> Lang::t('settings', 'Gender'),
//			'birthday'=> Lang::t('settings', 'Birthday'),
//			'location'=>Lang::t('settings', 'Location'),
//			'verifyCode'=>Lang::t('settings','Verification Code'),
					?>
					<form action="" id="sign-up">
						<div class="mgB-15">
							<?php echo $form->textField($model,'email', array('placeholder'=> Lang::t('general', 'Email'))); ?>
							<?php echo $form->error($model,'email'); ?>
							<!--
							<input type="text" placeholder="Email" />
							<div class="vali-error hide"></div>
							-->
						</div>
						<div class="mgB-15">
							<?php echo $form->textField($model,'firstname', array('placeholder'=> Lang::t('general', 'First Name'))); ?>
							<?php echo $form->error($model,'firstname'); ?>
							<!--
							<input type="text" placeholder="Name" />
							<div class="vali-error hide"></div>
							-->
						</div>
						<div class="mgB-15">
							<?php echo $form->textField($model,'lastname', array('placeholder'=> Lang::t('general', 'Last Name'))); ?>
							<?php echo $form->error($model,'lastname'); ?>
							<!--
							<input type="text" placeholder="Name" />
							<div class="vali-error hide"></div>
							-->
						</div>
						<div class="mgB-15">
							<?php echo $form->textField($model,'password', array('placeholder'=> Lang::t('general', 'Password'))); ?>
							<?php echo $form->error($model,'password'); ?>
							<!--
							<input type="password" placeholder="Password" />
							<div class="vali-error hide"></div>
							-->
						</div>
						<div class="mgB-15">
							<?php echo $form->textField($model,'confirm_password', array('placeholder'=> Lang::t('general', 'Confirm Password'))); ?>
							<?php echo $form->error($model,'confirm_password'); ?>
							<!--
							<input type="text" placeholder="Enter the Pawword" />
							<div class="vali-error hide"></div>
							-->
						</div>
						<div class="mgB-15">
							<p>
								<?php echo $form->radioButton($model,'gender',array('value'=>'0', 'id'=>'rd1', 'class'=>'gt-rd', 'checked'=>'checked')); ?><?php echo Lang::t('settings', 'Male'); ?>
							</p>
							<p>
								<?php echo $form->radioButton($model,'gender',array('value'=>'1', 'id'=>'rd2', 'class'=>'gt-rd')); ?><?php echo Lang::t('settings', 'Female'); ?>
							</p>
						</div>
						<div class="mgB-15">
							<label><?php echo Lang::t('settings', 'Birthday'); ?></label>
							<?php echo $form->dropDownList($model,'month', BirthdayHelper::model()->getMonth()); ?>
							<?php echo $form->dropDownList($model,'day', BirthdayHelper::model()->getDates()); ?>
							<?php echo $form->dropDownList($model,'year', BirthdayHelper::model()->getYears()); ?>
						</div>
						<div class="mgB-15">
							<?php echo $form->labelEx($model,'location'); ?>
							<?php echo $form->dropDownList($model,'location', CHtml::listData(GeoCountry::model()->findAll(), 'country_id', 'short_name'),array('options' => array('243'=>array('selected'=>true)), 'id'=>'location', 'class'=>'sl-location')); ?>
							<?php echo $form->error($model,'location'); ?>
						</div>

						<?php if(CCaptcha::checkRequirements()): ?>
						<div class="clearfix mgB-25">
							<div class="w-50 pull-left">
								<?php echo $form->textField($model,'verifyCode', array('placeholder'=> Lang::t('general', 'Verification'))); ?>
							</div>
							<div class="w-30 text-center cap-cha pull-left">
								<?php $this->widget('CCaptcha', array(
									'buttonLabel'=>'',
									'imageOptions' => array(
										'style'=>'height: 34px;width: 72px;'
									)
								)); ?>
							</div>
							<?php echo $form->error($model,'verifyCode'); ?>
						</div>
						<?php endif;?>

						<div class="ver-c clearfix">
							<button type="submit" class="btn-auth pull-right">register</button>
							Have not account ! <a href="#" class="text-decor" data-toggle="modal" data-target="#popup-sign-in">Sign in now</a>
						</div>
					<?php
					$form=$this->endWidget();
					?>
				</div>
			</div>
		</div>
	</div>
<script>
function PopupRegister (form, data, hasError) {
	if (!hasError) {
		//$('body').loading();
		var item = $("#login-form");
		var data = item.serialize();
		$.ajax({
			type: 'POST',
			url: item.attr('action'),
		  	data:data,
			success:function(response){
				//$('body').unloading();
				location.reload(); 
		    },
		 	dataType:'json'
		 });
	}
}
</script>
<?php } ?>
