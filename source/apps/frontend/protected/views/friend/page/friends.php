<?php 
$this->pageTitle = Yii::app()->name;
$cs = Yii::app()->clientScript;
$cs->registerScriptFile(Yii::app()->theme->baseUrl . '/resources/js/my/friends.js', CClientScript::POS_BEGIN);
$cs->registerScript('friendsInit', "Friends.init();", CClientScript::POS_END);
$cs->registerScript('friendsList', "Friends.friendsList();", CClientScript::POS_END);

?>
<?php $this->widget('frontend.widgets.userpage.ProfileWidget'); ?>
<!-- left column -->
<div class="profile-right right">
	<?php $this->widget('frontend.widgets.userpage.NavigationWidget'); ?>
	<div class="clear"></div>
	<div class="list-cmt">
	    <div id="" class="tab-common tab-friends">
        	<div class="block-friends">
                <ul class="list-tab-sub">
                    <li><a class="active" href="#" rel="tab-follower-list" data-url="<?php echo $this->user->createUrl('/friend/follower', array('view'=>'partial'));?>"><?php echo Yii::t('profile', 'Followers') ?></a></li>
                    <li><a href="#" rel="tab-following-list" data-url="<?php echo $this->user->createUrl('/friend/following', array('view'=>'partial'));?>"><?php echo Yii::t('profile', 'Following') ?></a></li>
                    <?php if($this->user->isMe()): ?>
                    <li><a href="#" rel="tab-invite-friends" data-url="<?php echo $this->user->createUrl('/friend/find');?>"><?php echo Yii::t('profile', 'Find Friends') ?></a></li>
                    <?php endif; ?>
                </ul>
                <div class="scroll-tab-friends">
                    <div class="block-list-friend tab-sub tab-follower-list">
                    </div>
                    <div class="block-list-friend tab-sub tab-following-list">
                    </div>
                    <div class="block-list-friend tab-sub tab-invite-friends">
                    </div>
                </div>
                <div class="clear"></div>
            </div>
        </div>
	</div>
</div>
<div style="display: none;">
	<div id="fb-root"></div>
	<fb:login-button></fb:login-button>
</div>
<script type="text/javascript">
$(document).ready(function(){
	window.fbAsyncInit = function() {
		FB.init({
			appId: '<?php echo Yii::app()->facebook->appId ?>',
			cookie: true,
			xfbml: true,
			oauth: true,
			version: 'v2.0'
        });
	};
	(function(d, s, id){
		   var js, fjs = d.getElementsByTagName(s)[0];
		   if (d.getElementById(id)) {return;}
		   js = d.createElement(s); js.id = id;
		   js.src = "//connect.facebook.net/en_US/sdk.js";
		   fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));
});
</script>




<div class="page-profile clearfix" style="display: none;">
	<?php $this->widget('frontend.widgets.userpage.ProfileWidget'); ?>
	<!-- left column -->
	<div class="profile-right right">
		<div class="tabs profile-tabs">
			<?php $this->widget('frontend.widgets.userpage.NavigationWidget'); ?>
		</div>
		<!-- profile tabs -->
		<div class="tabs-content-wrap">
			<div class="line"></div>
			<div class="tabs-content active">
				<?php echo $this->renderPartial("page/_nav");?>
				<div class="list">
					<?php if(!empty($friends)):?>
					<ul>
						<?php foreach ($friends as $friend):?>
						<?php 
							$userSocial = UserSocial::model()->findByAttributes(array('social_id'=>$friend['uid'], 'type'=>RegisterSocial::TYPE_FACEBOOK));	
						?>
						<li class="item">
							<a href="<?php echo $userSocial->user->getUserUrl();?>" class="user" title="<?php echo $friend['name'];?>">
								<img src="https://graph.facebook.com/<?php echo $friend['uid'];?>/picture?type=normal" alt="" border=""/>
							</a>
							<a href="<?php echo $userSocial->user->getUserUrl();?>" class="btn btn-follow" rel="<?php echo $userSocial->user->createUrl('/friend/follow');?>">
								<i class="i24 i24-message-white"></i>
								<?php if($this->user->isFollow()){?>
									<span class="text" rel="unfollow">Unfollow</span>
								<?php }else{?>
									<span class="text" rel="follow">Follow</span>
								<?php }?>
							</a>
						</li>
						<?php endforeach;?>
					</ul>
					<?php endif;?>
				</div>
			</div>
		</div>
	</div>
	<!-- right column -->
</div>

