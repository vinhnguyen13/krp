<div class="content-wrap" style="text-align: center;">
	<div class="page page-detail detail-style-0">
		<div class="head">
			<a href="#" class="section-name"><?php echo $view->sections[0]->title;?></a>
			<h1><?php echo $view->title;?></h1>
			<span class="date"><?php echo date('M-d, Y', $view->created);?></span>
		</div>
		<!-- cate head -->
		<div class="detail-article">
			<div class="thumbnail">
				<?php echo $view->getImageThumbnail(); ?>
			</div>
			<!-- article thumbnail -->
			<div class="col-left">
				<div class="article-content">
					<?php echo $view->body;?>
					<div class="article-nav clearfix">
						<div class="nav-right">
							<p class="author">Post by <?php echo $view->author_name;?></p>
						</div>
					</div>
					<!-- article nav -->
				</div>
				<!-- article content -->
			</div>
			<!-- right column -->
		</div>
		<!-- article detail -->
	</div>
</div>