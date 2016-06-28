<?php
/* @var $this BrandsController */
/* @var $model ProBrands */

$this->breadcrumbs=array(
	'Pro Brands'=>array('index'),
	'Manage',
);
?>

<h1>Manage Pro Brands</h1>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'pro-brands-grid',
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
