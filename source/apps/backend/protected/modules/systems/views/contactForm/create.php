<?php
/* @var $this ContactFormController */
/* @var $model ContactForm */

$this->breadcrumbs=array(
	'Contact Forms'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ContactForm', 'url'=>array('index')),
	array('label'=>'Manage ContactForm', 'url'=>array('admin')),
);
?>

<h1>Create ContactForm</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>