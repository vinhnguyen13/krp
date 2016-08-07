<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />



<link href="<?php echo Yii::app()->theme->baseUrl; ?>/resources/html/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo Yii::app()->theme->baseUrl; ?>/resources/html/css/fonts.css" rel="stylesheet" type="text/css" />
<link href="<?php echo Yii::app()->theme->baseUrl; ?>/resources/html/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo Yii::app()->theme->baseUrl; ?>/resources/html/css/reset.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo Yii::app()->theme->baseUrl; ?>/resources/html/css/swiper.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo Yii::app()->theme->baseUrl; ?>/resources/html/css/owl.carousel.css" rel="stylesheet" type="text/css" />

<script src="<?php echo Yii::app()->theme->baseUrl; ?>/resources/html/js/respond.min.js"></script>
<script type="text/javascript">
    var UrlCommon = '<?php echo Yii::app()->theme->baseUrl; ?>';
    var isGuest = '<?php echo Yii::app()->user->isGuest;?>';
</script>

<?php
//Lang::translationJs();
?>
<?php $this->beginContent('//layouts/partials/ga'); ?><?php $this->endContent(); ?>

<!--[if IE ]>
<link type="text/css" media="screen,projection" rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/resources/html/css/ie.css" />
<![endif]-->
<!--[if lt IE 9]>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/resources/html/js/html5shiv.js"></script>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/resources/html/js/respond.min.js"></script>

<![endif]-->
<!-- InstanceBeginEditable name="doctitle" -->
<title><?php echo CHtml::encode($this->pageTitle); ?></title>
<!-- InstanceEndEditable -->
<link href="<?php echo Yii::app()->theme->baseUrl; ?>/resources/html/css/style.css" rel="stylesheet" type="text/css" />
<link href="<?php echo Yii::app()->theme->baseUrl; ?>/resources/html/css/rating.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
<?php Yii::app()->clientScript->registerCoreScript('jquery',CClientScript::POS_END); ?>
<?php Yii::app()->clientScript->registerCoreScript('jquery.ui',CClientScript::POS_END); ?>
<script src="http://maps.googleapis.com/maps/api/js?sensor=false" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/resources/html/js/jquery-1.9.1.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/resources/html/js/jquery.activeform.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/resources/html/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/resources/html/js/swiper.jquery.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/resources/html/js/jquery.colorbox.js"></script>
<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/resources/js/util/common.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/resources/html/js/rating.js"></script>