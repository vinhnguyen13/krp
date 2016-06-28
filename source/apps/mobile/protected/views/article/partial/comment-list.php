<?php 
$this->pageTitle = Yii::app()->name;
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
		//'afterValidate'=> 'js:Alert'
	),
)); ?>

<div class="input-cmt">
	<a class="wrap-img left" href="javascript:void(0);"><img src="<?php echo Yii::app()->user->data()->getAvatar();?>" /></a>
	<div class="left input-txt">
		<span class="icon-common left-txt">&nbsp;</span>
		<?php echo $form->hiddenField($model,'item_id',array('value'=> $item_id)); ?>
		<?php echo $form->textArea($model,'content', array('class' => 'cmt-post-text', 'placeholder' => Lang::t('article', 'Leave a comment...'))); ?>
		<?php if(!Yii::app()->user->isGuest) {?>
			<input type="submit" class="btn-common right btn-cmt" value="<?php echo Lang::t('article', 'Comment');?>" />
		<?php } ?>
	</div>
	<div class="clear"></div>
</div>
<?php $this->endWidget();?>
<ul class="list-cmt">
	<?php foreach ($comments as $comment) {?>
	<li>
		<a class="wrap-img left" href="<?php echo $comment->author->getUserUrl()?>"><img src="<?php echo $comment->author->getAvatar()?>" height="30" width="30"/></a>
		<div class="left detail-cmt">
			<p class="per-cmt"><a href="<?php echo $comment->author->getUserUrl();?>"><?php echo $comment->author->getDisplayName();?></a>| <?php echo date('M d, Y - h:m A', $comment->created_date);?></p>
			<p><?php echo $comment->getContent();?></p>
		</div>
	</li>
	<?php } ?>
</ul>
<?php if($pages->getItemCount() > Yii::app()->params->news['limit_comment']) {?>
	<div class="see-more">
		<a href="javascript:ArticleView.show_more_comment(<?php echo $item_id;?>);">
			<span data-nextpage="<?php echo $next_page;?>"><?php echo Lang::t('general', 'See More');?></span>
			<i class="icon_common icon-see-more">&nbsp;</i>
			</a>
	</div>
<?php } ?>
<div class="clear"></div>

<script>
	$('.cmt-post-text').focus(function() {
		if(typeof isGuest !== "undefined" && isGuest == 1){
			//Util.popupLoginForm('popup-login');
			window.location.href = '/login';
			return false;
		}
	});
</script>

