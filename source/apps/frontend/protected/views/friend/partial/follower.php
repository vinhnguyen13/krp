<div class="number_follower"><span><label id="follower-number"><?php echo count($follow) ?></label> Followers</span></div>
<?php if(!empty($follow)):?>
<div class="follow-scroll">
	<ul>
		<?php foreach ($follow as $key=>$fo):?>
		<li>
			<a href="<?php echo $fo->inviter->getUserUrl();?>" class="wrap-img">
				<img width="105" src="<?php echo $fo->inviter->getAvatar()?>">
				<?php if($this->user->isMe()): ?>
				<span><label data-url="<?php echo $this->user->createUrl('/friend/BlockFollwer', array('inviter_id'=>$fo->inviter_id, 'friend_id'=>$fo->friend_id)) ?>">Block</label></span>
				<?php endif; ?>
			</a>
			<a href="<?php echo $fo->inviter->getUserUrl();?>"><?php echo $fo->inviter->getDisplayName();?></a>
		</li>
		<?php endforeach; ?>
	</ul>
</div>
<?php endif;?>
<script>
	$('.block-list-friend ul li a.wrap-img span label').click(function(e){
		var self = $(this);
		var url = self.data('url');
		self.closest('a').append('<div style="background: rgba(0, 0, 0, 0.5); position: absolute; width: 100%; height: 100%; top: 0px; text-align:center; padding-top: 20px; color: #E4DADA; z-index: 9999;">blocking...</div>');
		$.ajax({
	        url: url,
	        success: function(data){
	        	if(data) {
	        		self.closest('li').remove();
	        		$('#follower-number').text(Number($('#follower-number').text())-1);
	        	}
	        },
	        dataType: 'json'
	    });
		e.preventDefault();
	});
</script>