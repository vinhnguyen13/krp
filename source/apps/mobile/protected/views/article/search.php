<div id="block-subpage">
	<div id="page-category">
		<div class="title-subpage">
			<h1><?php echo Lang::t('article', 'Search Result');?></h1>
			<div class="clear"></div>
		</div>
		<div class="block-category">
			<?php if(!empty($news)): ?>
				<ul>
					<?php 
						$i	=	1;
						$total	=	sizeof($news);
						foreach ($news as $article): 
						$url = Yii::app()->createUrl('/article/view', array('section' => $article->sections['0']->slug, 'slug' => $article->slug, 'id' => $article->id));
						$date	=	date('j Y g:i A', $article->created);
						if($i % 3 == 0){
							$i	=	0;
							$class_css	=	' right';
						}else{
							$class_css	=	' left';
						}
					?>
					<li>
						<div class="items"> 
						  <a class="left wrap-img" href="<?php echo $url;?>" title="<?php echo $article->title;?>">
							<?php echo $article->getImageThumbnail(array('border' => '', 'width' => 130, 'height' => 97)); ?>
						  </a>
						  <div class="left wrap-left-item">
						  	  <a href="<?php echo $url;?>" title="<?php echo $article->title;?>"><?php echo $article->title;?></a>
						  	  <p class="post-date"><?php echo $date; ?></p>
						  	  <p><?php echo Util::partString($article->description, 0, 100); ?></p>
						  	  <a href="<?php echo $url;?>" class="cmt-common"><i class="icon-common">&nbsp;</i><b><?php echo $article->comment;?></b><?php echo Lang::t('general', 'Comment'); ?></a>
						  </div>
						</div>
					</li>
					 <?php 
					 	$i++;
					 	endforeach; 
					 ?>
				 </ul>
				<div class="clear"></div>
			<?php endif; ?>
		</div>
		<?php if(!empty($pages)):?>
		<div class="pagination">
			<?php $this->widget('backend.extensions.ExtLinkPager',array('pages'=>$pages)); ?>
		</div>
		
		<?php endif; ?>		
		<div class="clear"></div>
	</div>
</div>