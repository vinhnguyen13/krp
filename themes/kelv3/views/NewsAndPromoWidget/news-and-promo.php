<?php
//print_r($new_and_promos);
?>
<div class="news-promo">
	<div class="title-box">
		<span><?php echo $new_and_promos['title']; ?></span>
	</div>
	<div class="items">
		<div class="row">
			<?php
			foreach($new_and_promos['news'] as $key=>$value){
				$producturl='';
				$producturl	=	Yii::app()->createUrl('/article/view', array('section' => $value->sections['0']->slug, 'slug' => $value->slug, 'id' => $value->id));
			?>
			<div class="col-xs-12 col-md-4 col-sm-6">
				<a href="<?php echo $producturl; ?>" class="thumb">
					<?php echo $value->getImageThumbnail(array('height' => '102px', 'width' => '132px')); ?>
				</a>
				<div class="intro-item">
					<a href="<?php echo $producturl; ?>" class="link-item"><?php echo $value->title; ?></a>
					<?php echo $value->description; ?>
				</div>
			</div>
			<?php
			}
			?>
		</div>
	</div>
</div>