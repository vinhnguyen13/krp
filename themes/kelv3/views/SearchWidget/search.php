<?php $form=$this->beginWidget('CActiveForm', array(
			'action'=>Yii::app()->createUrl('/article/search'),
			'method'=>'get',
)); ?>
    <input type="text" placeholder="<?php echo Lang::t('general', 'Keyword');?>" name="keyword" />
    <button type="submit" id="btn-search"><i class="fa fa-search" aria-hidden="true"></i></button>
<?php $this->endWidget(); ?>