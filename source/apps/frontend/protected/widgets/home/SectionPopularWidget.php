<?php
class SectionPopularWidget extends CWidget {
	
	public $cache_key = 'home_section_popular_widget';
	public $timeout = 0;
	
	public function run(){
		Yii::app()->cache->flush();
		$data = Yii::app()->cache->get($this->cache_key);
		if (!$data){
			$data	=	Article::model()->getMostLike(5);
			Yii::app()->cache->set($this->cache_key, $data, $this->timeout);
		}

		$this->render('section-popular', array('section_populars' => $data));
	}

}
?>