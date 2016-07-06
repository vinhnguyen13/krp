<?php
class SectionRestaurantsWidget extends CWidget {
	
	public $cache_key = 'home_section_restaurants_widget';
	public $timeout = 0;
	
	public function run(){
		Yii::app()->cache->flush();
		$section_restaurants = Yii::app()->cache->get($this->cache_key);
		if (!$section_restaurants){
			$section_restaurants = Article::model()->getListArticlesBySection(8, 0, 4);
			Yii::app()->cache->set($this->cache_key, $section_restaurants, $this->timeout);
		}

		$section_restaurants['title'] = 'RESTAURANTS';
		$this->render('section-restaurants', array('section_restaurants' => $section_restaurants));
	}

}
?>