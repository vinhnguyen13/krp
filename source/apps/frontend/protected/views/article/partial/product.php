<?php 
if(!empty($view->shops)){
	$shop = $view->shops;
	$shopOnce = $shop[0];
}
if(!empty($view->product)){
	$product = $view->product;
	/**************/
	$upro = UserProduct::model()->findByAttributes(array('user_id'=>Yii::app()->user->id, 'article_id'=>$view->id));
	if(!empty($upro)){
		$usrProduct = $upro;
	}else{
		$usrProduct = new UserProduct();
		$usrProduct->user_id = Yii::app()->user->id;
		$usrProduct->article_id = $view->id;
	}
	$usrProduct->view += 1;
	$usrProduct->validate();
	$usrProduct->save();
?>
	<?php if(!empty($shopOnce)) { ?>
		<div class="left">
			<a class="where-buy" href="javascript:void(0);"><i class="icon_common">&nbsp;</i><?php echo Lang::t('article', 'WHERE TO BUY');?></a>
            <!--<h5><?php //echo $shopOnce->title;?></h5>
			<a href="javascript:void(0);" class="more_product open_wtb">Click for more details</a>-->
			<?php $this->renderPartial("partial/where_to_buy", array('product'=>$product, 'shop' => $view->shops));?>
			<?php /*if(!empty($product->product_price)){*/?><!--
				<p>Price: <?php /*echo $product->product_price;*/?></p>
			--><?php //}?>
		</div>
	<?php }?>
<?php }?>


