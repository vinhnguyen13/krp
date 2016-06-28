<?php
class Controller extends SBaseController
{
	public $layout = '//layouts/column2';
	public $menu = array();
	public $breadcrumbs = array();
	
	public function beforeAction($action) {
		
		$this->menu=array(
			array(
				'label'=>'Location',
				'items' => array(
					array('label'=>'Create', 'url'=>array('//product/location/create')),
					array('label'=>'Manage', 'url'=>array('//product/location/admin')),						
				),
			),
			array(
				'label'=>'Companies',
				'items' => array(
					array('label'=>'Create', 'url'=>array('//product/companies/create')),
					array('label'=>'Manage', 'url'=>array('//product/companies/admin')),						
				),
			),
			array(
				'label'=>'Brands',
				'items' => array(
					array('label'=>'Create', 'url'=>array('//product/brands/create')),
					array('label'=>'Manage', 'url'=>array('//product/brands/admin')),						
				),
			),
// 			array(
// 				'label'=>'Products',
// 				'items' => array(
// 					array('label'=>'Create', 'url'=>array('//product/products/create')),
// 					array('label'=>'Manage', 'url'=>array('//product/products/admin')),		
// 				),
// 			),
			array(
				'label'=>'Shops',
				'items' => array(
					array('label'=>'Create', 'url'=>array('//product/shops/create')),
					array('label'=>'Manage', 'url'=>array('//product/shops/admin')),		
				),
			),
			array(
				'label'=>'Statistics',
				'items' => array(
					array('label'=>'Statistics', 'url'=>array('//product/statistics')),
				),
			),
		);
		
		return parent::beforeAction($action);
	}
}