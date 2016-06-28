<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/Common.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
    <?php $this->beginContent('//layouts/partials/head'); ?><?php $this->endContent(); ?>
</head>
<body>
<div id="wrapper">
	<?php $this->beginContent('//layouts/partials/header'); ?><?php $this->endContent(); ?>	
    <div id="container">
        <div <?php echo VHelper::model()->parseAttributesHtml($this->option_html['containerChild']['attributes'])?>>
	        <?php echo $content; ?>
        </div>
        <div class="clear"></div>
  </div>
</div>
<?php $this->widget('frontend.widgets.home.FooterWidget'); ?>
</body>
</html>
