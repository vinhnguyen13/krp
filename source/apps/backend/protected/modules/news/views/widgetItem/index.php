<?php
/* @var $this WidgetItemController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Widget Items',
);

$this->menu=array(
	array('label'=>'Create WidgetItem', 'url'=>array('create')),
	array('label'=>'Manage WidgetItem', 'url'=>array('admin')),
);
?>

<h1>Widget Items</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
