<div class="page-signup">
    <h1><?php echo Lang::t('general', 'Register'); ?></h1>
    <?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'frm-signup',
		'enableClientValidation'=>true,
		'clientOptions'=>array(
			'validateOnSubmit'=>true,
		),
	)); ?>
	        <div>
                <?php echo $form->labelEx($model,'firstname'); ?>
    			<?php echo $form->textField($model,'firstname'); ?>
    			<?php echo $form->error($model,'firstname'); ?>
			</div>
        
            <div>
                <?php echo $form->labelEx($model,'lastname'); ?>
    			<?php echo $form->textField($model,'lastname'); ?>
    			<?php echo $form->error($model,'lastname'); ?>
			</div>
        
            <div>
			
    			<?php echo $form->labelEx($model,'email'); ?>
    			<?php echo $form->textField($model,'email'); ?>
    			<?php echo $form->error($model,'email'); ?>
    		</div>
        
            <div>	
    			<?php echo $form->labelEx($model,'password'); ?>
    			<?php echo $form->passwordField($model,'password'); ?>
    			<?php echo $form->error($model,'password'); ?>
    		</div>
        
            <div>	
    			<?php echo $form->labelEx($model,'confirm_password'); ?>
    			<?php echo $form->passwordField($model,'confirm_password'); ?>
    			<?php echo $form->error($model,'confirm_password'); ?>
			</div>
        
			<?php echo $form->labelEx($model,'gender'); ?>
			<p>
			    <?php echo $form->radioButton($model,'gender',array('value'=>'0', 'id'=>'rd1', 'class'=>'gt-rd', 'checked'=>'checked')); ?><?php echo Lang::t('settings', 'Male'); ?>
			</p>
			<p>
			    <?php echo $form->radioButton($model,'gender',array('value'=>'1', 'id'=>'rd2', 'class'=>'gt-rd')); ?><?php echo Lang::t('settings', 'Female'); ?>
			</p>
			
            <div class="clear"></div>
            <label><?php echo Lang::t('settings', 'Birthday'); ?></label>
            <?php echo $form->dropDownList($model,'month', BirthdayHelper::model()->getMonth()); ?>
            <?php echo $form->dropDownList($model,'day', BirthdayHelper::model()->getDates()); ?>
            <?php echo $form->dropDownList($model,'year', BirthdayHelper::model()->getYears()); ?>
        
            <div class="clear"></div>
            <?php echo $form->labelEx($model,'location'); ?>
			<?php echo $form->dropDownList($model,'location', CHtml::listData(GeoCountry::model()->findAll(), 'country_id', 'short_name'),array('options' => array('243'=>array('selected'=>true)), 'id'=>'location', 'class'=>'sl-location')); ?>
			<?php echo $form->error($model,'location'); ?>
        
        <?php if(CCaptcha::checkRequirements()): ?>
            <div class="block-capcha">
                <?php echo $form->labelEx($model,'verifyCode'); ?>
                <?php echo $form->textField($model,'verifyCode'); ?>				
                <div class="capcha">
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
            <div class="clear"></div>
            <label>&nbsp;</label>
            <p class="txt-policy">
					<?php 
						$link_termsofservice	=	'<a href="' . Yii::app()->createUrl('/site/page/view/term') . '">' . Lang::t('general', 'Terms of Service') . '</a>';
						$link_privacy_policy	=	'<a href="' . Yii::app()->createUrl('/site/page/view/policy') . '">' . Lang::t('general', 'Privacy Policy') . '</a>';
						echo sprintf(Lang::t('general', 'By clicking Sign Up you confirm that you agreed to our %s and %s'), $link_termsofservice, $link_privacy_policy); 
					?>            
            </p>
            <label>&nbsp;</label>
            <input type="submit" class="btn-common" value="<?php echo Lang::t('general', 'Sign up now'); ?>"/>
            
            <div class="clear"></div>
            <label>&nbsp;</label>
            <a href="<?php echo Yii::app()->createUrl('//site/login')?>" class="already-acc"><?php echo Lang::t('settings', 'You already have an account? Click to login'); ?></a>
            
    <?php $this->endWidget(); ?>
    <div class="clear"></div>
