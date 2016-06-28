<?php
/* @var $this AdsBannerController */
/* @var $model AdsBanner */

$this->breadcrumbs=array(
	'Ads Banners'=>array('index'),
	'Manage',
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#ads-banner-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Ads Banners</h1>
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

    <div style="text-align:right;"><?php echo CHtml::link('Create new Banner', array('//ads/adsBanner/create')); ?></div>
    <?php $this->widget('zii.widgets.grid.CGridView', array(
        'id'=>'ads-banner-grid',
        'dataProvider'=>$model->search(),
        'filter'=>$model,
        'columns'=>array(
            'id',
            'name',
            'link',
            'upload',
            'target',
            'weight',
            array(
                'name' => 'start',
                'value'=> 'date("d-m-Y",$data->start)'
            ),
            array(
                'name' => 'end',
                'value'=> 'date("d-m-Y",$data->end)'
            ),
            'number_click',
            'count_click',
            'number_view',
            'count_view',
            array(
                'name' => 'zone_id',
                'value'=> '$data->zone ? CHtml::link($data->zone->name, Yii::app()->createUrl("//ads/adsZone/update", array("id" => $data->zone->id))): ""',
                'filter'=>CHtml::listData(AdsZone::model()->findAll(), 'id', 'name'),
                'type' => 'raw'
            ),
            array(
                'name' => 'is_active',
                'value'=> '$data->is_active ? "Active" : "Deactive"'
            ),
            array(
                'class'=>'CButtonColumn',
            ),
        ),
    )); ?>
</div>