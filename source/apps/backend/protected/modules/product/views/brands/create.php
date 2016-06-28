<?php
/* @var $this BrandsController */
/* @var $model ProBrands */

$this->breadcrumbs=array(
	'Pro Brands'=>array('index'),
	'Create',
);
?>

<h1>Create ProBrands</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>