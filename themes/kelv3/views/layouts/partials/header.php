<?php 
$user = Yii::app()->user->data();
?>
<header>
    <div class="ads-top-header">
        <div class="inner-item container">
            <a href="#" class="logo"><img src="<?php echo Yii::app()->theme->baseUrl;?>/resources/html/images/logo.png" alt=""></a>
            <?php $this->widget('frontend.widgets.home.AdsTopWidget',array('position'=>'TOP')); ?>
            <div class="social-header">
                <ul class="clearfix">
                    <li class="dropdown-emu gr-user-auth">
                        <a href="#" class="icon-social user-auth item-click"><i class="fa fa-user" aria-hidden="true"></i></a>
                        <div class="item-drop arrow-drop">
                            <ul>
                                <?php if(Yii::app()->user->isGuest){?>
                                    <li><a href="#" data-toggle="modal" data-target="#popup-login-form"><?php echo Lang::t('general', 'Login'); ?></a></li>
                                    <li><a href="#" data-toggle="modal" data-target="#popup-sign-up">Sign up</a></li>
                                <?php }else{?>

                                    <li><a href="<?php echo Yii::app()->user->data()->getUserUrl();?>"><?php echo Yii::app()->user->data()->getDisplayName();?></a></li>
                                    <li><a href="<?php echo Yii::app()->createUrl('//site/logout')?>">Sign out</a></li>
                                <?php }?>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a href="<?php echo Yii::app()->createUrl('//site/facebook')?>" class="icon-social"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                    </li>
                    <li>
                        <a href="#" class="icon-social"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a>
                    </li>
                    <li>
                        <a href="#" class="icon-social"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
	<div class="container clearfix header-top">
		<div class="text-center">
			<a href="<?php echo Yii::app()->homeUrl?>" class="logo"><img src="<?php echo Yii::app()->theme->baseUrl;?>/resources/html/images/logo.png" alt="" /></a>
		</div>
		<div class="social-header">
			<ul class="clearfix">
				<li class="dropdown-emu gr-user-auth">
					<a href="#" class="icon-social user-auth item-click"><i class="fa fa-user" aria-hidden="true"></i></a>
					<div class="item-drop arrow-drop">
						<ul>
							<?php if(Yii::app()->user->isGuest){?>
								<li><a href="#" data-toggle="modal" data-target="#popup-login-form"><?php echo Lang::t('general', 'Login'); ?></a></li>
								<li><a href="#" data-toggle="modal" data-target="#popup-sign-up">Sign up</a></li>
							<?php }else{?>

								<li><a href="<?php echo Yii::app()->user->data()->getUserUrl();?>"><?php echo Yii::app()->user->data()->getDisplayName();?></a></li>
								<li><a href="<?php echo Yii::app()->createUrl('//site/logout')?>">Sign out</a></li>
							<?php }?>
						</ul>
					</div>
				</li>
				<li>
					<a href="<?php echo Yii::app()->createUrl('//site/facebook')?>" class="icon-social"><i class="fa fa-facebook" aria-hidden="true"></i></a>
				</li>
				<li>
					<a href="#" class="icon-social"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a>
				</li>
				<li>
					<a href="#" class="icon-social"><i class="fa fa-instagram" aria-hidden="true"></i></a>
				</li>
			</ul>
		</div>
	</div>
	<div class="menu">
		<div class="container">
			<a href="#" class="toggle-menu"><i class="fa fa-bars" aria-hidden="true"></i></a>
			<div class="pull-right">
				<div class="search-bar pull-left dropdown-emu">
					<a href="#" class="btn-search-header item-click"><i class="fa fa-search" aria-hidden="true"></i></a>
					<div class="item-drop arrow-drop">
                        <?php $this->widget('frontend.widgets.home.SearchWidget'); ?>
					</div>
				</div>
				<?php
				$languages = Language::model()->findAllByAttributes(array('enable'=>true));
				$languageDefault = Language::model()->findByAttributes(array('code'=>Yii::app()->language));
				if(!empty($languages)){
					$style = '';
					if($languageDefault->code == VLang::LANG_VI){
						//$style = 'style="background-position: 0px -38px;"';
						$current_code='vn';
					}else{
						$current_code='us';
					}
					?>

					<div class="lang pull-left dropdown-emu">
						<a href="#" class="flag-<?php echo $current_code; ?> flag-country item-click"><span></span><i class="fa fa-caret-down" aria-hidden="true"></i></a>
						<div class="item-drop arrow-drop">
							<ul>
								<?php foreach ($languages as $language){
									if($language->code=='vi'){
										$code='vn';
									}else{
										$code='us';
									}
									?>
									<li><a href="<?php echo Yii::app()->createUrl('//site/lang', array('_lang'=>$language->code))?>">
											<img src="<?php echo Yii::app()->theme->baseUrl;?>/resources/html/images/flag-<?php echo $code; ?>.jpg" alt="" />
										</a>
									</li>
								<?php }?>
							</ul>
						</div>
					</div>
				<?php }?>
			</div>
			<?php $this->widget('frontend.widgets.home.MenuWidget'); ?>
		</div>
	</div>
</header>
