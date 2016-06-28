<!--
<div class="newsletter">
	<?php
/*
$form=$this->beginWidget('CActiveForm', array(
		'id'=>'subcribe-form',
		'action'=>Yii::app()->createUrl('//site/subscribe'),
		'enableAjaxValidation'=>false,
		'enableClientValidation'=>true,
        'clientOptions'=>array(
        	'validateOnSubmit'=>true,
			'afterValidate'=> 'js:Subcribe'
		),
	)); ?>
	<label for="">Subcribe to our free email alerts</label>
	<div class="input-wrap">
		<?php echo $form->textField($model,'email', array('placeholder' => 'Email address')); ?>
		<?php echo CHtml::submitButton(' '); ?>
	</div>
	<?php echo $form->error($model,'email'); ?>
	<?php $this->endWidget();
 */
 ?>
</div>

<script type="text/javascript">
function Subcribe(form, data, hasError) {
	if (!hasError) {
		var item = $("#subcribe-form");
		var data = item.serialize();
		$.ajax({
			type: 'POST',
			url: item.attr('action'),
		  	data:data,
			success:function(response){
				if (response.status != undefined && response.status == true){
					alert(response.message);
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
</script>
-->
<div class="box-letter">
	<div class="clearfix mgB-10">
		<div class="pull-left left-box">
			<span class="font-attitudeL fs-23 mgB-5">newsletter</span>
			<span class="text-uper font-uvnHongB fs-19">Sign Up</span>
		</div>
		<div class="right-box font-uvnHong fs-11 pdT-10">
			<p>Join our list and get the latest </p>
			<p>news Directly in your inbox</p>
		</div>
	</div>
	<form action="">
		<input type="text" class="iput w-100" />
		<button id="btn-letter"></button>
	</form>
</div>