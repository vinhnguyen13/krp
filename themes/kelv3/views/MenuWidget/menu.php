<!--
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
-->
<div class="inner-menu">
	<ul class="clearfix">
		<li class="home-icon"><a class="icon_common" href="<?php echo Yii::app()->homeUrl; ?>"></a></li>
		<li><a href="<?php echo Yii::app()->createUrl('//article/editor');?>"><?php echo Lang::t('general', 'editor\'s pick'); ?></a></li>
		<!--
		<li class="user-auth">
			<a href="#" class="pull-left login-link">LOG IN</a>
			<a href="#" class="pull-left regis-link">CREATE<br>ACCOUNT</a>
		</li>
		<li class="show-sub">
			<a href="#">Features<i class="fa" aria-hidden="true"></i></a>
			<div class="sub-cate">
				<ul class="clearfix">
					<li><a href="#">Restaurant News & Features</a></li>
					<li><a href="#">Restaurant Guide</a></li>
					<li><a href="#">Restaurant News & Features</a></li>
					<li><a href="#">Restaurant rEVIEW</a></li>
					<li><a href="#">Restaurant News & Features</a></li>
				</ul>
			</div>
		</li>
		<li><a href="#">Restaurants<i class="fa" aria-hidden="true"></i></a></li>
		<li><a href="#">News & Promo<i class="fa" aria-hidden="true"></i></a></li>
		<li><a href="#">Most Popular<i class="fa" aria-hidden="true"></i></a></li>
		<li><a href="#">People<i class="fa" aria-hidden="true"></i></a></li>
		<li><a href="#">Video</a></li>
		-->
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