<?php
/* @var $this WidgetItemController */
/* @var $model WidgetItem */

$this->breadcrumbs=array(
	'Widget'=> array('//news/widget/view', 'id' => $model->widget_id),
	'Create',
);
?>

<h1>Create WidgetItem</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>