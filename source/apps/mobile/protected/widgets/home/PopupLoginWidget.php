<?php
class PopupLoginWidget extends CWidget {

	public $view	 	= 'popup-login';
	
	public function run() {
		$model=new LoginForm();
		$this->render($this->view, array('model' => $model));
	}
}