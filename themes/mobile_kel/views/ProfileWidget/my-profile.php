<?php 
$cs = Yii::app()->clientScript;
$cs->registerScriptFile(Yii::app()->theme->baseUrl . '/resources/js/my/profile.js', CClientScript::POS_BEGIN);
$cs->registerScript('Profile_tabFriendsFollowFacebook', "Profile.tabFriendsFollowFacebook();", CClientScript::POS_READY);
$cs->registerScript('Profile_follow', "Profile.follow();", CClientScript::POS_READY);

$urlAvatar = CParams::load()->urlAvatar($this->controller->user->avatar);
$src = CParams::load()->pathAvatar($this->controller->user->avatar);

if(!file_exists($src)){
	$urlAvatar = Yii::app()->createUrl('/public/images/no-user.jpg');
}

$total_following = Following::coutFollowing($this->controller->user->id);
$total_follower = Following::coutFollowers($this->controller->user->id);
?>
<div class="block-persion">
   	<a class="left wrap-img" href="#"><img width="120" height="120" src="<?php echo $urlAvatar; ?>" /></a>
    <div class="left detail-profile">
    	<a class="icon-common icon-settings icon-touch" href="#">&nbsp;</a>
		<h3><a href="#"><?php echo $this->controller->user->getDisplayName();?></a></h3>
        <p class="join-date"><?php echo Yii::t('profile', 'Member since') ?> <?php echo date('Y', $this->controller->user->createtime)?></p>
        <?php if(!$this->controller->user->isMe()) {?>
            <?php if($this->controller->user->isFollow()):?>
				<a class="follow" href="javascript:void(0);"
					rel="<?php echo $this->controller->user->createUrl('/friend/follow');?>">UnFollow</a>
            <?php else:?>
				<a class="follow" href="javascript:void(0);"
					rel="<?php echo $this->controller->user->createUrl('/friend/follow');?>">Follow</a>
            <?php endif;?>
        <?php } else { ?>
        		<div class="facebook_html"></div>
        		<?php $fb_connect = (Yii::app()->facebook->getUser()) ? 'style="display:none;"' : null;?>
        		<?php $fb_disconnect = (Yii::app()->facebook->getUser()) ? null : 'style="display:none;"';?>
                <a href="javascript:void(0);" data-url="<?php echo $this->controller->user->createUrl('/friend/Listfriends', array('view'=>'partial'));?>" rel="tab-face" class="connectto face-connect" <?php echo $fb_connect;?>>
                	<i class="icon-common">&nbsp;</i> <?php echo Yii::t('profile', 'Connect to facebook') ?>
                </a>
                <a href="javascript:void(0);" data-url="<?php echo $this->controller->user->createUrl('/friend/facebookDisconnect');?>" rel="tab-face" class="disconnect face-connect" <?php echo $fb_disconnect;?>>
                    <i class="icon-common">&nbsp;</i> <?php echo Yii::t('profile', 'Disconnect facebook') ?></a>
		<?php } ?>
        <ul>
           	<li><i class="icon-common icon-like-num">&nbsp;</i><span><?php echo $likeCount;?></span></li>
            <li><i class="icon-common icon-dislike-num">&nbsp;</i><span><?php echo $hateCount;?></span></li>
            <li><i class="icon-common icon-bought-num">&nbsp;</i><span><?php echo $boughtCount;?></span></li>
        </ul>
    </div>
    <div class="clear"></div>
</div>



















