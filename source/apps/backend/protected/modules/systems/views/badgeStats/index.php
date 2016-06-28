<?php
/* @var $this BadgeStatsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Badge Stats',
);

$this->menu=array(
	array('label'=>'Create BadgeStats', 'url'=>array('create')),
	array('label'=>'Manage BadgeStats', 'url'=>array('admin')),
);
?>

<h1>Badge Stats</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
