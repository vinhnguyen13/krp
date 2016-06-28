<?php
$this->pageTitle = Yii::app()->name;

?>

<div class="page-profile">
    <?php $this->widget('mobile.widgets.userpage.ProfileWidget'); ?>
    <div class="block-content-pro">
        <?php $this->widget('mobile.widgets.userpage.NavigationWidget'); ?>       	
        <div class="block-tab-items">
           	<div id="tab-noti" class="tab-common" style="display:block;">
				<div class="box-noti">
					<h2><?php echo Yii::t('profile', 'RECENT SENT') ?></h2>
					<ul class="list-cmt-pro">
		        		<?php foreach ($notifications as $key=>$data){
							$output = XNotifications::model()->getNotificationData($data);
							$member = Member::model()->findByPk($data->userid);
						?>
						<li>
							<div class="block-items-cmt-pro">
								<span class="<?php echo ($data->notification_type == 2) ? 'like' : 'cmt';?>-common icon-touch left wrap-img"><i class="icon-common">&nbsp;</i></span>
								<div class="left detail-acti">
									<?php echo $output->message;?>
									<!--  <p><a href="#" class="name-per">Võ Đình Thanh</a> and <a href="#" class="name-per">30 people</a> liked your post: <a class="like-link" href="#">“A NEW STANDARD”</a></p>-->
									<p class="post-date" <?php echo Util::getElapsedTime($data->timestamp) ?></p>
								</div>
							</div>
						</li>
	    				<?php } ?>
					</ul>
				</div>
            </div>
            <div class="clear"></div>
        </div>
        <div class="clear"></div>
    </div>
</div>


