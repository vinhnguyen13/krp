<?php
/* @var $this CompaniesController */
/* @var $model ProCompanies */

$this->breadcrumbs=array(
	'Pro Companies'=>array('index'),
	'Create',
);
?>

<h1>Create ProCompanies</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>