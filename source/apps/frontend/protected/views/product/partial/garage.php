<?php if(!empty($products)){?>
<ul>
    <?php foreach ($products as $pro){
		if(empty($pro->article)){
			continue;
		}
		$src = Yii::app()->theme->baseUrl.'/resources/html/css/images/img-product-noimg.jpg';
		if(!empty($pro->article->galleries[0]->galleryPhotos[0])){
			$src = $pro->article->getImageThumbnail(array('height' => 'auto', 'width' => '132px'));
		}
		$href = Yii::app()->createUrl('/article/view', array('section' => $pro->article->sections['0']->slug, 'slug' => $pro->article->slug, 'id' => $pro->article->id));
	?>
    <li><a target="_blank" href="<?php echo $href;?>" class="wrap-img"><?php echo $src ?></a><a target="_blank" href="<?php echo $href;?>"><?php echo $pro->article->product->product_name;?></a><span class="added_date">added <?php echo date('d/m/Y', $pro->created) ?></span></li>
    <?php }?>
</ul>
<div class="clear"></div>
<div style="display: none;" id="next_page" page="<?php echo $next_page;?>"></div>
<?php }?>
				