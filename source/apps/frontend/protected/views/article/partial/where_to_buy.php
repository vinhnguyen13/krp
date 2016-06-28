<?php 
if(!empty($product)){
$cri = new CDbCriteria();
$_idsShop = array();
$_idsLocal = array();
if(!empty($shop)){
	foreach ($shop as $sh){
		$_idsShop[] = $sh->id;
		$_idsLocal[] = $sh->location_id;
	}
}
if(!empty($_idsLocal)){
	$cri->addCondition("id IN (".implode(',', $_idsLocal).")");
}
$cities = ProLocation::model()->findAll($cri);
$_nameWhereBuy = !empty($shop[0]->brand->title) ? $shop[0]->brand->title : '';
?>
<div id="popup-wherebuy" class="popup-block">
	<div class="content-popup">
		<div class="header-pop">
			<span class="icon_common btn-close-pop">&nbsp;</span>
			<h4><?php echo Lang::t('article', 'WHERE TO BUY');?></h4>
			<!--<h1><?php /*echo $_nameWhereBuy;*/?></h1>-->
			<div class="left loca-buy">
				<!--<i class="icon_common">&nbsp;</i>-->
                <!-- 
                <span class="left line-hori">&nbsp;</span>
				<div class="top-bar-dropdown">
					<?php if(!empty($cities)) {?>
					<span id="choose-item"><span id="selected-item"><?php echo $cities[0]->city_name;?></span></span>
					<div class="dropdown-select">
							<ul>
								<?php foreach ($cities as $city) {?>
									<li><span><?php echo $city->city_name;?></span></li>
								<?php } ?>
							</ul>
					</div>
					<?php } ?>
				</div>
				 -->
			</div>
			<div class="clear"></div>
		</div>
		<div class="main-pop-scroll">
			<div class="block-scroll">
				<?php if(!empty($cities)) {?>
					<?php foreach ($cities as $city) {?>
						<?php 
						$cri = new CDbCriteria();
						$cri->addCondition("location_id = :location");
						if(!empty($_idsShop)){
							$cri->addCondition("id IN (".implode(',', $_idsShop).")");
						}
						$cri->params = array(':location'=>$city->id);
						$shops = ProShops::model()->findAll($cri);
						
						if(!empty($shops)) {?>
								<div class="distric-buy">
									<!--<h5><?php /*echo $city->city_name;*/?></h5>-->
									<?php foreach ($shops as $shop) {?>
									<div class="item-loca">
										<h3><?php echo $shop->title;?></h3>
										<p><b>A:</b><?php echo $shop->address;?></p>
										<p><b>T:</b></b> <?php echo $shop->phone;?></p>
										<!-- 
										<a href="#"><i class="icon_common icon-viewmap">&nbsp;</i>View map</a>
										 -->
									</div>
									<?php } ?>
									<div class="clear"></div>
								</div>
						<?php } ?>
					<?php } ?>
				<?php } ?>
				<div class="clear"></div>
			</div>
		</div>
	</div>
</div>
<?php } ?>
