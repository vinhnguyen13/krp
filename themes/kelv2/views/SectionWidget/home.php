	<?php $this->widget('frontend.widgets.home.SliderWidget'); ?>
	<?php foreach ($section as $section_value): ?>
	<div class="block-category cate-<? echo $section_value->slug; ?>">
		<h1><?php echo $section_value->title;?></h1>
		<?php 
			$article = new Article();
			$data = $article->getListArticlesBySectionHome($section_value->id);

			//first product
			if(isset($data['news'][0])): 
			
			$first_product	=	$data['news'][0];
			$first_producturl	=	Yii::app()->createUrl('/article/view', array('section' => $first_product->sections['0']->slug, 'slug' => $first_product->slug, 'id' => $first_product->id));
			$date_time	=	date('M j Y g:i A', $first_product->public_time);
		?>
		<div class="item-big">
			<a href="<?php echo $first_producturl;?>" title="<?php echo $first_product->title; ?>"><?php echo $first_product->getImageThumbnail2(array('height' => '300px', 'width' => '400px'));?></a>
			<p class="date-time-post"><?php echo $date_time; ?></p>
			<h2><a href="<?php echo $first_producturl;?>"><?php echo $first_product->title; ?></a></h2>
			<p><?php echo Util::partString($first_product->description, 0, 210); ?></p>
			<div class="seemore">
				<!-- 
				<a class="icon-more right" href="<?php echo $first_producturl;?>">
					<span><?php echo Lang::t('general', 'See More'); ?></span><i class="icon_common icon-see-more">&nbsp;</i>
				</a>
				 -->
				<p class="num-comment"><i class="icon_common">&nbsp;</i><b><?php echo $first_product->comment; ?></b> <?php echo Lang::t('general', 'Comment'); ?> </p>
			</div>
			<div class="clear"></div>
		</div>	
		<?php endif; ?>
		
		<?php 
			//for right list product in category
			if(isset($data['news'][1])): 
			array_shift($data['news']);
		?>
		<div class="item-right">
			<?php 
			$thefirstrow	=	true;
			$keys = array_keys($data['news']);
			$lastKey = $keys[sizeof($data['news'])-1];
			foreach ($data['news'] as $key => $value): 
				if($thefirstrow){
					$class_css	=	'box-news';
					$thefirstrow	=	false;
				}else{
					$class_css	=	'box-news last-box-news';
				}
				$producturl	=	Yii::app()->createUrl('/article/view', array('section' => $value->sections['0']->slug, 'slug' => $value->slug, 'id' => $value->id));
				
			?>
			<div class="<?php echo $class_css; ?>">
				<a href="<?php echo $producturl; ?>"><?php echo $value->getImageThumbnail(array('height' => '194px', 'width' => '258px'));?></a>
				<h3><a href="<?php echo $producturl; ?>"><?php echo $value->title;?></a></h3>
				<p class="num-comment"><i class="icon_common">&nbsp;</i><b><?php echo $value->comment; ?></b> <?php echo Lang::t('general', 'Comment'); ?> </p>
				<?php if($lastKey == $key): ?>
				<a href="<?php echo $section_value->getUrl(); ?>" class="icon-more right"><span><?php echo Lang::t('general', 'More in'); ?> <?php echo $section_value->title; ?></span><i class="icon_common icon-see-more">&nbsp;</i></a>
				<?php endif; ?>
			</div>
			<?php endforeach; ?>
		</div>		
		<?php endif; ?>
		
		<div class="clear"></div>	

		<!-- Picks list -->
	</div>
	<?php endforeach; ?>
	