<div id="header" class="fullwidth">
	<div class="header-wrap mainw center">
		<div class="left">
			<div class="logo">
				<a href="<?php echo Yii::app()->homeUrl; ?>" title="Kelreport"></a>
			</div>
			<?php $this->beginContent('//layouts/partials/message'); ?><?php $this->endContent(); ?>		
			<div class="search">
				<a class="search-type">
					<span class="salbum"></span>
				</a>
				<form method="get" id="findFormNav" action="<?php echo Yii::app()->createAbsoluteUrl('//search/album') ?>">
					<input class="search-text search-area" name="q" id="findNameNav" type="text">
					<input id="searchButtonNav" class="search-btn" title="Search" type="button">
				</form>
			</div>
			<!-- Search -->
			<!-- 
			<div class="top-info">
				<ul>
					<li><a href="#">Invite key</a></li>
					<li><span class="top-sep"></span></li>
					<li><a href="#">The Tour</a></li>
				</ul>
			</div>
			 -->
			<!-- top info -->
		</div>
		<!-- header left -->
		<div class="right">
			<?php if(Yii::app()->user->isGuest): ?>
				<ul class="topright">
					<li><a href="<?php echo Member::getRegisterUrl(); ?>" class="register">Join now</a><li>
					<li><a href="<?php echo Member::getLoginUrl(); ?>" class="login">Login</a><li>	
				</ul>
			<?php else: ?>
				<ul class="topright">
					<li>
						<a href="<?php echo Member::createUrl('//member/default/view', array('alias' => Yii::app()->user->data()->alias_url)); ?>">
							<img src="<?php echo Yii::app()->user->data()->getAvatar(false, true, PhotoSize::AVATAR_SMALL); ?>" alt="" border="" class="ava42"/>
						</a>	
					</li>
					<li>
						<a href="<?php echo Member::createUrl('//member/default/view', array('alias' => Yii::app()->user->data()->alias_url)); ?>" class="top-user">
							<?php echo Util::partString(Yii::app()->user->data()->getDisplayName(), 0, 30);?>
						</a>
					</li>
					<li class="top-setting">
						<a href="#" class="top-drop"><span class="dropdown-gray"></span></a>
						<div class="top-links">
							<ul>
								<li><a href="<?php echo Member::createUrl('//member/user/profile', array('alias' => Yii::app()->user->data()->alias_url)); ?>">Profile</a></li>
								<li><a href="<?php echo Member::createUrl('//member/default/albums', array('alias' => Yii::app()->user->data()->alias_url)); ?>">Albums</a></li>
								<li><a href="<?php echo Member::createUrl('//member/upload/upload', array('alias' => Yii::app()->user->data()->alias_url)); ?>">Upload</a></li>
								<li><a href="<?php echo Member::createUrl('//member/friends/listfriends', array('alias' => Yii::app()->user->data()->alias_url)); ?>">Friends</a></li>

							</ul>
							<!--  
							<div class="setting-sep"></div>
							<ul>
								<li><a href="#">Earn credits</a></li>
								<li><a href="#">Upgrade</a></li>
								<li><a href="<?php echo Member::createUrl('//member/default/giftcode', array('alias' => Yii::app()->user->data()->alias_url)); ?>">Gift Code</a></li>
							</ul>
							-->
							<div class="setting-sep"></div>
							<ul><li><a href="<?php echo Yii::app()->createAbsoluteUrl('site/logout'); ?>">Logout</a></li></ul>
						</div>
					</li>
				</ul>
			<?php endif; ?>
		</div>
		<!-- header right -->
	</div>
	<!-- header wrap -->
</div>
<!-- header -->