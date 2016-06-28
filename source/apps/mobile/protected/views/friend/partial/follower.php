<div class="line-num">
	<span><?php echo count($follow) ?> Followers</span>
</div>
<ul>
	<?php foreach ($follow as $key=>$fo):?>
	<li>
		<a class="wrap-img" href="<?php echo $fo->inviter->getUserUrl();?>"><img src="<?php echo $fo->inviter->getAvatar()?>"></a>
		<a href="<?php echo $fo->inviter->getUserUrl();?>"><?php echo $fo->inviter->getDisplayName();?></a>
	</li>
	<?php endforeach; ?>
</ul>
<div class="clear"></div>