</div>
<div class="clear"></div>





<div class="page page-register" style="display: none;">
	<div class="head">
		<h1>Register</h1>
	</div>
	<div class="register">
	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'register-form',
		'enableClientValidation'=>true,
		'clientOptions'=>array(
			'validateOnSubmit'=>true,
		),
	)); ?>
		<ul>
			<li>
				<?php echo $form->labelEx($model,'firstname'); ?>
				<?php echo $form->textField($model,'firstname'); ?>
				<?php echo $form->error($model,'firstname'); ?>
				<span class="ico-note"><i></i>!</span>
			</li>
			<li>
				<?php echo $form->labelEx($model,'lastname'); ?>
				<?php echo $form->textField($model,'lastname'); ?>
				<?php echo $form->error($model,'lastname'); ?>
				<span class="ico-note"><i></i>!</span>
			</li>
			<li>
				<?php echo $form->labelEx($model,'email'); ?>
				<?php echo $form->textField($model,'email'); ?>
				<?php echo $form->error($model,'email'); ?>
				<span class="ico-note"><i></i>!</span>
			</li>
			<li>
				<?php echo $form->labelEx($model,'password'); ?>
				<?php echo $form->passwordField($model,'password'); ?>
				<?php echo $form->error($model,'password'); ?>
				<span class="ico-note"><i></i>!</span>
			</li>
			<li>
				<?php echo $form->labelEx($model,'confirm_password'); ?>
				<?php echo $form->passwordField($model,'confirm_password'); ?>
				<?php echo $form->error($model,'confirm_password'); ?>
				<span class="ico-note"><i></i>!</span>
			</li>
			<li>
				<?php echo $form->labelEx($model,'gender'); ?>
				<ul>
					<li>
						<?php echo $form->radioButton($model,'gender',array('value'=>'0', 'id'=>'rd1')); ?>
						<label for="rd1">Male</label>
					</li>
					<li>
						<?php echo $form->radioButton($model,'gender',array('value'=>'1', 'id'=>'rd2')); ?>
						<label for="rd2">Female</label>
					</li>
				</ul>
				<?php echo $form->error($model,'gender'); ?>
			</li>
			<li>
				<?php echo $form->labelEx($model,'birthday'); ?>
				<?php echo $form->textField($model,'birthday', array('placeholder'=>'DD / MM / YY')); ?>
				<?php echo $form->error($model,'birthday'); ?>
				<span class="ico-note"></span>
			</li>
			<li>
				<?php echo $form->labelEx($model,'location'); ?>
				<?php echo $form->dropDownList($model,'location', CHtml::listData(GeoCountry::model()->findAll(), 'country_id', 'short_name'),array('prompt'=>'-- Select your location --', 'id'=>'location')); ?>
				<?php echo $form->error($model,'location'); ?>
			</li>
			<?php if(CCaptcha::checkRequirements()): ?>
			<li class="captcha-img">
					<?php echo $form->labelEx($model,'verifyCode'); ?>
				<div class="input-wrap">
					<?php $this->widget('CCaptcha'); ?>
				</div>
			</li>
			<li class="captcha-input">
					<label></label>
					<?php echo $form->textField($model,'verifyCode'); ?>
					<?php echo $form->error($model,'verifyCode'); ?>
			</li>
			<?php endif; ?>
			<li class="policy">
				<p>
					By clicking Sign Up you confirm that you accept our <a class="bold" href="#" target="_blank" title="">Privacy Policy</a> and <a class="bold" href="#" target="_blank" title="">Terms of Service</a>.
				</p>
			</li>
			<li class="btn">
				<input type="submit" value="Sign up now" id="" name=""/>
				<p><a href="<?php echo Yii::app()->createUrl('//site/login')?>" title="">You already have an account? Click to login</a></p>
			</li>
		</ul>
	<?php $this->endWidget(); ?>
	</div>
	<!-- register info -->
</div>