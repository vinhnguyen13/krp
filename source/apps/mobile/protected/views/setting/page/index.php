<?php 
$this->pageTitle = Yii::app()->name;
$cs = Yii::app()->clientScript;
$cs->registerScriptFile(Yii::app()->theme->baseUrl . '/resources/js/my/setting.js', CClientScript::POS_BEGIN);
$cs->registerScript('SettingInit', "Setting.init();", CClientScript::POS_END);

?>
<?php $this->widget('mobile.widgets.userpage.ProfileWidget'); ?>
<!-- left column -->
<div class="profile-right right">
	<?php $this->widget('mobile.widgets.userpage.NavigationWidget'); ?>
	<div class="clear"></div>
	<div class="list-cmt">
	    <div class="block-accs">
            <ul class="list-tab-sub">
                <li><a class="active" href="#" rel="tab-accs"><?php echo Lang::t('settings', 'Account settings'); ?></a></li>
                <!--<li><a href="#" rel="tab-privacy">Privacy & Others</a></li>-->
            </ul>
            <div class="tab-accs" style="display:block;">
                <?php 
				$urlAvatar = CParams::load()->urlAvatar($this->usercurrent->avatar);
				$src = CParams::load()->pathAvatar($this->usercurrent->avatar);
				
				if(!file_exists($src)){
					$urlAvatar = Yii::app()->createUrl('/public/images/no-user.jpg');
				}
				?>
                <a href="javascript:void(0);" onclick="$('#uploadImage').trigger('click');" class="wrap-img"><img src="<?php echo $urlAvatar; ?>" class="uploadPreview"/><span><?php echo Lang::t('settings', 'Change your avatar'); ?></span></a>    
                <div class="avatar-upload">
					<?php
		            $form = $this->beginWidget('CActiveForm', array(
		                'id' => 'frmCropAvatar',
		                'action' => $this->usercurrent->createUrl('//setting/changeAvatar'),
		                'enableClientValidation' => false,
		                'enableAjaxValidation' => true,
		                'htmlOptions' => array(
		                    'enctype' => 'multipart/form-data', 
		                    'onsubmit' => 'return scropAvatar();',
		                    'class'=>'frmFillOut'
		                    ),
		                ));
		            ?>
		        	    <input type="file" id="uploadImage" style="display: none;">
		                <input type="hidden" id="x" name="x" />
		    			<input type="hidden" id="y" name="y" />
		    			<input type="hidden" id="w" name="w" />
		    			<input type="hidden" id="h" name="h" />
		            <?php $this->endWidget(); ?>
				</div>
				
				<?php
	            $form = $this->beginWidget('CActiveForm', array(
	                'id' => 'frm-accs',
	                'action' => $this->usercurrent->createUrl('//setting/index'),
	                'enableClientValidation' => false,
	                'enableAjaxValidation' => false,
	                'htmlOptions' => array(
	                    'class'=>''
                    ),
//                     'clientOptions'=>array(
//                         'validateOnSubmit'=>true,
//                     ),
	                ));
	            ?>
                    <div class="name-email">
                        <?php echo $form->labelEx($model,'fullname'); ?>
						<?php echo $form->textField($model,'fullname'); ?>
						<?php echo $form->error($model,'fullname'); ?>
						
                        <?php echo $form->labelEx($model,'email'); ?>
						<?php echo $form->textField($model,'email', array('disabled'=>'disabled')); ?>
						<?php echo $form->error($model,'email'); ?>
                    </div>
					<?php echo $form->labelEx($model,'current_password'); ?>
					<?php echo $form->passwordField($model,'current_password'); ?>
					<?php echo $form->error($model,'current_password'); ?>
					
					<?php echo $form->labelEx($model,'new_password'); ?>
					<?php echo $form->passwordField($model,'new_password'); ?>
					<?php echo $form->error($model,'new_password'); ?>
					
					<?php echo $form->labelEx($model,'retype_new_password'); ?>
					<?php echo $form->passwordField($model,'retype_new_password'); ?>
					<?php echo $form->error($model,'retype_new_password'); ?>
                    <?php
                    $stt_profile_private = $stt_share_facebook = 'off-status';
                    if(!empty($this->usercurrent->profile_settings) && !empty($this->usercurrent->profile_settings->profile_private)){
                        $stt_profile_private = 'on-status';
                    }
                    if(!empty($this->usercurrent->profile_settings) && !empty($this->usercurrent->profile_settings->share_facebook)){
                        $stt_share_facebook = 'on-status';
                    }
                    ?>
                    <div class="tab-privacy">
                        <p><?php echo Lang::t('settings', 'Keep profile private'); ?> *</p>
                        <lable class="change-slide <?php echo $stt_profile_private;?> icon_common <?php echo Lang::t('settings', 'Onoff_cssclass'); ?>" data-type="profile_private" data-url="<?php echo $this->usercurrent->createUrl('//setting/privacy');?>">
                            <span class="">&nbsp;</span>
                        </lable>
                        <!-- 
                        <p><?php echo Lang::t('settings', 'Share on facebook'); ?></p>
                        <lable class="change-slide <?php echo $stt_share_facebook;?> icon_common <?php echo Lang::t('settings', 'Onoff_cssclass'); ?>" data-type="share_facebook" data-url="<?php echo $this->usercurrent->createUrl('//setting/privacy');?>">
                            <span class="">&nbsp;</span>
                        </lable>
                         -->
                        <div class="clear"></div>
                    </div>
                    <label>&nbsp;</label>
                    <?php
                    /*
					echo CHtml::ajaxButton(Lang::t('settings', 'Save changes'), $this->usercurrent->createUrl('setting/index'),
					                    array(
					                        'type'=>'POST',
											'beforeSend'=>'js:function(){
		                                            $("body").loading();
		                                        }',
					                        'data'=> 'js:$("#frm-accs").serialize()',     
											'dataType' => 'json',                   
					                        'success'=>'js:function(string){
												$("body").unloading();
												
												Util.popAlertSuccess(" ' . Lang::t('general', 'Changes successfully saved!') . '", 300);
												
								    	        setTimeout(function () {
								    	         $( ".pop-mess-succ" ).pdialog("close");
								    	        }, 2000);     

        
											}'           
					                    ),array('class'=>'btn-common'));
					 */
                    
                    
					?>
					<input type="button" id="bt-save-settings" value="<?php echo Lang::t('settings', 'Save changes'); ?>" name="bt-save-settings" class="btn-common">
					
                    <div class="clear"></div>    
                <?php $this->endWidget(); ?>
                
            </div>
            <div class="clear"></div>
        </div>
	</div>
	
