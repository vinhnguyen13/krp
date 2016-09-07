<?php
/* @var $this ArticleController */
/* @var $model Article */
/* @var $form CActiveForm */
?>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'article-form',
	'enableAjaxValidation'=>false,
	'htmlOptions' => array('enctype'=>'multipart/form-data')
)); ?>
<?php echo $form->errorSummary($model); ?>
<div class="tabs language-art">
<?php
$cri = new CDbCriteria();
$cri->addCondition('is_default = 0');
$cri->order = 'is_default DESC';
$languages = Language::model()->findAll($cri);
$languageDefault = Language::model()->find("is_default = 1");
if(!empty($languages)){

$modelTransDefault = ArticleTranslation::model()->findByAttributes(array('article_id'=>$model->id, 'language_code'=>$languageDefault->code));
?>
<ul>
	<li class="active"><a href="#" data-toggle="tab" data-target="#language-id-<?php echo $languageDefault->code;?>"><?php echo $languageDefault->title;?></a></li>
<?php
	foreach ($languages as $language){
?>
	<li><a href="#" data-toggle="tab" data-target="#language-id-<?php echo $language->code;?>"><?php echo $language->title;?></a></li>
<?php }?>
</ul>
<?php }?>
</div>
	<div class="form">
	<p class="note">Fields with <span class="required">*</span> are required.</p>
	<div class="tabs-content active" id="language-id-<?php echo $languageDefault->code;?>">
		<div class="col-left">
			<div class="block">
				<h2><?php echo $form->labelEx($model,'title'); ?></h2>
				<div class="input-wrap">
				<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>500, 'value'=>!empty($modelTransDefault->title) ? $modelTransDefault->title : '')); ?>
				<?php echo $form->error($model,'title'); ?>
				</div>
			</div>

			<div class="block">
				<h2><?php echo $form->labelEx($model,'description'); ?></h2>
				<div class="input-wrap">
				<?php
				$this->widget('application.extensions.tinymce.TinyMce', array(
						'model' => $model,
						'attribute' => 'description',
						'fileManager' => array(
								'class' => 'application.extensions.elFinder.TinyMceElFinder',
								'connectorRoute'=> Yii::app()->createUrl('//../elfinder/connector'),
						),
						'htmlOptions' => array(
								'rows' => 20,
								'cols' => 60,
						),
				));
				?>
				<?php //echo $form->textArea($model,'description',array('rows'=>4,'cols'=>56, 'value'=>!empty($modelTransDefault->description) ? $modelTransDefault->description : '')); ?>
				<?php echo $form->error($model,'description'); ?>
				</div>
			</div>

			<div class="block">
				<h2><?php echo $form->labelEx($model,'extra_description'); ?></h2>
				<div class="input-wrap">
					<?php echo $form->textArea($model,'extra_description',array('rows'=>20,'cols'=>300, 'value'=>!empty($modelTransDefault->extra_description) ? $modelTransDefault->extra_description : '')); ?>
					<?php echo $form->error($model,'extra_description'); ?>
				</div>
			</div>

			<div class="block clearfix">
					<h2><?php echo $form->labelEx($model,'thumbnail'); ?> (400 x 300)</h2>
					<div class="input-wrap clearfix">
						<div class="tmb-wrap">
						<?php echo CHtml::activeFileField($model, 'thumbnail'); ?>
						<?php echo $form->hiddenField($model, 'thumbnail'); ?>
						</div>
						<div class="tmb-temp">
						<?php if(isset($model->thumbnail)) { ?>
							<?php echo $model->getImageThumbnail(array('height' => '100px')); ?>
						<?php } ?>
						</div>
						<?php echo $form->error($model,'thumbnail2'); ?>
					</div>
			</div>
			<div class="block clearfix">
					<h2><?php echo $form->labelEx($model,'thumbnail2'); ?> (400 x 300)</h2>
					<div class="input-wrap clearfix">
						<div class="tmb-wrap">
						<?php echo CHtml::activeFileField($model, 'thumbnail2'); ?>
						<?php echo $form->hiddenField($model, 'thumbnail2'); ?>
						</div>
						<div class="tmb-temp">
						<?php if(isset($model->thumbnail2)) { ?>
							<?php echo $model->getImageThumbnail2(array('height' => '100px')); ?>
						<?php } ?>
						</div>
						<?php echo $form->error($model,'thumbnail2'); ?>
					</div>
			</div>
			<div class="block clearfix">
					<h2><?php echo $form->labelEx($model,'thumbnail_slide'); ?> (679 x 334)</h2>
					<div class="input-wrap clearfix">
						<div class="tmb-wrap">
						<?php echo CHtml::activeFileField($model, 'thumbnail_slide'); ?>
						<?php echo $form->hiddenField($model, 'thumbnail_slide'); ?>
						</div>
						<div class="tmb-temp">
						<?php if(isset($model->thumbnail_slide)) { ?>
							<?php echo $model->getImageSlide(array('height' => '334px', 'width' => '679px')); ?>
						<?php } ?>
						</div>
						<?php echo $form->error($model,'thumbnail_slide'); ?>
					</div>
			</div>
            <div class="block clearfix">
               <h2> <?php echo $form->labelEx($model,'tags'); ?></h2>
			   <div class="input-wrap clearfix">
                <?php
                $this->widget('CAutoComplete', array(
                    'name' => 'tags',
                    'value' => $model->mtags->toString(),
                    'url'=> $this->createAbsoluteUrl('/news/article/tags'), //path to autocomplete URL
                    'multiple'=>true,
                    'mustMatch'=>false,
                    'matchCase'=>false,
                    'inputClass' => 'textbox',
                    'htmlOptions' => array(
                        'style' => "width:81%"
                    )
                )) ?>
				</div>
            </div>
			<div class="block market">
				<h2><?php echo CHtml::label('Market Available', 'product'); ?></h2>
				<?php
				$locationVal = array();
				$shopByLocation = '';
				if(!empty($model->shops)){
					foreach ($model->shops as $shop){
						$locationVal[] = $shop->location->id;
						$shopByLocation .= '<div class="listShop_'.$shop->brand->company->city_id.'">'.CHtml::checkBox('shop_id[]', true, array('class'=>'CBShop', 'value'=>$shop->id)).' <label for="shop_id">'.$shop->title.'</label>'.'</div>';
					}
				}
				?>
				<div class="market-list">
						<ul>
						<?php echo CHtml::checkBoxList('location', $locationVal, CHtml::listData( ProLocation::model()->findAll(), 'id', 'city_name'), array('class'=>'CBlocation', 'template' => '<li>{label} {input}</li>', 'separator'=>false, 'container'=>false)); ?>
						</ul>
				</div>
				<div class="input-wrap market-brand">
				</div>
				<div class="input-wrap market-shop">
						<?php echo $shopByLocation;?>
				</div>
			</div>
			<div class="block clearfix">
					<h2><?php echo $form->labelEx($model,'body'); ?>
				<?php
					$model->body = !empty($modelTransDefault->body) ? $modelTransDefault->body : '';
					$this->widget('application.extensions.tinymce.TinyMce', array(
						'model' => $model,
						'attribute' => 'body',
						'fileManager' => array(
							'class' => 'application.extensions.elFinder.TinyMceElFinder',
							'connectorRoute'=> Yii::app()->createUrl('//../elfinder/connector'),
						),
						'htmlOptions' => array(
							'rows' => 20,
							'cols' => 60,
							'id' => 'body',
							'name' => 'Article[body]',
						),
					));
				?>
				<?php echo $form->error($model,'body'); ?>
			</div>
            <div class="restaurant-section">
                <div class="block clearfix">
                    <div class="block clearfix">
                        <h2><?php echo $form->labelEx($model,'res_city'); ?>
                            <div class="input-wrap">
                                <?php echo $form->textField($model,'res_city',array('size'=>60,'maxlength'=>500)); ?>
                                <?php echo $form->error($model,'res_city'); ?>
                            </div>
                    </div>
                    <div class="block clearfix">
                        <h2><?php echo $form->labelEx($model,'res_district'); ?>
                            <div class="input-wrap">
                                <?php echo $form->textField($model,'res_district',array('size'=>60,'maxlength'=>500)); ?>
                                <?php echo $form->error($model,'res_district'); ?>
                            </div>
                    </div>
                    <h2><?php echo $form->labelEx($model,'res_address'); ?>
                    <div class="input-wrap">
                        <?php echo $form->textField($model,'res_address',array('size'=>60,'maxlength'=>500)); ?>
                        <?php echo $form->error($model,'res_address'); ?>
                    </div>
                </div>
                <div class="block clearfix">
                    <h2><?php echo $form->labelEx($model,'res_hotline'); ?>
                    <div class="input-wrap">
                        <?php echo $form->textField($model,'res_hotline',array('size'=>60,'maxlength'=>500)); ?>
                        <?php echo $form->error($model,'res_hotline'); ?>
                    </div>
                </div>
                <div class="block clearfix">
                    <h2><?php echo $form->labelEx($model,'res_year'); ?>
                        <div class="input-wrap">
                            <?php echo $form->textField($model,'res_year',array('size'=>60,'maxlength'=>500)); ?>
                            <?php echo $form->error($model,'res_year'); ?>
                        </div>
                </div>

                <div class="block clearfix">
                    <h2><?php echo $form->labelEx($model,'res_website'); ?>
                        <div class="input-wrap">
                            <?php echo $form->textField($model,'res_website',array('size'=>60,'maxlength'=>500)); ?>
                            <?php echo $form->error($model,'res_website'); ?>
                        </div>
                </div>
                <div class="block clearfix">
                    <h2><?php echo $form->labelEx($model,'res_setting'); ?>
                        <ul>
                            <?php
                            if($model->res_setting!=""){
                                $model->res_setting=explode(",",$model->res_setting);
                                echo ZHtml::enumCheckBoxList($model,'res_setting',array('class'=>'CBLocation', 'template' => '<li>{label} {input}</li>', 'separator'=>false, 'container'=>false));
                            }
                            ?>
                        </ul>
                </div>
                <div class="block clearfix">
                    <h2><?php echo $form->labelEx($model,'res_cuisine'); ?>
                        <ul>
                            <?php
                            if($model->res_setting!="") {
                                $model->res_cuisine = explode(",", $model->res_cuisine);
                                echo ZHtml::enumDropDownList($model, 'res_cuisine', array('class' => 'CBLocation', 'template' => '<li>{label} {input}</li>', 'separator' => false, 'container' => false, 'multiple' => 'multiple'));
                            }
                            ?>
                        </ul>
                </div>
                <div class="block clearfix">
                    <h2><?php echo $form->labelEx($model,'res_rating'); ?>
                        <ul class="containerUl">
                            <?php echo ZHtml::enumRadioList($model,'res_rating',array('class'=>'CBLocation', 'template' => '<li>{label} {input}</li>', 'separator'=>false, 'container'=>false)); ?>
                        </ul>
                </div>
                <div class="block clearfix">
                    <h2><?php echo $form->labelEx($model,'res_open_hour'); ?>
                    <div class="input-wrap input-time">
                        <?php
                        //$model->res_open_hour= date('Y-m-d')." ".$model->res_open_hour.":00";
                        ?>
                        <?php $this->widget('application.extensions.timepicker.timepicker', array('select'=>'time','model'=> $model, 'name'=>'res_open_hour','skin'=>'time', 'options' => array('timeFormat'=>'hh:mm')));?>
                        <?php echo $form->error($model,'res_open_hour'); ?>
                    </div>
                </div>
                <div class="block clearfix">
                    <h2><?php echo $form->labelEx($model,'res_closed_hour'); ?>
                    <div class="input-wrap input-time">
                        <?php
                        //$model->res_closed_hour= date('Y-m-d')." ".$model->res_closed_hour;
                        ?>
                        <?php $this->widget('application.extensions.timepicker.timepicker', array('select'=>'time','model'=> $model, 'name'=>'res_closed_hour','skin'=>'time', 'options' => array('timeFormat'=>'hh:mm')));?>
                        <?php echo $form->error($model,'res_closed_hour'); ?>
                    </div>
                </div>
                <div class="block clearfix">
                    <h2><?php echo $form->labelEx($model,'res_dress_code'); ?>
                        <ul class="containerUl">
                            <?php echo ZHtml::enumRadioList($model,'res_dress_code',array('class'=>'CBLocation',  'separator'=>false, 'container'=>false)); ?>
                        </ul>
                </div>
                <div class="block clearfix">
                    <h2><?php echo $form->labelEx($model,'res_private_room'); ?>
                        <ul class="containerUl">
                            <?php echo ZHtml::enumRadioList($model,'res_private_room',array('class'=>'CBLocation', 'separator'=>false, 'container'=>false)); ?>
                        </ul>
                </div>
                <div class="block clearfix">
                    <h2><?php echo $form->labelEx($model,'res_car_park'); ?>
                        <ul class="containerUl">
                            <?php echo ZHtml::enumRadioList($model,'res_car_park',array('class'=>'CBLocation', 'separator'=>false, 'container'=>false)); ?>
                        </ul>
                </div>

                <div class="block clearfix">
                    <h2><?php echo $form->labelEx($model,'res_smoking_area'); ?>
                        <ul class="containerUl">
                            <?php echo ZHtml::enumRadioList($model,'res_smoking_area',array('class'=>'CBLocation', 'separator'=>false, 'container'=>false)); ?>
                        </ul>
                </div>
                <div class="block clearfix">
                    <h2><?php echo $form->labelEx($model,'res_price'); ?>
                        <ul class="containerUl">
                            <?php echo ZHtml::enumRadioList($model,'res_price',array('class'=>'CBLocation', 'template' => '<li>{label} {input}</li>', 'separator'=>false, 'container'=>false)); ?>
                        </ul>
                </div>
            </div>
			<div class="block buttons">
				<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'btn btn-primary')); ?>
			</div>

	</div>
	<div class="col-right">
		<div class="block">
			<h2><?php echo $form->labelEx($model,'layout'); ?></h2>
			<div class="input-wrap">
			<?php echo CHtml::activeDropDownList($model, 'layout', array('1' => 'Default', '2' => 'Video','3' => 'Restaurant','4' => 'Feature','5'=>'News & Promo','6'=> 'Most Popular','7'=>'People')); ?>
			<?php echo $form->error($model,'layout'); ?>
			</div>
		</div>
		<div class="block">
			<h2><?php echo $form->labelEx($model,'ispublic'); ?></h2>
			<div class="input-wrap">
			<?php echo $form->radioButtonList($model, 'ispublic', array(1 => 'Yes', 0 => 'No'), array('separator' => '')); ?>
			<?php echo $form->error($model,'ispublic'); ?>
			</div>
		</div>
		<div class="block">
           <h2> <?php echo $form->labelEx($model,'author_name'); ?></h2>
		   <div class="input-wrap">
            <?php
            $this->widget('zii.widgets.jui.CJuiAutoComplete',array(
                    'model'=>$model,
                    'attribute'=>'author_name',
                    'name'=>'author',
                    'source'=>$this->createUrl('/news/article/users'),
                    'options'=>array(
                            'minLength'=>'2',
                            'select'=>"js:function(event, ui) {
                                          //$('#gallery_id').val(ui.item.id);
                                        }"
                    ),
                    'htmlOptions'=>array(
                            'style'=>'height:20px;',
                    ),
            ));
            ?>
			</div>
        </div>
		<div class="block">
			<h2><?php echo $form->labelEx($model,'featured'); ?></h2>
			<div class="input-wrap">
			<?php echo $form->radioButtonList($model, 'featured', array(1 => 'Yes', 0 => 'No'), array('separator' => '')); ?>
			<?php echo $form->error($model,'featured'); ?>
			</div>
		</div>

		<div class="block">
			<h2><?php echo $form->labelEx($model,'public_time'); ?></h2>
			<div class="input-wrap input-time">
			<?php $this->widget('application.extensions.timepicker.timepicker', array('model'=> $model, 'name'=>'public_time', 'options' => array('timeFormat'=>'hh:mm:ss')));?>
			<?php echo $form->error($model,'public_time'); ?>
			</div>
		</div>

		<div class="block">
			<h2><?php echo $form->labelEx($model,'type'); ?></h2>
			<div class="input-wrap">
			<?php echo $form->radioButtonList($model, 'type', array(1 => 'Post', 2 => 'Static Page'), array('separator' => '')); ?>
			<?php echo $form->error($model,'type'); ?>
			</div>
		</div>

		<div class="block">
			<h2><?php echo $form->labelEx($model,'sections'); ?></h2>
			<div class="input-wrap">
			<?php echo CHtml::activeDropDownList($model, 'sections', CHtml::listData( Section::model()->findAll(array('order' => 'displayorder ASC')), 'id', 'title' ), array('multiple' => true, 'empty' => '-- Select Sections --')); ?>
			<?php echo $form->error($model,'sections'); ?>
			</div>
		</div>

		<div class="block">
			<h2><?php echo $form->labelEx($model,'categories'); ?></h2>
			<div class="input-wrap">
			<?php

				$category = (isset($model->sections[0]->id) ? Category::model()->getCategories($model->sections[0]->id) : Category::model()->getCategories(0));
			?>
			<?php echo CHtml::activeDropDownList($model, 'categories', CHtml::listData( $category, 'id', 'title'),array('template'=>'{label}{input}', 'multiple' => true, 'empty' => '-- Select Categories --'));?>
			<?php echo $form->error($model,'categories'); ?>
			</div>
		</div>

		<div class="block">
			<h2><?php echo CHtml::label('Product Name', 'product'); ?></h2>
			<div class="input-wrap">
			<?php
			$product = new ProProducts();
			$productVal = '';
			if(!empty($model->product)){
				$productVal = $model->product->product_name;
			}

			?>
			<?php echo CHtml::textField('product_name', $productVal,array('size'=>60,'maxlength'=>500)); ?>
			</div>
		</div>

		<div class="block">
			<h2><?php echo CHtml::label('Product Price', 'product'); ?></h2>
			<div class="input-wrap">
			<?php
			$product = new ProProducts();
			$productVal = '';
			if(!empty($model->product)){
				$productVal = $model->product->product_price;
			}

			?>
			<?php echo CHtml::textField('product_price', $productVal,array('size'=>60,'maxlength'=>500)); ?>
			</div>
		</div>

		<div class="block">
			<h2><?php echo CHtml::label('Gallery', 'gallery'); ?></h2>
			<div class="input-wrap">
			<?php
			$gallery = new Gallery();
			if(!empty($model->galleries)){
				$gallery = $model->galleries[0];
			}
			$this->widget('zii.widgets.jui.CJuiAutoComplete',array(
					'model'=>$gallery,
					'attribute'=>'name',
					'name'=>'shop',
					'source'=>$this->createUrl('/news/article/galleries'),
					'options'=>array(
						'minLength'=>'2',
						'select'=>"js:function(event, ui) {
                                          $('#gallery_id').val(ui.item.id);
                                        }"
					),
					'htmlOptions'=>array(
						'style'=>'height:20px;',
					),
			));
			?>
			<?php echo CHtml::hiddenField('gallery_id', '', array()); ?>
			</div>
		</div>
		<div class="block">
			<h2><?php echo $form->labelEx($model,'html_title'); ?></h2>
			<div class="input-wrap">
			<?php echo $form->textField($model,'html_title'); ?>
			<?php echo $form->error($model,'html_title'); ?>
			</div>
		</div>

		<div class="block">
			<h2><?php echo $form->labelEx($model,'meta_description'); ?></h2>
			<div class="input-wrap">
			<?php echo $form->textField($model,'meta_description'); ?>
			<?php echo $form->error($model,'meta_description'); ?>
			</div>
		</div>

		<div class="block">
			<h2><?php echo $form->labelEx($model,'meta_keywords'); ?></h2>
			<div class="input-wrap">
			<?php echo $form->textField($model,'meta_keywords'); ?>
			<?php echo $form->error($model,'meta_keywords'); ?>
			</div>
		</div>
	</div>
