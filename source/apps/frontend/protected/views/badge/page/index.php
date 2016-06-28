<?php
$this->pageTitle = Yii::app()->name;

?>
<?php $this->widget('frontend.widgets.userpage.ProfileWidget'); ?>
<!-- left column -->
<div class="profile-right right">
	<?php $this->widget('frontend.widgets.userpage.NavigationWidget'); ?>
	<div class="clear"></div>
	<div class="list-cmt">
	    <div id="" class="tab-common tab-badges">
            <div class="block-badges">
                <h2><?php echo $this->user->getDisplayName();?> ’s Badges</h2>
                <p>These are all the badges you've unlocked. We've listed them in the order in which you've unlocked them (newest first).</p>
                <?php if(!empty($badgeConfigs)){?>
                    <ul>
    				    <li><i class="icon_common icon-bad-1"></i></li>
                        <li><i class="icon_common icon-bad-2"></i></li>
                        <li><i class="icon_common icon-bad-3"></i></li>
                        <li><i class="icon_common icon-bad-4"></i></li>
                        <li><i class="icon_common icon-bad-5"></i></li>
                        <li><i class="icon_common icon-bad-6"></i></li>
                        <li><i class="icon_common icon-bad-7"></i></li>
                        <li><i class="icon_common icon-bad-8"></i></li>
                        <li><i class="icon_common icon-bad-9"></i></li>
                        <li><i class="icon_common icon-bad-10"></i></li>
                        <li><i class="icon_common icon-bad-11"></i></li>
                        <li><i class="icon_common icon-bad-12"></i></li>
                        <li><i class="icon_common icon-bad-13"></i></li>
                        <li><i class="icon_common icon-bad-14"></i></li>
                        <li><i class="icon_common icon-bad-15"></i></li>
                        <li><i class="icon_common icon-bad-16"></i></li>
                        <li><i class="icon_common icon-bad-17"></i></li>
                        <li><i class="icon_common icon-bad-18"></i></li>
                        <li><i class="icon_common icon-bad-19"></i></li>
                        <li><i class="icon_common icon-bad-20"></i></li>
                        <li><i class="icon_common icon-bad-21"></i></li>
                        <li><i class="icon_common icon-bad-22"></i></li>
                        <li><i class="icon_common icon-bad-23"></i></li>
                    </ul>
    			<?php }?>
                <div class="clear"></div>
            </div>
            <div class="clear"></div>
        </div>
	</div>
	
</div>



<div class="page-profile clearfix" style="display: none;">
	<?php $this->widget('frontend.widgets.userpage.ProfileWidget'); ?>
	<!-- left column -->
	<div class="profile-right right">
		<div class="tabs profile-tabs">
			<?php $this->widget('frontend.widgets.userpage.NavigationWidget'); ?>
		</div>
		<!-- profile tabs -->
		<div class="tabs-content-wrap">
			<div class="line"></div>
			<?php if(!empty($badgeConfigs)){?>
				<?php foreach ($badgeConfigs as $config){?>
					<?php 
					if(!empty($usrStats) && $usrStats->markConfig($config)){
					?>
						<span><?php echo $config->title;?></span>
					<?php }?>
				<?php }?>
			<?php }?>
		</div>
	</div>
	<!-- right column -->
</div>