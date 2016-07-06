<?php
foreach($newly_opened['news'] as $key=>$value){
	$producturl='';
	$producturl	=	Yii::app()->createUrl('/article/view', array('section' => $value->sections['0']->slug, 'slug' => $value->slug, 'id' => $value->id));
?>
<div class="col-xs-12 col-md-3 pdL-0 pdR-0 box-newly" >
	<div class="style-box" >
		<a href = "<?php echo $producturl; ?>" class="thumb" >
			<!--
			<img src = "<?php echo Yii::app()->theme->baseUrl;?>/resources/html/images/img300x382.jpg" alt = "" />
			-->
			<?php echo $value->getImageThumbnail(array('height' => '300px', 'width' => '382px')); ?>
		</a >
		<div class="text-center title-top" >
			<span class="text-uper" ><?php echo $newly_opened['title']; ?></span>
</div>
<div class="intro-item">
	<a href="<?php echo $producturl; ?>" class="link-item"><?php echo $value->title; ?></a>

	<?php echo $value->description; ?>
</div>
</div>
</div>
<?php
}
?>