<?php
/* @var $this AdsBannerController */
/* @var $model AdsBanner */

$this->breadcrumbs=array(
	'Ads Banners'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

?>

<h1>Update AdsBanner <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>