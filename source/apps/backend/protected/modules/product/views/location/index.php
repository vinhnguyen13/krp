<?php
/* @var $this LocationController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Pro Locations',
);

$this->menu=array(
	array('label'=>'Create ProLocation', 'url'=>array('create')),
	array('label'=>'Manage ProLocation', 'url'=>array('admin')),
);
?>

<h1>Pro Locations</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
