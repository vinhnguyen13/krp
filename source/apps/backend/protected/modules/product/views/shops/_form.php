<?php
/* @var $this ShopsController */
/* @var $model ProShops */
/* @var $form CActiveForm */
?>

<div class="form form-simple">
<div class="col-left">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'pro-shops-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
	
	<div class="block">
		<h2><?php echo $form->labelEx($model,'brand_id'); ?></h2>
		<div class="input-wrap">
		<?php echo $form->dropDownList($model, 'brand_id', CHtml::listData( ProBrands::model()->findAll(), 'id', 'title' ), array('empty' => '-- Select Brand --')); ?>
		<?php echo $form->error($model,'brand_id'); ?>
		</div>
	</div>
	
	<div class="block">
		<h2><?php echo $form->labelEx($model,'title'); ?></h2>
		<div class="input-wrap">
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'title'); ?>
		</div>
	</div>
	<div class="block">
		<h2><?php echo $form->labelEx($model,'address'); ?></h2>
		<div class="input-wrap">
		<?php echo $form->textField($model,'address',array('size'=>60,'maxlength'=>500)); ?>
		<?php echo $form->error($model,'address'); ?>
		</div>
	</div>
	<div class="block">
		<h2><?php echo $form->labelEx($model,'phone'); ?></h2>
		<div class="input-wrap">
		<?php echo $form->textField($model,'phone',array('size'=>60,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'phone'); ?>
		</div>
	</div>
	<div class="block">
		<h2><?php echo $form->labelEx($model,'email'); ?></h2>
		<div class="input-wrap">
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'email'); ?>
		</div>
	</div>
	<div class="block">
		<h2><?php echo $form->labelEx($model,'website'); ?></h2>
		<div class="input-wrap">
		<?php echo $form->textField($model,'website',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'website'); ?>
		</div>
	</div>

	<div class="block">
		<h2><?php echo $form->labelEx($model,'description'); ?></h2>
		<div class="input-wrap">
		<?php echo $form->textField($model,'description',array('size'=>60,'maxlength'=>500)); ?>
		<?php echo $form->error($model,'description'); ?>
		</div>
	</div>
	
	<div class="block clearfix hidden">
               <h2> <?php echo $form->labelEx($model,'products'); ?></h2>
			   <div class="input-wrap clearfix">
                <?php
				$this->widget('zii.widgets.jui.CJuiAutoComplete',array(
						'model'=>$model,
						'attribute'=>'products',
						'name'=>'products',
						'source'=>$this->createAbsoluteUrl('/product/shops/products'),
						'options'=>array(
							'minLength'=>'2',
							'select'=>"js:function(event, ui) {
									var html = $('.products-selected').html();
									html +=	'<div class=\"item-'+ui.item.id+'\">';
									html +=	'<label>'+ui.item.label+'</label><a class=\"del\">x</a>';
									html +=	'<input type=\"hidden\" class=\"product_id\" name=\"product_id[]\" value=\"'+ui.item.id+'\">';
									html +=	'</div>';
								  	$('.products-selected').html(html);
							}"
						),
						'htmlOptions'=>array(
							'style'=>'height:20px;',
							'value'=>'',
						),
				));
				?>
				</div>
				<div class="products-selected">
					<?php if(!empty($model->products)){
						$products = explode(',', $model->products);
						foreach ($products as $product){
							$pro = ProProducts::model()->findByPk($product);
					?>
						<div class="item-<?php echo $pro->id;?>">
							<label><?php echo $pro->title;?></label><a href="javascript:void(0)" rel="<?php echo $pro->id;?>" class="del">x</a>
							<input type="hidden" value="<?php echo $pro->id;?>" name="product_id[]" class="product_id">
						</div>
					<?php }?>
					<?php }?>
				</div>
	</div>
            
	<div class="block buttons buttons-left">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'btn btn-primary')); ?>
		<?php echo CHtml::submitButton('Save & Continue', array('class'=>'btn btn-primary saveContinue')); ?>
	</div>
</div>
<?php $this->endWidget(); ?>

</div><!-- form -->
					
<script>
$(function(){
	
	$('#ProShops_city_id').live( "change", function() {
		var city_id = $(this).val();
		if(city_id){
			$.ajax({
				type: "POST",
				url: "/admin/product/shops/getdistrict",
				data: {'city_id': city_id},
				dataType: 'html',
				success: function( response ) {
					$('#ProShops_district_id').replaceWith(response);
				}
			});
		}
	});

	$(".products-selected .del").live("click", function(event){
		var pro = $(this).attr('rel');
		$(this).closest(".item-"+pro).remove();
	});

	$('.saveContinue').live('click', function(){
		$("#pro-shops-form").attr("action", $("#pro-shops-form").attr("action") + '?flg=true');
		
	});
		
});
</script>					