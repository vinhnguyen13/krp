<?php 
	$url_section = $view->sections[0]->getUrl();
	$name_section = $view->sections[0]->title;
	if(isset($view->categories[0])){
		$url_category = $view->categories[0]->getUrl($view->sections[0]->slug);
		$name_category = $view->categories[0]->title;;
	}
?>
<!-- InstanceBeginEditable name="content" -->
<div id="block-subpage">
	<div class="page-detail">
		<div class="breackum">
			<a href="<?php echo $url_section;?>"><?php echo $name_section;?></a>
			<?php if(isset($name_category)) { ?>
				<a href="<?php echo $url_category;?>"><?php echo $name_category;?></a>
			<?php } ?>
			<a class="end" href="javascript:void(0);"><?php echo $view->title;?></a>
		</div>
		<div class="clear"></div>
		<div class="title-article">
			<h1><?php echo $view->title;?></h1>
			<p class="post-detail"><?php echo date('M. d h:i A', $view->public_time) ;?> | <?php echo Lang::t('article', 'By');?> <a href="<?php echo $view->user->getUserUrl();?>"><?php echo $view->getAuthorName();?></a></p>
			<div class="clear"></div>
			<article>
					<?php if(empty($view->galleries)) {?>
						<div class="wrap-img show-popup-gallery">
							<?php if($layout == 1) {?>
								<?php echo $view->getImageThumbnail(); ?></a>
							<?php } else { ?>
								<?php echo $view->getImageThumbnail2(); ?>
							<?php } ?>
						</div>
					<?php } else { ?>
						<div class="wrap-img show-popup-gallery">
							<a href="#">
								<?php if($layout == 1) {?>
									<?php echo $view->getImageThumbnail(); ?></a>
								<?php } else { ?>
									<?php echo $view->getImageThumbnail2(); ?>
								<?php } ?>
							</a>
						</div>
					<?php } ?>
					
					<?php if(!empty($view->galleries)) {?>
						<?php $this->renderPartial("partial/gallery", array('view' => $view));?>
					<?php } ?>
				<p><?php echo $view->body;?></p>
			</article>
			<div class="social-block">
				<ul id="social_button" tabindex="<?php echo $view->product->article_id;?>" tabarticle="<?php echo $view->id;?>">
					<li class="icon-map"><a class="icon-touch" href="#"><span class="icon-common">&nbsp;</span></a></li>
					<?php $this->renderPartial("partial/social", array('view' => $view));?>
					<li class="icon-email"><a class="icon-touch" href="#"><span class="icon-common">&nbsp;</span></a></li>
					<li class="icon-face"><a class="icon-touch" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo Util::getCurrentUrl();?>" target="_blank"><span class="icon-common">&nbsp;</span></a></li>
				</ul>
			</div>
			<div class="clear"></div>
			<div class="block-cmt">
				<h1><?php echo Lang::t('article', 'Post a comments');?></h1>
				<?php $this->renderPartial("partial/comment-list", $comment);?>
			</div>
		</div>
		<div class="clear"></div>                    	
	</div>
</div>
<!-- InstanceEndEditable -->
<div class="clear"></div>	
<div id="popup-gallery" class="popup"></div>
<div id="popup-wheretobuy" class="popup">
<?php $this->renderPartial("partial/product", array('view' => $view));?>
</div>