<?php if(!empty($data['data'])){?>
<?php if($data && count($data['data'])>= $config['default'] && !isset($ispagging)) {  
$link = (!empty($data['next'])) ? $this->user->createUrl('/my/commentsPrevious', array('object_id'=>$object_id, 'page'=>$data['next'])) : '';
?>
    <span class="muiten-cmt">&nbsp;</span>    
    <p class="num-cmt">
    	<a href="javascript:void(0);" class="cpagging-comment" rel="<?php echo $link;?>">
    		<?php if (!empty($data['pages']->itemCount) && $data['pages']->itemCount > $config['view']) {
    		    echo Lang::t('newsfeed', 'View previous comments');
    	    }?>
    	</a>
    </p>
<?php }?>
<?php foreach ($data['data'] as $sitem) {

?>
<div class="item-cmt-status">
    <a href="#" class="wrap-img left"><img src="<?php echo $sitem->author->getAvatar()?>" width="50"/></a>
    <p><?php echo $sitem->cmt->getUserLink(array('class' => 'username')); ?> <?php echo $sitem->getContent() ?></p>
</div>

<?php }?>
<?php }?>