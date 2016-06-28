<?php
/* @var $this AdsPositionController */
/* @var $model AdsPosition */

$this->breadcrumbs=array(
	'Ads Positions'=>array('index'),
	$model->name,
);

?>

<h1>View AdsPosition #<?php echo $model->code; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'code',
		'name',
	),
)); ?>
