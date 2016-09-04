<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/common.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
	<?php $this->beginContent('//layouts/partials/head'); ?><?php $this->endContent(); ?>
</head>
<body>
<div id="container">
	<?php $this->beginContent('//layouts/partials/header'); ?><?php $this->endContent(); ?>
	<div id="wrapper">
		<!-- InstanceBeginEditable name="EditRegion3" -->
		<?php echo $content; ?>
		<!-- InstanceEndEditable -->
	</div>
	<?php $this->widget('frontend.widgets.home.FooterWidget'); ?>
</div>

<?php $this->widget('frontend.widgets.home.PopupLoginWidget'); ?>
<?php $this->widget('frontend.widgets.home.PopupRegisterWidget'); ?>

<!-- InstanceBeginEditable name="EditRegion2" -->
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/resources/html/js/velocity.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/resources/html/js/common.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/resources/html/js/swiper.jquery.min.js"></script>

<?php Yii::app()->clientScript->registerCoreScript('jquery');?>
<?php Yii::app()->clientScript->registerCoreScript('cookie');?>
<?php Yii::app()->clientScript->registerCoreScript('jquery.ui');?>

<script>
    $(document).ready(function () {
        var swiper_1 = new Swiper('.slide-intro .swiper-container', {
            pagination: '.swiper-pagination',
            paginationClickable: true,
            nextButton: '.swiper-button-next',
            prevButton: '.swiper-button-prev',
            spaceBetween: 0
        });

        var swiper_2 = new Swiper('.list-video-home.swiper-container', {
            slidesPerView: 'auto',
            paginationClickable: true,
            spaceBetween: 0
        });

        $('.dropdown-emu').dropdown_emu();
    });
</script>
<!-- InstanceEndEditable -->

<!-- InstanceBeginEditable name="EditRegion2" -->
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/resources/html/js/owl.carousel.js"></script>
<script>
	$(document).ready(function () {
		var sync1 = $("#sync1");
		var sync2 = $("#sync2");

		sync1.owlCarousel({
			items: 1,
			singleItem : true,
			navigation: true,
			pagination:false,
			afterAction : syncPosition,
			responsiveRefreshRate : 200,
			navigationText: ["",""]
		});

		sync2.owlCarousel({
			items : 7,
			itemsDesktop      : [1199,10],
			itemsDesktopSmall     : [979,10],
			itemsTablet       : [768,8],
			itemsMobile       : [479,4],
			pagination:false,
			responsiveRefreshRate : 100,
			afterInit : function(el){
				el.find(".owl-item").eq(0).addClass("synced");
			}
		});

		function syncPosition(el){
			var current = this.currentItem;
			$("#sync2")
				.find(".owl-item")
				.removeClass("synced")
				.eq(current)
				.addClass("synced")
			if($("#sync2").data("owlCarousel") !== undefined){
				center(current)
			}
		}

		$("#sync2").on("click", ".owl-item", function(e){
			e.preventDefault();
			var number = $(this).data("owlItem");
			sync1.trigger("owl.goTo",number);
		});

		function center(number){
			var sync2visible = sync2.data("owlCarousel").owl.visibleItems;
			var num = number;
			var found = false;
			for(var i in sync2visible){
				if(num === sync2visible[i]){
					var found = true;
				}
			}

			if(found===false){
				if(num>sync2visible[sync2visible.length-1]){
					sync2.trigger("owl.goTo", num - sync2visible.length+2)
				}else{
					if(num - 1 === -1){
						num = 0;
					}
					sync2.trigger("owl.goTo", num);
				}
			} else if(num === sync2visible[sync2visible.length-1]){
				sync2.trigger("owl.goTo", sync2visible[1])
			} else if(num === sync2visible[0]){
				sync2.trigger("owl.goTo", num-1)
			}

		}
	});
</script>
<!-- InstanceEndEditable -->
</body>
<!-- InstanceEnd --></html>