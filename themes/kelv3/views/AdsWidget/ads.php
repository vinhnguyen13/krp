<!--
<div class="bar-ads box-slidebar">
	<?php
    /*
    foreach($zone as $z):
	    $banner = AdsBanner::model()->getBanner($z->id);
	    if ($banner):
	    	$banner->updateView();
	?>
	
	<?php if ($banner->type == "img") {?>
        <a href="<?php echo $banner->getUrl() ?>" title="<?php echo $banner->name ?>" target="<?php echo $banner->target ?>">
            <img src="<?php echo $banner->getPath() ?>" style="width: <?php echo $z->width ?>; height: <?php echo $z->height ?>">
        </a>
	<?php }else{ ?>
        <div class="flash">
            <script type="text/javascript">
                swfobject.embedSWF(
                    "<?php echo $banner->getPath(); ?>",
                    "adsFlv<?php echo $banner->id ?>", "100%", "100%", "10.0.0",
                    "<?php echo Yii::app()->theme->baseUrl; ?>/resources/expressInstall.swf",
                    null, params, "");
            </script>
            <div id="adsFlv<?php echo $banner->id ?>"></div>
            <a href="<?php echo $banner->getUrl() ?>" title="<?php echo $banner->name ?>" target="<?php echo $banner->target ?>" style="width: <?php echo $z->width ?>; height: <?php echo $z->height ?>">&nbsp;</a>
        </div>	
	<?php } 
		endif;
		endforeach;
    */
	?>
</div>
-->
<div class="col-xs-12 col-md-3 pdL-0 pdR-0 box-ads-follow">
    <div class="ads-350x250"><a href="#"><img src="<?php echo Yii::app()->theme->baseUrl;?>/resources/html/images/img300x250.jpg" alt="" /></a></div>
    <?php $this->widget('frontend.widgets.home.SubscribeWidget'); ?>
    <?php if($hideFollowing==1){ ?>
    <?php $this->widget('frontend.widgets.home.SocialFollowWidget'); ?>
    <?php } ?>
</div>