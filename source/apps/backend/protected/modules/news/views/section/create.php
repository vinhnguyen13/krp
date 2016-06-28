<?php
/* @var $this SectionController */
/* @var $model Section */

$this->breadcrumbs=array(
	'Sections'=>array('index'),
	'Create',
);


?>

<h1>Create Section</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>