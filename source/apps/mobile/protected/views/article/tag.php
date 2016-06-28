<!-- InstanceBeginEditable name="content" -->
<div id="block-subpage">
	<div class="page-category">
		<div class="title-subpage">
			<div class="box-select right">
				<select id="sort_tags">
					<?php if(isset($sort))	 { ?>	
					<option <?php echo ($sort == 'current') ? 'selected="selected"' : null;?> value="current"><?php echo Lang::t('article', 'Most Current');?></option>
					<option <?php echo ($sort == 'view') ? 'selected="selected"' : null;?> value="view"><?php echo Lang::t('article', 'Most View');?></option>
					<option <?php echo ($sort == 'comment') ? 'selected="selected"' : null;?> value="comment"><?php echo Lang::t('article', 'Most Comment');?></option>
					<?php } ?>
				</select>
				<span class="arrow icon-common">&nbsp;</span>
			</div>
			<h1><? echo $tag; ?></h1>
			<div class="clear"></div>
		</div>
		<div class="block-category">
			<ul>
				<?php if(!empty($news)){?>
					<?php foreach ($news as $key => $article) {?>
						<?php $url = Yii::app()->createUrl('/article/view', array('section' => $article->sections['0']->slug, 'slug' => $article->slug, 'id' => $article->id));?>
						<li>
							<div class="items">
								<a href="<?php echo $url;?>" class="left wrap-img"><?php echo $article->getImageThumbnail(array('border' => '', 'width' => 130, 'height' => 97)); ?></a>
								<div class="left wrap-left-item">
									<a href="<?php echo $url;?>" title="<?php echo $article->title;?>"><?php echo $article->title;?></a>
									<p class="post-date"><?php echo date('M. d h:i A', $article->public_time) ;?></p>
									<p><?php echo Util::partString($article->description, 0,60); ?></p>
									<a class="cmt-common" href="#"><i class="icon-common">&nbsp;</i><b><?php echo $article->comment;?></b><?php echo Lang::t('general', 'Comment');?></a>
								</div>
							</div>
						</li>
					<?php }?>
				<?php } else { ?>
					<li>
						<div class="items">
							<p><?php echo Lang::t('general', 'No item added yet');?></p>
						</div>
					</li>
				<?php } ?>
			</ul>
			<div class="clear"></div>
		</div>
		<?php if(!empty($pages)) { ?>
		<div class="pagination">
			<div class="pager">
				<?php $this->widget('backend.extensions.ExtLinkPager',array('pages'=>$pages)); ?>
			</div>
		</div>
		<div class="clear"></div>
		<?php } ?>
	</div>
</div>
<!-- InstanceEndEditable -->
<div class="clear"></div>




<script type="text/javascript">
jQuery(function($) {	
	$('#sort_tags').on('change',function(){
	    var select = $(this);
	    if(select.val()){
			var url = '<?php echo Yii::app()->createUrl('//article/section', array('section' => $section->slug));?>?sort=' + select.val();
			window.location.href = url; 
		}
	});
});
</script>

