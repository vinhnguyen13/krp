<?php
$url_section = $view->sections[0]->getUrl();
$name_section = $view->sections[0]->title;
if(isset($view->categories[0])){
	$url_category = $view->categories[0]->getUrl($view->sections[0]->slug);
	$name_category = $view->categories[0]->title;;
}
?>
<!-- InstanceBeginEditable name="EditRegion3" -->
<div class="container">
	<div class="pull-right ver-c mgT-15 gr-loca">
		<?php $this->widget('frontend.widgets.home.LocationWidget'); ?>
	</div>
	<div class="breakumb-list mgT-15">
		<ul class="clearfix">
			<li class="text-uper"><a href="<?php echo $url_section;?>"><?php echo $name_section;?><i class="fa fa-caret-right" aria-hidden="true"></i></a> </li>
			<?php if(isset($name_category)) { ?>
				<li class="text-uper"><a href="<?php echo $url_category;?>"><?php echo $name_category;?><i class="fa fa-caret-right" aria-hidden="true"></i></a></li>
			<?php } ?>
			<li class="last-link"><a href="javascript:void(0);"><?php echo $view->title;?><i class="fa fa-caret-right" aria-hidden="true"></i></a></li>
		</ul>
	</div>
	<h1 class="title-detail"><?php echo $view->title;?></h1>
</div>
<div class="detail-page">
	<div class="container">
		<div class="row wrap-detail">
			<div class="col-lg-6 col-md-8">
				<div class="inner-detail">
					<?php if(empty($view->galleries)) {?>
						<?php if($layout == 1) {?>
							<?php echo $view->getImageThumbnail(); ?>
						<?php } else { ?>
							<?php echo $view->getImageThumbnail2(); ?>
						<?php } ?>
					<?php } else { ?>
						<?php $this->renderPartial("partial/newgallery", array('view' => $view));?>
					<?php } ?>
					<div class="text-detail">
						<div class="desc">
							<?php echo $view->description; ?>
						</div>
						<div class="share-detail clearfix">
							<div class="col-md-3 ver-c"><?php echo date('d.m.Y', $view->public_time) ;?></div>
							<div class="col-md-3 ver-c text-uper"><a href="javascript:void(0);" class="show-frm-email"><i class="fa fa-share-square-o mgR-5" aria-hidden="true"></i><?php echo Lang::t('article', 'Share');?></a></div>
							<div class="col-md-3 ver-c text-uper"><a href="javascript:void(0);" onclick="ArticleView.print();"><i class="fa fa-envelope-o mgR-5" aria-hidden="true"></i><?php echo Lang::t('article', 'Email');?></a></div>
							<div class="col-md-3 ver-c text-uper"><a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo Util::getCurrentUrl();?>"><i class="fa fa-print mgR-5" aria-hidden="true"></i><?php echo Lang::t('article', 'Print');?></a></div>
						</div>
						<?php echo $view->body;?>
						<div class="ver-c mgB-20">
							<span class="font-centuB fs-16 text-uper d-ib mgR-10">Your Rating:</span>
							<div class="stars d-ib">
                                <ul class="clearfix">
                                    <?php
                                    for($rate=0;$rate<5;$rate++){
                                        if($rate<$view->res_rating){
                                            ?>
                                            <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                                        <?php
                                        }else{
                                            ?>
                                            <li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
                                        <?php
                                        }
                                    }
                                    ?>
                                </ul>
							</div>
						</div>
						<?php $this->renderPartial("partial/comment-list", $comment);?>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-4">
                <div class="detail-attr">
                    <div class="item-attr">
                        <p><?php echo $view->res_address; ?></p>
                        <p>Hotline: <?php echo $view->res_hotline; ?></p>
                        <a href="#">View map</a>
                    </div>
                    <div class="item-attr">
                        <p>Year Established: <?php echo $view->res_year; ?></p>
                        <p>Opening Hours: <?php echo $view->res_open_hour; ?> - <?php echo $view->res_closed_hour; ?></p>
                        <p>Website: <a href="<?php echo $view->res_website; ?>"><?php echo $view->res_website; ?></a></p>
                    </div>
                    <div class="item-attr">
                        <p class="ver-c"><span class="d-ib mgR-5 iconDress"></span><span class="font-600">Dress Code:</span> <?php echo $view->res_dress_code; ?></p>
                        <p class="ver-c"><span class="d-ib mgR-5 iconPrivate"></span><span class="font-600">Private Room:</span> <?php echo $view->res_private_room; ?></p>
                        <p class="ver-c"><span class="d-ib mgR-5 iconCar"></span><span class="font-600">Car Park:</span> <?php echo $view->res_car_park; ?></p>
                        <p class="ver-c"><span class="d-ib mgR-5 iconSmoking"></span><span class="font-600">Smoking:</span> <?php echo $view->res_smoking_area; ?></p>
                        <p class="ver-c price-detail"><span class="d-ib mgR-5 iconPrice"></span><span class="font-600">Price:</span>
                            <?php $count=count(explode("$",$view->res_price)); ?>
                            <?php
                            for($i=0;$i<5;$i++){
                                if($i<$count){
                                    ?>
                                    <i class="fa fa-dollar active" aria-hidden="true"></i>
                            <?php
                                }else{
                                    ?>
                                    <i class="fa fa-dollar" aria-hidden="true"></i>
                            <?php
                                }
                            }
                            ?>
                        </p>
                    </div>
                    <div class="item-attr ver-c">
                        Rating
                        <div class="stars d-ib mgL-10">
                            <ul class="clearfix">
                                <?php
                                for($rate=0;$rate<5;$rate++){
                                    if($rate<$view->res_rating){
                                        ?>
                                        <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                                    <?php
                                    }else{
                                        ?>
                                        <li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
                                    <?php
                                    }
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
				<div class="more-restau">
					<?php $this->renderPartial("partial/more-restaurant", array('mores'=>$mores));?>
				</div>
			</div>
            <div class="col-xs-12 col-lg-3 box-ads-follow">
                <?php $this->widget('frontend.widgets.home.AdsWidget',array('position'=>'RIGHT','hideFollowing'=>0)); ?>
            </div>
		</div>
	</div>
</div>
<!-- InstanceEndEditable -->
<!-- InstanceEndEditable -->
<script type="text/javascript">
    jQuery(document).ready(function($){
        $(".googleMapPopUp").colorbox({
            iframe: true,
            innerWidth: 80%,
            innerHeight: 80%,
            opacity: 0.7,
            href: jQuery(this).data('href') + '&ie=UTF8&t=h&output=embed'
        });
    });
</script>
