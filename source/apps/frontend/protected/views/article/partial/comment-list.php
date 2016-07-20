<div class="box-cmt">
	<p class="font-centuB fs-23 mgB-5 text-uper"><?php echo Lang::t('article', 'Post a comments');?></p>
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
	<div class="cmt-input clearfix">
		<a href="#" class="pull-left thumb">
			<img src="<?php echo Yii::app()->user->data()->getAvatar();?>" height="48" width="48" />
		</a>
		<div class="intro-item">
			<?php echo $form->hiddenField($model,'item_id',array('value'=> $item_id)); ?>
			<?php echo $form->textArea($model,'content', array('class' => 'cmt-post-text w-100', 'placeholder' => Lang::t('article', 'Leave a comment...'))); ?>
			<div class="ver-c clearfix">
				<label for=""><input type="checkbox" class="r-c" />Commnet on facebook</label>
				<?php //if(!Yii::app()->user->isGuest) {?>
					<input type="submit" class="btn-cmt pull-right" value="<?php echo Lang::t('article', 'Send comment');?>" />
				<?php //} ?>
			</div>

		</div>
	</div>
	<?php $this->endWidget();?>
	<?php foreach ($comments as $comment) {?>
		<div class="item-cmt">
			<a href="<?php echo $comment->author->getUserUrl()?>" class="pull-left thumb">
				<!--
				<img src="<?php echo Yii::app()->theme->baseUrl;?>/resources/html/images/img48x48.jpg" alt="" />
				-->
				<img src="<?php echo $comment->author->getAvatar()?>" height="48" width="48" />
			</a>
			<div class="intro-item">
				<div class=""><a href="<?php echo $comment->author->getUserUrl();?>" class="name-item font-600"><?php echo $comment->author->getDisplayName();?></a></div>
				<p><?php echo $comment->getContent();?></p>
			</div>
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
			//Util.popupLoginForm('popup-login');
			return false;
		}
	});
</script>
<!-- comment list -->