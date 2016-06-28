<?php
/* @var $this ContactFormController */
/* @var $model ContactForm */

$this->breadcrumbs=array(
	'Contact Forms'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ContactForm', 'url'=>array('index')),
	array('label'=>'Create ContactForm', 'url'=>array('create')),
	array('label'=>'View ContactForm', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ContactForm', 'url'=>array('admin')),
);
?>

<h1>Update ContactForm <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>