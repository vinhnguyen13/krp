<?php if(!empty($friends)):?>
    <div class="list_friend_fb_wrap" style="margin-top: 20px;">
	    <div class="block-list-friend tab-follower-list list_friend_fb" style="margin-top: 0px">
		    <ul style="padding: 0px;">
				<?php foreach ($friends as $friend):?>
				<li>
					<a href="javascript:;" class="wrap-img">
						<img width="105" src="https://graph.facebook.com/<?php echo $friend['uid'] ?>/picture?type=large&width=105&height=105">
						<span><label class="invite-facebook" data-uid="<?php echo $friend['uid'] ?>"><?php echo Yii::t('profile', 'Invite') ?></label></span>
					</a>
					<a href="javascript:;"><?php echo $friend['name'] ?></a>
				</li>
				<?php endforeach; ?>
			</ul>
			<div class="see-more clear" style="margin-bottom: 0px;<?php echo (count($friends)<$limit) ? 'display: none;' : '' ?>">
				<a href="javascript:void(0);" data-limit="<?php echo $limit ?>" data-url="<?php echo $this->user->createUrl('/friend/FindFacebookFriends') ?>"><span><?php echo Yii::t('profile', 'See More') ?></span><i class="icon_common icon-see-more">&nbsp;</i></a>
			</div>
		</div>
	</div>
<?php endif;?>
<script>
$('.list_friend_fb').on('click', '.invite-facebook', function(){
	postToFriend($(this).data('uid'));
});
$('.list_friend_fb .see-more a').click(function(){
	$('.list_friend_fb ul').after('<span id="loading" style="margin-top: 10px; display: block;">Loading...</span>');
	var self = $(this);
	var url = self.data('url');
	var offset = $('.list_friend_fb ul li').length;
	var limit = self.data('limit');
	$.ajax({
		url: url,
		data: {offset: offset},
		type: 'POST'
	}).done(function(html){
		var el = $(html).find('.list_friend_fb ul li');
		$('.list_friend_fb ul').append(el);
		if($('.list_friend_fb').height() > 809 && $('.list_friend_fb').find('> .slimScrollDiv').length == 0) {
			$('.list_friend_fb').slimscroll({
	            size: '5px',
	            height: '809px',
	            distance: '5px'
	        });
		}
		if(el.length < limit)
			self.parent().hide();
		$('#loading').remove();
	});
});
</script>