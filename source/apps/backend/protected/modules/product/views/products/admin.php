<?php
/* @var $this ProductsController */
/* @var $model ProProducts */

$this->breadcrumbs=array(
	'Pro Products'=>array('index'),
	'Manage',
);
?>

<h1>Manage Pro Products</h1>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'pro-products-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'title',
		'slug',
		'description',
		'brand_id',
		'created',
		/*
		'created_by',
		'modified',
		'modified_by',
		'published',
		'published_time',
		'price',
		'ordering',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
