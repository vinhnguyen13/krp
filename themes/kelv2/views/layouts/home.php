<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/Common.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
    <?php //$this->beginContent('//layouts/partials/head'); ?><?php //$this->endContent(); ?>

	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title></title>
	<link href="<?php echo Yii::app()->theme->baseUrl; ?>/resources/html/css/style_ipad.css" rel="stylesheet" type="text/css" />
	<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />
	<link href="css/fonts.css" rel="stylesheet" type="text/css" />
	<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<link href="css/reset.min.css" rel="stylesheet" type="text/css" />
	<link href="css/swiper.min.css" rel="stylesheet" type="text/css" />
	<!--[if IE ]>
	<link type="text/css" media="screen,projection" rel="stylesheet" href="css/ie.css" />
	<![endif]-->
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
	<!-- InstanceBeginEditable name="doctitle" -->
	<title>Untitled Document</title>
	<!-- InstanceEndEditable -->
	<link href="css/style.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="wrapper">
	<?php $this->beginContent('//layouts/partials/header'); ?><?php $this->endContent(); ?>	
    <div id="container">
        <div class="block-col">
	        <div class="main-site">
	        	<!--<?php $this->widget('frontend.widgets.home.SliderWidget'); ?>-->
	        	<?php echo $content; ?>
	        </div>
	        <?php $this->beginContent('//layouts/partials/right'); ?><?php $this->endContent(); ?>
        	<div class="clear"></div>
        </div>
        <div class="clear"></div>
  </div>
</div>
<?php $this->widget('frontend.widgets.home.FooterWidget'); ?>
</body>
</html>
