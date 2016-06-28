<?php
$this->pageTitle = Yii::app()->name;

?>
<?php $this->widget('frontend.widgets.userpage.ProfileWidget'); ?>
<!-- left column -->
<div class="profile-right right">
	<?php $this->widget('frontend.widgets.userpage.NavigationWidget'); ?>
	<div class="clear"></div>
	<div class="list-cmt">
	    <div id="" class="tab-common tab-notification">
        	<div class="scroll-cmt">
        		<div class="block-noti block-resend-today">
				<h2><?php echo Yii::t('profile', 'RECENT SENT') ?></h2>
	        		<?php foreach ($notifications as $key=>$data){
						$output = XNotifications::model()->getNotificationData($data);
						$member = Member::model()->findByPk($data->userid);
					?>
	                    <div class="item-noti">
	                        <i class="left icon_common <?php echo ($data->notification_type == 2) ? 'icon-like' : 'icon-cmt';?>">&nbsp;</i>
	                        <div class="left icon-noti-txt">
	                        	<?php echo $output->message;?>
	                            <p class="date-post-fs">
	                            <!-- <label>Feb</label>.  12  1:00  PM -->
	                            <?php echo Util::getElapsedTime($data->timestamp) ?>
	                            </p>
	                        </div>
	                        <div class="clear"></div>
	                    </div>
        		
        			<?php } ?>
                </div>
        		
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










