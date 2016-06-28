<?php
/* @var $this BadgeConfigController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Badge Configs',
);

$this->menu=array(
	array('label'=>'Create BadgeConfig', 'url'=>array('create')),
	array('label'=>'Manage BadgeConfig', 'url'=>array('admin')),
);
?>

<h1>Badge Configs</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
