<?php
/* @var $this LanguageController */
/* @var $model Language */

$this->breadcrumbs=array(
	'Languages'=>array('index'),
	'Manage',
);
?>
<h1>Manage Languages</h1>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'language-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'code',
		'title',
		'enable',
		'is_default',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
