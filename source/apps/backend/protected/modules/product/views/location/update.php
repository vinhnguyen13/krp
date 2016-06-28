<?php
/* @var $this LocationController */
/* @var $model ProLocation */

$this->breadcrumbs=array(
	'Pro Locations'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);
?>

<h1>Update ProLocation <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>