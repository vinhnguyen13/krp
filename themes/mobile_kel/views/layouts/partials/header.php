<header>
	<span class="left icon-common icon-touch" id="wap-menu">&nbsp;</span>
    <?php $this->widget('mobile.widgets.home.SearchWidget'); ?>
    <a class="icon-common" id="logo-header" href="#">&nbsp;</a>
    <div class="menu-top hide">
    	<ul>
    		<?php if(Yii::app()->user->isGuest): ?>
        	<li class="tab-login">
            	<a class="left" href="<?php echo Yii::app()->createUrl('/login'); ?>"><?php echo Lang::t('general', 'Login'); ?></a>
                <a class="right" href="<?php echo Yii::app()->createUrl('/register'); ?>"><?php echo Lang::t('general', 'Sign up'); ?></a>
           	</li>
            <?php else: ?>
            <li class="tab-login login-success">
            	<a class="left" href="<?php echo Yii::app()->user->data()->getUserUrl();?>">Hi <?php echo Yii::app()->user->data()->getDisplayName();?></a>
            	<a class="right icon-common logout-icon" href="<?php echo Yii::app()->createUrl('//site/logout')?>">&nbsp;</a>
            </li>
            <?php endif; ?>
            <?php $this->widget('mobile.widgets.home.MenuWidget'); ?>
            <?php
			$languages = Language::model()->findAllByAttributes(array('enable'=>true));
			$languageDefault = Language::model()->findByAttributes(array('code'=>Yii::app()->language));
			if(!empty($languages)){
			    $style = '';
			    if($languageDefault->code == VLang::LANG_VI){
			        $flag_class = ' flag_vi';
			    }else{
			    	$flag_class = ' flag_en';
			    }
				?>
				<li class="lang-option has-submenu">
					<span class="show-more-menu"><span class="icon-common">&nbsp;</span></span>
					<a href="#" class="selected-lang <?php echo $flag_class;?>"><i class="icon-common">&nbsp;</i><?php echo $languageDefault->title;?></a>
					<div class="block-submenu hide">
						<ul>
						    <?php foreach ($languages as $language){?>
							    <li><a href="<?php echo Yii::app()->createUrl('//site/lang', array('_lang'=>$language->code))?>"><?php echo $language->title?></a></li>
							<?php }?>
						</ul>
					</div>
				</li>
			<?php }?>
        </ul>
    </div>    
    <div class="clear"></div>
</header>