<?php 
$cs = Yii::app()->clientScript;
$cs->registerScriptFile(Yii::app()->theme->baseUrl . '/resources/js/my/profile.js', CClientScript::POS_BEGIN);

$urlAvatar = CParams::load()->urlAvatar($this->controller->usercurrent->avatar);
$src = CParams::load()->pathAvatar($this->controller->usercurrent->avatar);

if(!file_exists($src)){
	$urlAvatar = Yii::app()->createUrl('/public/images/no-user.jpg');
}

$total_following = Following::coutFollowing($this->controller->user->id);
$total_follower = Following::coutFollowers($this->controller->user->id);
?>
<div class="profile-left">
		<div class="user-info">
			<div class="info clearfix">
				<a href="<?php echo $this->controller->user->createUrl('/setting/index');?>" class="btn-settings"><i class="imed imed-setting"></i></a>
				<div class="ava rounded100">
						<img class="uploadPreview" src="<?php echo $urlAvatar; ?>" alt="" border=""/>
				</div>
				<div class="detail">
					<h3><?php echo $this->controller->user->getDisplayName();?></h3>
					<p class="des">Member since <?php echo date('Y', $this->controller->user->createtime)?></p>
				</div>
			</div>
		<div class="user-social">
			<ul>
				<li>
					<a href="javascript:void(0);" rel="<?php echo $this->controller->user->createUrl('/friend/follower', array('view'=>'partial'));?>" class="profile-follower">
						<i class="i24 i24-heart-white"></i><br/>
						<span class="text"><?php echo $total_follower;?> Followers</span>
					</a>
				</li>
				<li class="active">
					<a href="javascript:void(0);" rel="<?php echo $this->controller->user->createUrl('/friend/following', array('view'=>'partial'));?>" class="profile-following">
						<i class="i24 i24-following-white"></i><br/>
						<span class="text"><?php echo $total_following;?> Following</span>
					</a>
				</li>
				<li>
					<a href="<?php echo $this->controller->user->createUrl('/friend/friends');?>">
						<i class="i24 i24-facebook-white"></i><br/>
						<span class="text">Connect Facebook</span>
					</a>
				</li>
			</ul>
		</div>
	</div>
	<div class="user-follow">
		
	</div>
	<!-- user activity -->
	<!-- user info -->
	<div class="user-activity">
		<button class="btn-unfollow" rel="<?php echo $this->controller->user->createUrl('/friend/follow');?>">
			<i class="i24 i24-message-white"></i>
			<?php if($this->controller->user->isFollow()){?>
				<span class="text" rel="unfollow">Unfollow</span>
			<?php }else{?>
				<span class="text" rel="follow">Follow</span>
			<?php }?>
		</button>
	</div>
	<!-- user activity -->
	<div class="user-stats">
		<ul>
			<li>
				<a href="#">
					<i class="i50 i50-check-white"></i>
					<span class="number"><?php echo $likeCount;?></span>
					<span class="text">Like</span>
				</a>
			</li>
			<li>
				<a href="#">
					<i class="i50 i50-cart-white"></i>
					<span class="number"><?php echo $hateCount;?></span>
					<span class="text">Dislike</span>
				</a>
			</li>
			<li>
				<a href="#">
					<i class="i50 i50-unlike-white"></i>
					<span class="number"><?php echo $boughtCount;?></span>
					<span class="text">Bought</span>
				</a>
			</li>
		</ul>
	</div>
	<!-- user stats -->
</div>