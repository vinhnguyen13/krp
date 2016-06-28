<?php
/* @var $this ArticleController */
/* @var $model Article */

$this->breadcrumbs=array(
	'Articles'=>array('admin'),
	'View',
);


Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('article-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Articles</h1>
<?php	if(!empty($article)){ ?>
<div class="news-cont">
	<div class="art-title">
		<h1><?php echo $article->title;?></h1>
		<?php if($article->type != '1') { ?>
			<span class="date"><?php echo date('d/m/Y', $article->created) ;?></span>
		<?php } ?>
	</div>
	<div class="art-cont">
		<?php echo $article->body;?>
	</div>
	<!-- article content -->
	<div class="nav clearfix">
		<div class="fbshare">
			<a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo Yii::app()->createAbsoluteUrl('//news/article', array('id' => $article->id, 'slug' => $article->slug)) ;?>&t=<?php echo $article->title;?>">
			Chia sẻ tin tức qua Facebook</a>
		</div>
		<!-- others -->
	</div>
	<!-- article nav -->
</div>
<!-- news content -->
<?php } else { ?>
	<ul>
		<li>No data</li>
	</ul>
<?php } ?>