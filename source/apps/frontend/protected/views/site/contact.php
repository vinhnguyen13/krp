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
            <div class="left txt-cus-left">
                <div class="pic-demo">
                	<img src="<?php echo Yii::app()->theme->baseUrl; ?>/resources/html/images/img_445x234.jpg" />
                </div>
                <h3>VIETNAM REP OFFICE</h3>
                <p><?php echo Lang::t('general', 'Dream Weavers Online Services JSC'); ?></p>
                <p><i class="icon_common icon-address">&nbsp;</i><?php echo Lang::t('settings', 'Address'); ?>: 
                <?php echo Lang::t('general', 'Ground Fl, Blk C, Phuc Thinh Bldg'); ?> | 
                 <?php echo Lang::t('general', '341 Cao Dat, District 5, Ho Chi Minh City, Vietnam'); ?></p>
                <p><i class="icon_common icon-phone">&nbsp;</i><?php echo Lang::t('settings', 'Phone'); ?>: (848) 5405 1168</p>
                <p><i class="icon_common icon-email">&nbsp;</i><?php echo Lang::t('settings', 'Email'); ?>: Info@kelreport.com</p>
                <div class="clear"></div>
            </div>
            
            <div class="left txt-cus-right">
					<?php if(Yii::app()->user->hasFlash('contact')): ?>
								<div class="flash-success">
									<?php echo Yii::app()->user->getFlash('contact'); ?>
								</div>
							<?php else: ?>
								<?php $form=$this->beginWidget('CActiveForm', array(
									'id'=>'frm-contact',
									'enableClientValidation'=>true,
									'clientOptions'=>array(
										'validateOnSubmit'=>true,
										'afterValidate'=>'js:afterValidate'
									),
					)); ?>
                    <div>
                        <label><?php echo Lang::t('settings', 'Full name'); ?></label>
                        <?php echo $form->textField($model,'name'); ?>
                        <?php echo $form->error($model,'name'); ?>
                    </div>
                    <div>
                        <label><?php echo Lang::t('settings', 'Email'); ?></label>
                        <?php echo $form->textField($model,'email'); ?>
                        <?php echo $form->error($model,'email'); ?>
                    </div>
                    <div>
                        <label><?php echo Lang::t('settings', 'Phone'); ?></label>
                        <?php echo $form->textField($model,'phone_number'); ?>
                        <?php echo $form->error($model,'phone_number'); ?>
                    </div>
                    <div>
                        <label><?php echo Lang::t('settings', 'Subject'); ?></label>
                        <?php echo $form->dropDownList($model,'subject', $subjectOptions); ?>
                        <?php echo $form->error($model,'subject'); ?>
                    </div>
                    <div>
                        <label><?php echo Lang::t('settings', 'Your Message'); ?></label>
                        <?php echo $form->textArea($model,'body'); ?>
                        <?php echo $form->error($model,'body'); ?>
                    </div>
                    <div class="block-capcha">
                        <label><?php echo Lang::t('settings', 'Verification Code'); ?></label>
                       <?php echo $form->textField($model,'verifyCode'); ?>
                        <div class="capcha">
                            <?php
		                    $this->widget('CCaptcha', array(
		    		            'buttonLabel'=>'',
		                        'imageOptions' => array(
		                            'style'=>'height: 34px;'
		                        )
		    		        )); 
		                    ?>
                        </div>
                    </div>
                    <?php echo $form->error($model,'verifyCode'); ?>
                    <label></label>
                    <?php echo CHtml::submitButton('Send now', array('id' => 'btn-contact')); ?>
                    <div class="clear"></div>
                <?php $this->endWidget(); ?>
            </div>
            
        <?php endif; ?>    
        </div>
        <div class="clear"></div>
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



