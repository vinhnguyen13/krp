<?php if(!empty($data['data'])){
$link = (!empty($data['next'])) ?  $this->user->createUrl('/my/commentsPrevious', array('object_id'=>$object_id, 'page'=>$data['next'])) : '';
?>
<div class="prevData" data-prevLnk="<?php echo $link?>">
<?php 
foreach ($data['data'] as $sitem) {
?>
<div class="item-cmt-status">
    <a href="#" class="wrap-img left"><img src="<?php echo $sitem->author->getAvatar()?>" width="50"/></a>
    <p><?php echo $sitem->cmt->getUserLink(array('class' => 'username')); ?> <?php echo $sitem->getContent() ?></p>
</div>

<?php }?>
</div>
<?php }?>