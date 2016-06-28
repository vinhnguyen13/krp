<?php
class MenuWidget extends CWidget {
	
	public $view	 	= 'menu';
	
	public function run() {
		$category = new Category();
		$section = new Section();
		$section = $section->getAll();
		$this->render($this->view, array('section' => $section, 'category' => $category));
	}
	
}
