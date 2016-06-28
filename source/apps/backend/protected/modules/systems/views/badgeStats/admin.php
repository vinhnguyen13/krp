<?php
/* @var $this BadgeStatsController */
/* @var $model BadgeStats */

$this->breadcrumbs=array(
	'Badge Stats'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List BadgeStats', 'url'=>array('index')),
	array('label'=>'Create BadgeStats', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#badge-stats-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Badge Stats</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'badge-stats-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		array(
				'header' => Yii::t(null, 'User'),
				'name' => 'user_id',
				'value' => '$data->user->getDisplayName()',
				'type'=>'raw',
		),
		'total_like',
		'total_comment',
		'total_following',
		'total_friend',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
