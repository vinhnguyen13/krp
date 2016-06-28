<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo CHtml::encode($this->pageTitle); ?></title>
<meta name="robots" content="index, follow" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<meta property="og:site_name" content="Kelreport"/>
<meta property="og:type" content="article"/>
<meta property="og:image" content="<?php echo Yii::app()->createAbsoluteUrl('/') . Yii::app()->theme->baseUrl;?>/resources/html/images/logo.jpg"/>
<meta name="google-site-verification" content="ltGeGztsn0mcTWRE81gPy_R2Cbi0o6q8ceOFCE_d1G8" />
<meta name="viewport" content="initial-scale=1,maximum-scale=1,user-scalable=no">
<link id="favicon" rel="icon" type="image/png" sizes="64x64" href="<?php echo Yii::app()->createAbsoluteUrl('/public/images/favicon.ico');?>">

<link href="<?php echo Yii::app()->theme->baseUrl; ?>/resources/html/css/style.css" rel="stylesheet" type="text/css" />
<?php if(Yii::app()->language == VLang::LANG_VI):?>
<link href="<?php echo Yii::app()->theme->baseUrl; ?>/resources/html/css/style_vi.css" rel="stylesheet" type="text/css" />
<?php endif;?>
<?php 
$detect = Yii::app()->mobileDetect;
if($detect->isTablet()){
?>
<link href="<?php echo Yii::app()->theme->baseUrl; ?>/resources/html/css/style_ipad.css" rel="stylesheet" type="text/css" />
<?php }?>
<link href="<?php echo Yii::app()->theme->baseUrl; ?>/resources/css/power.css" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/resources/html/css/jquery-kel.css" media="all" />

<?php Yii::app()->clientScript->registerCoreScript('jquery');?>
<?php Yii::app()->clientScript->registerCoreScript('cookie');?>
<?php Yii::app()->clientScript->registerCoreScript('jquery.ui');?>

<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/resources/html/js/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/resources/html/js/common.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/resources/html/js/script.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/resources/html/js/jquery.colorbox.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/resources/html/js/jquery.slimscroll.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/resources/js/jquery/jquery.tr.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/resources/js/util/common.js"></script>

<script type="text/javascript">
    var UrlCommon = '<?php echo Yii::app()->theme->baseUrl; ?>';
    var isGuest = '<?php echo Yii::app()->user->isGuest;?>';
</script>

<?php 
Lang::translationJs();
?>
<?php $this->beginContent('//layouts/partials/ga'); ?><?php $this->endContent(); ?>
