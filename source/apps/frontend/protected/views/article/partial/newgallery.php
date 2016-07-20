<?php
$version = $view->galleries[0]->getVersions();
?>
<div class="gallery-detail">
	<div id="sync1" class="owl-carousel">
		<?php if(!empty($view->galleries[0]->galleryPhotos)) { ?>
			<?php foreach ($view->galleries[0]->galleryPhotos as $photo) {?>
				<div class="thumb item">
					<img src="<?php echo $photo->getUrl();?>" alt="" />
				</div>
				<div class="thumb item">
					<img src="<?php echo Yii::app()->theme->baseUrl;?>/resources/html/images/img270x175.jpg" alt="" />
				</div>
			<?php } ?>
		<?php } ?>
	</div>
	<div id="sync2" class="owl-carousel">
			<?php if(!empty($view->galleries[0]->galleryPhotos)) { ?>
				<?php foreach ($view->galleries[0]->galleryPhotos as $photo) {?>
					<div class="thumb item">
						<img src="<?php echo $photo->getUrl();?>" alt="" />
					</div>
					<div class="thumb item">
						<img src="<?php echo Yii::app()->theme->baseUrl;?>/resources/html/images/img270x175.jpg" alt="" />
					</div>
				<?php } ?>
			<?php } ?>
	</div>
</div>