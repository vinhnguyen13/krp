<div class="title-box">
	<span>More Video</span>
</div>
<?php
foreach($morevideos['news'] as $key=>$value){
	$producturl='';
	$producturl	=	Yii::app()->createUrl('/article/view', array('section' => $value->sections['0']->slug, 'slug' => $value->slug, 'id' => $value->id));
?>
<div class="style-box-normal">
	<a href="<?php echo $producturl; ?>" class="thumb thumb-video">
		<!--
		<img src="<?php //echo Yii::app()->theme->baseUrl;?>/resources/html/images/img300x382.jpg" alt="">
		-->
		<?php echo $value->getImageThumbnail(array('height' => '300px', 'width' => '382px')); ?>
		<span class="icon-video"><i class="fa fa-play-circle-o" aria-hidden="true"></i></span></a>
	<div class="intro-item">
		<a href="<?php echo $producturl; ?>" class="link-item"><?php echo $value->title; ?></a>
	</div>
</div>
<?php
}
?>