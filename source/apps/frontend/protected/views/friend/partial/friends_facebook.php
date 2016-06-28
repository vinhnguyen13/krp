<h2>Connect Facebook</h2>
<?php if(!empty($friends)):?>
<div class="block-per">
    <div class="block-avatar">
        <?php foreach ($friends as $key=>$friend):?>
        <?php 
        $userSocial = UserSocial::model()->findByAttributes(array('social_id'=>$friend['uid'], 'type'=>RegisterSocial::TYPE_FACEBOOK));
        $class = (($key + 1) % 4 == 0) ? 'right': 'left';
        ?>
        <div class="<?php echo $class;?>">
            <a class="wrap_img" href="<?php echo $userSocial->user->getUserUrl();?>">
                <img src="https://graph.facebook.com/<?php echo $friend['uid'];?>/picture?width=71&height=71"/>
            </a>
            <a href="<?php echo $userSocial->user->getUserUrl();?>"><?php echo $userSocial->user->getDisplayName();?></a>
        </div>
        <?php endforeach;?>
        <div class="clear"></div>
    </div>
<?php endif;?>
</div>


