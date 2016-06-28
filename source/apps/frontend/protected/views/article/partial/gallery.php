<?php 
	$version = $view->galleries[0]->getVersions();
?>
<?php if(!empty($view->galleries[0]->galleryPhotos)) { ?>

<?php if(isset($version['type']) && $version['type'] == 'vertical') { ?>
<div id="jslidernews3" class="lof-slidecontent vertical-slideshow">
		<div class="preload"><div></div></div>
        <div  class="button-previous slidesjs-previous slidesjs-navigation icon_common">Previous</div>
        <div class="button-next slidesjs-next slidesjs-navigation icon_common">Next</div>
    	<div class="main-slider-content">
        	<ul class="sliders-wrap-inner">
<?php } else { ?>
<div id="jslidernews3" class="lof-slidecontent">
		<div class="preload"><div></div></div>
        <div  class="button-previous slidesjs-previous slidesjs-navigation icon_common">Previous</div>
        <div class="button-next slidesjs-next slidesjs-navigation icon_common">Next</div>
    	<div class="main-slider-content">
        	<ul class="sliders-wrap-inner">
<?php } ?>

			<?php foreach ($view->galleries[0]->galleryPhotos as $photo) {?>
				<li><a class="slide-popup cboxElement" href="<?php echo $photo->getUrl();?>"><img alt="" src="<?php echo $photo->getUrl();?>"></a></li>
			<?php } ?>
	</ul>
	</div>
	<div class="button-control"><span></span></div>
</div>
<?php } ?>

<?php if(isset($version['type']) && $version['type'] == 'vertical') { ?>
<script type="text/javascript">
    /*$('#slides').slidesjs({
		width: 300,
		height: 400,
		navigation: false,
		pagination: {
			active: false
		  }
	});*/
$(".slide-popup").colorbox({rel:'slide-popup'});
	var pagiNav = $('.main-slider-content .sliders-wrap-inner').find('li').length;
	for(var i = 1;i<=pagiNav;i++){
 		$('.navigator-wrap-inner').append('<li><span>'+i+'</span></li>');
 	}
	var buttons = { previous:$('#jslidernews3 .button-previous') ,
						next:$('#jslidernews3 .button-next') };
  
		var _complete = function(slider, index){ 
								$('#jslidernews3 .slider-description').animate({height:0});
								slider.find(".slider-description").animate({height:60}) 
						};							;
	 	$('#jslidernews3').lofJSidernews( { interval : 4000,
												direction		: 'opacitys',	
											 	easing			: 'easeInOutExpo',
												duration		: 1200,
												auto		 	: true,
												maxItemDisplay  : 10,
												startItem:0,
												mainWidth:300,
												navigatorHeight : 10,
												navigatorWidth  : null,
												buttons			: buttons,
												onComplete:_complete } );
	$('.slideshow-img').css('margin-bottom', '-2px');
	
</script>
<?php } else { ?>
<script type="text/javascript">
/*$('#slides').slidesjs({
	width: 679,
	height: 334,
	navigation: false,
	pagination: {
		active: false
	  }
});*/
$(".slide-popup").colorbox({rel:'slide-popup'});
	var pagiNav = $('.main-slider-content .sliders-wrap-inner').find('li').length;
	for(var i = 1;i<=pagiNav;i++){
 		$('.navigator-wrap-inner').append('<li><span>'+i+'</span></li>');
 	}
	var buttons = { previous:$('#jslidernews3 .button-previous') ,
						next:$('#jslidernews3 .button-next') };
  
		var _complete = function(slider, index){ 
								$('#jslidernews3 .slider-description').animate({height:0});
								slider.find(".slider-description").animate({height:60}) 
						};							;
	 	$('#jslidernews3').lofJSidernews( { interval : 4000,
												direction		: 'opacitys',	
											 	easing			: 'easeInOutExpo',
												duration		: 1200,
												auto		 	: true,
												maxItemDisplay  : 10,
												startItem:0,
												mainWidth:620,
												navigatorHeight : 10,
												navigatorWidth  : null,
												buttons			: buttons,
												onComplete:_complete } );
</script>
<?php } ?>


<script type="text/javascript">
$(function() {
	$(".slide-popup").colorbox({rel:'slide-popup'});
});
		
</script>