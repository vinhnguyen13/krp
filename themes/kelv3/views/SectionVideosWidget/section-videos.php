<div class="list-video-home swiper-container">
	<div class="clearfix inner-list swiper-wrapper">
		<?php
		foreach($section_videos['news'] as $key=>$value) {
		$producturl = '';
		$producturl = Yii::app()->createUrl('/article/view', array('section' => $value->sections['0']->slug, 'slug' => $value->slug, 'id' => $value->id));
		?>
		<div class="swiper-slide">
			<div class="item-video">
				<a href="<?php echo $producturl ?>">
					<div class="bg-bottom"></div>
					<div class="inner-item style-box">
						<div class="thumb">
							<?php echo $value->getImageThumbnail(array('height' => '324px', 'width' => '356px')); ?>
                            <span class="icon-video"></span>
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