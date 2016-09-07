<!-- InstanceBeginEditable name="EditRegion3" -->
<div class="container">
	<div class="clearfix mgT-20 mgB-20">
		<div class="pull-right ver-c">
            <?php $this->widget('frontend.widgets.home.LocationWidget'); ?>
		</div>
	</div>
	<div class="title-box">
		<span>Features</span>
	</div>
	<?php if(!empty($news)){?>
	<ul class="clearfix row list-restau-page">
		<?php foreach ($news as $key => $article) { ?>
			<?php $url = Yii::app()->createUrl('/article/view', array('section' => $article->sections['0']->slug, 'slug' => $article->slug, 'id' => $article->id));?>
			<li class="col-lg-3 col-md-4 col-sm-6">
				<div class="inner-restau">
					<a href="<?php echo $url;?>" class="thumb">
						<?php echo $article->getImageThumbnail(array('border' => '', 'width' => 275, 'height' => 345)); ?>
					</a>
					<div class="intro-item">
						<a href="<?php echo $url;?>" class="link-title"><?php echo $article->title;?></a>
						<p><?php echo Util::partString($article->description, 0,150); ?></p>
					</div>
				</div>
			</li>
		<?php }?>
	</ul>
	<?php } ?>
	<div class="pagi mgB-20">
		<?php
        if(!empty($pages)):?>
                    <?php $this->widget('backend.extensions.ExtLinkPager',array('pages'=>$pages)); ?>
        <?php endif;
		?>
	</div>
</div>
<!-- InstanceEndEditable -->