<div class="col-xs-12 col-md-6 most-popu">
	<div class="title-box">
		<span><?php echo Lang::t('general', 'most liked'); ?></span>
	</div>
	<?php if(isset($section_populars)) { ?>
		<?php
		$i = 1;
		foreach ($section_populars as $key => $value){
			$producturl = Yii::app()->createUrl('/article/view', array('section' => $value->sections['0']->slug, 'slug' => $value->slug, 'id' => $value->id));
			?>
            <script language="javascript" type="text/javascript">
                $(function() {
                    $("#rating_star_<?php echo $value->id; ?>").codexworld_rating_widget({
                        starLength: '5',
                        initialValue: <?php echo $value->rating_number!=0?$value->total_points/$value->rating_number:0; ?>,
                        callbackFunctionName: 'processRating',
                        imageDirectory: '<?php echo Yii::app()->theme->baseUrl;?>/resources/html/css/images',
                        inputAttr: 'articleID'
                    });
                });
            </script>
			<div class="clearfix mgB-10">
				<a href="<?php echo $producturl;?>" class="d-b ver-c pdR-15 left-box">
					<div class="thumb">
						<!--
						<img src="<?php echo Yii::app()->theme->baseUrl; ?>/resources/html/images/img131x85.jpg" alt=""/>
						-->
						<?php echo $value->getImageThumbnail(array('height' => '131px', 'width' => '85px')); ?>
					</div>
					01
				</a>

				<div class="right-box pdL-15">
					<a href="<?php echo $producturl;?>" class="link-title"><?php echo $value->title; ?></a>

					<div class="stars d-ib">
                        <input name="rating_<?php echo $value->id; ?>" value="<?php echo $value->rating_number!=0?$value->total_points/$value->rating_number:0; ?>" id="rating_star_<?php echo $value->id; ?>" type="hidden" articleID="<?php echo $value->id; ?>" />
                        <!--
						<ul class="clearfix">
							<li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
							<li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
							<li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
							<li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
							<li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
						</ul>
						-->
					</div>
					<a href="<?php echo $producturl;?>" class="d-ib mgL-10"><?php echo $value->comment; ?> Comments</a>
				</div>

			</div>
			<?php
		}
	}
	?>
</div>
<script type="text/javascript">
    function processRating(val, attrVal){
        $.ajax({
            type: 'POST',
            url: '/site/rating',
            data: 'id='+attrVal+'&total_points='+val,
            dataType: 'json',
            success : function(data) {
                if (data.status == 'ok') {
                    //alert('You have rated '+val+' to CodexWorld');
                    //$('#avgrat').text(data.average_rating);
                    //$('#totalrat').text(data.rating_number);
                }else{
                    alert('Some problem occured, please try again.');
                }
            }
        });
    }
</script>