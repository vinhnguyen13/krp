<?php
/* @var $this AdsPositionController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Ads Positions',
);
?>

<h1>Ads Positions</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
