<?php 
	$url_section = $view->sections[0]->getUrl();
	$name_section = $view->sections[0]->title;
	if(isset($view->categories[0])){
		$url_category = $view->categories[0]->getUrl($view->sections[0]->slug);
		$name_category = $view->categories[0]->title;;
	}
?>
<div class="main-site page-fs-1">
	<div class="breakcum">
		<ul>
			<li><a href="<?php echo $url_section;?>"><?php echo $name_section;?></a> </li>
			<?php if(isset($name_category)) { ?>
				<li><a href="<?php echo $url_category;?>"><?php echo $name_category;?></a></li>
			<?php } ?>
			<li class="last-link"><a href="javascript:void(0);"><?php echo $view->title;?></a></li>
		</ul>
		<div class="clear"></div>
	</div>
	<div class="left status-social">
		<?php $this->renderPartial("partial/social", array('view' => $view));?>
	</div>
	<div class="left content-fs-1">
		<h1><?php echo $view->title;?></h1>
		<p class="date-post-fs">
			<?php echo date('M', $view->public_time) ;?></label>. <?php echo date('d h:i A', $view->public_time) ;?>
			 <span>|</span> <?php echo Lang::t('article', 'By');?> <a href="<?php echo $view->user->getUserUrl();?>"><?php echo $view->getAuthorName();?></a></p>
		<div class="clear"></div>
			<div class="slideshow-img">
				<?php if(empty($view->galleries)) {?>
					<?php if($layout == 1) {?>
						<?php echo $view->getImageThumbnail(); ?>
					<?php } else { ?>
						<?php echo $view->getImageThumbnail2(); ?>
					<?php } ?>
				<?php } else { ?>
					<?php $this->renderPartial("partial/gallery", array('view' => $view));?>
				<?php } ?>
			</div>
		<p><?php echo $view->body;?></p>
		
		<div class="fo-content">
			<?php $this->renderPartial("partial/product", array('view' => $view));?>
			<div class="right">
				<ul>
					<li><a href="javascript:void(0);" class="show-frm-email"><i class="icon_common icon-email-content">&nbsp;</i><?php echo Lang::t('article', 'Email');?></a></li>
					<li><a href="javascript:void(0);" onclick="ArticleView.print();"><i class="icon_common icon-print">&nbsp;</i><?php echo Lang::t('article', 'Print');?></a></li>
					<li>
						<a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo Util::getCurrentUrl();?>" target="_blank">
							<i class="icon_common icon-share-fb">&nbsp;</i><?php echo Lang::t('article', 'Share');?></a>
					</li>
				</ul>
			</div>
			<div class="clear"></div>
		</div>
        <div class="clear"></div>
		<div class="block-comment">
		<h2><?php echo Lang::t('article', 'Post a comments');?></h2>
		<div class="content-comment">
			<?php $this->renderPartial("partial/comment-list", $comment);?>
		</div>
	</div>
	</div>
	<div class="clear"></div>
</div>
<div class="siderbar right">
	<?php $this->widget('frontend.widgets.home.AdsWidget', array('position' => 'DETAIL_RIGHT')); ?>
	<!-- 
	<div class="bar-ads box-slidebar">
		<a href="#">
			<img src="<?php echo Yii::app()->theme->baseUrl; ?>/resources/html/images/ads_300x250.jpg">
		</a>
	</div>
	 -->
	<div class="bar-also-like box-slidebar">
		<div class="top-bar-dropdown">
			<span><?php echo Lang::t('article', 'You might also like');?></span>
		</div>
		<?php $this->widget('backend.modules.news.widgets.LatestPickWidget'); ?>
		<div class="clear"></div>
	</div>
</div>
<div class="clear"></div>
<?php $this->widget('frontend.widgets.home.ArticleEmailWidget'); ?>
<?php $this->widget('frontend.widgets.home.PopupLoginWidget'); ?>








