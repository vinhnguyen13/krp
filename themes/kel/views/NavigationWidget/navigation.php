<?php 
$parseUrl = Yii::app()->urlManager->parseUrl(Yii::app()->request);
?>
<ul>
	<li <?php if($parseUrl == 'my/view'){?> class="active"<?php }?>>
		<a href="<?php echo $this->controller->user->createUrl('/my/view');?>">Activity</a>
	</li>
	<li <?php if($parseUrl == 'badge/index'){?> class="active"<?php }?>>
		<a href="<?php echo $this->controller->user->createUrl('/badge/index');?>">Badges</a>
	</li>
	<li <?php if($parseUrl == 'notification/index'){?> class="active"<?php }?>>
		<a href="<?php echo $this->controller->user->createUrl('/notification/index');?>">Notification</a>
	</li>
	<li <?php if($parseUrl == 'product/garage'){?>class="active"<?php }?>>
		<a href="<?php echo $this->controller->user->createUrl('/product/garage');?>">Garage</a>
	</li>
	<li <?php if($parseUrl == 'friend/friends'){?>class="active"<?php }?>>
		<a href="<?php echo $this->controller->user->createUrl('/friend/friends');?>">Friends</a>
	</li>
</ul>