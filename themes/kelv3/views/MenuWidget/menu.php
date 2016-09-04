<div class="inner-menu">
	<ul class="clearfix">
		<li class="home-icon"><a class="icon_common" href="<?php echo Yii::app()->homeUrl; ?>"></a></li>
		<?php if(isset($section)) {?>
			<?php $number_section = count($section) - 1;?>
			<?php foreach ($section as $key => $value) {?>
				<li <?php echo ($key == $number_section) ? 'class="end-li"' : 'show-sub';?>>
					<a href="<?php echo $value->getUrl();?>" title="<?php echo $value->title;?>"><?php echo $value->title;?></a>
					<?php if(count($category->getCategories($value->id)) > 0) {?>
						<div class="sub-cate">
								<ul class="clearfix">
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