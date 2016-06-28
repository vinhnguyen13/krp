<?php 
$this->pageTitle = Yii::app()->name;
$cs = Yii::app()->clientScript;
$cs->registerScriptFile(Yii::app()->theme->baseUrl . '/resources/js/my/friends.js', CClientScript::POS_BEGIN);
?>
<div class="page-profile">
    <?php $this->widget('mobile.widgets.userpage.ProfileWidget'); ?>
    <div class="block-content-pro">
        <?php $this->widget('mobile.widgets.userpage.NavigationWidget'); ?>       	
        <div class="block-tab-items">
			<div id="tab-friends" class="tab-common" style="display: block;">
				<ul class="list-tab-friends">
					<li><a class="active" rel="tab-followers" href="<?php echo $this->user->createUrl('/friend/follower', array('view'=>'partial'));?>"><?php echo Yii::t('profile', 'Followers') ?></a></li>
					<li><a rel="tab-following" href="<?php echo $this->user->createUrl('/friend/following', array('view'=>'partial'));?>"><?php echo Yii::t('profile', 'Following') ?></a></li>
					<?php if($this->user->isMe()): ?>
					<li><a rel="tab-find-friends" href="<?php echo $this->user->createUrl('/friend/find');?>"><?php echo Yii::t('profile', 'Find Friends') ?></a></li>
					<?php endif; ?>
				</ul>
				<div class="block-friends">
					<img id="loading-img" style="margin: 10px;" alt="" src="<?php echo Yii::app()->theme->baseUrl; ?>/resources/images/graphics/loading.gif" />
					<div id="tab-followers" class="tab-friends-common" style="display: block;"></div>
					<div id="tab-following" class="tab-friends-common" style="display: none;"></div>
					<div id="tab-find-friends" class="tab-friends-common" style="display: none;"></div>
				</div>
				<div class="clear"></div>
			</div>
			<div class="clear"></div>
		</div>
		<div class="clear"></div>
	</div>
</div>
<div id="fb-root"></div>
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





