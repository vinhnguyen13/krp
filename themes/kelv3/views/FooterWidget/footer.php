<?php $this->widget('frontend.widgets.home.AdsBottomWidget',array('position'=>'BOTTOM')); ?>
<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-2">
                <a href="#" class="logo-footer"><img src="<?php echo Yii::app()->theme->baseUrl;?>/resources/html/images/logo-footer.png" alt=""></a>
            </div>

            <div class="menu-footer col-md-7">
                <div class="row">
                    <div class="col-sm-3">
                        <a href="<?php echo Yii::app()->createUrl('//article/editor');?>" class="d-b text-uper">Editor's Picks</a>
                        <?php if(isset($section)) {?>
                            <?php foreach ($section as $key => $value) {?>
                                <a href="<?php echo $value->getUrl();?>" class="d-b text-uper"><?php echo $value->title;?></a>
                            <?php } ?>
                        <?php } ?>
                    </div>
                    <div class="col-sm-3">
                        <a href="<?php echo Yii::app()->createUrl('/site/page/view/about');?>" class="d-b text-uper"><?php echo Lang::t('general', 'About Us'); ?></a>
                        <a href="<?php echo Yii::app()->createUrl('/site/contact');?>" class="d-b text-uper"><?php echo Lang::t('general', 'Contact Us'); ?></a>
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
                            'enableAjaxValidation' => false,
                            'enableClientValidation' => true,
                            'clientOptions' => array(
                                'validateOnSubmit' => true,
                                'afterValidate' => 'js:Subcribe2'
                            ),
                        )); ?>
                        <?php echo $form->textField($model2, 'email', array('name' => 'Subcribe2[email]','class' => 'iput w-100', 'placeholder' => 'Email address')); ?>
                        <?php echo $form->error($model2, 'email',array('id'=>'Subscribe2_email_em_')); ?>
                        <?php echo CHtml::submitButton('', array('id' => 'btn-letter','name' => 'Subcribe2[btn-letter]')); ?>

                        <?php $this->endWidget();
                        ?>

                        <script type="text/javascript">
                            function Subcribe2(form, data, hasError) {
                                if($('#Subcribe2_email').val() == '') {
                                        Util.popAlertSuccess('<?php echo Lang::t('general', 'Please input a valid email'); ?>', 300);

                                        setTimeout(function () {
                                            $( ".pop-mess-succ" ).pdialog('close');
                                        }, 2000);
                                    alert("Email could not be empty!");
                                }else{
                                    var item = $("#subcribe-form2");
                                    var data = item.serialize();
                                    $.ajax({
                                        type: 'POST',
                                        url: item.attr('action'),
                                        data: data,
                                        success: function (response) {
                                            if (response.status != undefined && response.status == true) {
                                                alert(response.message);
                                                return false;
                                            } else {
                                                $.each(response, function (i, items) {
                                                    $("#MessageForm_" + i + "_em_").html(items[0]);
                                                    $("#MessageForm_" + i + "_em_").css('display', 'block');
                                                });
                                            }
                                        },
                                        dataType: 'json'
                                    });
                                }
                            }
                        </script>
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
<a id="gotop" href="#" rel="nofollow" class="show-hide">TOP</a>