<?php
class MenuWidget extends CWidget {
	
	public $view	 	= 'menu';
	
	public function run() {
		$category = new Category();
		$section = new Section();
		//$section = $section->getAll();
		$criteria= new CDbCriteria();
		$criteria->condition = 'status=:status';
		$criteria->params = array(':status'=>1);
		//$section = $section->getAll();
		$section = Section::model()->findAll($criteria);
		$this->render($this->view, array('section' => $section, 'category' => $category));
	}
	
}
