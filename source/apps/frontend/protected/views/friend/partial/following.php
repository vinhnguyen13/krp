<div class="number_follower"><span><label id="following-number"><?php echo count($follow) ?></label> Following</span></div>
<?php if(!empty($follow)):?>
<div class="follow-scroll">
	<ul>
		<?php foreach ($follow as $key=>$fo):?>
		<li>
			<a href="<?php echo $fo->invited->getUserUrl();?>" class="wrap-img">
				<img width="105" src="<?php echo $fo->invited->getAvatar()?>">
				<?php if($this->user->isMe()): ?>
				<span><label data-url="<?php echo $this->user->createUrl('/friend/UnFollwing', array('inviter_id'=>$fo->inviter_id, 'friend_id'=>$fo->friend_id)) ?>">Unfollow</label></span>
				<?php endif; ?>
			</a>
			<a href="<?php echo $fo->inviter->getUserUrl();?>"><?php echo $fo->invited->getDisplayName();?></a>
		</li>
		<?php endforeach; ?>
	</ul>
</div>
<?php endif;?>
<script>
	$('.block-list-friend ul li a.wrap-img span label').click(function(e){
		var self = $(this);
		var url = self.data('url');
		self.closest('a').append('<div style="background: rgba(0, 0, 0, 0.5); position: absolute; width: 100%; height: 100%; top: 0px; text-align:center; padding-top: 20px; color: #E4DADA; z-index: 9999;">unfollow...</div>');
		$.ajax({
	        url: url,
	        success: function(data){
	        	if(data) {
	        		self.closest('li').remove();
	        		$('#following-number').text(Number($('#following-number').text())-1);
	        	}
	        },
	        dataType: 'json'
	    });
		e.preventDefault();
	});
</script>