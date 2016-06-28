<?php
/* @var $this BadgeConfigController */
/* @var $model BadgeConfig */

$this->breadcrumbs=array(
	'Badge Configs'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List BadgeConfig', 'url'=>array('index')),
	array('label'=>'Create BadgeConfig', 'url'=>array('create')),
	array('label'=>'Update BadgeConfig', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete BadgeConfig', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage BadgeConfig', 'url'=>array('admin')),
);
?>

<h1>View BadgeConfig #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'title',
		'description',
		'total_like',
		'total_comment',
		'total_following',
		'total_friend',
		'image',
		'enable',
		'type',
	),
)); ?>
