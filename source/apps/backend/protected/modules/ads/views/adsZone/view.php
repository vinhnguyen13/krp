<?php
/* @var $this AdsZoneController */
/* @var $model AdsZone */

$this->breadcrumbs=array(
	'Ads Zones'=>array('index'),
	$model->name,
);
?>

<h1>View AdsZone #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'description',
		'position',
		'width',
		'height',
		'is_active',
	),
)); ?>
