<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />
	
	<?php Yii::app()->clientScript->registerCoreScript('jquery');?>	
	<?php $this->beginContent('//layouts/_partials/css'); ?><?php $this->endContent(); ?>
	<link href="/themes/kel/resources/css/power.css" rel="stylesheet" type="text/css"/>
	
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>
<body>
<script type="text/javascript" src="/themes/kel/resources/js/util/common.js"></script>

<div class="container" id="page">
	<?php echo $content; ?>
</div>
<!-- page -->

</body>
</html>
