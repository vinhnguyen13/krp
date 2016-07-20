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
		<span>Restaurants</span>
	</div>
	<?php if(!empty($news)){?>
	<ul class="clearfix row list-restau-page">
		<?php
		$count=1;
		foreach ($news as $key => $article) { ?>
			<?php $url = Yii::app()->createUrl('/article/view', array('section' => $article->sections['0']->slug, 'slug' => $article->slug, 'id' => $article->id));?>
		<li class="col-lg-3 col-md-4 col-sm-6">
			<div class="inner-restau">
				<a href="<?php echo $url; ?>" class="thumb">
					<!--
					<img src="<?php echo Yii::app()->theme->baseUrl;?>/resources/html/images/img275x345.jpg" alt="" />
					-->
					<?php echo $article->getImageThumbnail(array('border' => '', 'width' => 275, 'height' => 345)); ?>
				</a>
				<div class="intro-item">
					<a href="<?php echo $url; ?>" class="link-title"><?php echo $article->title; ?></a>
					<div class="stars">
						<ul class="clearfix">
							<li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
							<li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
							<li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
							<li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
							<li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
						</ul>
					</div>
					<p><?php echo Util::partString($article->description, 0,150); ?></p>
				</div>
			</div>
		</li>
		<?php
		$count++;
		}?>
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