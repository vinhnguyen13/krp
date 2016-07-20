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

<div class="modal fade popup-common" id="popup-login-form" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="fa fa-close" aria-hidden="true"></i></button>
			<div class="modal-body">
				<div class="text-uper font-centuB fs-29 lh-100 text-center pdT-30 pdB-30">sign in</div>
					<?php

						$form=$this->beginWidget('CActiveForm', array(
								'id'=>'login-form',
								'action'=>Yii::app()->createUrl('/site/ajaxLogin'),
								'enableClientValidation'=>true,
								'enableAjaxValidation'=>true,
								'clientOptions'=>array(
									'validateOnSubmit'=>true,
									'afterValidate'=> 'js:PopupLogin'
								),
								'errorMessageCssClass'=>'vali-error'

						));
					?>
					<div class="mgB-15">
						<?php echo $form->textField($model,'username', array('placeholder'=> Lang::t('general', 'Email'))); ?>
						<?php echo $form->error($model,'username'); ?>
						<!--
						<input type="text" placeholder="Username" />
						<div class="vali-error hide"></div>
						-->
					</div>
					<div class="mgB-15">
						<?php echo $form->passwordField($model,'password', array('placeholder'=>Lang::t('general', 'Password'))); ?>
						<?php echo $form->error($model,'password'); ?>
						<!--
						<input type="password" placeholder="Password" />
						<div class="vali-error hide"></div>
						-->
					</div>
					<div class="ver-c clearfix">
						<button type="submit" class="btn-auth pull-right">send</button>
						<?php echo $form->checkBox($model,'rememberMe', array('id'=>'check-rem-popup')); ?>
						<p><?php echo Lang::t('general', 'Remember me');?> | <a href="#"><?php echo Lang::t('general', 'Forgot your password?');?></a></p>
						<!--
						<button type="submit" class="btn-auth pull-right">send</button>
						<a href="#">Forgot password?</a>
						-->
					</div>
					<p class="bottom-auth">Have not account ! <a href="#" data-toggle="modal" data-target="#popup-sign-up">Register now</a></p>
				<?php $this->endWidget(); ?>
			</div>
		</div>
	</div>
</div>
<script>
function PopupLogin (form, data, hasError) {
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
