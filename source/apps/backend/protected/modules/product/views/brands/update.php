<?php
/* @var $this BrandsController */
/* @var $model ProBrands */

$this->breadcrumbs=array(
	'Pro Brands'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);
?>

<h1>Update ProBrands <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>