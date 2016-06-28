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
    	<div class="top-wheretobuy">
        	<span class="icon-common close-popup eventCommon icon-touch">&nbsp;</span>
            <h1><?php echo Lang::t('article', 'WHERE TO BUY');?></h1>
            <!-- 
            <div class="box-select">
                <select>
                    <option>HO CHI MINH HO CHI MINH</option>
                    <option>HO CHI MINH</option>
                </select>
                <span class="arrow icon-common">&nbsp;</span>
            </div>
             -->
        </div>
        <?php $this->renderPartial("partial/where_to_buy", array('product'=>$product, 'shop' => $view->shops));?>
	<?php }?>
<?php }?>


