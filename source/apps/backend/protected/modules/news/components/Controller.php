<?php
class Controller extends SBaseController
{
	public $layout = '//layouts/column2';
	public $menu = array();
	public $breadcrumbs = array();
	
	public function beforeAction($action) {
		
		$this->menu=array(
			array(
				'label'=>'News',
				'items' => array(
					array('label'=>'Section Manager', 'url'=>array('//news/section/admin')),
					array('label'=>'Category Manager', 'url'=>array('//news/category/admin')),
					array('label'=>'Article Manager', 'url'=>array('//news/article/admin')),						
				),
			),
			array(
				'label'=>'Widgets',
				'items' => array(
					array('label'=>'Widget Manager', 'url'=>array('//news/widget/admin')),
				),
			),
		);
		
		return parent::beforeAction($action);
	}
}