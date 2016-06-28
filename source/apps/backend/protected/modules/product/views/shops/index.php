<?php
/* @var $this ShopsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Pro Shops',
);
?>

<h1>Pro Shops</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
