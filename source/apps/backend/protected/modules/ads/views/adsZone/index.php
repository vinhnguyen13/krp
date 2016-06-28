<?php
/* @var $this AdsZoneController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Ads Zones',
);
?>

<h1>Ads Zones</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
