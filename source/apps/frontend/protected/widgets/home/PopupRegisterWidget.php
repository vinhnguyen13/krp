<?php
class PopupRegisterWidget extends CWidget {

	public $view	 	= 'popup-register';
	
	public function run() {
		$model=new RegisterForm();
		$this->render($this->view, array('model' => $model));
	}
}