<?php
class SliderWidget extends CWidget {
	
	public $order 		= 0;
	public $width 		= 679;
	public $height 		= 334;
	public $widget_id 	= 1;
	public $limit  		= 40;
	public $view	 	= 'slider';
	public $timeout 	= 7200;
	
	public function run() {
//		$items 		= Yii::app()->cache->get($this->view);
//		$items = null;
//		if (!$items){
//			//$items = WidgetItem::model()->getItemsByNameWidget(get_class($this), $this->limit);
//			$items =	Article::model()->getArticleByLocation(0, 5);
//			Yii::app()->cache->set($this->view, $items, $this->timeout);
//		}
//		$this->render('slider', array(
//			'items' => $items,
//			'width' => $this->width,
//			'height' => $this->height
//		));

		$items = Article::model()->getListArticlesBySection(8, 0, 4);
		$items['title'] = '';
		$this->render('slider', array('items' => $items));
	}
	
}
