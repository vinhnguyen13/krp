<?php
class LocationWidget extends CWidget {
	
	public $cache_key = 'home_location_widget';
	public $timeout = 7200;
	
	public function run(){
		Yii::app()->cache->flush();
		$data = Yii::app()->cache->get($this->cache_key);
		if (!$data){
			$location = ProLocation::model()->findAll();
			
			Yii::app()->cache->set($this->cache_key, $location, $this->timeout);
		}
		if(!empty(Yii::app()->session['_location'])){
			$_tmp_location = json_decode(Yii::app()->session['_location'], false);
			$location_id	=	$_tmp_location->id;
			
		}else{
			$location_id	=	false;
			$_tmp_location	=	false;
		}
			
		$articles	=	Article::model()->getArticleByLocation();
		$this->render('location', array('location' => $location, 'articles' => $articles, 'tmp_location' => $_tmp_location));
	}
	
}
?>