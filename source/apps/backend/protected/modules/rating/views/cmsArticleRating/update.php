<?php
/* @var $this CmsArticleRatingController */
/* @var $model CmsArticleRating */

$this->breadcrumbs=array(
	'Cms Article Ratings'=>array('index'),
	$model->rating_id=>array('view','id'=>$model->rating_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List CmsArticleRating', 'url'=>array('index')),
	array('label'=>'Create CmsArticleRating', 'url'=>array('create')),
	array('label'=>'View CmsArticleRating', 'url'=>array('view', 'id'=>$model->rating_id)),
	array('label'=>'Manage CmsArticleRating', 'url'=>array('admin')),
);
?>

<h1>Update CmsArticleRating <?php echo $model->rating_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>