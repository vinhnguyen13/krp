<!-- InstanceBeginEditable name="EditRegion3" -->
<div class="container">
	<div class="clearfix mgT-20 mgB-20">
		<div class="pull-right ver-c">
            <?php $this->widget('frontend.widgets.home.LocationWidget'); ?>
		</div>
	</div>
	<div class="title-box">
		<span>Most Popular</span>
	</div>
	<?php if(!empty($news)){?>
	<ul class="clearfix list-popu row">
		<?php
		$count=1;
		foreach ($news as $key => $article) { ?>
			<?php $url = Yii::app()->createUrl('/article/view', array('section' => $article->sections['0']->slug, 'slug' => $article->slug, 'id' => $article->id));?>
			<li class="col-md-6">
				<div class="inner-item clearfix">
					<a href="<?php echo $url; ?>" class="thumb">
						<!--
						<img src="<?php //echo Yii::app()->theme->baseUrl;?>/resources/html/images/img270x175.jpg" alt="" />
						-->
						<?php echo $article->getImageThumbnail(array('border' => '', 'width' => 270, 'height' => 175)); ?>
					</a>
					<div class="intro-item">
						<div class="num-item"><?php echo $count; ?></div>
						<a href="<?php echo $url; ?>" class="link-title"><?php echo $article->title; ?></a>
						<div class="stars d-ib">
							<ul class="clearfix">
                                <?php $current_rating=$article->rating_number!=0?$article->total_points/$article->rating_number:0; ?>
                                <?php
                                for($i=0 ;$i<5 ;$i++){
                                    if($i<$current_rating){?>
                                        <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                                    <?php }else{ ?>
                                        <li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
                                    <?php }
                                }
                                ?>
							</ul>
						</div>
						<a href="#" class="d-ib mgL-10"><?php echo $article->comment; ?> Comments</a>
					</div>
				</div>
			</li>
		<?php
			$count++;
		}?>
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