<?php
/* @var $this CategoryController */
/* @var $model Category */

$this->breadcrumbs=array(
	'Categories'=>array('admin'),
	'Manage',
);


Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('category-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Categories</h1>
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

	<div style="text-align:right;"><?php echo CHtml::link('Create new Category', array('//news/category/create')); ?></div>
	<?php $this->widget('zii.widgets.grid.CGridView', array(
		'id'=>'category-grid',
		'dataProvider'=>$model->search(),
		'filter'=>$model,
		'columns'=>array(
			array(
				'name' => 'section_id',
				'filter' => CHtml::listData(Section::model()->getAll(), 'id', 'title'),
				'value' => '($data->section_id) ? $data->getSectionTitle($data->section_id) : "None"',
			),
			array(
				'name' => 'parent_id',
				'filter' => CHtml::listData(Category::model()->getAll(), 'id', 'title'),
				'value' => '($data->parent_id) ? $data->getTitle($data->parent_id) : "None"',
			),
			array(
				'header' => Yii::t(null, 'EN'),
				'filter' => false,
				'value'=>'($data->getTitleByLang("vi")) ? $data->getTitleByLang("en") : "NULL" ',
			),
			array(
				'header' => Yii::t(null, 'VN'),
				'filter' => false,
				'value'=>'($data->getTitleByLang("vi")) ? $data->getTitleByLang("vi") : "NULL" ',
			),
			/* 'title', */
			array(
				'name' => 'status',
				'filter' => CHtml::dropDownList('Category[status]',$model->status, array('1' => 'Enable', '2' => 'Disable')), 
				'value' => '($data->status == 1) ? "Enable" : "Disable"',
			),
			'displayorder',
			array(
				'class'=>'CButtonColumn',
			),
		),
	)); ?>
</div>