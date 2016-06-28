<?php if($items && count($items) > 0): ?>
<div class="slide">
	<div class="slide-wrap">
		<ul class="slide-list">
			<?php foreach($items as $key => $item): ?>
			<li>
				<a href="<?php echo $item->url; ?>" target="_blank" title="<?php echo $item->title?>">
					<?php echo $item->getImage($width, $height); ?>
				</a>
			</li>
			<?php endforeach;?>	
		</ul>
	</div>
</div>
<?php endif; ?>
<!-- slide -->