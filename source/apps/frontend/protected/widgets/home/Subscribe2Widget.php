<?php
class SubscribeWidget extends CWidget {
	
	public $view	 	= 'subscribe2';
	
	public function run() {
		$model = new Subscribe();
		$this->render($this->view, array('model' => $model));
	}
}