<?php
/* @var $this WidgetController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Widgets',
);

/* $this->menu=array(
	array('label'=>'Create Widget', 'url'=>array('create')),
	array('label'=>'Manage Widget', 'url'=>array('admin')),
); */
?>

<h1>Widgets</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
