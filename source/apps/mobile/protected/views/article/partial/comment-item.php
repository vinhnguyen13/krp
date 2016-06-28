<li>
	<a class="wrap-img left" href="<?php echo $url;?>"><img src="<?php echo $avt;?>" height="30" width="30" /></a>
	<div class="left detail-cmt">
		<p class="per-cmt"><a href="<?php echo $url;?>"><?php echo $name;?></a>| <?php echo date('M d, Y - h:m A', $model->created_date);?></p>
		<p><?php echo $model->getContent();?></p>
	</div>
</li>