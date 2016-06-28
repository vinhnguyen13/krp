<?php
/* @var $this CompaniesController */
/* @var $model ProCompanies */

$this->breadcrumbs=array(
	'Pro Companies'=>array('index'),
	'Manage',
);
?>
<h1>Manage Pro Companies</h1>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'pro-companies-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'title',
		'slug',
		'city_id',
		'address',
		'fax',
		/*
		'contact_person',
		'position',
		'email',
		'phone_1',
		'phone_2',
		'mobile',
		'created',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
