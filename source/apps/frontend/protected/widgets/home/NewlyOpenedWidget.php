<?php
class NewlyOpenedWidget extends CWidget {
	
	public $cache_key = 'home_newly_opened_widget';
	public $timeout = 0;
	
	public function run(){
		//Yii::app()->cache->flush();
		//$data = Yii::app()->cache->get($this->cache_key);
		//if (!$data){
			$section = Section::model()->findAll('status=1');
			//die();
			//Yii::app()->cache->set($this->cache_key, $section, $this->timeout);
		//}
		$new_and_promo = Section::model()->findAll('status=1');
		$this->render('newly-opened', array('section' => $section));
	}

}
?>