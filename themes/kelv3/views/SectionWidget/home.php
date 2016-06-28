	<?php //$this->widget('frontend.widgets.home.SliderWidget'); ?>
	<?php
	/*
	foreach ($section as $section_value): ?>
	<div class="block-category cate-<? echo $section_value->slug; ?>">
		<h1><?php echo $section_value->title;?></h1>
		<?php 
			$article = new Article();
			$data = $article->getListArticlesBySectionHome($section_value->id);

			//first product
			if(isset($data['news'][0])): 
			
			$first_product	=	$data['news'][0];
			$first_producturl	=	Yii::app()->createUrl('/article/view', array('section' => $first_product->sections['0']->slug, 'slug' => $first_product->slug, 'id' => $first_product->id));
			$date_time	=	date('M j Y g:i A', $first_product->public_time);
		?>
		<div class="item-big">
			<a href="<?php echo $first_producturl;?>" title="<?php echo $first_product->title; ?>"><?php echo $first_product->getImageThumbnail2(array('height' => '300px', 'width' => '400px'));?></a>
			<p class="date-time-post"><?php echo $date_time; ?></p>
			<h2><a href="<?php echo $first_producturl;?>"><?php echo $first_product->title; ?></a></h2>
			<p><?php echo Util::partString($first_product->description, 0, 210); ?></p>
			<div class="seemore">
				<!-- 
				<a class="icon-more right" href="<?php echo $first_producturl;?>">
					<span><?php echo Lang::t('general', 'See More'); ?></span><i class="icon_common icon-see-more">&nbsp;</i>
				</a>
				 -->
				<p class="num-comment"><i class="icon_common">&nbsp;</i><b><?php echo $first_product->comment; ?></b> <?php echo Lang::t('general', 'Comment'); ?> </p>
			</div>
			<div class="clear"></div>
		</div>	
		<?php endif; ?>
		
		<?php 
			//for right list product in category
			if(isset($data['news'][1])): 
			array_shift($data['news']);
		?>
		<div class="item-right">
			<?php 
			$thefirstrow	=	true;
			$keys = array_keys($data['news']);
			$lastKey = $keys[sizeof($data['news'])-1];
			foreach ($data['news'] as $key => $value): 
				if($thefirstrow){
					$class_css	=	'box-news';
					$thefirstrow	=	false;
				}else{
					$class_css	=	'box-news last-box-news';
				}
				$producturl	=	Yii::app()->createUrl('/article/view', array('section' => $value->sections['0']->slug, 'slug' => $value->slug, 'id' => $value->id));
				
			?>
			<div class="<?php echo $class_css; ?>">
				<a href="<?php echo $producturl; ?>"><?php echo $value->getImageThumbnail(array('height' => '194px', 'width' => '258px'));?></a>
				<h3><a href="<?php echo $producturl; ?>"><?php echo $value->title;?></a></h3>
				<p class="num-comment"><i class="icon_common">&nbsp;</i><b><?php echo $value->comment; ?></b> <?php echo Lang::t('general', 'Comment'); ?> </p>
				<?php if($lastKey == $key): ?>
				<a href="<?php echo $section_value->getUrl(); ?>" class="icon-more right"><span><?php echo Lang::t('general', 'More in'); ?> <?php echo $section_value->title; ?></span><i class="icon_common icon-see-more">&nbsp;</i></a>
				<?php endif; ?>
			</div>
			<?php endforeach; ?>
		</div>		
		<?php endif; ?>
		
		<div class="clear"></div>	

		<!-- Picks list -->
	</div>
	<?php endforeach;
	*/
	?>

	<div class="news-promo">
		<div class="title-box">
			<span>News & Promo</span>
		</div>
		<div class="items">
			<div class="row">
				<div class="col-xs-12 col-md-4 col-sm-6">
					<a href="#" class="thumb"><img src="<?php echo Yii::app()->theme->baseUrl;?>/resources/html/images/img102x132.jpg" alt="" /></a>
					<div class="intro-item">
						<a href="#" class="link-item">Hong Kong's Top 10 Cantonese Restaurants</a>
						<p>When an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries.</p>
					</div>
				</div>
				<div class="col-xs-12 col-md-4 col-sm-6">
					<a href="#" class="thumb"><img src="<?php echo Yii::app()->theme->baseUrl;?>/resources/html/images/img102x132.jpg" alt="" /></a>
					<div class="intro-item">
						<a href="#" class="link-item">Hong Kong's Top 10 Cantonese Restaurants</a>
						<p>When an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries.</p>
					</div>
				</div>
				<div class="col-xs-12 col-md-4 col-sm-6">
					<a href="#" class="thumb"><img src="<?php echo Yii::app()->theme->baseUrl;?>/resources/html/images/img102x132.jpg" alt="" /></a>
					<div class="intro-item">
						<a href="#" class="link-item">Hong Kong's Top 10 Cantonese Restaurants</a>
						<p>When an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries.</p>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="clearfix mgB-40 box-big-news-promo">
		<div class="col-xs-12 col-md-3 pdL-0 pdR-0 box-newly">
			<div class="style-box">
				<a href="#" class="thumb"><img src="<?php echo Yii::app()->theme->baseUrl;?>/resources/html/images/img300x382.jpg" alt="" /></a>
				<div class="text-center title-top">
					<span class="text-uper">newly opened</span>
				</div>
				<div class="intro-item">
					<a href="#" class="link-item">Noma Australia: vision and design</a>
					<p>When it came to bringing Noma Australia to life in Sydney, chef René Redzepi wanted the restaurant's interiors to be shaped.</p>
				</div>
			</div>
		</div>
		<div class="col-xs-12 col-md-6 pdL-30 pdR-30 slide-intro">
			<div class="style-box style-box-1 swiper-container">
				<div class="swiper-wrapper">
					<div class="swiper-slide">
						<a href="#" class="thumb"><img src="<?php echo Yii::app()->theme->baseUrl;?>/resources/html/images/img539x480.jpg" alt="" /></a>
						<div class="intro-item">
							<a href="#" class="link-item">A new restaurant at 10 Neild Avenue</a>
							<p>When it came to bringing Noma Australia to life in Sydney, chef René Redzepi wanted the restaurant's interiors to be shaped.</p>
						</div>
					</div>
					<div class="swiper-slide">
						<a href="#" class="thumb"><img src="<?php echo Yii::app()->theme->baseUrl;?>/resources/html/images/img539x480.jpg" alt="" /></a>
						<div class="intro-item">
							<a href="#" class="link-item">A new restaurant at 10 Neild Avenue</a>
							<p>When it came to bringing Noma Australia to life in Sydney, chef René Redzepi wanted the restaurant's interiors to be shaped.</p>
						</div>
					</div>
					<div class="swiper-slide">
						<a href="#" class="thumb"><img src="<?php echo Yii::app()->theme->baseUrl;?>/resources/html/images/img539x480.jpg" alt="" /></a>
						<div class="intro-item">
							<a href="#" class="link-item">A new restaurant at 10 Neild Avenue</a>
							<p>When it came to bringing Noma Australia to life in Sydney, chef René Redzepi wanted the restaurant's interiors to be shaped.</p>
						</div>
					</div>
					<div class="swiper-slide">
						<a href="#" class="thumb"><img src="<?php echo Yii::app()->theme->baseUrl;?>/resources/html/images/img539x480.jpg" alt="" /></a>
						<div class="intro-item">
							<a href="#" class="link-item">A new restaurant at 10 Neild Avenue</a>
							<p>When it came to bringing Noma Australia to life in Sydney, chef René Redzepi wanted the restaurant's interiors to be shaped.</p>
						</div>
					</div>
				</div>
				<div class="swiper-pagination"></div>
				<div class="swiper-button-next"></div>
				<div class="swiper-button-prev"></div>
			</div>
		</div>
		<div class="col-xs-12 col-md-3 pdL-0 pdR-0 box-ads-follow">
			<div class="ads-350x250"><a href="#"><img src="<?php echo Yii::app()->theme->baseUrl;?>/resources/html/images/img300x250.jpg" alt="" /></a></div>
			<div class="box-letter">
				<div class="clearfix mgB-10">
					<div class="pull-left left-box">
						<span class="font-attitudeL fs-23 mgB-5">newsletter</span>
						<span class="text-uper font-uvnHongB fs-19">Sign Up</span>
					</div>
					<div class="right-box font-uvnHong fs-11 pdT-10">
						<p>Join our list and get the latest </p>
						<p>news Directly in your inbox</p>
					</div>
				</div>
				<form action="">
					<input type="text" class="iput w-100" />
					<button id="btn-letter"></button>
				</form>
			</div>

			<div class="follow-social">
				<div class="title-box">
					<span>follow</span>
				</div>
				<div class="text-center">
					<a href="#" class="icon-social d-ib"><i class="fa fa-facebook" aria-hidden="true"></i></a>
					<a href="#" class="icon-social d-ib"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a>
					<a href="#" class="icon-social d-ib"><i class="fa fa-instagram" aria-hidden="true"></i></a>
				</div>
			</div>
		</div>
	</div>

	<div class="list-restau">
		<div class="title-box">
			<span>restaurants</span>
		</div>
		<div class="row">
			<div class="col-xs-12 col-md-4 col-sm-6">
				<a href="#" class="thumb"><img src="<?php echo Yii::app()->theme->baseUrl;?>/resources/html/images/img135x172.jpg" alt="" /></a>
				<div class="intro-item">
					<a href="#" class="link-item">Noma Australia: vision and design</a>
					<p class="date-post">14.03.2016</p>
					<p>Noma will be auctioning off fifteen tables online today to raise funds for both Oz Harvest and MAD, Redzepi's not-for-profit food education community.</p>
				</div>
			</div>
			<div class="col-xs-12 col-md-4 col-sm-6">
				<a href="#" class="thumb"><img src="<?php echo Yii::app()->theme->baseUrl;?>/resources/html/images/img135x172.jpg" alt="" /></a>
				<div class="intro-item">
					<a href="#" class="link-item">Noma Australia: vision and design</a>
					<p class="date-post">14.03.2016</p>
					<p>Noma will be auctioning off fifteen tables online today to raise funds for both Oz Harvest and MAD, Redzepi's not-for-profit food education community.</p>
				</div>
			</div>
			<div class="col-xs-12 col-md-4 col-sm-6">
				<a href="#" class="thumb"><img src="<?php echo Yii::app()->theme->baseUrl;?>/resources/html/images/img135x172.jpg" alt="" /></a>
				<div class="intro-item">
					<a href="#" class="link-item">Noma Australia: vision and design</a>
					<p class="date-post">14.03.2016</p>
					<p>Noma will be auctioning off fifteen tables online today to raise funds for both Oz Harvest and MAD, Redzepi's not-for-profit food education community.</p>
				</div>
			</div>
			<div class="col-xs-12 col-md-4 col-sm-6">
				<a href="#" class="thumb"><img src="<?php echo Yii::app()->theme->baseUrl;?>/resources/html/images/img135x172.jpg" alt="" /></a>
				<div class="intro-item">
					<a href="#" class="link-item">Noma Australia: vision and design</a>
					<p class="date-post">14.03.2016</p>
					<p>Noma will be auctioning off fifteen tables online today to raise funds for both Oz Harvest and MAD, Redzepi's not-for-profit food education community.</p>
				</div>
			</div>
			<div class="col-xs-12 col-md-4 col-sm-6">
				<a href="#" class="thumb"><img src="<?php echo Yii::app()->theme->baseUrl;?>/resources/html/images/img135x172.jpg" alt="" /></a>
				<div class="intro-item">
					<a href="#" class="link-item">Noma Australia: vision and design</a>
					<p class="date-post">14.03.2016</p>
					<p>Noma will be auctioning off fifteen tables online today to raise funds for both Oz Harvest and MAD, Redzepi's not-for-profit food education community.</p>
				</div>
			</div>
			<div class="col-xs-12 col-md-4 col-sm-6">
				<a href="#" class="thumb"><img src="<?php echo Yii::app()->theme->baseUrl;?>/resources/html/images/img135x172.jpg" alt="" /></a>
				<div class="intro-item">
					<a href="#" class="link-item">Noma Australia: vision and design</a>
					<p class="date-post">14.03.2016</p>
					<p>Noma will be auctioning off fifteen tables online today to raise funds for both Oz Harvest and MAD, Redzepi's not-for-profit food education community.</p>
				</div>
			</div>
			<div class="col-xs-12 col-md-4 col-sm-6">
				<a href="#" class="thumb"><img src="<?php echo Yii::app()->theme->baseUrl;?>/resources/html/images/img135x172.jpg" alt="" /></a>
				<div class="intro-item">
					<a href="#" class="link-item">Noma Australia: vision and design</a>
					<p class="date-post">14.03.2016</p>
					<p>Noma will be auctioning off fifteen tables online today to raise funds for both Oz Harvest and MAD, Redzepi's not-for-profit food education community.</p>
				</div>
			</div>
			<div class="col-xs-12 col-md-4 col-sm-6">
				<a href="#" class="thumb"><img src="<?php echo Yii::app()->theme->baseUrl;?>/resources/html/images/img135x172.jpg" alt="" /></a>
				<div class="intro-item">
					<a href="#" class="link-item">Noma Australia: vision and design</a>
					<p class="date-post">14.03.2016</p>
					<p>Noma will be auctioning off fifteen tables online today to raise funds for both Oz Harvest and MAD, Redzepi's not-for-profit food education community.</p>
				</div>
			</div>
			<div class="col-xs-12 col-md-4 col-sm-6">
				<a href="#" class="thumb"><img src="<?php echo Yii::app()->theme->baseUrl;?>/resources/html/images/img135x172.jpg" alt="" /></a>
				<div class="intro-item">
					<a href="#" class="link-item">Noma Australia: vision and design</a>
					<p class="date-post">14.03.2016</p>
					<p>Noma will be auctioning off fifteen tables online today to raise funds for both Oz Harvest and MAD, Redzepi's not-for-profit food education community.</p>
				</div>
			</div>
		</div>
		<div class="text-center">
			<a href="#" class="view-all text-uper font-centuB">view all</a>
		</div>
	</div>
	</div>

	<div class="list-video-home">
		<div class="clearfix inner-list">
			<div class="col-xs-12 col-lg-3 col-sm-6">
				<div class="item-video">
					<a href="#">
						<div class="bg-bottom"></div>
						<div class="inner-item style-box">
							<div class="thumb">
								<img src="<?php echo Yii::app()->theme->baseUrl;?>/resources/html/images/img324x356.jpg" alt="" />
								<span class="icon-video"><i class="fa fa-play-circle-o" aria-hidden="true"></i></span>
								<div class="text-center title-top"><span class="text-uper">Video (10)</span></div>
							</div>
							<div class="text-center link-title">Gnocchi recipes</div>
						</div>
					</a>
				</div>
			</div>
			<div class="col-xs-12 col-lg-3 col-sm-6">
				<div class="item-video">
					<a href="#">
						<div class="bg-bottom"></div>
						<div class="inner-item style-box">
							<div class="thumb">
								<img src="<?php echo Yii::app()->theme->baseUrl;?>/resources/html/images/img324x356.jpg" alt="" />
								<span class="icon-video"><i class="fa fa-play-circle-o" aria-hidden="true"></i></span>
								<div class="text-center title-top"><span class="text-uper">Video (10)</span></div>
							</div>
							<div class="text-center link-title">Gnocchi recipes</div>
						</div>
					</a>
				</div>
			</div>
			<div class="col-xs-12 col-lg-3 col-sm-6">
				<div class="item-video">
					<a href="#">
						<div class="bg-bottom"></div>
						<div class="inner-item style-box">
							<div class="thumb">
								<img src="<?php echo Yii::app()->theme->baseUrl;?>/resources/html/images/img324x356.jpg" alt="" />
								<span class="icon-video"><i class="fa fa-play-circle-o" aria-hidden="true"></i></span>
								<div class="text-center title-top"><span class="text-uper">Video (10)</span></div>
							</div>
							<div class="text-center link-title">Gnocchi recipes</div>
						</div>
					</a>
				</div>
			</div>
			<div class="col-xs-12 col-lg-3 col-sm-6">
				<div class="item-video">
					<a href="#">
						<div class="bg-bottom"></div>
						<div class="inner-item style-box">
							<div class="thumb">
								<img src="<?php echo Yii::app()->theme->baseUrl;?>/resources/html/images/img324x356.jpg" alt="" />
								<span class="icon-video"><i class="fa fa-play-circle-o" aria-hidden="true"></i></span>
								<div class="text-center title-top"><span class="text-uper">Video (10)</span></div>
							</div>
							<div class="text-center link-title">Gnocchi recipes</div>
						</div>
					</a>
				</div>
			</div>
		</div>
	</div>

	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-md-6 intro-per-cook">
				<div class="title-box">
					<span>People</span>
				</div>
				<div class="row">
					<div class="col-xs-12 col-md-6 col-sm-6">
						<div class="style-box style-box">
							<a href="#" class="thumb"><img src="<?php echo Yii::app()->theme->baseUrl;?>/resources/html/images/img276x352.jpg" alt="" /></a>
							<div class="intro-item text-center">
								<a href="#" class="link-item">Our most anticipated openings of 2016</a>
								<p class="date-post">14.03.2016</p>
								<p>Restaurant Hubert, the first restaurant from the Swillhouse Group (Shady Pines Saloon, The Baxter Inn and Frankie's </p>
							</div>
						</div>
					</div>
					<div class="col-xs-12 col-md-6 col-sm-6">
						<div class="style-box style-box">
							<a href="#" class="thumb"><img src="<?php echo Yii::app()->theme->baseUrl;?>/resources/html/images/img276x352.jpg" alt="" /></a>
							<div class="intro-item text-center">
								<a href="#" class="link-item">Our most anticipated openings of 2016</a>
								<p class="date-post">14.03.2016</p>
								<p>Restaurant Hubert, the first restaurant from the Swillhouse Group (Shady Pines Saloon, The Baxter Inn and Frankie's </p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-md-6 most-popu">
				<div class="title-box">
					<span>Most Popular</span>
				</div>
				<div class="clearfix mgB-10">
					<a href="#" class="d-b ver-c pdR-15 left-box">
						<div class="thumb"><img src="<?php echo Yii::app()->theme->baseUrl;?>/resources/html/images/img131x85.jpg" alt="" /></div>
						01
					</a>
					<div class="right-box pdL-15">
						<a href="#" class="link-title">MOF Japanese Dessert Cafe - Vincom Center</a>
						<div class="stars d-ib">
							<ul class="clearfix">
								<li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
								<li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
								<li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
								<li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
								<li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
							</ul>
						</div>
						<a href="#" class="d-ib mgL-10">15 Comments</a>
					</div>
				</div>
				<div class="clearfix mgB-10">
					<a href="#" class="d-b ver-c pdR-15 left-box">
						<div class="thumb"><img src="<?php echo Yii::app()->theme->baseUrl;?>/resources/html/images/img131x85.jpg" alt="" /></div>
						02
					</a>
					<div class="right-box pdL-15">
						<a href="#" class="link-title">MOF Japanese Dessert Cafe - Vincom Center</a>
						<div class="stars d-ib">
							<ul class="clearfix">
								<li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
								<li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
								<li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
								<li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
								<li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
							</ul>
						</div>
						<a href="#" class="d-ib mgL-10">15 Comments</a>
					</div>
				</div>
				<div class="clearfix mgB-10">
					<a href="#" class="d-b ver-c pdR-15 left-box">
						<div class="thumb"><img src="<?php echo Yii::app()->theme->baseUrl;?>/resources/html/images/img131x85.jpg" alt="" /></div>
						03
					</a>
					<div class="right-box pdL-15">
						<a href="#" class="link-title">MOF Japanese Dessert Cafe - Vincom Center</a>
						<div class="stars d-ib">
							<ul class="clearfix">
								<li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
								<li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
								<li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
								<li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
								<li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
							</ul>
						</div>
						<a href="#" class="d-ib mgL-10">15 Comments</a>
					</div>
				</div>
				<div class="clearfix mgB-10">
					<a href="#" class="d-b ver-c pdR-15 left-box">
						<div class="thumb"><img src="<?php echo Yii::app()->theme->baseUrl;?>/resources/html/images/img131x85.jpg" alt="" /></div>
						04
					</a>
					<div class="right-box pdL-15">
						<a href="#" class="link-title">MOF Japanese Dessert Cafe - Vincom Center</a>
						<div class="stars d-ib">
							<ul class="clearfix">
								<li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
								<li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
								<li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
								<li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
								<li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
							</ul>
						</div>
						<a href="#" class="d-ib mgL-10">15 Comments</a>
					</div>
				</div>
				<div class="clearfix mgB-10">
					<a href="#" class="d-b ver-c pdR-15 left-box">
						<div class="thumb"><img src="<?php echo Yii::app()->theme->baseUrl;?>/resources/html/images/img131x85.jpg" alt="" /></div>
						05
					</a>
					<div class="right-box pdL-15">
						<a href="#" class="link-title">MOF Japanese Dessert Cafe - Vincom Center</a>
						<div class="stars d-ib">
							<ul class="clearfix">
								<li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
								<li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
								<li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
								<li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
								<li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
							</ul>
						</div>
						<a href="#" class="d-ib mgL-10">15 Comments</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	