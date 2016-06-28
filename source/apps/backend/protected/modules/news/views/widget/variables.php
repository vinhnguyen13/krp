<?php
$lcw = Yii::app()->request->getParam('LayoutColumnWidget');
$post = Yii::app()->request->getPost('LayoutColumnWidget');
if(!empty($lcw['id'])):
	$model = LayoutColumnWidget::model()->findByPk($lcw['id']);
	if(!empty($model->properties)){
		$model->properties = json_decode($model->properties, false);
	}
	if(!empty($post['widget_id'])){
		$widget = Widget::model()->findByPk($post['widget_id']);
		if(!empty($widget)){
			$wclass = $widget->class;
			$results = NModels::getVarsInClass($wclass, $widget->path_alias);
		}
	}
?>
	
	<?php if(!empty($results)):?>
	<?php foreach ($results as $key=>$result):?>
	<?php 
	$value ='';
	if(!empty($model->properties->$wclass->$key)){
		$value = $model->properties->$wclass->$key;
	}
	?>
	<div class="row">
		<?php echo CHtml::label(Yii::t(null, $result), 'properties'); ?>
		<?php echo CHtml::textField('properties['.$wclass.']['.$key.']', $value, array()); ?>
	</div>
	<?php endforeach;?>
	<?php endif;?>
<?php endif;?>