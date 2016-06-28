<?php 
$user = Yii::app()->user->data();
?>
<div class="top-site right">
	<div class="login-tab left tab-top">
	    <?php if(Yii::app()->user->isGuest){?>
		    <span class="show-lightbox"><?php echo Lang::t('general', 'Login'); ?></span>		
		<?php }else{?>
		    <a title="Login" href="<?php echo Yii::app()->user->data()->getUserUrl();?>" class="logged-user"><span class="show-lightbox"><?php echo Yii::app()->user->data()->getDisplayName();?></span></a>
		<?php }?>
		<div class="lightbox lb-login">
			<div class="content-lb">
    			<span class="muiten">&nbsp;</span>
    			<?php 
    			$model=new LoginForm();
    			$form=$this->beginWidget('CActiveForm', array(
    			        'id'=>'frm-login',
    			        'action'=>Yii::app()->createUrl('//site/login', array('redirect_url'=>Yii::app()->createAbsoluteUrl(Yii::app()->request->requestUri))),
    			        'enableClientValidation'=>true,
    			        'enableAjaxValidation'=>true,
    			        'clientOptions'=>array(
    			                'validateOnSubmit'=>true,
    			        ),
    			));
    			?>
                    <div>
                        <?php echo $form->textField($model,'username', array('placeholder'=> Lang::t('settings', 'Email'))); ?>
                        <?php echo $form->error($model,'username'); ?>
                    </div>
                    <div>
                        <?php echo $form->passwordField($model,'password', array('placeholder'=> Lang::t('general', 'Password'))); ?>
                        <?php echo $form->error($model,'password'); ?>
                    </div>
    			    <?php echo $form->checkBox($model,'rememberMe', array('id'=>'check-rem')); ?>
    				<p><?php echo Lang::t('general', 'Remember me'); ?> | <a href="#"><?php echo Lang::t('general', 'Forgot your password'); ?></a></p>
                    <div class="btn_sigin">
                        <input type="submit" id="btn-login" value="<?php echo Lang::t('general', 'Login'); ?>" />
                    </div>
    				<div class="clear"></div>
    			<a class="lg-fb icon_common" href="<?php echo Yii::app()->createUrl('//site/facebook', array('redirect_url'=>Yii::app()->createAbsoluteUrl(Yii::app()->request->requestUri)))?>">&nbsp;</a>
    			<a class="lg-g icon_common" href="<?php echo Yii::app()->createUrl('//site/google', array('redirect_url'=>Yii::app()->createAbsoluteUrl(Yii::app()->request->requestUri)))?>">&nbsp;</a>
			<?php $this->endWidget(); ?>
			</div>
		</div>
	</div>
	<div class="signup-tab left tab-top">
		<?php if(Yii::app()->user->isGuest){?>
			<span class="show-lightbox"><?php echo Lang::t('general', 'Sign up'); ?></span>
		<?php }else{?>
			<a title="Sign up" class="btn-reg" href="<?php echo Yii::app()->createUrl('//site/logout')?>"><span class="show-lightbox"><?php echo Lang::t('general', 'Sign out'); ?></span></a>
		<?php }?>
		<div class="lightbox lb-signup">
		<div class="content-lb">
			<span class="muiten">&nbsp;</span>
			<div class="signup-social">
				<a class="lg-fb icon_common" href="<?php echo Yii::app()->createUrl('//site/facebook')?>">&nbsp;</a>
				<a class="lg-g icon_common" href="<?php echo Yii::app()->createUrl('//site/google')?>">&nbsp;</a>
			</div>
			<div class="policy-signup">
				<a href="<?php echo Yii::app()->createUrl('//site/register')?>" class="sign-email"><?php echo Lang::t('general', 'Sign up using your email'); ?></a>
				<p>
					<?php 
						$link_termsofservice	=	'<a href="' . Yii::app()->createUrl('/site/page/view/term') . '">' . Lang::t('general', 'Terms of Service') . '</a>';
						$link_privacy_policy	=	'<a href="' . Yii::app()->createUrl('/site/page/view/policy') . '">' . Lang::t('general', 'Privacy Policy') . '</a>';
						echo sprintf(Lang::t('general', 'By clicking Sign Up you confirm that you agreed to our %s and %s'), $link_termsofservice, $link_privacy_policy); 
					?>
				</p>
			</div>
		  </div>
		</div>
	</div>
	<?php
	$languages = Language::model()->findAllByAttributes(array('enable'=>true));
	$languageDefault = Language::model()->findByAttributes(array('code'=>Yii::app()->language));
	if(!empty($languages)){
    $style = '';
    if($languageDefault->code == VLang::LANG_VI){
        $style = 'style="background-position: 0px -38px;"';
    }
	?>
	<div class="lang-tab left tab-top">
		<span class="icon-flag show-lightbox"><i class="icon_common selected-icon" <?php echo $style;?>>&nbsp;</i><?php echo $languageDefault->title;?></span>
		<div class="lightbox lb-lang">
			<ul>
			    <?php foreach ($languages as $language){?>
				    <li><a href="<?php echo Yii::app()->createUrl('//site/lang', array('_lang'=>$language->code))?>"><span><?php echo $language->title?></a></span></a></li>
				<?php }?>
			</ul>
		</div>
	</div>
	<?php }?>
</div>
<div class="clear"></div>    
<div class="logo">
	<a href="<?php echo Yii::app()->homeUrl?>">
        <img src="<?php echo Yii::app()->theme->baseUrl;?>/resources/html/images/logo.jpg" align="absmiddle">
	</a>
</div>
<div class="menu-top">
	<?php $this->widget('frontend.widgets.home.MenuWidget'); ?>
	<?php $this->widget('frontend.widgets.home.SearchWidget'); ?>
	<div class="clear"></div>
</div>