</div>
<!-- right column -->
	
<script type="text/javascript">
jQuery('document').ready(function(){
    var input = document.getElementById("uploadImage");
    var formdata = false;
    if (window.FormData) {
        formdata = new FormData();
    }
    input.addEventListener("change", function (evt) {
        var i = 0, len = this.files.length, img, reader, file;
        for ( ; i < len; i++ ) {
            file = this.files[i];
            if (!!file.type.match(/image.*/)) {
                if ( window.FileReader ) {
                    reader = new FileReader();
                    reader.onloadend = function (e) { 
//                     	$('.imgAvatar').attr('src', e.target.result)
                    };
                    reader.readAsDataURL(file);
                }
                if (formdata) {
                    formdata.append("image", file);
                    jQuery('body').loading();

                    jQuery.ajax({
                    	url: "<?php echo Yii::app()->createUrl('//setting/changeAvatar', array('f'=>$this->usercurrent->alias_name))?>",
                        type: "POST",
                        data: formdata,
                        processData: false,
                        contentType: false,
                        success: function (res) {
                            $('.uploadPreview').attr('src', res);
                            jQuery('body').unloading();
                        	//location.reload();
                        }
                    });
                }
            }
            else
            {
                alert('Not a vaild image!');
            }   
        }

    }, false);

});
</script>