<div class="list-restau">
	<div class="title-box">
		<span><?php echo $section_restaurants['title']; ?></span>
	</div>
	<div class="row">
		<?php
		foreach($section_restaurants['news'] as $key=>$value) {
			$producturl = '';
			$producturl = Yii::app()->createUrl('/article/view', array('section' => $value->sections['0']->slug, 'slug' => $value->slug, 'id' => $value->id));
			?>
			<div class="col-xs-12 col-md-4 col-sm-6">
				<!--
				<a href="#" class="thumb"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/resources/html/images/img135x172.jpg" alt=""/></a>
				-->
                <a href = "<?php echo $producturl; ?>" class="thumb" >
				    <?php echo $value->getImageThumbnail(array('class'=>'thumb','height' => '135px', 'width' => '172px')); ?>
                </a>
				<div class="intro-item">
					<a href="<?php echo $producturl; ?>" class="link-item"><?php echo $value->title; ?></a>

					<p class="date-post"><?php echo date('d.m.Y',$value->public_time); ?></p>

					<?php echo $value->description; ?>
				</div>
			</div>
			<?php
		}
		?>
	</div>
	<div class="text-center">
		<?php
		$viewall_url= Yii::app()->createUrl('//article/section', array('section' => 'restaurants'));
		?>
		<a href="<?php echo $viewall_url; ?>" class="view-all text-uper font-centuB">view all</a>
	</div>
</div>