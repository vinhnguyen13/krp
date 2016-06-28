<?php
/* @var $this LocationController */
/* @var $model ProLocation */

$this->breadcrumbs=array(
	'Pro Locations'=>array('index'),
	'Create',
);
?>

<h1>Create ProLocation</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>