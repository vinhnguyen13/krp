<li><a href="<?php echo Yii::app()->homeUrl; ?>"><?php echo Lang::t('general', 'Homepage'); ?></a></li>
<li><a href="<?php echo Yii::app()->createUrl('//article/editor');?>"><?php echo Lang::t('general', 'editor\'s pick'); ?></a></li>
<?php if(isset($section)) {?>
	<?php foreach ($section as $key => $value) {?>
		<?php if(count($category->getCategories($value->id)) > 0) {?>
			<li class="has-submenu">
				<span class="show-more-menu"><span class="icon-common">&nbsp;</span></span>
				<a href="<?php echo $value->getUrl();?>"><?php echo $value->title;?></a>
				<?php if(count($category->getCategories($value->id)) > 0) {?>
					<div class="block-submenu hide">
						<ul>
							<?php foreach ($category->getCategories($value->id) as $cat) {?>
								<li><a href="<?php echo $cat->getUrl($value->slug);?>" title="<?php echo $cat->title;?>"><?php echo $cat->title;?></a></li>
							<?php } ?>
						</ul>
					</div>
				<?php } ?>
			 </li>
		<?php } else { ?>
			<li><a href="<?php echo $value->getUrl();?>" title="<?php echo $value->title;?>"><?php echo $value->title;?></a></li>
		<?php } ?>
	<?php } ?>
<?php } ?>