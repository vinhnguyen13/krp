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

<div class="modal fade popup-common" id="popup-sign-up" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="fa fa-close" aria-hidden="true"></i></button>
			<div class="modal-body">
				<div class="text-uper font-centuB fs-29 lh-100 text-center pdT-30 pdB-30">sign up</div>
				<form action="" id="sign-up">
					<div class="mgB-15">
						<input type="text" placeholder="Email" />
						<div class="vali-error hide"></div>
					</div>
					<div class="mgB-15">
						<input type="text" placeholder="Name" />
						<div class="vali-error hide"></div>
					</div>
					<div class="mgB-15">
						<input type="password" placeholder="Password" />
						<div class="vali-error hide"></div>
					</div>
					<div class="mgB-15">
						<input type="text" placeholder="Enter the Pawword" />
						<div class="vali-error hide"></div>
					</div>
					<div class="clearfix mgB-25">
						<div class="w-50 pull-left">
							<input type="text" placeholder="Verification" />
						</div>
						<div class="w-30 text-center cap-cha pull-left">
							<img src="<?php echo Yii::app()->theme->baseUrl;?>/resources/html/images/capcha.jpg" />
						</div>
						<div class="w-20 pull-left reload-capcha">
							<a href="#"><i class="fa fa-refresh" aria-hidden="true"></i></a>
						</div>
					</div>
					<div class="ver-c clearfix">
						<button type="submit" class="btn-auth pull-right">register</button>
						Have not account ! <a href="#" class="text-decor" data-toggle="modal" data-target="#popup-sign-in">Sign in now</a>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<?php Yii::app()->clientScript->registerCoreScript('jquery',CClientScript::POS_END); ?>
<?php Yii::app()->clientScript->registerCoreScript('jquery.ui',CClientScript::POS_END); ?>
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/resources/html/js/jquery-1.9.1.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/resources/html/js/jquery.activeform.js"></script>
<?php //Yii::app()->clientScript->registerCoreScript('jquery'); ?>

<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/resources/html/js/bootstrap.min.js"></script>
<!--<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>-->
<!-- InstanceBeginEditable name="EditRegion2" -->
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/resources/html/js/common.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/resources/html/js/swiper.jquery.min.js"></script>
<?php Yii::app()->clientScript->registerCoreScript('jquery');?>
<?php Yii::app()->clientScript->registerCoreScript('cookie');?>
<?php Yii::app()->clientScript->registerCoreScript('jquery.ui');?>

<script>
	$(document).ready(function () {
		var swiper = new Swiper('.slide-intro .swiper-container', {
			pagination: '.swiper-pagination',
			paginationClickable: true,
			nextButton: '.swiper-button-next',
			prevButton: '.swiper-button-prev',
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