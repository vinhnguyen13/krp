<?php foreach ($comments as $comment) {?>
	<div class="item-cmt">
		<a href="<?php echo $comment->author->getUserUrl()?>" class="pic-avatar left">
			<img src="<?php echo $comment->author->getAvatar()?>" height="50" width="50" />
		</a>
		<div class="left txt-cmt">
			<p class="person-cmt"><a href="<?php echo $comment->author->getUserUrl();?>"><?php echo $comment->author->getDisplayName();?></a> 
			<span>|</span><span><?php echo date('M d, Y - h:m A', $comment->created_date);?></span></p>
			<p><?php echo $comment->getContent();?></p>
		</div>
		<div class="clear"></div>
	</div>
<?php } ?>
<div class="data-next-page" data-nextpage="<?php echo $next_page;?>"></div>
