<?php
/* @var $this BadgeStatsController */
/* @var $model BadgeStats */

$this->breadcrumbs=array(
	'Badge Stats'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List BadgeStats', 'url'=>array('index')),
	array('label'=>'Create BadgeStats', 'url'=>array('create')),
	array('label'=>'Update BadgeStats', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete BadgeStats', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage BadgeStats', 'url'=>array('admin')),
);
?>

<h1>View BadgeStats #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'user_id',
		'total_like',
		'total_comment',
		'total_following',
		'total_friend',
	),
)); ?>
