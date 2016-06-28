<?php if ($related) {?>
<ul class="list-sidebar">
	<?php foreach($related as $item) {?>
		<?php $url = Yii::app()->createUrl('/article/view', array('section' => $item->sections['0']->slug, 'slug' => $item->slug, 'id' => $item->id));?>
		<li>
			<a class="left wrap-img" href="<?php echo $url;?>">
				<?php echo $item->getImageThumbnail(array('height' => '101', 'width' => '76'));  ?>
			</a>
			<div class="right">
				<a href="<?php echo $url;?>"><?php echo $item->title;?></a>
				<p class="num-comment"><i class="icon_common">&nbsp;</i><b><?php echo $item->comment;?></b> Comment </p>
			</div>
		</li>
	<?php } ?>
</ul>
<?php } ?>