</div>
<!-- tab 1 -->
<?php if(!empty($languages)){?>
<?php
	foreach ($languages as $language){
		$modelTrans = ArticleTranslation::model()->findByAttributes(array('article_id'=>$model->id, 'language_code'=>$language->code));
		if(empty($modelTrans)){
			$modelTrans = new ArticleTranslation();
		}

?>
<div class="tabs-content" id="language-id-<?php echo $language->code;?>">
	<div class="col-left">
		<div class="block">
			<h2><?php echo $form->labelEx($modelTrans,'title'); ?></h2>
			<div class="input-wrap">
			<?php echo $form->textField($modelTrans,'title',array('size'=>60,'maxlength'=>500, 'name'=>'ArticleTranslation['.$language->code.'][title]')); ?>
			<?php echo $form->error($modelTrans,'title'); ?>
			</div>
		</div>

		<div class="block">
			<h2><?php echo $form->labelEx($modelTrans,'description'); ?></h2>
			<div class="input-wrap">
			<?php
				$this->widget('application.extensions.tinymce.TinyMce', array(
					'model' => $modelTrans,
					'attribute' => 'description',
					'fileManager' => array(
						'class' => 'application.extensions.elFinder.TinyMceElFinder',
						'connectorRoute'=> Yii::app()->createUrl('//../elfinder/connector'),
					),
					'htmlOptions' => array(
						'rows' => 10,
						'cols' => 60,
						'id' => 'description_'.$language->code,
						'name' => 'ArticleTranslation['.$language->code.'][description]',
					),
				));
			?>
			<?php //echo $form->textArea($modelTrans,'description',array('rows'=>4,'cols'=>56, 'name'=>'ArticleTranslation['.$language->code.'][description]')); ?>
			<?php echo $form->error($modelTrans,'description'); ?>
			</div>
		</div>

		<div class="block">
			<h2><?php echo $form->labelEx($modelTrans,'extra_description'); ?></h2>
			<div class="input-wrap">
				<?php echo $form->textArea($modelTrans,'extra_description',array('rows'=>10,'cols'=>60, 'name'=>'ArticleTranslation['.$language->code.'][extra_description]')); ?>
				<?php echo $form->error($modelTrans,'extra_description'); ?>
			</div>
		</div>
		<div class="block">
			<h2><?php echo $form->labelEx($modelTrans,'body'); ?>
			<?php
				$this->widget('application.extensions.tinymce.TinyMce', array(
					'model' => $modelTrans,
					'attribute' => 'body',
					'fileManager' => array(
						'class' => 'application.extensions.elFinder.TinyMceElFinder',
						'connectorRoute'=> Yii::app()->createUrl('//../elfinder/connector'),
					),
					'htmlOptions' => array(
						'rows' => 20,
						'cols' => 60,
						'id' => 'body_'.$language->code,
						'name' => 'ArticleTranslation['.$language->code.'][body]',
					),
				));
			?>
			<?php echo $form->error($modelTrans,'body'); ?>
		</div>
		<div class="block buttons">
				<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'btn btn-primary')); ?>
			</div>
	</div>
