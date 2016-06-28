<?php
$this->pageTitle = Yii::app()->name;

?>
<?php $this->widget('frontend.widgets.userpage.ProfileWidget'); ?>
<!-- left column -->
<div class="profile-right right">
	<?php $this->widget('frontend.widgets.userpage.NavigationWidget'); ?>
	<div class="clear"></div>
	<div class="list-cmt">
	    <div id="" class="tab-common tab-garage">
            <div class="scroll-cmt">
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
        </div>
	</div>
	
</div>
<script type="text/javascript">
$(function() {
	  $('.scroll-cmt').slimscroll({
        size: '5px',
		height: '1030px',
		alwaysVisible: true,
      railVisible: true,
	  distance: '5px'
      });
});

</script>








<div class="page-profile clearfix" style="display: none;">
	<?php $this->widget('frontend.widgets.userpage.ProfileWidget'); ?>
	<!-- left column -->
	<div class="profile-right right">
		<div class="tabs profile-tabs">
			<?php $this->widget('frontend.widgets.userpage.NavigationWidget'); ?>
		</div>
		<!-- profile tabs -->
		<div class="tabs-content-wrap">
			<div class="line"></div>
			<div class="tabs-content active">
				<div class="profile-garage">
					<?php if(!empty($products)){?>
					<ul class="item-list" page="<?php echo $next_page;?>">
					<?php foreach ($products as $pro){
						if(empty($pro->article)){
							continue;
						}
						$src = Yii::app()->theme->baseUrl.'/resources/html/css/images/img-product-noimg.jpg';
						if(!empty($pro->article->galleries[0]->galleryPhotos[0])){
							$src = $pro->article->galleries[0]->galleryPhotos[0]->getPreview();
						}
					?>
					  <li class="item"> 
						  <div class="clearfix">
						  <a href="<?php echo Yii::app()->createUrl('/article/view', array('section' => $pro->article->sections['0']->slug, 'slug' => $pro->article->slug, 'id' => $pro->article->id));?>" class="p-img"><img src="<?php echo $src; ?>"/></a>
							  <div class="info">
								  <ul>
									<li><p class="p-name"><?php echo $pro->article->product->product_name;?></p></li>
									<li><p class="p-price"><?php echo $pro->article->product->product_price;?>$</p></li>
									<li><p class="p-date"><?php echo date('d/m/Y', $pro->article->created);?></p></li>
									<li><a class="btn-remove highlight" art="<?php echo $pro->article->id;?>" stt="del">x Remove from Garage</a></li>
								  </ul>
							  </div>
						  </div>
					  </li>
					<?php }?>
					</ul>
					<?php if($pages->pageCount > 1) {?>
						<div class="more-wrap" style="text-align: center;">
							<a class="showmore" onclick="garage.show_more();" href="javascript:void(0);"><?php echo Lang::t('general', 'Show More'); ?></a>
						</div>
					<?php } ?>
					<?php }?>
				</div>
				<!-- talks list -->
			</div>
			<!-- Profile : Talks tab -->
			<div id="profile-tabs-1" class="tabs-content">

			</div>
			<div id="profile-tabs-2" class="tabs-content">

			</div>
		</div>
	</div>
	<!-- right column -->
</div>

