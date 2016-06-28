<footer>
	<div class="header-footer">
		<span class="left icon-common" id="wap-menu-footer">&nbsp;</span>
		<div class="right search-footer">
			<span class="search-icon icon-common">&nbsp;</span>
		</div>
		<div class="clear"></div>
	</div>
	<nav class="footer-nav">
		<ul class="left">
			<li><a href="<?php echo Yii::app()->createUrl('/site/page/view/about');?>" title="<?php echo Lang::t('general', 'About Us'); ?>"><?php echo Lang::t('general', 'About Us'); ?></a></li>
			<li><a href="<?php echo Yii::app()->createUrl('/site/contact');?>" title="<?php echo Lang::t('general', 'Contact Us'); ?>"><?php echo Lang::t('general', 'Contact Us'); ?></a></li>
			<li><a href="<?php echo Yii::app()->theme->baseUrl; ?>/resources/html/MediaKitKR.pdf" title="<?php echo Lang::t('general', 'Advertising/Media Kit'); ?>"><?php echo Lang::t('general', 'Advertising/Media Kit'); ?></a></li>
		</ul>
		<ul class="right">
			<li><a href="<?php echo Yii::app()->createUrl('/site/page/view/policy');?>" title="<?php echo Lang::t('general', 'Privacy Policy'); ?>"><?php echo Lang::t('general', 'Privacy Policy'); ?></a></li>
			<li><a href="<?php echo Yii::app()->createUrl('/site/page/view/term');?>" title="<?php echo Lang::t('general', 'Terms & Conditions'); ?>"><?php echo Lang::t('general', 'Terms & Conditions'); ?></a></li>
		</ul>
		<div class="clear"></div>
		<div class="copyright">&copy; <?php echo date('Y');?> Dream-Weavers Media. All rights reserved.</div>
		<div class="clear"></div>
	</nav>
</footer>
<div class="pop-mess-succ" style="display: none;">
    <div class="popcont">
        <span class="icon-check"></span>
        <p></p>
    </div>
</div>
<div class="pop-mess-fail" style="display: none;">
    <div class="popcont">
        <span class="icon-check"></span>
        <p></p>
    </div>
</div>