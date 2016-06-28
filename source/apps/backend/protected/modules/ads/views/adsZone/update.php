<?php
/* @var $this AdsZoneController */
/* @var $model AdsZone */

$this->breadcrumbs=array(
	'Ads Zones'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);
?>

<h1>Update AdsZone <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>