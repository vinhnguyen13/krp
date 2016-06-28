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
<div class="detail-where">
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
					
						<?php foreach ($shops as $shop) {?>
						<div class="items-where">
			            	<h3><?php echo $shop->title;?></h3>
			                <p><b>A:</b><?php echo $shop->address;?></p>
			                <p><b>T:</b><?php echo $shop->phone;?></p>
			                <!--  
			                <a class="icon-touch" href="#"><i class="icon-common">&nbsp;</i><span>view map</span></a>
			                -->
			            </div>
						<?php } ?>
			<?php } ?>
		<?php } ?>
	<?php } ?>
<?php } ?>
</div>
