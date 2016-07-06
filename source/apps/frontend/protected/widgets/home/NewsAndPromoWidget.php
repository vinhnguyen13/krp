<?php
class NewsAndPromoWidget extends CWidget {
	
	public $cache_key = 'home_news_and_promo_widget';
	public $timeout = 0;
	
	public function run(){
		//Yii::app()->cache->flush();
		//$data = Yii::app()->cache->get($this->cache_key);
		//if (!$data){
			//$section = Section::model()->findAll('status=1');
			//die();
			//Yii::app()->cache->set($this->cache_key, $section, $this->timeout);
		//}
		$new_and_promos = Article::model()->getListArticlesBySection(7, 0, 4);
		$new_and_promos['title'] = 'NEWS & PROMO';
		$this->render('news-and-promo', array('new_and_promos' => $new_and_promos));
	}

}
?>