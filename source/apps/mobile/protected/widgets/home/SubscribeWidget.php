<?php
class SubscribeWidget extends CWidget {
	
	public $view	 	= 'subscribe';
	
	public function run() {
		$model = new Subscribe();
		$this->render($this->view, array('model' => $model));
	}
	
}
