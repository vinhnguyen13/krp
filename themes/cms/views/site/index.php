<?php $this->pageTitle=Yii::app()->name; ?>

<h2>Dashboard</h2>
<div class="modules">
	<div class="module">
		<h3><a href="<?php echo Yii::app()->createUrl('//user/user/admin'); ?>" title="Users"><img alt="" src="<?php echo Yii::app()->theme->baseUrl; ?>/resources/images/default.png"> Users</a></h3>
		<ul>
			<li><a href="<?php echo Yii::app()->createUrl('//user/user/admin'); ?>">Admin</a></li>
			<li><a href="<?php echo Yii::app()->createUrl('//user/user/create'); ?>">Create</a></li>
		</ul>
	</div>
	<div class="module">
		<h3><a href="<?php echo Yii::app()->createUrl('//news/article/admin'); ?>" title="News"><img alt="" src="<?php echo Yii::app()->theme->baseUrl; ?>/resources/images/News.png"> News</a></h3>
		<ul>
			<li><a href="<?php echo Yii::app()->createUrl('//news/article/admin'); ?>">View Articles</a></li>
			<li><a href="<?php echo Yii::app()->createUrl('//news/article/create'); ?>">Create Articles</a></li>
		</ul>
	</div>
	<div class="module">
		<h3><a href="<?php echo Yii::app()->createUrl('//gallerymanager'); ?>" title="Gallery"><img alt="" src="<?php echo Yii::app()->theme->baseUrl; ?>/resources/images/BackOffice.png"> Gallery</a></h3>
		<ul>
			<li><a href="<?php echo Yii::app()->createUrl('//gallerymanager'); ?>">View Gallery</a></li>
			<li><a href="<?php echo Yii::app()->createUrl('//gallerymanager/default/create'); ?>">Create Gallery</a></li>
		</ul>
	</div>
	<div class="module">
		<h3><a href="<?php echo Yii::app()->createUrl('//systems/badgeConfig/admin'); ?>" title="Badge Config"><img alt="" src="<?php echo Yii::app()->theme->baseUrl; ?>/resources/images/default.png"> Badge Config</a></h3>
	</div>
	<div class="module">
		<h3><a href="<?php echo Yii::app()->createUrl('//systems/badgeStats/admin'); ?>" title="Badge Stats"><img alt="" src="<?php echo Yii::app()->theme->baseUrl; ?>/resources/images/default.png"> Badge Stats</a></h3>
	</div>
</div>


