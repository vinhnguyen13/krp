<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/Common.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
    <?php $this->beginContent('//layouts/partials/head'); ?><?php $this->endContent(); ?>
</head>
<body>
<?php $this->beginContent('//layouts/partials/header'); ?><?php $this->endContent(); ?>	
<div <?php echo VHelper::model()->parseAttributesHtml($this->option_html['wrapper']['attributes'])?>>
    <div class="container-content">
        <?php echo $content; ?>
        <div class="clear"></div>
    </div>
</div>
<?php $this->widget('mobile.widgets.home.FooterWidget'); ?>
</body>
</html>
