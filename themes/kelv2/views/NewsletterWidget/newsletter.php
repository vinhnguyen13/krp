<div class="bar-email box-slidebar">
	<h3><?php echo Lang::t('general', 'be an insider'); ?></h3>
	<p><?php echo Lang::t('general', 'From our editors to your inbox. Sign up for our newsletter today.'); ?></p>
	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'subcribe-form',
		'action'=>Yii::app()->createUrl('//site/subscribe'),
		'enableAjaxValidation'=>false,
		'enableClientValidation'=>true,
        'clientOptions'=>array(
        	'validateOnSubmit'=>true,
			'afterValidate'=> 'js:Subcribe'
		),
	)); ?>
	<div>
		<?php echo $form->textField($model,'email', array('placeholder' => Lang::t('general', 'Your email address'))); ?>
		<?php echo CHtml::submitButton('btn-email', array('id' => 'btn-email')); ?>
	</div>
	<?php echo $form->error($model,'email'); ?>
	<?php $this->endWidget(); ?>
</div>

<script type="text/javascript">
function Subcribe(form, data, hasError) {
	if (!hasError) {
		if($('#Subscribe_email').val() == ''){
			Util.popAlertSuccess('<?php echo Lang::t('general', 'Please input a valid email'); ?>', 300);
			
	        setTimeout(function () {
	         $( ".pop-mess-succ" ).pdialog('close');
	        }, 2000);				
		}else{
			
			var item = $("#subcribe-form");
			var data = item.serialize();
			$.ajax({
				type: 'POST',
				url: item.attr('action'),
			  	data:data,
				success:function(response){
					if (response.status != undefined && response.status == true){
						Util.popAlertSuccess(response.message, 300);
						
		    	        setTimeout(function () {
		    	         $( ".pop-mess-succ" ).pdialog('close');
		    	        }, 2000);
		    	        
					} else{
						$.each(response, function(i, items) {
							$("#MessageForm_"+i+"_em_").html(items[0]);
							$("#MessageForm_"+i+"_em_").css('display', 'block');
						});
					}
			    },
			 	dataType:'json'
			 });
		}
	}
}
</script>