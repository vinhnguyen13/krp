<?php 
$this->pageTitle = Yii::app()->name;
$cs = Yii::app()->clientScript;
$cs->registerScriptFile(Yii::app()->theme->baseUrl . '/resources/js/my/common.js', CClientScript::POS_BEGIN);
$cs->registerScript('friendsList', "Friends.friendsList();", CClientScript::POS_END);

?>
<?php $this->widget('mobile.widgets.userpage.ProfileWidget'); ?>
<!-- left column -->
<div class="profile-right right">
	<?php $this->widget('mobile.widgets.userpage.NavigationWidget'); ?>
	<div class="clear"></div>
	<div class="list-cmt">
	    <div id="" class="tab-common tab-friends">
        	<div class="block-friends">
                <ul class="list-tab-sub">
                    <li><a href="#" rel="tab-friends">Friends</a></li>
                    <li><a class="active" href="#" rel="tab-find-friends">Find Friends</a></li>
                    <li><a href="#" rel="tab-invite-friends">Invite Friends</a></li>
                </ul>
                <div class="scroll-tab-friends">     
                    <?php if(!empty($users)):?>               
                    <div class="block-list-friend tab-sub tab-find-friends">
                        <ul>
                            <?php foreach ($users as $user):?>
                                <li>
                                    <a href="<?php echo $user->getUserUrl();?>">
                                        <img src="<?php echo $user->getAvatar()?>" width="105"/>
                                        <?php if($this->user->isFollow()){?>
        									<span rel="unfollow">Unfollow</span>
        								<?php }else{?>
        									<span rel="follow">Follow</span>
        								<?php }?>
                                    </a>
                                    <a href="#"><?php echo $user->getDisplayName();?></a>
                                </li>
                            <?php endforeach;?>
                        </ul>
                        <div class="clear"></div>    
                    </div>
                    <?php endif;?>
                </div>
                <div class="clear"></div>
            </div>
        </div>
	</div>
	
</div>

<script type="text/javascript">
$(function() {
	  $('.scroll-tab-friends').slimscroll({
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
			<div class="tabs-content active">
				<?php echo $this->renderPartial("page/_nav");?>
				<div class="list">
					<ul>
						<?php foreach ($users as $user):?>
						<li class="item">
							<a href="<?php echo $user->getUserUrl();?>" class="user" title="<?php echo $user->getDisplayName();?>">
								<img src="<?php echo $user->getAvatar()?>" alt="" border=""/>
							</a>
							<a href="<?php echo $user->getUserUrl();?>" class="btn btn-follow" rel="<?php echo $user->createUrl('/friend/follow');?>">
								<?php if($user->isFollow()){?>
									<span class="text" rel="unfollow">Unfollow</span>
								<?php }else{?>
									<span class="text" rel="follow">Follow</span>
								<?php }?>
							</a>
						</li>
						<?php endforeach;?>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<!-- right column -->
</div>

