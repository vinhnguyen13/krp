	<div class="bar-location box-slidebar">
		<div class="top-bar-dropdown">
			<span id="choose-item"><b><?php echo Lang::t('general', 'Everywhere'); ?></b>
				<?php if(isset($tmp_location->id)){ ?>
					<span class="sym-show" style="display: inline;">/</span><span id="selected-item"><?php echo $tmp_location->city_name; ?></span>
				<?php }else{ ?>
					<span class="sym-show">/</span><span id="selected-item"></span>
				<?php } ?>
			</span>
			<?php if(isset($location[0])): ?>
			<div class="dropdown-select">
				<ul>
					<li><span city_id="0"><?php echo Lang::t('general', 'Everywhere'); ?></span></li>
					<?php foreach($location AS $row): ?>
					<li><span city_id="<?php echo $row->id; ?>"><?php echo $row->city_name; ?></span></li>
					<?php endforeach;?>
				</ul>
			</div>
			<?php endif; ?>
		</div>
		<?php if(isset($articles[0])): ?>
		<div class="more_editor"><?php echo Lang::t('general', 'More of Editor’s pick'); ?></div>
		<ul class="list-sidebar listarticle_bylocation">
			<?php 
				foreach ($articles as $key => $value):  
				$producturl	=	Yii::app()->createUrl('/article/view', array('section' => $value->sections['0']->slug, 'slug' => $value->slug, 'id' => $value->id));
			?>
			<li>
				<a href="<?php echo $producturl; ?>" class="left wrap-img"><?php echo $value->getImageThumbnail(array('height' => '76px', 'width' => '101px')); ?></a>
				<div class="right">
					<a href="<?php echo $producturl; ?>"><?php echo $value->title;?></a>
					<p><?php echo Util::partString($value->description, 0, 80); ?></p>
				</div>
			</li>
			<?php endforeach; ?>
		</ul>
		<?php endif; ?>
		<div class="clear"></div>
	</div>