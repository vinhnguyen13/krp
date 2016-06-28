<?php
/* @var $this BadgeConfigController */
/* @var $model BadgeConfig */

$this->breadcrumbs=array(
	'Badge Configs'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List BadgeConfig', 'url'=>array('index')),
	array('label'=>'Create BadgeConfig', 'url'=>array('create')),
	array('label'=>'View BadgeConfig', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage BadgeConfig', 'url'=>array('admin')),
);
?>

<h1>Update BadgeConfig <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>