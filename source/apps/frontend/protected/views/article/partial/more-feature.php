<?php
if(isset($mores['news'])){
?>
<div class="title-box">
    <span>More Features</span>
</div>
<?php
foreach($mores['news'] as $key=>$value){
	$producturl='';
	$producturl	=	Yii::app()->createUrl('/article/view', array('section' => $value->sections['0']->slug, 'slug' => $value->slug, 'id' => $value->id));
?>
    <div class="style-box-normal">
        <a href="<?php echo $producturl; ?>" class="thumb">
            <!--
            <img src="<?php //echo Yii::app()->theme->baseUrl;?>/resources/html/images/img300x382.jpg" alt="">
            -->
            <?php echo $value->getImageThumbnail(array('height' => '300px', 'width' => '382px')); ?>
        </a>
        <div class="intro-item">
            <a href="<?php echo $producturl; ?>" class="link-item"><?php echo $value->title; ?></a>
        </div>
    </div>
<?php
}
}
?>