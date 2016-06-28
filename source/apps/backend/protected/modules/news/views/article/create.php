<?php
/* @var $this ArticleController */
/* @var $model Article */

$this->breadcrumbs=array(
	'Articles'=>array('admin'),
	'Create',
);


?>

<h1>Create Article</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>