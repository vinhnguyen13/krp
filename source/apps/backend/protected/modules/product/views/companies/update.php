<?php
/* @var $this CompaniesController */
/* @var $model ProCompanies */

$this->breadcrumbs=array(
	'Pro Companies'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);
?>

<h1>Update ProCompanies <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>