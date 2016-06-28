<?php foreach ($comments as $comment) {?>
	<li>
		<a class="wrap-img left" href="<?php echo $comment->author->getUserUrl()?>"><img src="<?php echo $comment->author->getAvatar()?>" height="30" width="30" /></a>
		<div class="left detail-cmt">
			<p class="per-cmt"><a href="<?php echo $comment->author->getUserUrl();?>"><?php echo $comment->author->getDisplayName();?></a>| <?php echo date('M d, Y - h:m A', $comment->created_date);?></p>
			<p><?php echo $comment->getContent();?></p>
		</div>
	</li>
<?php } ?>
<div class="data-next-page" data-nextpage="<?php echo $next_page;?>"></div>
