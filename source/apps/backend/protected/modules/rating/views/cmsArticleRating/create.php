<?php
/* @var $this CmsArticleRatingController */
/* @var $model CmsArticleRating */

$this->breadcrumbs=array(
	'Cms Article Ratings'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List CmsArticleRating', 'url'=>array('index')),
	array('label'=>'Manage CmsArticleRating', 'url'=>array('admin')),
);
?>

<h1>Create CmsArticleRating</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>