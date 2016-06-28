<?php
/* @var $this ContactFormController */
/* @var $model ContactForm */

$this->breadcrumbs=array(
	'Contact Forms'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List ContactForm', 'url'=>array('index')),
	array('label'=>'Create ContactForm', 'url'=>array('create')),
	array('label'=>'Update ContactForm', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ContactForm', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ContactForm', 'url'=>array('admin')),
);
?>

<h1>View ContactForm #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'email',
		'phone_number',
		'subject',
		'body',
		'create_time',
	),
)); ?>
