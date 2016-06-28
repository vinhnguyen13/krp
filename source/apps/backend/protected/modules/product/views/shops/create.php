<?php
/* @var $this ShopsController */
/* @var $model ProShops */

$this->breadcrumbs=array(
	'Pro Shops'=>array('index'),
	'Create',
);
?>

<h1>Create ProShops</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>