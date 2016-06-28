<?php
class SectionWidget extends CWidget {
	
	public $cache_key = 'home_section_widget';
	public $timeout = 7200;
	
	public function run(){
		Yii::app()->cache->flush();
		$data = Yii::app()->cache->get($this->cache_key);
		if (!$data){
			$section = Section::model()->findAll('status = 1');
			Yii::app()->cache->set($this->cache_key, $section, $this->timeout);
		}
		$this->render('home', array('section' => $section));
	}
	
}
?>