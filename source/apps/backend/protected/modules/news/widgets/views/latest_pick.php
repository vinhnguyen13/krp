<!-- 
<?php if ($top['data']) {?>
<ul>
<?php foreach($top['data'] as $item) {?>
    <li>
        <div class="wrap clearfix">
            <a class="tmb" href="<?php echo Yii::app()->createUrl('/article/view', array('section' => $item->sections['0']->slug, 'slug' => $item->slug, 'id' => $item->id));?>" title="">
                <?php echo $item->getImageThumbnail();  ?>
            </a>
			<div class="info">
				 <a href="<?php echo Yii::app()->createUrl('/article/view', array('section' => $item->sections['0']->slug, 'slug' => $item->slug, 'id' => $item->id));?>" title="">
					<?php echo $item->title;?>
				</a>
			</div>
        </div>
    </li>
<?php } ?>
</ul>
<?php } ?>

 -->
<?php if ($top['data']) {?>
<ul class="list-sidebar">
	<?php foreach($top['data'] as $item) {?>
		<?php $url = Yii::app()->createUrl('/article/view', array('section' => $item->sections['0']->slug, 'slug' => $item->slug, 'id' => $item->id));?>
		<li>
			<a class="left wrap-img" href="<?php echo $url;?>">
				<?php echo $item->getImageThumbnail(array('height' => '76', 'width' => '101'));  ?>
			</a>
			<div class="right">
				<a href="<?php echo $url;?>"><?php echo $item->title;?></a>
				<p class="num-comment"><i class="icon_common">&nbsp;</i><b><?php echo $item->comment;?></b> <?php echo Lang::t('general', 'Comment');?> </p>
			</div>
		</li>
	<?php } ?>
</ul>
<?php } ?>
