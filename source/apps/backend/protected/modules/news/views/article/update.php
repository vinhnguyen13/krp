<?php
/* @var $this ArticleController */
/* @var $model Article */

$this->breadcrumbs=array(
	'Articles'=>array('admin'),
	//$model->title=>array('../../../article/'.$model->id.'/'. $model->title),
	'Update',
);


?>

<h1>Edit: <?php echo $model->title; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model, 'section_id'=>0)); ?>