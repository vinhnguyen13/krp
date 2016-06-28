<?php
/* @var $this BadgeConfigController */
/* @var $model BadgeConfig */

$this->breadcrumbs=array(
	'Badge Configs'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List BadgeConfig', 'url'=>array('index')),
	array('label'=>'Manage BadgeConfig', 'url'=>array('admin')),
);
?>

<h1>Create BadgeConfig</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>