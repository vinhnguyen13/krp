<div class="item-cmt">
	<a href="<?php echo $url;?>" class="pic-avatar left">
		<img src="<?php echo $avt;?>" height="50" width="50" />
	</a>
	<div class="left txt-cmt">
		<p class="person-cmt"><a href="<?php echo $url;?>"><?php echo $name;?></a> 
		<span>|</span><span><?php echo date('M d, Y - h:m A', $model->created_date);?></span></p>
		<p><?php echo $model->getContent();?></p>
	</div>
	<div class="clear"></div>
</div>