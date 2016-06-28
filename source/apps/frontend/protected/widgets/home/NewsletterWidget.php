<?php
class NewsletterWidget extends CWidget {
	
	public $timeout = 7200;
	
	public function run(){
		$model = new Subscribe();
		$this->render('newsletter', array('model' => $model));
	}
	
}
?>