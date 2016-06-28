<div class="nav-left left">
	<ul>
		<li class="home-icon"><a class="icon_common" href="<?php echo Yii::app()->homeUrl; ?>"></a></li>
		<li><a href="<?php echo Yii::app()->createUrl('//article/editor');?>"><?php echo Lang::t('general', 'editor\'s pick'); ?></a></li>
		<?php if(isset($section)) {?>
			<?php $number_section = count($section) - 1;?>
			<?php foreach ($section as $key => $value) {?>
				<li <?php echo ($key == $number_section) ? 'class="end-li"' : '';?>>
					<a href="<?php echo $value->getUrl();?>" title="<?php echo $value->title;?>"><?php echo $value->title;?></a>
					<?php if(count($category->getCategories($value->id)) > 0) {?>
					<div class="submenu">
						<div>
							<ul>
								<?php foreach ($category->getCategories($value->id) as $cat) {?>
								<li><a href="<?php echo $cat->getUrl($value->slug);?>" title="<?php echo $cat->title;?>"><?php echo $cat->title;?></a></li>
								<?php } ?>
							</ul>
							<span></span>
						</div>
					</div>
					<?php } ?>
				</li>
			<?php } ?>
		<?php } ?>
	</ul>
</div>