<div class="profile-left left" style="display: none;">
	<div class="avatar-per">
		    <a href="<?php echo $this->controller->user->createUrl('/setting/index');?>" class="left wrap-img">
		        <img width="80" height="80" src="<?php echo $urlAvatar; ?>" class="uploadPreview" />
	        </a>
	        <div class="name-per">
				<div>
					<h4><?php echo $this->controller->user->getDisplayName();?></h4>
					<span><?php echo Yii::t('profile', 'Member since') ?> <?php echo date('Y', $this->controller->user->createtime)?></span>
		            <?php if(!$this->controller->user->isMe()) {?>
		                <?php if($this->controller->user->isFollow()):?>
		                    <div>
							<a class="follow" href="javascript:void(0);"
								rel="<?php echo $this->controller->user->createUrl('/friend/follow');?>">UnFollow</a>
						</div>
		                <?php else:?>
		                    <div>
							<a class="follow" href="javascript:void(0);"
								rel="<?php echo $this->controller->user->createUrl('/friend/follow');?>">Follow</a>
						</div>
		                <?php endif;?>
		            <?php } else { ?>
		            <div class="connect_fb list-tab-pro">
		            		<div class="facebook_html"></div>
		            		<?php $fb_connect = (Yii::app()->facebook->getUser()) ? 'style="display:none;"' : null;?>
		            		<?php $fb_disconnect = (Yii::app()->facebook->getUser()) ? null : 'style="display:none;"';?>
	                        <a href="javascript:void(0);" data-url="<?php echo $this->controller->user->createUrl('/friend/Listfriends', array('view'=>'partial'));?>" rel="tab-face" class="connectto icon_common icon-face" <?php echo $fb_connect;?>>
	                        	<span></span> Connect to facebook
	                        </a>
	                        <a href="javascript:void(0);" data-url="<?php echo $this->controller->user->createUrl('/friend/facebookDisconnect');?>" rel="tab-face" class="disconnect" <?php echo $fb_disconnect;?>>
	                        <span></span> Disconnect facebook</a>
                        
					</div>
					<?php } ?>
	            </div>
			</div>
    	<?php if($this->controller->user->isMe()) { ?>
		<a class="show-settings right icon_common" href="<?php echo $this->controller->user->createUrl('/setting/index');?>">&nbsp;</a>
		<?php } ?>
		<div class="clear"></div>
	</div>
	<!-- 
	<ul class="list-tab-pro">
    	<li><a href="javascript:void(0);" data-url="<?php echo $this->controller->user->createUrl('/friend/follower', array('view'=>'partial'));?>" class="active" rel="tab-followers"><i class="icon_common icon-heart">&nbsp;</i><span><?php echo $total_follower;?> Followers</span><span class="row-hover">&nbsp;</span></a></li>
        <li><a href="javascript:void(0);" data-url="<?php echo $this->controller->user->createUrl('/friend/following', array('view'=>'partial'));?>" rel="tab-following"><i class="icon_common icon-flow">&nbsp;</i><span><?php echo $total_following;?> Following</span><span class="row-hover">&nbsp;</span></a></li>
		<li class="end-li">
			<a href="javascript:void(0);" data-url="<?php echo $this->controller->user->createUrl('/friend/listfriends', array('view'=>'partial'));?>" rel="tab-face"><i class="icon_common icon-face">&nbsp;</i><span>
				Connect Facebook</span><span class="row-hover">&nbsp;</span>
			</a>
		</li>
	</ul>
	 -->
	<div class="clear"></div>
	<!-- 
	<div class="wrap-tap">
        <div class="tab-follow tab-followers" style="display: none;">
            
        </div>
        <div class="tab-follow tab-following" style="display:none;">
            
        </div>
		<div class="tab-follow tab-face"></div>
		<div class="clear"></div>
	</div>
         -->
	<ul class="list-num-like">
		<li><i class="icon_common icon-num-like">&nbsp;</i><span><?php echo $likeCount;?> <?php echo Yii::t('profile', 'Like') ?></span></li>
		<li><i class="icon_common icon-num-dislike">&nbsp;</i><span><?php echo $hateCount;?> <?php echo Yii::t('profile', 'Dislike') ?></span></li>
		<li class="end-li"><i class="icon_common icon-num-bought">&nbsp;</i><span><?php echo $boughtCount;?> <?php echo Yii::t('profile', 'Bought') ?></span></li>
	</ul>
</div>