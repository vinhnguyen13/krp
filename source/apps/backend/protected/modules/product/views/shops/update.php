<?php
/* @var $this ShopsController */
/* @var $model ProShops */

$this->breadcrumbs=array(
	'Pro Shops'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);
?>

<h1>Update ProShops <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>