<div class="page-form">
<h3>Email Pick to Friend</h3>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'mail-form',
	'action'=> Yii::app()->createUrl('//article/mail'),
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
		'afterValidate' => 'js:Mail'
	),
)); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name'); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'from'); ?>
		<?php echo $form->textField($model,'from'); ?>
		<?php echo $form->error($model,'from'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'to'); ?>
		<?php echo $form->textField($model,'to'); ?>
		<?php echo $form->error($model,'to'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'subject'); ?>
		<?php echo $form->textField($model,'subject',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'subject'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'message'); ?>
		<?php echo $form->textArea($model,'message',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'message'); ?>
	</div>

	<?php if(CCaptcha::checkRequirements()): ?>
	<div class="row">
		<?php echo $form->labelEx($model,'verifyCode'); ?>
		<div class="captcha">
		<?php $this->widget('CCaptcha'); ?>
		<?php echo $form->textField($model,'verifyCode'); ?>
		</div>
		<div class="hint">Please enter the letters as they are shown in the image above.
		<br/>Letters are not case-sensitive.</div>
		<?php echo $form->error($model,'verifyCode'); ?>
	</div>
	<?php endif; ?>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Submit'); ?>
		<button class="btn-close">Close</button>
	</div>

<?php $this->endWidget(); ?>

</div>
<div class="position"></div>
<!-- form -->
<script type="text/javascript"><!--

		function Mail(form, data, hasError)
		{
			if (!hasError) {
				var data = form.serializeArray();
				data.push({"name":"MailForm[url]","value":window.location.href});
				data.push({"name":"MailForm[tile]","value":$('.head h1').html()});
				$.ajax({
					type: 'POST',
					url: form.attr('action'),
				  	data:data,
					success:function(response){
						if (response.status != undefined && response.status == true){
							alert('Gửi email thành công!');
						} else if(response.error != undefined) {
							$.each(response, function(i, items) {
								$('#MailForm_'+i+'_em_').html(items[0]);
								$('#MailForm_'+i+'_em_').css('display', 'block');
							});
						}
					},
				 	dataType:'json'
				 });
			}			
		}	

--></script>
