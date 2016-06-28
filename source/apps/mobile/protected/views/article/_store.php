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
<div class="pop-wrapper">
	<div class="pop-bg">
	</div>
	<div class="pop">
		<div class="store-detail">
			<div class="store-head">
				<a class="btn-close" href="#"></a>
				<span class="">Where to Buy</span>
				<h2><?php echo $_nameWhereBuy;?></h2>
			</div>
			<!-- store detail header -->
			<div class="store-shops">
				<div class="store-district">
					<?php if(!empty($cities)):?>
					<?php foreach ($cities as $city):?>
						<?php 
						$cri = new CDbCriteria();
						$cri->addCondition("location_id = :location");
						if(!empty($_idsShop)){
							$cri->addCondition("id IN (".implode(',', $_idsShop).")");
						}
						$cri->params = array(':location'=>$city->id);
						$shops = ProShops::model()->findAll($cri);
						
						if(!empty($shops)):?>
						<h3><?php echo $city->city_name?></h3>
						<?php foreach ($shops as $shop):?>
						<div class="store-info-wrap">
							<div class="store-info">
								<ul>
									<li><?php echo $shop->title;?></li>
									<li><?php echo $shop->address;?></li>
									<li><?php echo $shop->phone;?></li>
									<li><a class="btn-map hasicon" href="#"><i class="i24 i24-map"></i><span class="text">View map</span></a></li>
								</ul>
							</div>
						</div>
						<?php endforeach;?>
						<?php endif;?>
					<?php endforeach;?>
					<?php endif;?>
				</div>
				<!-- Single District -->
			</div>
			<!-- Shop detail by district -->
		</div>
		<!-- store detail -->
	</div>
	<!-- main popup -->
	<div class="position">
	</div>
</div>
<?php 
}
?>