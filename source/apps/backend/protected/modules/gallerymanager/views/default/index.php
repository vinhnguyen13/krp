<?php 
$this->pageTitle=Yii::app()->name; 
$this->breadcrumbs=array(
		'Articles'=>array('admin'),
		'Manage',
);
?>
<h1>Manage Album</h1>
<div class="admin-wrap">
<div style="text-align:right;"><?php echo CHtml::link('Create new Album', array('//gallerymanager/default/create')); ?></div>
<?
$this->widget('zii.widgets.grid.CGridView', array(
		'dataProvider'=>$galleries->search(),
		'enableSorting' => true,
		'enablePagination' => true,
		'filter' => $galleries,
		'columns' => array(
				array(
					'header' => Yii::t(null, 'Name'),
					'name' => 'name',
					'value' => '$data->name',
					'type'=>'raw',
					'value'=>'CHtml::link(CHtml::encode($data->name),array("//gallerymanager/default/view","id"=>$data->id))',
				),
				array(
					'header' => Yii::t(null, 'Description'),
					'name' => 'description',
				),			
				array(
					'class'=>'CButtonColumn',
					'template' => '{view}{update}{delete}',
				),

		)));
?>
</div>
