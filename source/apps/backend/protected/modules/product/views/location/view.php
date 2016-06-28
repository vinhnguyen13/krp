<?php
/* @var $this LocationController */
/* @var $model ProLocation */

$this->breadcrumbs=array(
	'Pro Locations'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List ProLocation', 'url'=>array('index')),
	array('label'=>'Create ProLocation', 'url'=>array('create')),
	array('label'=>'Update ProLocation', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ProLocation', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ProLocation', 'url'=>array('admin')),
);
?>

<h1>View ProLocation #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'city_name',
		'order',
		'created',
	),
)); ?>
