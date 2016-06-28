<?php
class ArticleEmailWidget extends CWidget {
	public $view = 'mail';
	
    public function run() {
    	$model = new MailForm();
    	$this->render($this->view, array('model' => $model));
    }
	
}
?>