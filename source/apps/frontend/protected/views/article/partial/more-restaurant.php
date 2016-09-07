<div class="title-box">
	<span>More Restaurants</span>
</div>
<?php
foreach($mores['news'] as $key=>$value){
	$producturl='';
	$producturl	=	Yii::app()->createUrl('/article/view', array('section' => $value->sections['0']->slug, 'slug' => $value->slug, 'id' => $value->id));
?>
<div class="style-box">
	<a href="<?php echo $producturl; ?>" class="thumb">
		<?php echo $value->getImageThumbnail(array('height' => '300px', 'width' => '382px')); ?>
	</a>
	<div class="intro-item">
		<a href="<?php echo $producturl; ?>" class="link-item"><?php echo $value->title; ?></a>
		<div class="stars d-ib">
			<ul class="clearfix">
                <?php
                for($i=0 ;$i<5 ;$i++){
                    if($i<$value->res_rating){?>
                        <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                    <?php }else{ ?>
                        <li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
                    <?php }
                }
                ?>
			</ul>
		</div>
		<a href="<?php echo $producturl; ?>" class="d-ib mgL-10 fs-13"><?php echo $value->comment; ?> Comments</a>
	</div>
</div>
<?php
}
?>
