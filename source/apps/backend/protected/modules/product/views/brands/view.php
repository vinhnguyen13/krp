<?php
/* @var $this BrandsController */
/* @var $model ProBrands */

$this->breadcrumbs=array(
	'Pro Brands'=>array('index'),
	$model->title,
);
?>

<h1>View ProBrands #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'title',
		'slug',
		'description',
		'created',
	),
)); ?>
