<?php $form=$this->beginWidget('CActiveForm', array(
			'action'=>Yii::app()->createUrl('/article/search'),
			'method'=>'get',
)); ?>
<div class="search-box right">
	<input type="text" placeholder="<?php echo Lang::t('general', 'Keyword');?>" name="keyword" />
	<input type="submit" value="" id="btn-search" class="icon_common" />
</div>
<?php $this->endWidget(); ?>