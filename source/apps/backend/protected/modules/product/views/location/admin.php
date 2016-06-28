<?php
/* @var $this LocationController */
/* @var $model ProLocation */

$this->breadcrumbs=array(
	'Pro Locations'=>array('index'),
	'Manage',
);
?>

<h1>Manage Pro Locations</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'pro-location-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'city_name',
		'order',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
