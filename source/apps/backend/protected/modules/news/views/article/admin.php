<?php
/* @var $this ArticleController */
/* @var $model Article */

$this->breadcrumbs=array(
	'Articles'=>array('admin'),
	'Manage',
);


Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('article-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Articles</h1>
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

<div style="text-align:right;"><?php echo CHtml::link('Create new Article', array('//news/article/create')); ?></div>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'article-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array(          
            'name'=>'type',
			'filter' => false,
        	'value'=>'($data->type == 1) ? "Post" : "Static Page"',
        ),
		array(         
            'header' => Yii::t(null, 'VN'),
			'filter' => false,
        	'value'=>'($data->getTitleByLang("vi")) ? $data->getTitleByLang("vi") : "NULL" ',
        ),
		array(         
            'header' => Yii::t(null, 'EN'),
			'filter' => false,
        	'value'=>'($data->getTitleByLang("vi")) ? $data->getTitleByLang("en") : "NULL" ',
        ),
		array(         
            'header' => Yii::t(null, 'Product'),
			'filter' => false,
        	'value'=>'!empty($data->product->product_name) ? $data->product->product_name : "NULL" ',
        ),
		array(         
            'name'=>'public_time',
			'filter' => false,
        	'value'=>'($data->public_time) ? date("d-m-Y H:i:s", $data->public_time) : "NULL" ',
        ),
		array(
			'name'=>'last_modify',
			'filter' => false,
			'value'=>'($data->last_modify) ? date("d-m-Y H:i:s", $data->last_modify) : "NULL" ',
		),
		array(         
            'name'=>'ispublic',
			'filter' => false,
        	'value'=>'($data->ispublic == 1) ? "Yes" : "No"',
        ),
        array(         
            'name'=>'views',
			'filter' => false,
        ),
		/*
		'created',
		'creator',
		'last_modify',
		'ispublic',
		'public_time',
		'meta_description',
		'meta_keywords',
		'html_title',
		*/
		array(
			'class'=>'CButtonColumn',
			'template'=>'{view}{update}{delete}',
			'buttons'=>array
			    (
			        'view' => array
			        (
			            'label'=>'View this article',
			            'url'=>'Yii::app()->createUrl("//news/article/view", array("id" => $data->id))',
			        ),
			    ),
		),
	),
)); ?>
</div>