<?php
/* @var $this ShopsController */
/* @var $model ProShops */

$this->breadcrumbs=array(
	'Pro Shops'=>array('index'),
	'Manage',
);
?>

<h1>Manage Pro Shops</h1>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'pro-shops-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'title',
		'slug',
		'description',
		'created',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
