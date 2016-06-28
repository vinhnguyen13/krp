<?php
/* @var $this BadgeStatsController */
/* @var $model BadgeStats */

$this->breadcrumbs=array(
	'Badge Stats'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List BadgeStats', 'url'=>array('index')),
	array('label'=>'Manage BadgeStats', 'url'=>array('admin')),
);
?>

<h1>Create BadgeStats</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>