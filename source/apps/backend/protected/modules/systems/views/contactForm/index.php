<?php
/* @var $this ContactFormController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Contact Forms',
);

$this->menu=array(
	array('label'=>'Create ContactForm', 'url'=>array('create')),
	array('label'=>'Manage ContactForm', 'url'=>array('admin')),
);
?>

<h1>Contact Forms</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
