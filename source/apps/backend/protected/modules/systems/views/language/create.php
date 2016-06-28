<?php
/* @var $this LanguageController */
/* @var $model Language */

$this->breadcrumbs=array(
	'Languages'=>array('index'),
	'Create',
);

?>

<h1>Create Language</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>