</div>
<?php }?>
<?php }?>
<!-- tab 3 -->
<?php $this->endWidget(); ?>

</div><!-- form -->

<style>
    .containerUl li{
        float:left;
        padding: 0 5px 0 5px;
    }
</style>
<script type="text/javascript">
$(function() {
	$("#Article_sections").change(function(){
		if($(this).val() != '') {
			$("#Article_categories option").remove();
			var url = "<?php echo str_replace("/", "\/", Yii::app()->createUrl('//news/article/loadCategories')); ?>";
			$.ajax({
				type: "GET",
				url: url + '/id/' + $(this).val() ,
				//data: { id: $(this).val()}
			}).done(function( response ) {
				data = $.parseJSON(response);
				$.each(data, function(index, optionData)
		        {
					$('#Article_categories').append(
							$('<option></option').val(index).html(optionData)
					);
		        });
				$(".layout").removeClass('hidden');
			});
		}
		else {
			$(".layout").addClass('hidden');
			$("#Article_categories option:selected").remove();
		}
	});

	$('.CBlocation').live('click', function(){
		if ( $(this).is(':checked') ) {
			$('body').loading();
			$.ajax({
				type: "POST",
				url: '<?php echo Yii::app()->createUrl('//news/article/brands')?>' ,
				data: { lid: $(this).val()}
			}).done(function( response ) {
				$(".market-brand").append(response);
				$('body').unloading();
			});
		}else{
			$(".listBrand_" + $(this).val()).remove();
		}
	});

	$('.lstBrand').live('change', function(){
		$('body').loading();
		$(".market-shop").html('');
		//$(".location_" + $(this).attr('data-location')).remove();
		$.ajax({
			type: "POST",
			url: '<?php echo Yii::app()->createUrl('//news/article/shops')?>' ,
			data: { bid: $(this).val(), lid: $(this).attr('data-location')}
		}).done(function( response ) {
			$(".market-shop").append(response);
			$('body').unloading();
		});
	});


    <?php
     if($model->layout==3){
     ?>
    $(".restaurant-section").show();
    <?
     }else{
     ?>
    $(".restaurant-section").hide();
    <?php
     }
     ?>

    $('#Article_layout').on('change', function (e) {
        var optionSelected = $("option:selected", this);
        var valueSelected = this.value;
        if(valueSelected==3){
            $(".restaurant-section").show();
        }else{
            $(".restaurant-section").hide();
        }

    });

});
</script>
