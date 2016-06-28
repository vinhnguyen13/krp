<div id="headertop" class="clearfix">
	<div id="logo">
	<a href="<?php echo Yii::app()->homeUrl; ?>">
		<img src="<?php echo Yii::app()->theme->baseUrl; ?>/resources/images/logo.png" alt="" border=""/>
	</a>
	</div>
	<div id="mainmenu">
		<?php 
		$active1 = (!empty(Yii::app()->controller->module->id) && Yii::app()->controller->module->id == 'TranslatePhpMessage') ?  true : false;
		$active2 = (!empty(Yii::app()->controller->module->id) && Yii::app()->controller->module->id == 'gallerymanager') ?  true : false;
		$active3 = (!empty(Yii::app()->controller->module->id) && Yii::app()->controller->module->id == 'product') ?  true : false;
		$active4 = (!empty(Yii::app()->controller->id) && Yii::app()->controller->id == 'language') ?  true : false;
		$active4_1 = (!empty(Yii::app()->controller->module->id) && Yii::app()->controller->module->id == 'ads') ?  true : false;
		$active5 = (!empty(Yii::app()->controller->module->id) && Yii::app()->controller->module->id == 'srbac') ?  true : false;
		$active6 = (!empty(Yii::app()->controller->module->id) && Yii::app()->controller->module->id == 'systems/comment') ?  true : false;
		$active7 = (!empty(Yii::app()->controller->module->id) && Yii::app()->controller->module->id == 'systems/contactForm') ?  true : false;
		$active8 = (!empty(Yii::app()->controller->module->id) && Yii::app()->controller->module->id == 'ReportingTool') ?  true : false;
		$this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'Home', 'url'=>array('//site/index')),
				array('label'=>'Translate', 'url'=>array('//TranslatePhpMessage/translate'), 'active'=>$active1),
				array('label'=>'News', 'url'=>array('//news/article/admin')),
				array('label'=>'Slider', 'url'=>array('//news/widget/admin')),
				array('label'=>'Gallery', 'url'=>array('//gallerymanager'), 'active'=>$active2),
				array('label'=>'Products', 'url'=>array('//product/location/admin'), 'active'=>$active3),
				array('label'=>'Language', 'url'=>array('//systems/language/admin'), 'active'=>$active4),
				array('label'=>'Ads', 'url'=>array('//ads/adsZone/admin'), 'active'=>$active4_1),
				array('label'=>'Permission', 'url'=>array('//srbac'), 'active'=>$active5),
				array('label'=>'Comment Control', 'url'=>array('//systems/comment/admin'), 'active'=>$active6),
				array('label'=>'Contact Form', 'url'=>array('//systems/contactForm/admin'), 'active'=>$active7),
				array('label'=>'Reporting Tool', 'url'=>array('//ReportingTool/default'), 'active'=>$active8),
			),
		)); ?>
	</div><!-- mainmenu -->
	<?php if(!Yii::app()->user->isGuest): ?>
	<div id="topuser">
		Welcome <a rel="userMenus" class="anchorclass" href="#"><strong><?php echo Yii::app()->user->name; ?></strong></a>
        <span>|</span> <?php echo CHtml::link("Log out", array('/user/user/logout'))?>
   	</div>
    <?php endif; ?> 
</div>