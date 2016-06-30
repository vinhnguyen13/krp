<div class="header-fs section-<? echo $section->slug; ?>">
	<h2 class="left"><? echo $section->title; ?></h2>
	<div class="right drop-select-fs">
		<span class="txt-left left"><?php echo Lang::t('article', 'Display');?>:</span>
		<div class="top-bar-dropdown">
			<span id="choose-item" class="choose-item-sort-section"><span id="selected-item"><?php echo Lang::t('article', 'Most Current');?></span></span>
			<div class="dropdown-select" id="sort_section">
				<ul>
					<?php if(isset($sort))	 { ?>	
					<li><span id="current" <?php echo ($sort == 'current') ? 'class="active"' : null;?>><?php echo Lang::t('article', 'Most Current');?></span></li>
					<li><span id="view" <?php echo ($sort == 'view') ? 'class="active"' : null;?>><?php echo Lang::t('article', 'Most View');?></span></li>
					<li><span id="comment" <?php echo ($sort == 'comment') ? 'class="active"' : null;?> ><?php echo Lang::t('article', 'Most Comment');?></span></li>
					<?php } ?>
				</ul>
			</div>
		</div>
	</div>
</div>
<?php if(!empty($news)){?>
	<?php foreach ($news as $key => $article) {?>
		<?php $url = Yii::app()->createUrl('/article/view', array('section' => $article->sections['0']->slug, 'slug' => $article->slug, 'id' => $article->id));?>
		<div class="item-fs-box <?php echo (($key + 1) % 3) ? 'left' : 'right';?>">
			<a href="<?php echo $url;?>" title="<?php echo $article->title;?>">
				<?php echo $article->getImageThumbnail(array('border' => '', 'width' => 324, 'height' => 242)); ?>
			</a>
			<p class="date-post-fs">
				<label><?php echo date('M', $article->public_time) ;?></label>.  <?php echo date('d h:i A', $article->public_time) ;?>
				<span>|</span> <?php echo Lang::t('article', 'By');?> <a href="<?php echo $article->user->getUserUrl();?>" target="_blank"><?php echo $article->getAuthorName();?></a>
			</p>
			<h4><a class="" href="<?php echo $url;?>" title="<?php echo $article->title;?>"><?php echo $article->title;?></a></h4>
			<p><?php echo Util::partString($article->description, 0,150); ?></p>
		</div>
	<?php }?>
<?php } ?>
<?php if(!empty($pages)):?>
	<div class="pagination">
		<div class="pager">
			<?php $this->widget('backend.extensions.ExtLinkPager',array('pages'=>$pages)); ?>
		</div>
	</div>
<?php endif;?>

<script type="text/javascript">
jQuery(function($) {	
	var $itemShow = $('#sort_section ul li span');
	var active_text = $('#sort_section ul li').find('.active').text();
	$('#choose-item.choose-item-sort-section span#selected-item').text(active_text);
	
	$itemShow.click(function(){
		var txt = $(this).text();
		var value = $(this).attr('id');
		$('#sort_section').hide();
		$('#choose-item.choose-item-sort-section').removeClass('active');
		$('#choose-item.choose-item-sort-section span#selected-item').text(txt);
		if(value){
			var url = '<?php echo Yii::app()->createUrl('//article/section', array('section' => $section->slug));?>?sort=' + value;
				window.location.href = url; 
		}
	});
});
</script>

