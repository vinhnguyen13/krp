<?php
/* @var $this LanguageController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Languages',
);

?>

<h1>Languages</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
