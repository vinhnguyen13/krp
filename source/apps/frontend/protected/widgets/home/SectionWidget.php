<?php
class SectionWidget extends CWidget {
	
	public $cache_key = 'home_section_widget';
	public $timeout = 0;
	
	public function run(){
		//Yii::app()->cache->flush();
		//$data = Yii::app()->cache->get($this->cache_key);
		//if (!$data){

			//die();
			//Yii::app()->cache->set($this->cache_key, $section, $this->timeout);
		//}
		$criteria= new CDbCriteria();
		$criteria->condition = 'status=:status';
		$criteria->params = array(':status'=>1);
		//print_r($criteria); die();
		//$new_and_promo = Section::model()->findAll($criteria);
		$section = Section::model()->findAll($criteria);
		$this->render('home', array('section' => $section));
	}

}
?>