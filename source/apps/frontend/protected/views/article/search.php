<div class="header-fs">
  <h2 class="left"><?php echo Lang::t('article', 'Search Result');?></h2>
</div>
<?php if(!empty($news)): ?>

<?php 
	$i	=	1;
	$total	=	sizeof($news);
	foreach ($news as $article): 
	$url = Yii::app()->createUrl('/article/view', array('section' => $article->sections['0']->slug, 'slug' => $article->slug, 'id' => $article->id));
	$date	=	'<label>' . date('M', $article->created) . '</label> ' . date('j Y g:i A', $article->created);
	if($i % 3 == 0){
		$i	=	0;
		$class_css	=	' right';
	}else{
		$class_css	=	' left';
	}
?>
<div class="item-fs-box<?php echo $class_css; ?>"> <a href="<?php echo $url;?>"><?php echo $article->getImageThumbnail(array('border' => '', 'width' => 324, 'height' => 242)); ?></a>
  <p class="date-post-fs">
    <?php echo $date; ?> <span>|</span> <?php echo Lang::t('article', 'By');?> <a href="<?php echo $article->user->getUserUrl();?>"><?php echo $article->getAuthorName();?></a></p>
  <h4><a class="" href="<?php echo $url;?>"><?php echo $article->title;?></a> </h4>
  <p><?php echo Util::partString($article->description, 0, 150); ?></p>
</div>
 <?php 
 	$i++;
 	endforeach; 
 ?>
 
<div class="clear"></div>
<?php endif; ?>

<?php if(!empty($pages)):?>
<div class="pagination">
	<?php $this->widget('backend.extensions.ExtLinkPager',array('pages'=>$pages)); ?>
</div>
<div class="clear"></div>
<?php endif; ?>
