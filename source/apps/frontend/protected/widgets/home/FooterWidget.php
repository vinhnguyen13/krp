<?php
class FooterWidget extends CWidget {
	
	public $view	 	= 'footer';
	
	public function run() {
		$category = new Category();
		$section = new Section();
		$section = $section->getAll();
		$model = new Subscribe();
		$this->render($this->view, array('section' => $section, 'category' => $category,'model' => $model));
	}
	
}
