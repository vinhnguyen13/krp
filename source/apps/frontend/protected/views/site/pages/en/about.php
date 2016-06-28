<?php
/* @var $this SiteController */

$this->pageTitle .= ' - ' . Lang::t('general', 'About Us');
$this->breadcrumbs=array(
	'About',
);
?>
<div class="page-aboutus">
    <h1><?php echo Lang::t('general', 'About Kelreport')?></h1>
    <div class="left about_new">
    	<div class="frame_pics">
        	<a href="<?php echo Yii::app()->createUrl('//site/page/view/our-team');?>"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/resources/html/images/aboutus_new.jpg" align="absmiddle" /></a>
        </div>
	</div>
    <div class="left txt-ab-left">
        <p>
		When it was first introduced in 2007, KelReport was known as "fashionistas’ best
		friend” the one who knows all exclusive shopping deals, must-have bags, hot new
		restaurants and always shares the scoops.</p>
		<p>
		The site is now back in business after a long break to provide daily 
		recommendations on shopping and lifestyle for urban citizens. The focus is on best 
		fashion buys from clothes to accessories, automotive to gadgets and more. </p>
		<p>
		KelReport adopts strict editorial policy. Each featured item is personally hand-
		picked by our editors. We usually don’t accept advertorials. </p>
		<p>
		Currently covered markets are Ho Chi Minh, Ha Noi, Singapore and Bangkok.
		</p>
    </div>
    <div class="right txt-ab-right">
        <div class="note-cm">
            <span class="top-close icon_common"></span>
            <span class="bottom-close icon_common"></span>
            <p>KelReport adopts strict editorial policy. Each featured item is personally hand-picked by our editors.</p>
        </div>
    </div>
</div>
  