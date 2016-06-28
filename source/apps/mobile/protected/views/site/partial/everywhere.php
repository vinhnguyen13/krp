			<?php 
				if(isset($articles[0])){
				foreach ($articles as $key => $value):  
				$producturl	=	Yii::app()->createUrl('/article/view', array('section' => $value->sections['0']->slug, 'slug' => $value->slug, 'id' => $value->id));
			?>
			<li>
				<a href="<?php echo $producturl; ?>" class="left wrap-img"><?php echo $value->getImageThumbnail(array('height' => '76px', 'width' => '101px')); ?></a>
				<div class="right">
					<a href="<?php echo $producturl; ?>"><?php echo $value->title;?></a>
					<p><?php echo Util::partString($value->description, 0, 80); ?></p>
				</div>
			</li>
			<?php 
				endforeach; 
				}else{
			?>
			<p class="nodata">Empty data</p>
			
			<?php } ?>