<?php
/* @var $this ProductsController */
/* @var $model ProProducts */

$this->breadcrumbs=array(
	'Pro Products'=>array('index'),
	'Manage',
);
?>

<h1>Manage Products</h1>
<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'post',
)); ?>
<?php 
echo CHtml::label('From', 'from');
echo CHtml::textField('from', $from, array('id'=>'from'));
$this->widget('backend.extensions.calendar.SCalendar',
                    array(
                        'inputField'=>'from',
                        'ifFormat'=>'%d-%m-%Y',
                    ));
echo CHtml::label('To', 'to');
echo CHtml::textField('to', $to, array('id'=>'to'));
$this->widget('backend.extensions.calendar.SCalendar',
                    array(
                        'inputField'=>'to',
                        'ifFormat'=>'%d-%m-%Y',
                    ));
?>
<div class="block buttons buttons-left">
	<?php echo CHtml::submitButton('Submit', array('class'=>'btn btn-primary')); ?>
</div>
<?php $this->endWidget(); ?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'pro-products-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'title',
		array(
			'header' => 'Views',
			'value' => 'Statistics::model()->totalView($data->id)',
		),
		array(
			'header' => 'Like',
			'value' => 'UserProduct::model()->countByAttributes(array("product_id"=>$data->id, "like"=>1))',
		),
		array(
			'header' => 'DisLike',
			'value' => 'UserProduct::model()->countByAttributes(array("product_id"=>$data->id, "hate"=>1))',
		),
		array(
			'header' => 'Bought',
			'value' => 'UserProduct::model()->countByAttributes(array("product_id"=>$data->id, "bought"=>1))',
		),
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
