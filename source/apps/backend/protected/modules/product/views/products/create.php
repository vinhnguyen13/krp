<?php
/* @var $this ProductsController */
/* @var $model ProProducts */

$this->breadcrumbs=array(
	'Pro Products'=>array('index'),
	'Create',
);
?>

<h1>Create ProProducts</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>