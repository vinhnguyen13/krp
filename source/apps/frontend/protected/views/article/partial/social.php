<?php
if(!empty($view->product)){
	$upro = UserProduct::model()->findByAttributes(array('user_id'=>Yii::app()->user->id, 'article_id' => $view->id));
	$like = $hate = $bought ='';
	$like_enable = $hate_enable = $bought_enable = 'enable';
	if(!empty($upro)){
		if($upro->like == 1){
			$like = 'like-icon-active';
			$like_enable = 'false';
			$hate_enable = 'disable';
			$bought_enable = 'disable';
		}elseif($upro->hate == 1){
			$hate = 'dislike-icon-active';
			$like_enable = 'disable';
			$hate_enable = 'false';
			$bought_enable = 'disable';
		}elseif($upro->bought == 1){
			$bought = 'bou-icon-active';
			$like_enable = 'disable';
			$hate_enable = 'disable';
			$bought_enable = 'false';
		}
	}
?>
	<span class="num-like icon_common"><?php echo $view->like;?></span>
	<div class="status-like">
		<ul id="social_button" tabindex="<?php echo $view->product->article_id;?>" tabarticle="<?php echo $view->id;?>">
			<li class="firt-li">
				<a data-type="like" data-enable="<?php echo $like_enable;?>" class="icon_common like-icon <?php echo $like;?>" href="javascript:void(0);" rel="<?php echo Yii::app()->createUrl('//product/excute', array('type'=>'like'));?>"></a>
			</li>
			<li>
				<a data-type="dislike" data-enable="<?php echo $hate_enable;?>" class="icon_common dislike-icon <?php echo $hate;?>" rel="<?php echo Yii::app()->createUrl('//product/excute', array('type'=>'hate'));?>" href="javascript:void(0);"></a>
			</li>
			<li class="end-li">
				<a data-type="bou" data-enable="<?php echo $bought_enable;?>" class="icon_common bou-icon <?php echo $bought;?>" href="javascript:void(0);" rel="<?php echo Yii::app()->createUrl('//product/excute', array('type'=>'bought'));?>"></a>
			</li>
		</ul>
	</div>
<?php } ?>