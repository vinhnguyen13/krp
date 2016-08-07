<?php
/* @var $this CmsArticleRatingController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Cms Article Ratings',
);

$this->menu=array(
	array('label'=>'Create CmsArticleRating', 'url'=>array('create')),
	array('label'=>'Manage CmsArticleRating', 'url'=>array('admin')),
);
?>

<h1>Cms Article Ratings</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
