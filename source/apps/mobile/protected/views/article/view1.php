<?php 
	/* $url_section = $view->sections[0]->getUrl();
	$name_section = $view->sections[0]->title;
	$url_category = $view->categories[0]->getUrl($view->sections[0]->slug);
	$name_category = $view->categories[0]->title; */
?>
<div class="content-wrap">
	<div class="page page-detail detail-style-0">
		<div class="head">
			<a href="<?php echo Yii::app()->createUrl("//article/section", array('section' => $view->sections[0]->slug)); ?>" class="section-name"><?php echo $view->sections[0]->title;?></a>
			<h1><?php echo $view->title;?></h1>
			<span class="date"><?php echo date('M-d, Y', $view->public_time);?></span>
		</div>
		<!-- cate head -->
		<div class="detail-article">
			<?php if(empty($view->galleries)) {?>
			<div class="thumbnail">
				<?php echo $view->getImageThumbnail2(); ?>
			</div>
			<!-- article thumbnail -->
			<?php } else { ?>
			<div class="thumbnail">
				<div id="featured-image">
					<?php $this->renderPartial("partial/gallery", array('view' => $view));?>
				</div>
			</div>
			<?php } ?>			
			<div class="col-left">
				<div class="article-content">
					<?php echo $view->body;?>
					<div class="article-nav clearfix">
						<div class="nav-left">
							<ul>
								<li><a href="javascript:void(0);" class="btn-email"><i class="ismall ismall-email"></i><span class="text">Email</span></a></li>
								<li><a href="javascript:void(0);" class="btn-print"><i class="ismall ismall-print"></i><span class="text">Print</span></a></li>
								<li>
									<a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo Util::getCurrentUrl();?>" target="_blank" class="btn-fb">
										<i class="ismall ismall-fb"></i><span class="text">Share</span>
									</a>
								</li>
							</ul>
						</div>
						<div class="nav-right">
							<p class="author">Post by <?php echo $view->author_name;?></p>
						</div>
					</div>
					<!-- article nav -->
				</div>
				<!-- article content -->
				<div class="article-comment">
					<?php $this->renderPartial("partial/comment-list", $comment);?>
				</div>
				<!-- article comment -->
				<div class="related-article">
					<div class="line"></div>
					<h3>More picks</h3>
                    <?php $this->widget('backend.modules.news.widgets.RelatePickWidget', array('article_id' => $view->id)); ?>
				</div>
				<!-- related article -->
			</div>
			<!-- left column -->
			<div class="col-right">
				<div class="product">
					<div class="product-location">
						<?php 
						if(!empty($view->shops)){
							$shop = $view->shops;
							$shopOnce = $shop[0];
						}
						if(!empty($view->product)){
							$product = $view->product;
							/**************/
							$upro = UserProduct::model()->findByAttributes(array('user_id'=>Yii::app()->user->id, 'article_id'=>$view->id));
							if(!empty($upro)){
								$usrProduct = $upro;
							}else{
								$usrProduct = new UserProduct();
								$usrProduct->user_id = Yii::app()->user->id;
								$usrProduct->article_id = $view->id;
							}
							$usrProduct->view += 1;
							$usrProduct->validate();
							$usrProduct->save();
						?>
						<?php if(!empty($shopOnce)):?>
						<h3>Where to buy</h3>
						<div class="store">
							<h4 class="name"><?php echo $shopOnce->title;?></h4>
							<a href="javascript:void(0)" class="more" title="">Click for more details</a>
							<?php $this->renderPartial('_store', array('product'=>$product, 'shop' => $view->shops));?>
						</div>
						<?php endif;?>
						<!-- product store -->
						<?php if(!empty($product->product_price)):?>
						<div class="price">
							<label>Price:</label> 
							<span class="text"><?php echo $product->product_price;?></span>
						</div>
						<?php endif;?>
						<?php }?>
					</div>
					<!-- product location -->
					<?php 
					if(!empty($view->product) && !Yii::app()->user->isGuest){
						$upro = UserProduct::model()->findByAttributes(array('user_id'=>Yii::app()->user->id));
						$like = $hate = $bought ='';
						if(!empty($upro)){
							if($upro->like == 1){
								$like = 'active';
							}elseif($upro->hate == 1){
								$hate = 'active';
							}elseif($upro->bought == 1){
								$bought = 'active';
							}
						}
					?>
					<div class="product-ulti" tabindex="<?php echo $view->product->article_id;?>" tabarticle="<?php echo $view->id;?>">
						<a class="ulti-btn btn-plike <?php echo $like;?>" href="javascript:void(0);" rel="<?php echo Yii::app()->createUrl('//product/excute', array('type'=>'like'));?>"><i></i><br/><span class="text">Like</span></a> 
						<a class="ulti-btn btn-phate <?php echo $hate;?>" href="javascript:void(0);" rel="<?php echo Yii::app()->createUrl('//product/excute', array('type'=>'hate'));?>"><i></i><br/><span class="text">Dislike</span></a>
						<a class="ulti-btn btn-pbought <?php echo $bought;?>" href="javascript:void(0);" rel="<?php echo Yii::app()->createUrl('//product/excute', array('type'=>'bought'));?>"><i></i><br/><span class="text">Bought it</span></a>
					</div>
					<?php }?>
					<!-- Product function -->
				</div>
				<!-- product area -->
				<div class="latest-article">
					<h3>Latest Picks</h3>
                    <?php $this->widget('backend.modules.news.widgets.LatestPickWidget'); ?>
				</div>
				<!-- latest articles -->
				<div class="ads">
					<span class="title">Advertisement</span>
					<a href="#">
						<img src="<?php echo Yii::app()->theme->baseUrl; ?>/resources/html/css/images/img-ads-001.jpg" alt="" border=""/>
					</a>
				</div>
				<!-- Advertisement -->
			</div>
			<!-- right column -->
		</div>
		<!-- article detail -->
	</div>
</div>
<!-- content board -->
<div class="form-email">
<?php $this->widget('mobile.widgets.home.ArticleEmailWidget'); ?>
</div>








