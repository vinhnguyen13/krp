<?php
class SearchWidget extends CWidget {
	
	public $view	 	= 'search';
	
	public function run() {
		$model = new Article();
		$this->render($this->view, array('model' => $model));
	}
	
}
