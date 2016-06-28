<?php
$this->pageTitle = Yii::app()->name;

?>
<?php $this->widget('mobile.widgets.userpage.ProfileWidget'); ?>
<!-- left column -->
<div class="profile-right right">
	<?php $this->widget('mobile.widgets.userpage.NavigationWidget'); ?>
	<div class="clear"></div>
	<div class="list-cmt">
	    <div id="" class="tab-common tab-notification">
        	<div class="scroll-cmt">
        		<?php if(!empty($notifications)){?>
        			<?php foreach ($notifications as $key=>$data){
        				
        				echo '<pre>';
        				print_r($data);
        				echo '</pre>';
        				exit();
						$output = XNotifications::model()->getNotificationData($data);
						$member = Member::model()->findByPk($data->userid);
					?>
					<?php } ?>
	                <div class="block-noti block-send-today">
	                    <h2>Send Today</h2>
	                    <div class="item-noti">
	                        <i class="left icon_common icon-like">&nbsp;</i>
	                        <div class="left icon-noti-txt">
	                            <p><a href="#">VÃµ Ä�Ã¬nh Thanh</a> and <a href="#">30 people</a> liked your post: <a class="link-like" href="#">â€œA NEW STANDARDâ€�</a></p>
	                            <p class="date-post-fs"><label>Feb</label>.  12  1:00  PM</p>
	                        </div>
	                        <div class="clear"></div>
	                    </div>
	                    <div class="item-noti">
	                        <i class="left icon_common icon-cmt">&nbsp;</i>
	                        <div class="left icon-noti-txt">
	                            <p><a href="#">VÃµ Ä�Ã¬nh Thanh</a> and <a href="#">30 people</a> liked your post: <a class="link-like" href="#">â€œA NEW STANDARDâ€�</a></p>
	                            <p class="date-post-fs"><label>Feb</label>.  12  1:00  PM</p>
	                        </div>
	                        <div class="clear"></div>
	                    </div>
	                </div>
        		
	                <div class="block-noti block-resend-today">
	                    <h2>RECENT SENT</h2>
	                    <div class="item-noti">
	                        <i class="left icon_common icon-like">&nbsp;</i>
	                        <div class="left icon-noti-txt">
	                            <p><a href="#">VÃµ Ä�Ã¬nh Thanh</a> liked your post: <a class="link-like" href="#">â€œA NEW STANDARDâ€�</a></p>
	                            <p class="date-post-fs"><label>Feb</label>.  12  1:00  PM</p>
	                        </div>
	                        <div class="clear"></div>
	                    </div>
	                </div>
	                <div class="clear"></div>
	                <div class="see-more">
	                    <a href="#"><span>See More</span><i class="icon_common icon-see-more">&nbsp;</i></a>
	                </div>
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
		<?php $this->widget('mobile.widgets.userpage.ProfileWidget'); ?>
		<!-- left column -->
		<div class="profile-right right">
			<div class="tabs profile-tabs">
				<?php $this->widget('mobile.widgets.userpage.NavigationWidget'); ?>
			</div>
			<!-- profile tabs -->
			<div class="tabs-content-wrap">
				<div class="line"></div>
				<div id="profile-tabs-0" class="tabs-content active">
					<div class="profile-talks">
					<?php if(!empty($notifications)){?>
						<ul class="item-list">
							<?php foreach ($notifications as $key=>$data){
								$output = XNotifications::model()->getNotificationData($data);
								$member = Member::model()->findByPk($data->userid);
							?>
							<li class="item">
								<div class="talk clearfix">
									<a class="ava rounded60" href="<?php echo $member->getUserUrl()?>">
										<img src="<?php echo $member->getAvatar()?>" alt="" border="" width="60"/>
									</a>
									<div class="conversation">
										<div class="cont">
											<p><?php echo $output->message;?></p>
											<p class="time"><?php echo Util::getElapsedTime($data->timestamp) ?></p>
										</div>
									</div>
								</div>
							</li>
							<?php
							} 
							?>
							
							<!-- single activity -->
						</ul>
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