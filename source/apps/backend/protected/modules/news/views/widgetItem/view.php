<?php

$this->breadcrumbs=array(
	$model->widget->class =>array('//news/widget/view', 'id' => $model->widget->id),
	$model->title,
);
?>

<h1>View WidgetItem #<?php echo $model->id; ?></h1>

<div style="float:right;margin-bottom:10px;"><a href="<?php echo Yii::app()->createUrl("//news/widgetItem/update", array('id' => $model->id)); ?>">Update Item</a></div>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		array(
			'name' => 'widget_id',
			'value'	=> $model->widget->class,
		),
		'title',
		'description',
		array(
			'name' => 'image',
			'value'	=> $model->getImage(),
			'type'	=> 'raw'
		),
		'display_order',
		array(
			'name' => 'enabled',
			'value'	=> ($model->enabled == WidgetItem::STATUS_ENABLE) ? "Enabled" : "Disabled",
		),
	),
)); ?>
