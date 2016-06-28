<ul class="list-tab-right">
	<li class="start-li"><a <?php if(VHelper::activeMenu(null, 'my', 'view')){ echo 'class="active"'; }?> rel="tab-activity" href="<?php echo $this->controller->user->createUrl('/my/view');?>"><?php echo Yii::t('profile', 'Activity') ?></a></li>
    <li class="badges"><a <?php if(VHelper::activeMenu(null, 'badge', 'index')){ echo 'class="active"'; }?> href="javascript:void(0);" rel="tab-badges"><?php echo Yii::t('profile', 'Badges') ?></a></li>
    <?php if($this->controller->user->isMe()):?>
    	<li><a <?php if(VHelper::activeMenu(null, 'notification', 'index')){ echo 'class="active"'; }?> href="<?php echo $this->controller->user->createUrl('/notification/index');?>" rel="tab-notification"><?php echo Yii::t('profile', 'Notification') ?></a></li>
    <?php endif?>
    <li><a <?php if(VHelper::activeMenu(null, 'product', 'garage')){ echo 'class="active"'; }?> href="<?php echo $this->controller->user->createUrl('/product/garage');?>" rel="tab-garage"><?php echo Yii::t('profile', 'Rack') ?></a></li>
    <li class="end-li"><a <?php if(VHelper::activeMenu(null, 'friend', 'friends')){ echo 'class="active"'; }?> href="<?php echo $this->controller->user->createUrl('/friend/friends');?>" rel="tab-friends"><?php echo Yii::t('profile', 'Friends') ?></a></li>
</ul>