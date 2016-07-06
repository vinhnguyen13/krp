<!--
<div id="footer">
	<div class="content_footer">
    	<div class="item_fo left">
        	<a href="<?php echo Yii::app()->homeUrl; ?>"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/resources/html/images/logo_footer.png" /></a>
        </div>
        <div class="item_fo left">
        	<h4><a href="<?php echo Yii::app()->createUrl('//article/editor');?>"><?php echo Lang::t('general', 'editor\'s pick'); ?></a></h4>
        </div>
        <?php if(isset($section)) {?>
			<?php foreach ($section as $key => $value) {?>
			<div class="item_fo left">
	        	<h4>
	        		<a href="<?php echo $value->getUrl();?>" title="<?php echo $value->title;?>"><?php echo $value->title;?></a>
                </h4>
	            <div class="clear"></div>
				<?php if(count($category->getCategories($value->id)) > 0) {?>
					<ul>
						<?php foreach ($category->getCategories($value->id) as $cat) {?>
						<li>
							<a href="<?php echo $cat->getUrl($value->slug);?>" title="<?php echo $cat->title;?>"><?php echo $cat->title;?></a>
						</li>
						<?php } ?>
					</ul>
				<?php } ?>
        	</div>
			<?php } ?>
		<?php } ?>

        <div class="item_fo end-item-fo left">
        	<h4><a href="<?php echo Yii::app()->createUrl('/site/page/view/about');?>" title="<?php echo Lang::t('general', 'About Us'); ?>"> <?php echo Lang::t('general', 'About Us'); ?></a></h4>
            <div class="clear"></div>
            <ul>
            	<li><a href="<?php echo Yii::app()->createUrl('/site/page/view/about');?>" title="<?php echo Lang::t('general', 'About Kelreport'); ?>"><?php echo Lang::t('general', 'About Kelreport'); ?></a></li>
                <li><a href="<?php echo Yii::app()->createUrl('/site/contact');?>" title="Contact Us"><?php echo Lang::t('general', 'Contact Us'); ?></a></li>
                <li><a href="<?php echo Yii::app()->theme->baseUrl; ?>/resources/html/MediaKitKR.pdf" title="<?php echo Lang::t('general', 'Advertising/Media Kit'); ?>"><?php echo Lang::t('general', 'Advertising/Media Kit'); ?></a></li>
            </ul>
        </div>
        <div class="clear"></div>
        <div class="rule-fo">
    	<ul>
            <li><a href="<?php echo Yii::app()->createUrl('/site/page/view/policy');?>" title="<?php echo Lang::t('general', 'Privacy Policy'); ?>"><?php echo Lang::t('general', 'Privacy Policy'); ?></a></li>
            <li><a href="<?php echo Yii::app()->createUrl('/site/page/view/term');?>" title="<?php echo Lang::t('general', 'Terms & Conditions'); ?>"><?php echo Lang::t('general', 'Terms & Conditions'); ?></a></li>
            <li class="end-li"><a href="#">&copy; <?php echo date('Y');?> Dream-Weavers Media. All rights reserved.</a></li>
        </ul>
        <div class="clear"></div>
    </div> 
    </div>
</div>

<div class="pop-mess-succ" style="display: none;">
    <div class="popcont">
        <span class="icon-check"></span>
        <p></p>
    </div>
</div>
<div class="pop-mess-fail" style="display: none;">
    <div class="popcont">
        <span class="icon-check"></span>
        <p></p>
    </div>
</div>
-->
<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-2">
                <a href="#" class="logo-footer"><img src="<?php echo Yii::app()->theme->baseUrl;?>/resources/html/images/logo-footer.png" alt=""></a>
            </div>

            <div class="menu-footer col-md-7">
                <div class="row">
                    <div class="col-sm-3">
                        <a href="#" class="d-b text-uper">Editor's Picks</a>
                        <a href="#" class="d-b text-uper">Restaurants</a>
                        <a href="#" class="d-b text-uper">Events</a>
                        <a href="#" class="d-b text-uper">Chefs</a>
                        <a href="#" class="d-b text-uper">Curator's Blog</a>
                    </div>
                    <div class="col-sm-3">
                        <a href="#" class="d-b text-uper">About us</a>
                        <a href="#" class="d-b text-uper">Contact us</a>
                        <a href="#" class="d-b text-uper">Advertising</a>
                        <a href="#" class="d-b text-uper">FAQs</a>
                        <a href="#" class="d-b text-uper">privacy-policy</a>
                    </div>
                    <div class="col-sm-6">
                        <p>3rd Fl, Thao Nguyen Bldg, 47 Ba Huyen <br>
                            Thanh Quan, District 3, Ho Chi Minh City, <br>
                            Vietnam</p>
                        <p class="mgT-5 mgB-5">Email: <a href="mailto:support@Kelreport.vn">support@Kelreport.vn</a></p>
                        <p class="color-fff font-centuB fs-14">Customer Support</p>
                        <p class="num-support">08 2545 4859</p>
                    </div>
                </div>
                <div class="copyright">
                    © 2016 Kelreport. All rights reserved.
                </div>
            </div>

            <div class="col-md-3 letter-footer">
                <div class="">
                    <div class="box-letter">
                        <div class="clearfix mgB-10">
                            <div class="pull-left left-box">
                                <span class="font-attitudeL fs-23 mgB-5">newsletter</span>
                                <span class="text-uper font-uvnHongB fs-19">Sign Up</span>
                            </div>
                            <div class="right-box font-uvnHong fs-11 pdT-10">
                                <p>Join our list and get the latest </p>
                                <p>news Directly in your inbox</p>
                            </div>
                        </div>
                        <?php
                        $form = $this->beginWidget('CActiveForm', array(
                            'id' => 'subcribe-form2',
                            'action' => Yii::app()->createUrl('//site/subscribe'),
                            'enableAjaxValidation' => true,
                            'enableClientValidation' => true,
                            'clientOptions' => array(
                                'validateOnSubmit' => true,
                                'afterValidate' => 'js:Subcribe'
                            ),
                        )); ?>
                        <?php echo $form->textField($model, 'email', array('class' => 'iput w-100', 'placeholder' => 'Email address')); ?>
                        <?php echo CHtml::submitButton('', array('id' => 'btn-letter')); ?>
                        <?php echo $form->error($model, 'email'); ?>
                        <?php $this->endWidget();
                        ?>
                    </div>

                    <div class="follow-social">

                        <div class="text-left">
                            <a href="#" class="icon-social d-ib"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                            <a href="#" class="icon-social d-ib"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a>
                            <a href="#" class="icon-social d-ib"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>