<?php
/* @var $this AdsPositionController */
/* @var $model AdsPosition */

$this->breadcrumbs=array(
	'Ads Positions'=>array('index'),
	$model->name=>array('view','id'=>$model->code),
	'Update',
);
?>

<h1>Update AdsPosition <?php echo $model->code; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>