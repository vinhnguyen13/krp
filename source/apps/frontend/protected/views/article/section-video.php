<!-- InstanceBeginEditable name="EditRegion3" -->
<div class="container">
	<div class="clearfix mgT-20 mgB-20">
		<div class="pull-right ver-c">
			<span class="text-uper fs-14 font-centuB">location:</span>
			<div class="dropdown-emu d-ib slect-loca">
				<a href="#" class="val-selected fs-13">Hồ Chí Minh<i class="fa fa-caret-down mgL-5" aria-hidden="true"></i></a>
				<div class="item-dropdown hide">

				</div>
			</div>
		</div>
	</div>
	<div class="title-box">
		<span>Video</span>
	</div>
	<?php if(!empty($news)){?>
	<ul class="clearfix row list-video-page">
		<?php
		$count=1;
		foreach ($news as $key => $article) { ?>
		<?php $url = Yii::app()->createUrl('/article/view', array('section' => $article->sections['0']->slug, 'slug' => $article->slug, 'id' => $article->id));?>
		<li class="col-lg-4 col-md-2">
			<div class="item-video">
				<a href="<?php echo $url; ?>">
					<div class="bg-bottom"></div>
					<div class="inner-item style-box">
						<div class="thumb">
							<!--
							<img src="<?php echo Yii::app()->theme->baseUrl;?>/resources/html/images/img324x356.jpg" alt="">
							-->
							<?php echo $article->getImageThumbnail(array('border' => '', 'width' => 324, 'height' => 356)); ?>
							<span class="icon-video"><i class="fa fa-play-circle-o" aria-hidden="true"></i></span>
						</div>
						<div class="text-center link-title"><?php echo $article->title; ?></div>
					</div>
				</a>
			</div>
		</li>
		<?php } ?>
	</ul>
	<?php } ?>
	<div class="pagi mgB-20">
		<?php
		if(!empty($pages)):?>
			<?php $this->widget('backend.extensions.ExtLinkPager',array('pages'=>$pages)); ?>
		<?php endif;
		?>
	</div>
</div>
<!-- InstanceEndEditable -->