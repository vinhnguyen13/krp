<?php if(!empty($friends)):?>
    <ul style="padding: 0px;">
		<?php
			foreach ($friends as $friend):
				if(!$invite) {
					$user = Member::model()->findByPk($friend['member_id']);
					$link = $user->getUserUrl();
					$uid = $this->user->createUrl('/friend/FollowFriend', array('uid'=>$friend['member_id']));
				} else {
					$link = 'https://www.facebook.com/'.$friend['uid'];
					$uid = $friend['uid'];
				}
		?>
		<li class="<?php echo ($invite) ? 'not-member' : 'member' ?>">
			<a target="_blank" href="<?php echo $link; ?>" class="wrap-img">
				<img width="105" src="https://graph.facebook.com/<?php echo $friend['uid'] ?>/picture?type=large&width=105&height=105">
				<span><label class="invite-facebook" data-uid="<?php echo $uid ?>"><?php echo ($invite) ? Yii::t('profile', 'Invite') : Yii::t('profile', 'Follow') ?></label></span>
			</a>
			<a target="_blank" href="<?php echo $link ?>"><?php echo $friend['name'] ?></a>
		</li>
		<?php endforeach; ?>
	</ul>
	<div class="see-more clear" style="margin-bottom: 0px;<?php echo (count($friends)<$limit) ? 'display: none;' : '' ?>">
		<a href="javascript:void(0);" data-limit="<?php echo $limit ?>" data-url="<?php echo $this->user->createUrl('/friend/FindFacebookFriends', array('invite'=>$invite)) ?>"><span><?php echo Yii::t('profile', 'See More') ?></span><i class="icon_common icon-see-more">&nbsp;</i></a>
	</div>
<?php else: ?>
<div></div>
<?php endif;?>