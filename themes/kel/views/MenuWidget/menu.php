<div class="navigation">
	<ul class="wrap">
		<li class="item">
			<a href="/index.php">Home</a>
		</li>
		<li class="item">
			<a href="<?php echo Yii::app()->createUrl('//article/editor');?>" title="Editor's Picks">Editor's Picks</a>
		</li>
		<?php if(isset($section)) {?>
			<?php foreach ($section as $key => $value) {?>
				<li class="item">
					<a href="<?php echo $value->getUrl();?>" title="<?php echo $value->title;?>"><?php echo $value->title;?></a>
					<?php if(count($category->getCategories($value->id)) > 0) {?>
					<div class="sub">
						<span class="grad"></span>
						<ul>
							<?php foreach ($category->getCategories($value->id) as $cat) {?>
							<li><a href="<?php echo $cat->getUrl($value->slug);?>" title="<?php echo $cat->title;?>"><?php echo $cat->title;?></a></li>
							<?php } ?>
						</ul>
					</div>
					<?php } ?>
				</li>
			<?php } ?>
		<?php } ?>
		
	</ul>
</div>