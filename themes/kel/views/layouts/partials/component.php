<?php
	if (isset($this->usercurrent))
		$user = $this->usercurrent;
	else
		$user = Member::model()->findByPk(Yii::app()->user->data()->id);
	$this->widget('application.components.widgets.FirstTimeLogin', array('usercurrent' => $user)); 
?>