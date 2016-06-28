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
                    <li><a href="#" rel="tab-find-friends">Find Friends</a></li>
                    <li><a class="active" href="#" rel="tab-invite-friends">Invite Friends</a></li>
                </ul>
                <div class="scroll-tab-friends">
                    <?php if(!empty($friends)):?>
                    <div class="block-list-friend tab-sub tab-invite-friends">
                    	<div class="tbl-invite">
                        <table cellpadding="0" cellspacing="0" border="0">
                        	<tr>
                                <th class="first-col">Email Address</th>
                                <th class="col-cbox">invite</th>
                            </tr>
                            <?php foreach ($friends as $friend):?>
                            <tr>
                            	<td><?php echo $friend['name'];?></td>
                                <td class="cbox-js col-cbox"><div><input type="checkbox" /><span class="icon_common"></span></div></td>
                            </tr>
                            <?php endforeach;?>
                        </table>
                        </div>
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
				<div class="friends-list">
					<?php if(!empty($friends)):?>
					<ul>
						<?php foreach ($friends as $friend):?>
						<li class="item">
							<a href="#" class="user-ava">
								<img src="https://graph.facebook.com/<?php echo $friend['uid'];?>/picture?type=normal" alt="" border=""/>
							</a>
							<a href="#" class="user-name">
								<?php echo $friend['name'];?>
							</a>
						</li>
						<?php endforeach;?>
					</ul>
					<?php endif;?>
				</div>
			</div>
		</div>
	</div>
	<!-- right column -->
</div>

