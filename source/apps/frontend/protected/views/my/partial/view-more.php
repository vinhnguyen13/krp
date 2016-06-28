<?php if(!empty($activities['data'])){?>
    <?php foreach ($activities['data'] as $key=>$data){
		$header = Activity::getHeader($data);
		if(empty($header)){
			continue;
		}
		$object_id = $data->id;
		$type_id = "ACTIVITY";
		$dataobj = htmlspecialchars(json_encode(array('object_id' => Util::encrypt($object_id), 'action' => Util::encrypt($data->action))));
		$config = Comment::ConfigView();
			
		/* people comment */
		$fcomment = Comment::model()->getComments($object_id, $type_id);
		
		$clsLike = ($data->getLikeState($this->usercurrent->id) == 'Like') ? 'icon-like' : 'icon-unlike';
	?>
    <div class="item-list">
        <a href="<?php echo $data->member->getUserUrl()?>" class="left wrap-img"><img src="<?php echo $data->member->getAvatar()?>" width="50"/></a>
        <div class="left right-cmt-status">
            <p><?php echo $header; ?></p>
            <p class="date-post-fs"><?php echo Util::getElapsedTime($data->timestamp) ?></p>
            <a class="status-cmt like_comment" rel="<?php echo $this->usercurrent->createUrl("//my/like", array('oid' => Util::encrypt($object_id), 'type' => 'activity')); ?>"><i class="icon_common <?php echo $clsLike;?>">&nbsp;</i><b><?php echo $data->getLikeCount() ?></b>Like</a>
            <a href="#" class="status-cmt show-cmt"><i class="icon_common icon-cmt">&nbsp;</i><b><?php echo !empty($fcomment['pages']->itemCount) ? $fcomment['pages']->itemCount : 0?></b>Comment</a>
            <div class="box-cmt-status">
                <div class="comment-list">
                <?php 
				$params['data'] = $fcomment;
				$params['config'] = $config;
				$params['object'] = $dataobj;
				$params['object_id'] = $object_id;
				$params['type_id'] = $type_id;
				$this->renderPartial("partial/list-comment", $params);
				?>
				</div>
                <?php if(!empty($this->usercurrent)){
					$model = new Comment();
				?>
				<?php $form=$this->beginWidget('CActiveForm', array(
				    'action' => $this->user->createUrl("//my/commentActivity"),
				    'htmlOptions' => array(
				        	'class' => 'comment-form'
				        )
				)); ?>
                <div class="item-cmt-status txt-cmt-status">
                    <a href="#" class="wrap-img left"><img src="<?php echo $this->usercurrent->getAvatar()?>" width="50"/></a>
                    <div>
                        <span class="icon_common">&nbsp;</span>
                        <?php echo $form->hiddenField($model,'item',array('value'=> $dataobj)); ?>
						<?php echo $form->textArea($model,'content', array('class' => 'cmt-post-text', 'placeholder' => 'Write a comment...')); ?>
                    </div>
                    <div class="clear"></div>
                    <input type="submit" class="btn-cmt-status right btn-common" />
                </div>
                <?php $this->endWidget();?>
				<?php }?>
                
                <div class="clear"></div>
            </div>
        </div>
    </div>
    <?php }?>
    <div class="clear"></div>
    <?php if(!empty($activities['total']) && $activities['total'] > $data_offset){?>
    <div class="see-more">
        <a href="javascript:void(0);" data-offset="<?php echo $data_offset;?>" data-url="<?php echo $this->user->createUrl('//my/view');?>"><span>See More</span><i class="icon_common icon-see-more">&nbsp;</i></a>
    </div>
    <?php }?>
     <?php }?>
	
<script type="text/javascript">
$('.scroll-cmt').slimscroll({
    size: '5px',
	height: '1030px',
	alwaysVisible: true,
  railVisible: true,
  distance: '5px'
  });
</script>

