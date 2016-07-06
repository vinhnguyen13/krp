<div class="col-xs-12 col-md-6 intro-per-cook">
	<div class="title-box">
		<span><?php echo $section_peoples['title']; ?></span>
	</div>
	<div class="row">
		<?php
		foreach($section_peoples['news'] as $key=>$value) {
		$producturl = '';
		$producturl = Yii::app()->createUrl('/article/view', array('section' => $value->sections['0']->slug, 'slug' => $value->slug, 'id' => $value->id));
		?>
		<div class="col-xs-12 col-md-6 col-sm-6">
			<div class="style-box style-box">
				<a href="<?php echo $producturl; ?>" class="thumb">
					<!--
					<img src="<?php echo Yii::app()->theme->baseUrl;?>/resources/html/images/img276x352.jpg" alt="" />
					-->
					<?php echo $value->getImageThumbnail(array('height' => '276px', 'width' => '352px')); ?>
				</a>
				<div class="intro-item text-center">
					<a href="#" class="link-item"><?php echo $value->title; ?></a>
					<p class="date-post"><?php echo date('d.m.Y',$value->public_time); ?></p>
					<?php echo $value->description; ?>
				</div>
			</div>
		</div>
		<?php }
		?>
	</div>
</div>