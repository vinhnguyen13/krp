<?php
/*
if($items && count($items) > 0): ?>
<div class="slideshow-img">
	<div id="jslidernews3" class="lof-slidecontent">
		<div class="preload"><div></div></div>
        <div  class="button-previous slidesjs-previous slidesjs-navigation icon_common">Previous</div>
        <div class="button-next slidesjs-next slidesjs-navigation icon_common">Next</div>
    	<div class="main-slider-content">
        	<ul class="sliders-wrap-inner">
        		<?php foreach($items as $key => $item): 
				if(!empty($item->sections)){
				$producturl	=	Yii::app()->createUrl('/article/view', array('section' => $item->sections['0']->slug, 'slug' => $item->slug, 'id' => $item->id));
				?>
					<li>
						<a href="<?php echo $producturl; ?>" title="<?php echo $item->title?>"><?php echo $item->getImageSlide(array('width' => $width, 'height' => $height)); ?></a>
						<div class="slider-description"><div class="description-wrapper"><?php echo $item->title?></div></div>
					</li>
				<?php 
				}
				endforeach;
				?>
        	</ul>
        </div>
        <div class="navigator-content">
              <div class="navigator-wrapper">
                    <ul class="navigator-wrap-inner">
                       
                    </ul>
              </div>
            
         </div>
         <div class="button-control"><span></span></div>
    </div>
</div>
<?php endif;
*/
?>
<!--
<script type="text/javascript">
$(function() {

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
												mainWidth:679,
												navigatorHeight : 10,
												navigatorWidth  : null,
												buttons			: buttons,
												onComplete:_complete } );
	 	

});
</script>
-->

<div class="col-xs-12 col-md-6 pdL-30 pdR-30 slide-intro">
	<div class="style-box style-box-1 swiper-container">
		<div class="swiper-wrapper">
			<div class="swiper-slide">
				<a href="#" class="thumb"><img src="<?php echo Yii::app()->theme->baseUrl;?>/resources/html/images/img539x480.jpg" alt="" /></a>
				<div class="intro-item">
					<a href="#" class="link-item">A new restaurant at 10 Neild Avenue</a>
					<p>When it came to bringing Noma Australia to life in Sydney, chef René Redzepi wanted the restaurant's interiors to be shaped.</p>
				</div>
			</div>
			<div class="swiper-slide">
				<a href="#" class="thumb"><img src="<?php echo Yii::app()->theme->baseUrl;?>/resources/html/images/img539x480.jpg" alt="" /></a>
				<div class="intro-item">
					<a href="#" class="link-item">A new restaurant at 10 Neild Avenue</a>
					<p>When it came to bringing Noma Australia to life in Sydney, chef René Redzepi wanted the restaurant's interiors to be shaped.</p>
				</div>
			</div>
			<div class="swiper-slide">
				<a href="#" class="thumb"><img src="<?php echo Yii::app()->theme->baseUrl;?>/resources/html/images/img539x480.jpg" alt="" /></a>
				<div class="intro-item">
					<a href="#" class="link-item">A new restaurant at 10 Neild Avenue</a>
					<p>When it came to bringing Noma Australia to life in Sydney, chef René Redzepi wanted the restaurant's interiors to be shaped.</p>
				</div>
			</div>
			<div class="swiper-slide">
				<a href="#" class="thumb"><img src="<?php echo Yii::app()->theme->baseUrl;?>/resources/html/images/img539x480.jpg" alt="" /></a>
				<div class="intro-item">
					<a href="#" class="link-item">A new restaurant at 10 Neild Avenue</a>
					<p>When it came to bringing Noma Australia to life in Sydney, chef René Redzepi wanted the restaurant's interiors to be shaped.</p>
				</div>
			</div>
		</div>
		<div class="swiper-pagination"></div>
		<div class="swiper-button-next"></div>
		<div class="swiper-button-prev"></div>
	</div>
</div>