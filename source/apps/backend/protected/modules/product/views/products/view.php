<?php
/* @var $this ProductsController */
/* @var $model ProProducts */

$this->breadcrumbs=array(
	'Pro Products'=>array('index'),
	$model->title,
);
?>

<h1>View ProProducts #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'title',
		'slug',
		'description',
		'brand_id',
		'created',
		'created_by',
		'modified',
		'modified_by',
		'published',
		'published_time',
		'price',
		'ordering',
	),
)); ?>
