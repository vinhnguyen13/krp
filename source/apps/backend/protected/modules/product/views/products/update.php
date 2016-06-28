<?php
/* @var $this ProductsController */
/* @var $model ProProducts */

$this->breadcrumbs=array(
	'Pro Products'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);
?>

<h1>Update ProProducts <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>