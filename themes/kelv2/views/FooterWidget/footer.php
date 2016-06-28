<div id="footer">
	<div class="content_footer">
    	<div class="item_fo left">
        	<a href="<?php echo Yii::app()->homeUrl; ?>"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/resources/html/images/logo_footer.png" /></a>
        </div>
        <div class="item_fo left">
        	<h4><a href="<?php echo Yii::app()->createUrl('//article/editor');?>"><?php echo Lang::t('general', 'editor\'s pick'); ?></a></h4>
        </div>
        <?php if(isset($section)) {?>
			<?php foreach ($section as $key => $value) {?>
			<div class="item_fo left">
	        	<h4>
	        		<a href="<?php echo $value->getUrl();?>" title="<?php echo $value->title;?>"><?php echo $value->title;?></a>
                </h4>
	            <div class="clear"></div>
				<?php if(count($category->getCategories($value->id)) > 0) {?>
					<ul>
						<?php foreach ($category->getCategories($value->id) as $cat) {?>
						<li>
							<a href="<?php echo $cat->getUrl($value->slug);?>" title="<?php echo $cat->title;?>"><?php echo $cat->title;?></a>
						</li>
						<?php } ?>
					</ul>
				<?php } ?>
        	</div>
			<?php } ?>
		<?php } ?>
		<!-- Single Column -->
        <div class="item_fo end-item-fo left">
        	<h4><a href="<?php echo Yii::app()->createUrl('/site/page/view/about');?>" title="<?php echo Lang::t('general', 'About Us'); ?>"> <?php echo Lang::t('general', 'About Us'); ?></a></h4>
            <div class="clear"></div>
            <ul>
            	<li><a href="<?php echo Yii::app()->createUrl('/site/page/view/about');?>" title="<?php echo Lang::t('general', 'About Kelreport'); ?>"><?php echo Lang::t('general', 'About Kelreport'); ?></a></li>
                <li><a href="<?php echo Yii::app()->createUrl('/site/contact');?>" title="Contact Us"><?php echo Lang::t('general', 'Contact Us'); ?></a></li>
                <li><a href="<?php echo Yii::app()->theme->baseUrl; ?>/resources/html/MediaKitKR.pdf" title="<?php echo Lang::t('general', 'Advertising/Media Kit'); ?>"><?php echo Lang::t('general', 'Advertising/Media Kit'); ?></a></li>
            </ul>
        </div>
        <div class="clear"></div>
        <div class="rule-fo">
    	<ul>
            <li><a href="<?php echo Yii::app()->createUrl('/site/page/view/policy');?>" title="<?php echo Lang::t('general', 'Privacy Policy'); ?>"><?php echo Lang::t('general', 'Privacy Policy'); ?></a></li>
            <li><a href="<?php echo Yii::app()->createUrl('/site/page/view/term');?>" title="<?php echo Lang::t('general', 'Terms & Conditions'); ?>"><?php echo Lang::t('general', 'Terms & Conditions'); ?></a></li>
            <li class="end-li"><a href="#">&copy; <?php echo date('Y');?> Dream-Weavers Media. All rights reserved.</a></li>
        </ul>
        <div class="clear"></div>
    </div> 
    </div>
</div>

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