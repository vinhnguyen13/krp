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
<div class="detail-fea detail-page">
	<div class="container">
		<div class="row wrap-detail">
			<div class="col-lg-9 col-md-8">
				<div class="inner-item">
					<div class="thumb">
                        <!--
						<img src="<?php //echo Yii::app()->theme->baseUrl;?>/resources/html/images/img879x420.jpg" alt="" />
						-->
                        <?php if($layout == 1) {?>
                            <?php echo $view->getImageThumbnail(); ?>
                        <?php } else { ?>
                            <?php echo $view->getImageThumbnail2(); ?>
                        <?php } ?>
					</div>
					<div class="text-detail">
						<div class="desc">
                            <?php echo $view->description; ?>
						</div>
                        <?php echo $view->body;?>
						<div class="ver-c mgB-20">
							<span class="font-centuB fs-16 text-uper d-ib mgR-10">Your Rating:</span>
							<div class="stars d-ib">
								<ul class="clearfix">
                                    <script language="javascript" type="text/javascript">
                                        jQuery(function($) {
                                            $("#rating_star_<?php echo $view->id; ?>").codexworld_rating_widget({
                                                starLength: '5',
                                                initialValue: <?php echo $view->rating_number!=0?$view->total_points/$view->rating_number:0; ?>,
                                                callbackFunctionName: 'processRating',
                                                imageDirectory: '<?php echo Yii::app()->theme->baseUrl;?>/resources/html/css/images',
                                                inputAttr: 'articleID'
                                            });
                                        });
                                    </script>
                                    <input name="rating_<?php echo $view->id; ?>" value="<?php echo $view->rating_number!=0?$view->total_points/$view->rating_number:0; ?>" id="rating_star_<?php echo $view->id; ?>" type="hidden" articleID="<?php echo $view->id; ?>" />
                                    <script type="text/javascript">
                                        function processRating(val, attrVal){
                                            $.ajax({
                                                type: 'POST',
                                                url: '/site/rating',
                                                data: 'id='+attrVal+'&total_points='+val,
                                                dataType: 'json',
                                                success : function(data) {
                                                    if (data.status == 'ok') {
                                                    }else{
                                                    }
                                                }
                                            });
                                        }
                                    </script>
								</ul>
							</div>
						</div>
                        <?php $this->renderPartial("partial/comment-list", $comment);?>
					</div>

				</div>
			</div>
			<div class="col-lg-3 col-md-4 more-fea clearfix">
                <?php $this->renderPartial("partial/more-feature", array('mores'=>$mores));?>
                <!--
				<div class="ads-350x250"><a href="#"><img src="<?php //echo Yii::app()->theme->baseUrl;?>/resources/html/images/img300x250.jpg" alt=""></a></div>
				-->
                <?php $this->widget('frontend.widgets.home.AdsWidget',array('hideFollowing'=>0)); ?>
			</div>
		</div>
	</div>
</div>
<!-- InstanceEndEditable -->