<div class="search">
	<div class="input-wrap">
		<?php $form=$this->beginWidget('CActiveForm', array(
			'action'=>Yii::app()->createUrl('/article/search'),
			'method'=>'get',
		)); ?>
		<input type="text" value="" name="keyword" class="" placeholder="Search..."/>
		<input type="submit" value="" name="" class=""/>
		<?php $this->endWidget(); ?>
	</div>
</div>
