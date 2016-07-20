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
		<span>Most Popular</span>
	</div>
	<?php if(!empty($news)){?>
	<ul class="clearfix list-popu row">
		<?php
		$count=1;
		foreach ($news as $key => $article) { ?>
			<?php $url = Yii::app()->createUrl('/article/view', array('section' => $article->sections['0']->slug, 'slug' => $article->slug, 'id' => $article->id));?>
			<li class="col-md-6">
				<div class="inner-item clearfix">
					<a href="<?php echo $url; ?>" class="thumb">
						<!--
						<img src="<?php //echo Yii::app()->theme->baseUrl;?>/resources/html/images/img270x175.jpg" alt="" />
						-->
						<?php echo $article->getImageThumbnail(array('border' => '', 'width' => 270, 'height' => 175)); ?>
					</a>
					<div class="intro-item">
						<div class="num-item"><?php echo $count; ?></div>
						<a href="<?php echo $url; ?>" class="link-title"><?php echo $article->title; ?></a>
						<div class="stars d-ib">
							<ul class="clearfix">
								<li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
								<li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
								<li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
								<li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
								<li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
							</ul>
						</div>
						<a href="#" class="d-ib mgL-10"><?php echo $article->comment; ?> Comments</a>
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