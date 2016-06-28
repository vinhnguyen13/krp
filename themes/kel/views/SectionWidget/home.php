<div class="sections">
	<?php foreach ($section as $value) {?>
	<div class="section section-odd">
		<div class="section-head">
			<div class="section-name">
				<h2><a href="<?php echo $value->getUrl();?>" title="<?php echo $value->title;?>"><?php echo $value->title;?></a></h2>
				<span class="arrow-above"></span>
				<span class="arrow-below"></span>
			</div>								
			<?php 
				$article = new Article();
				$data = $article->getListArticlesBySectionHome($value->id, 0);
			?>
			<?php foreach ($data['news'] as $key => $value){ ?>
				<?php if($key == 0) {?>
					<div class="wrap"><?php echo $value->getImageThumbnail2(array('height' => '244px', 'width' => '430px'));?></div>
				<?php } ?>
			<?php } ?>
		</div>
		<!-- Section header -->
		<div class="section-content">
			<ul>
				<?php foreach ($data['news'] as $key => $value){ ?>
				<li class="item <?php echo ($key == 0) ? 'first': '' ?>">
					<h3 class="clearfix">
						<a href="<?php echo Yii::app()->createUrl('/article/view', array('section' => $value->sections['0']->slug, 'slug' => $value->slug, 'id' => $value->id));?>" title="">
							<?php echo $value->getImageThumbnail(array('height' => '26px', 'width' => '26px'));?>
							<span class="text"><?php echo $value->title;?></span>
							<?php if($key == 0) {?>
								<span class="des"><?php echo Util::partString($value->description, 0, 100); ?></span>
							<?php } ?>
						</a>
					</h3>
				</li>
				<?php } ?>
			</ul>
		</div>
		<!-- Picks list -->
	</div>
	<?php } ?>
	
</div>