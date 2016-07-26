<?php
class FooterWidget extends CWidget {
	
	public $view	 	= 'footer';
	
	public function run() {
		$category = new Category();
		$section = new Section();
		$section = $section->getAll();
		$model2 = new Subscribe2();
        //$model->name="Subscribe2";
		$this->render($this->view, array('section' => $section, 'category' => $category,'model2' => $model2));
	}
	
}
