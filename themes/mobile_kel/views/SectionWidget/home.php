	<?php foreach ($section as $section_value): ?>
	<div class="block-category">
		<h1><?php echo $section_value->title;?></h1>
		<ul>
		<?php 
			$article = new Article();
			$data = $article->getListArticlesBySectionHome($section_value->id);

			//first product
			if(isset($data['news'][0])): 
			
			$first_product	=	$data['news'][0];
			$first_producturl	=	Yii::app()->createUrl('/article/view', array('section' => $first_product->sections['0']->slug, 'slug' => $first_product->slug, 'id' => $first_product->id));
			$date_time	=	date('M j Y g:i A', $first_product->public_time);
		?>
    	<li>
            <div class="items block-hot">
	            <a href="<?php echo $first_producturl;?>" class="left wrap-img" title="<?php echo $first_product->title; ?>"><?php echo $first_product->getImageThumbnail2(array('height' => '97px', 'width' => '130px'));?></a>
	            <div class="left wrap-left-item">
	                <a href="<?php echo $first_producturl;?>"><?php echo $first_product->title; ?></a>
	                <p class="post-date"><?php echo $date_time; ?></p>
	                <p><?php echo Util::partString($first_product->description, 0, 75); ?></p>
	                <a class="cmt-common" href="<?php echo $first_producturl;?>"><i class="icon-common">&nbsp;</i><b><?php echo $first_product->comment; ?></b><?php echo Lang::t('general', 'Comment'); ?></a>
	            </div>
        	</div>
        </li>		
		<?php endif; ?>
		
		<?php 
			//for right list product in category
			if(isset($data['news'][1])): 
			array_shift($data['news']);
		?>
			<?php 
			$thefirstrow	=	true;
			$keys = array_keys($data['news']);
			$lastKey = $keys[sizeof($data['news'])-1];
			foreach ($data['news'] as $key => $value): 
				if($thefirstrow){
					$thefirstrow	=	false;
				}
				$date_time	=	date('M j Y g:i A', $value->public_time);
				$producturl	=	Yii::app()->createUrl('/article/view', array('section' => $value->sections['0']->slug, 'slug' => $value->slug, 'id' => $value->id));
				
			?>
			<li>
				<div class="items">
				
				    <a href="<?php echo $producturl; ?>" class="left wrap-img"><?php echo $value->getImageThumbnail(array('height' => '66px', 'width' => '88px'));?></a>
			        <div class="left wrap-left-item">
			            <h2><a href="<?php echo $producturl; ?>"><?php echo $value->title;?></a></h2>
			            <p class="post-date"><?php echo $date_time; ?></p>
			            <a class="cmt-common" href="<?php echo $producturl; ?>"><i class="icon-common">&nbsp;</i><b><?php echo $value->comment; ?></b><?php echo Lang::t('general', 'Comment'); ?></a>
			           <?php if($lastKey == $key): ?>
			            	<a class="see-more" href="<?php echo $section_value->getUrl(); ?>"><span class="icon-common"></span><?php echo Lang::t('general', 'More in'); ?> <?php echo $section_value->title; ?></a> 
			            <?php endif; ?>
			        </div>
				</div>
			</li>
			<?php endforeach; ?>
		<?php endif; ?>
	    </ul>
	    <div class="clear"></div>
		<!-- Picks list -->
	</div>
	<?php endforeach; ?>
	