<?php
$this->pageTitle = Yii::app()->name;

?>
<div class="page-profile">
    <?php $this->widget('mobile.widgets.userpage.ProfileWidget'); ?>
    <div class="block-content-pro">
        <?php $this->widget('mobile.widgets.userpage.NavigationWidget'); ?>       	
        <div class="block-tab-items">
           	<div id="tab-activi" class="tab-common" style="display:block;">
                <?php if(isset($products[0])){?>
                <div class="block-garage" page="<?php echo $next_page;?>" data-url="<?php echo $this->user->createUrl('/product/garage');?>">
                    <ul>
                        <?php foreach ($products as $pro){
    						if(empty($pro->article)){
    							continue;
    						}
    						$src = Yii::app()->theme->baseUrl.'/resources/html/css/images/img-product-noimg.jpg';
    						if(!empty($pro->article->galleries[0]->galleryPhotos[0])){
    							$src = $pro->article->getImageThumbnail(array('height' => 'auto', 'width' => '132px'));
    						}
    						$href = Yii::app()->createUrl('/article/view', array('section' => $pro->article->sections['0']->slug, 'slug' => $pro->article->slug, 'id' => $pro->article->id));
    					?>
                        <li><a target="_blank" href="<?php echo $href;?>" class="wrap-img"><?php echo $src ?></a><a target="_blank" href="<?php echo $href;?>"><?php echo $pro->article->product->product_name;?></a><span class="added_date">added <?php echo date('d/m/Y', $pro->created) ?></span></li>
                        <?php }?>
                    </ul>
                    <div class="clear"></div>    
                </div>
                <div class="clear"></div>
                <?php if($pages->pageCount > 1) {?>
                <div class="see-more">
                    <a class="showmore" onclick="garage.show_more();" href="javascript:void(0);"><span>See More</span><i class="icon_common icon-see-more">&nbsp;</i></a>
                </div>
                <?php }?>
                <?php }else{ ?>
                <p class="nodata"><?php echo Lang::t('general', 'No item added yet')?></p>
                <?php } ?>
            </div>
            <div class="clear"></div>
        </div>
        <div class="clear"></div>
    </div>
</div>


