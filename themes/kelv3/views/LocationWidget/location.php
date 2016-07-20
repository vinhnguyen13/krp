<span class="text-uper fs-14 font-centuB"><?php echo Lang::t('general', 'Location'); ?>:</span>
	<div class="dropdown-emu d-ib slect-loca">
		<?php if(isset($tmp_location->id)){ ?>
			<a href="#" class="val-selected fs-13" id="selected-item"><?php echo $tmp_location->city_name; ?>
				<i class="fa fa-caret-down mgL-5" aria-hidden="true"></i>
			</a>
		<?php }else{ ?>
			<a href="#" class="val-selected fs-13"><?php echo Lang::t('general', 'Location'); ?>
				<i class="fa fa-caret-down mgL-5" aria-hidden="true"></i>
			</a>
		<?php } ?>
		<?php if(isset($location[0])): ?>
			<div class="item-dropdown hide">
				<ul>
					<li><span city_id="0"><?php echo Lang::t('general', 'Location'); ?></span></li>
					<?php foreach($location AS $row): ?>
						<li><span city_id="<?php echo $row->id; ?>"><?php echo $row->city_name; ?></span></li>
					<?php endforeach;?>
				</ul>
			</div>
		<?php endif; ?>
	</div>