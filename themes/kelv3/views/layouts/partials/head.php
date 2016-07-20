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
<?php Yii::app()->clientScript->registerCoreScript('jquery',CClientScript::POS_END); ?>
<?php Yii::app()->clientScript->registerCoreScript('jquery.ui',CClientScript::POS_END); ?>
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/resources/html/js/jquery-1.9.1.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/resources/html/js/jquery.activeform.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/resources/html/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/resources/html/js/swiper.jquery.min.js"></script>