<?php
class Controller extends SBaseController
{
	public $layout = '//layouts/column2';
	public $menu = array();
	public $breadcrumbs = array();
	
	public function beforeAction($action) {
		
		$this->menu=array(
			array(
				'label'=>'Zone',
				'items' => array(
					array('label'=>'Create', 'url'=>array('//ads/adsZone/create')),
					array('label'=>'Manage', 'url'=>array('//ads/adsZone/admin')),
				),
			),
            array(
                'label'=>'Banner',
                'items' => array(
                    array('label'=>'Create', 'url'=>array('//ads/adsBanner/create')),
                    array('label'=>'Manage', 'url'=>array('//ads/adsBanner/admin')),
                ),
            ),
		);
		
		return parent::beforeAction($action);
	}
}