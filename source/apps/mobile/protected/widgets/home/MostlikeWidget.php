<?php
class MostlikeWidget extends CWidget {
	
	public $cache_key = 'home_mostlike_widget';
	public $timeout = 7200;
	
	public function run(){
		Yii::app()->cache->flush();
		$data = Yii::app()->cache->get($this->cache_key);
		if (!$data){
			$data	=	Article::model()->getMostLike();
			
			Yii::app()->cache->set($this->cache_key, $data, $this->timeout);
		}
			
		
		$this->render('mostlike', array('articles' => $data));
	}
	
}
?>