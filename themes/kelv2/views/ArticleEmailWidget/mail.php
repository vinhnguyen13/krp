<div id="popup-email" class="popup-block">
	<div class="content-popup">
    	<h1><?php echo Lang::t('general', 'Email A Friend');?></h1>
    	<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'mail-form',
			'action'=> Yii::app()->createUrl('//article/mail'),
			'enableClientValidation'=>true,
			'clientOptions'=>array(
				'validateOnSubmit'=>true,
				'afterValidate' => 'js:Mail'
			),
    		'htmlOptions'=> array('class' => 'frm-email'),
		)); ?>
		
			<?php echo $form->labelEx($model,'name'); ?>
			<?php echo $form->textField($model,'name', array('')); ?>
			<?php echo $form->error($model,'name'); ?>
			
			<?php echo $form->labelEx($model,'from'); ?>
			<?php echo $form->textField($model,'from'); ?>
			<?php echo $form->error($model,'from'); ?>
			
			<?php echo $form->labelEx($model,'to'); ?>
			<?php echo $form->textField($model,'to'); ?>
			<?php echo $form->error($model,'to'); ?>
			
			<!-- 
			<?php echo $form->labelEx($model,'subject'); ?>
			<?php echo $form->textField($model,'subject',array('size'=>60,'maxlength'=>128)); ?>
			<?php echo $form->error($model,'subject'); ?>
			 			
			<?php echo $form->labelEx($model,'message'); ?>
			<?php echo $form->textArea($model,'message',array('rows'=>6, 'cols'=>50)); ?>
			<?php echo $form->error($model,'message'); ?>
			 -->
			
			
			<?php if(CCaptcha::checkRequirements()): ?>
				<div class="block-capcha">
					<?php echo $form->labelEx($model,'verifyCode'); ?>
					<?php echo $form->textField($model,'verifyCode'); ?>
					<div class="captcha">
						<?php $this->widget('CCaptcha'); ?>
					</div>
					<?php echo $form->error($model,'verifyCode'); ?>
				</div>
			<?php endif; ?>
			<label></label>
			<span class="right btn-close"><?php echo Lang::t('general', 'Close');?></span>
			<?php echo CHtml::submitButton(Lang::t('general', 'Send'), array('class' => 'right', 'id' => 'btn-contact')); ?>
            <div class="clear"></div>
        <?php $this->endWidget(); ?>
    </div>
	<div class="clear"></div>
</div>





<script type="text/javascript">
		function Mail(form, data, hasError)
		{
			if (!hasError) {
				var data = form.serializeArray();
				data.push({"name":"MailForm[url]","value":window.location.href});
				data.push({"name":"MailForm[title]","value":$('.content-fs-1 h1').html()});
				$('body').loading();
				$.ajax({
					type: 'POST',
					url: form.attr('action'),
				  	data:data,
					success:function(response){
						
						if (response.status != undefined && response.status == true){
							Util.popAlertSuccess(tr('Email sent'));
							close_popup('#popup-email');
							//alert('Gửi email thành công!');
						} else if(response.error != undefined) {
							$.each(response, function(i, items) {
								$('#MailForm_'+i+'_em_').html(items[0]);
								$('#MailForm_'+i+'_em_').css('display', 'block');
							});
						}
						$('body').unloading();
					},
				 	dataType:'json'
				 });
			}			
		}	


		$('#yw0_button').click(function(){
			alert('ttt');
			return false;
		});

</script>