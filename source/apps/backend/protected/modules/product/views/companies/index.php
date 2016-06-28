<?php
/* @var $this CompaniesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Pro Companies',
);

$this->menu=array(
	array('label'=>'Create ProCompanies', 'url'=>array('create')),
	array('label'=>'Manage ProCompanies', 'url'=>array('admin')),
);
?>

<h1>Pro Companies</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
