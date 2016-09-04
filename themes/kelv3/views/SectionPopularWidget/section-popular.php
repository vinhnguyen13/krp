<div class="col-xs-12 col-md-6 most-popu">
	<div class="title-box">
		<span><?php echo Lang::t('general', 'most popular'); ?></span>
	</div>
	<?php if(isset($section_populars)) { ?>
		<?php
		$i = 1;
        foreach($section_populars['news'] as $key=>$value) {
			$producturl = Yii::app()->createUrl('/article/view', array('section' => $value->sections['0']->slug, 'slug' => $value->slug, 'id' => $value->id));
			?>
			<div class="clearfix mgB-10">
				<a href="<?php echo $producturl;?>" class="d-b ver-c pdR-15 left-box">
					<div class="thumb">
						<?php echo $value->getImageThumbnail(array('height' => '131px', 'width' => '85px')); ?>
					</div>
					0<?php echo $i; ?>
				</a>

				<div class="right-box pdL-15">
					<a href="<?php echo $producturl;?>" class="link-title"><?php echo $value->title; ?></a>

					<div class="stars d-ib">
						<ul class="clearfix">
							<li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
							<li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
							<li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
							<li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
							<li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
						</ul>
					</div>
					<a href="<?php echo $producturl;?>" class="d-ib mgL-10"><?php echo $value->comment; ?> Comments</a>
				</div>
			</div>
			<?php
            $i++;
		}
	}
	?>
</div>