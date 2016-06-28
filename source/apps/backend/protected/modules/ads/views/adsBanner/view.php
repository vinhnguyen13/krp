<?php
/* @var $this AdsBannerController */
/* @var $model AdsBanner */

$this->breadcrumbs=array(
	'Ads Banners'=>array('index'),
	$model->name,
);

?>

<h1>View AdsBanner #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'link',
		'upload',
		'target',
		'weight',
		'start',
		'end',
		'number_click',
		'count_click',
		'number_view',
		'count_view',
		'is_active',
	),
)); ?>
