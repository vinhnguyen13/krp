<?php
/* @var $this AdsBannerController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Ads Banners',
);

?>

<h1>Ads Banners</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
