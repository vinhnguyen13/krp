<?php if(!empty($friends)):?>
    <ul>
        <?php foreach ($friends as $friend):?>
		<?php 
			$userSocial = UserSocial::model()->findByAttributes(array('social_id'=>$friend['uid'], 'type'=>RegisterSocial::TYPE_FACEBOOK));	
		?>
            <li>
                <a href="<?php echo $userSocial->user->getUserUrl();?>" class="wrap-img">
                    <img src="https://graph.facebook.com/<?php echo $friend['uid'];?>/picture?width=100&height=100"/>
                    <?php if($this->user->isFollow()){?>
						<span rel="unfollow">Unfollow</span>
					<?php }else{?>
						<span rel="follow">Follow</span>
					<?php }?>
                </a>
                <a href="<?php echo $userSocial->user->getUserUrl();?>"><?php echo $friend['name'];?></a>
            </li>                            
        <?php endforeach;?>
    </ul>
    <div class="clear"></div>    
<?php endif;?>

