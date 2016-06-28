	<?php if(isset($articles[0])): ?>
	<div class="bar-mostlike box-slidebar">
		<div class="top-bar-dropdown">
			<span><?php echo Lang::t('general', 'most liked'); ?></span>
		</div>
		<ul class="list-sidebar">
			<?php 
				$i = 1;
				foreach ($articles as $key => $value):  
				$producturl	=	Yii::app()->createUrl('/article/view', array('section' => $value->sections['0']->slug, 'slug' => $value->slug, 'id' => $value->id));
			?>		
			<li>
				<a href="<?php echo $producturl; ?>" class="left wrap-img"><?php echo $value->getImageThumbnail(array('height' => '99px', 'width' => '131px')); ?></a>
				<div class="right">
					<div>
						<span><?php echo $i;?></span>
						<p><?php echo $value->title;?></p>
					</div>
				</div>
			</li>
			<?php 
				$i++;
				endforeach; 
			?>
		</ul>
		<div class="clear"></div>
	</div>
	<?php endif; ?>