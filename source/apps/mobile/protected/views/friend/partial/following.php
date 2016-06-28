<div class="line-num">
	<span><?php echo count($follow) ?> Following</span>
</div>
<ul>
	<?php foreach ($follow as $key=>$fo):?>
	<li>
		<a class="wrap-img" href="<?php echo $fo->invited->getUserUrl();?>"><img src="<?php echo $fo->invited->getAvatar()?>"></a>
		<a href="<?php echo $fo->invited->getUserUrl();?>"><?php echo $fo->invited->getDisplayName();?></a>
	</li>
	<?php endforeach; ?>
</ul>
<div class="clear"></div>