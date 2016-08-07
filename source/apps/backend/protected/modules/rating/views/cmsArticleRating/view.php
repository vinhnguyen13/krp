<?php
/* @var $this CmsArticleRatingController */
/* @var $model CmsArticleRating */

$this->breadcrumbs=array(
	'Cms Article Ratings'=>array('index'),
	$model->rating_id,
);

$this->menu=array(
	array('label'=>'List CmsArticleRating', 'url'=>array('index')),
	array('label'=>'Create CmsArticleRating', 'url'=>array('create')),
	array('label'=>'Update CmsArticleRating', 'url'=>array('update', 'id'=>$model->rating_id)),
	array('label'=>'Delete CmsArticleRating', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->rating_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage CmsArticleRating', 'url'=>array('admin')),
);
?>

<h1>View CmsArticleRating #<?php echo $model->rating_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'rating_id',
		'article_id',
		'rating_number',
		'total_points',
		'created',
		'modified',
		'status',
	),
)); ?>
