<?php
/* @var $this BadgeStatsController */
/* @var $model BadgeStats */

$this->breadcrumbs=array(
	'Badge Stats'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List BadgeStats', 'url'=>array('index')),
	array('label'=>'Create BadgeStats', 'url'=>array('create')),
	array('label'=>'View BadgeStats', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage BadgeStats', 'url'=>array('admin')),
);
?>

<h1>Update BadgeStats <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>