	<?php $form=$this->beginWidget('CActiveForm', array(
			'action'=>Yii::app()->createUrl('/article/search'),
			'method'=>'get',
	)); ?>
    <div class="right search-header">
    	<span class="search-icon icon-common">&nbsp;</span>
            <div class="box-search-show hide">
            	<span class="close_search icon-common icon-touch">&nbsp;</span>
                	<input type="text" placeholder="<?php echo Lang::t('general', 'Keyword');?>" name="keyword" />
                    <input type="submit" id="" class="search-icon icon-common icon-touch" />
            </div>
    </div>
    <?php $this->endWidget(); ?>