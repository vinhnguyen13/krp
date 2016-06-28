<?php

$this->breadcrumbs=array(
	'Widgets'=>array('admin'),
	$model->class,
);
?>

<h1>Widget <?php echo $model->class; ?></h1>

<a href="<?php echo Yii::app()->createUrl('//news/widgetItem/create', array('widget' => $model->id)); ?>" style="float:right;margin-bottom:10px;">Create new Item</a>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'class',
		'path_alias',
		array(
			'name' => 'enable',
			'value' => ($model->enable == 1) ? 'Enable' : 'Disable'
		),		
		'params'
	),
)); ?>

<br /><br />
<h1>List Items</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'widget-item-grid',
	'dataProvider'=>$item->search(),
	'filter'=>$item,
	'columns'=>array(
		'title',
		'description',
		array(
			'name' => 'image',
			'value'	=> '$data->getImage()',
			'type'	=> 'raw'
		),
		'display_order',
		array(
			'class'=>'CButtonColumn',
			'template'=>'{view}{update}{delete}',
			'buttons'=>array
		    (
		        'view' => array
		        (
		            'url'=>'Yii::app()->createUrl("//news/widgetItem/view", array("id"=>$data->id))',
		        ),
		        'update' => array
		        (
		            'url'=>'Yii::app()->createUrl("//news/widgetItem/update", array("id"=>$data->id))',
		        ),
		        'delete' => array
		        (
		            'url'=>'Yii::app()->createUrl("//news/widgetItem/delete", array("id"=>$data->id))',
		        ),
		    ),
		),
	),
)); ?>