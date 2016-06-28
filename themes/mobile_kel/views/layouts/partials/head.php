<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo CHtml::encode($this->pageTitle); ?></title>
<meta name="robots" content="index, follow" />
<meta name="viewport" content="width=device-width, user-scalable=no" />
<meta property="og:site_name" content="Kelreport"/>
<meta property="og:type" content="article"/>
<meta name="google-site-verification" content="ltGeGztsn0mcTWRE81gPy_R2Cbi0o6q8ceOFCE_d1G8" />

<link href="<?php echo Yii::app()->theme->baseUrl; ?>/resources/css/mobile-en.css" rel="stylesheet" type="text/css" />
<link href="<?php echo Yii::app()->theme->baseUrl; ?>/resources/css/power.css" rel="stylesheet" type="text/css" />

<?php Yii::app()->clientScript->registerCoreScript('jquery');?>
<?php Yii::app()->clientScript->registerCoreScript('cookie');?>
<?php Yii::app()->clientScript->registerCoreScript('jquery.ui');?>

<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/resources/js/owl.carousel.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/resources/js/common.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/resources/js/jquery/jquery.tr.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/resources/js/util/common.js"></script>

<script type="text/javascript">
	$(document).ready(function(){
		var owl = $("#owl-demo");
		owl.owlCarousel({
			autoPlay: 4000,
			items : 1,
			pagination:false,
			itemsMobile		:[500,1],
			itemsTablet : [800, 2],
			itemsTabletSmall : false,
			itemsMobile : [500, 1]
		});
	});
</script>

<script type="text/javascript">
    var UrlCommon = '<?php echo Yii::app()->theme->baseUrl; ?>';
    var isGuest = '<?php echo Yii::app()->user->isGuest;?>';
    var urlCommonCSS = '<?php echo Yii::app()->theme->baseUrl; ?>/resources/css/';
</script>

<?php 
Lang::translationJs();
?>
<?php $this->beginContent('//layouts/partials/ga'); ?><?php $this->endContent(); ?>
