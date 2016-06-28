<?php if ($item) {?>
<div class="item-cmt-status">
    <a href="#" class="wrap-img left"><img src="<?php echo $item->author->getAvatar()?>" width="50"/></a>
    <p><?php echo $item->cmt->getUserLink(array('class' => 'username')); ?> <?php echo $item->getContent() ?></p>
</div>
<?php }?>