<?php

$this->breadcrumbs=array(
	$model->widget->class =>array('//news/widget/view', 'id' => $model->widget->id),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);
?>

<h1>Update WidgetItem <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>