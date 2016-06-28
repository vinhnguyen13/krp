<?php $url = Yii::app()->createUrl('/article/view', array('section' => $data->sections['0']->slug, 'slug' => $data->slug, 'id' => $data->id));?>
<li>
	<a href="<?php echo $url;?>" title="<?php echo $data->title;?>" class="tmb">
    <?php echo $data->getImageThumbnail(array('border' => '', 'width' => 300, 'height' => 300)); ?>
    </a>
	<p class="category date"><?php echo date('d/m', $data->created) ;?></p>
    <a href="<?php echo $url;?>" title="<?php echo $data->title;?>" class="title"><?php echo $data->title;?></a>
	<p class="des"><?php echo $data->description; ?></p>
	<a href="<?php echo $url;?>" title="" class="more">read more</a>
</li>