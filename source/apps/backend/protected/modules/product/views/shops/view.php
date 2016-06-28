<?php
/* @var $this ShopsController */
/* @var $model ProShops */

$this->breadcrumbs=array(
	'Pro Shops'=>array('index'),
	$model->title,
);
?>

<h1>View ProShops #<?php echo $model->id; ?></h1>

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
