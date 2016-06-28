<?php 
$cs = Yii::app()->clientScript;
$cs->registerScriptFile(Yii::app()->theme->baseUrl . '/resources/js/my/comment.js', CClientScript::POS_BEGIN);
$cs->registerScript('CommentArticleComment', "Comment.articleComment();", CClientScript::POS_END);

$model = new Comment();
$form=$this->beginWidget('CActiveForm', array(
	'id'=>'comment-form',
    'action' => $this->createUrl("//article/comment"),
	'enableAjaxValidation'=>false,
	'enableClientValidation'=>true,
    'clientOptions'=>array(
    	'validateOnSubmit'=>true,
		'afterValidate'=> 'js:Alert'
	),
)); ?>
<div class="text-cmt">
	<a href="#" class="pic-avatar left"><img src="<?php echo Yii::app()->user->data()->getAvatar();?>" height="50" width="50" /></a>
	<div class="right sub-cmt">
		<div class="input-cmt">
			<span class="icon_common">&nbsp;</span>
			<?php echo $form->hiddenField($model,'item_id',array('value'=> $item_id)); ?>
			<?php echo $form->textArea($model,'content', array('class' => 'cmt-post-text', 'placeholder' => Lang::t('article', 'Leave a comment...'))); ?>
		</div>
		<?php if(!Yii::app()->user->isGuest) {?>
			<input type="submit" class="right btn-cmt" value="<?php echo Lang::t('article', 'Comment');?>" />
		<?php } ?>
	</div>
	<div class="clear"></div>
</div>
<?php $this->endWidget();?>
<div class="comment-list">
<?php foreach ($comments as $comment) {?>
	<div class="item-cmt">
		<a href="<?php echo $comment->author->getUserUrl()?>" class="pic-avatar left">
			<img src="<?php echo $comment->author->getAvatar()?>" height="50" width="50" />
		</a>
		<div class="left txt-cmt">
			<p class="person-cmt"><a href="<?php echo $comment->author->getUserUrl();?>"><?php echo $comment->author->getDisplayName();?></a> 
			<span>|</span><span><?php echo date('M d, Y - h:m A', $comment->created_date);?></span></p>
			<p><?php echo $comment->getContent();?></p>
		</div>
		<div class="clear"></div>
	</div>
<?php } ?>
</div>
<?php if($pages->getItemCount() > Yii::app()->params->news['limit_comment']) {?>
	<div class="see-more">
		<a href="javascript:ArticleView.show_more_comment(<?php echo $item_id;?>);">
			<span data-nextpage="<?php echo $next_page;?>"><?php echo Lang::t('general', 'See More');?></span>
			<i class="icon_common icon-see-more">&nbsp;</i>
			</a>
	</div>
<?php } ?>

<script>
	$('.cmt-post-text').focus(function() {
		if(typeof isGuest !== "undefined" && isGuest == 1){
			Util.popupLoginForm('popup-login');
			return false;
		}
	});
</script>


<!-- 
<h3>
	<i class="imed imed-comment"></i>
	<span class="text"><?php //echo $pages->getItemCount();?> comments</span>
	<?php //if($pages->getItemCount() > Yii::app()->params->news['limit_comment']) {?>
		<a href="javascript:void(0);" class="more" title="">(View all)</a>
	<?php //} ?>
</h3>
<ul class="comment-list">
	<?php //foreach ($comments as $comment) {?>
	<li>
		<div class="comment-wrap clearfix">
			<a href="<?php //echo $comment->author->getUserUrl()?>" class="ava">
				<img src="<?php //echo $comment->author->getAvatar();?>" alt="" border=""/>
			</a>
			<div class="comment-detail">
				<h4>
					<a href="<?php //echo $comment->author->getUserUrl();?>" class="user"><?php //echo $comment->author->getDisplayName();?></a><span class="date"> on <?php //echo date('M d, Y - h:m:s', $comment->created_date);?></span>
				</h4>
				<p>
					<?php //echo $comment->getContent();?>
				</p>
			</div>
		</div>
	</li>
	<?php //} ?>
</ul>
 -->
<!-- comment list -->