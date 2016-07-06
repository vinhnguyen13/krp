<div class="list-video-home">
	<div class="clearfix inner-list">
		<?php
		foreach($section_videos['news'] as $key=>$value) {
		$producturl = '';
		$producturl = Yii::app()->createUrl('/article/view', array('section' => $value->sections['0']->slug, 'slug' => $value->slug, 'id' => $value->id));
		?>
		<div class="col-xs-12 col-lg-3 col-sm-6">
			<div class="item-video">
				<a href="<?php echo $producturl ?>">
					<div class="bg-bottom"></div>
					<div class="inner-item style-box">
						<div class="thumb">
							<!--
							<img src="<?php echo Yii::app()->theme->baseUrl;?>/resources/html/images/img324x356.jpg" alt="" />
							-->
							<?php echo $value->getImageThumbnail(array('height' => '324px', 'width' => '356px')); ?>
							<span class="icon-video"><i class="fa fa-play-circle-o" aria-hidden="true"></i></span>
							<div class="text-center title-top"><span class="text-uper">Video (<?php echo $value->views; ?>)</span></div>
						</div>
						<div class="text-center link-title"><?php echo $value->title; ?></div>
					</div>
				</a>
			</div>
		</div>
		<?php
		}
		?>
	</div>
</div>