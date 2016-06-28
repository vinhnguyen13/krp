<?php if(!empty($view->galleries[0]->galleryPhotos)) { ?>
<div class="slider-show wrap-img" style="display:none;">
	<?php foreach ($view->galleries[0]->galleryPhotos as $photo) {?>
		<img src="<?php echo $photo->getUrl();?>" />
	<?php } ?>
</div>
<?php } ?>


<!-- 
<?php 
	$version = $view->galleries[0]->getVersions();
?>
<?php if(!empty($view->galleries[0]->galleryPhotos)) { ?>

<?php if(isset($version['type']) && $version['type'] == 'vertical') { ?>
<div id="slides" style="width:300px; overflow:hidden; float:left; margin-right:15px; margin-bottom:10px;">
<?php } else { ?>
<div id="slides">
<?php } ?>

	<?php foreach ($view->galleries[0]->galleryPhotos as $photo) {?>
		<a class="slide-popup cboxElement" href="<?php echo $photo->getUrl();?>">
			<img alt="" src="<?php echo $photo->getUrl();?>"></a>
		</li>
	<?php } ?>
	<a href="#" class="slidesjs-previous slidesjs-navigation icon_common"></a>
	<a href="#" class="slidesjs-next slidesjs-navigation icon_common"></a>
</div>
<?php } ?>

<?php if(isset($version['type']) && $version['type'] == 'vertical') { ?>
<script type="text/javascript">
    $('#slides').slidesjs({
		width: 300,
		height: 400,
		navigation: false,
		pagination: {
			active: false
		  }
	});
	$('.slideshow-img').css('margin-bottom', '-8px');
</script>
<?php } else { ?>
<script type="text/javascript">
$('#slides').slidesjs({
	width: 679,
	height: 334,
	navigation: false,
	pagination: {
		active: false
	  }
});
</script>
<?php } ?>


<script type="text/javascript">
$(function() {
	  $(".slide-popup").colorbox({rel:'slide-popup'});
});
		
</script>
 -->