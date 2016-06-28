<?php
/* @var $this AdsZoneController */
/* @var $model AdsZone */

$this->breadcrumbs=array(
	'Ads Zones'=>array('index'),
	'Manage',
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#ads-zone-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Ads Zones</h1>

<div class="admin-wrap">
    <p class="des">
    You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
    or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
    </p>

    <?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
    <div class="search-form" style="display:none">
    <?php $this->renderPartial('_search',array(
        'model'=>$model,
    )); ?>
    </div><!-- search-form -->

    <div style="text-align:right;"><?php echo CHtml::link('Create new Zone', array('//ads/adsZone/create')); ?></div>
    <?php $this->widget('zii.widgets.grid.CGridView', array(
        'id'=>'ads-zone-grid',
        'dataProvider'=>$model->search(),
        'filter'=>$model,
        'columns'=>array(
            'id',
            array(
                'name' => 'name',
                'value'=> 'CHtml::link($data->name, Yii::app()->createUrl("//ads/adsBanner/admin", array("zone_id" => $data->id)))',
                'type' => 'raw'
            ),
            'description',
            'position',
            'width',
            'height',
            'is_active',
            array(
                'class'=>'CButtonColumn',
            ),
        ),
    )); ?>
</div>