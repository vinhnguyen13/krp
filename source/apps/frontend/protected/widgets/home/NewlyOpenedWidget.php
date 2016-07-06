<?php
class NewlyOpenedWidget extends CWidget {
	
	public $cache_key = 'home_newly_opened_widget';
	public $timeout = 0;
	
	public function run(){
		//Yii::app()->cache->flush();
		//$data = Yii::app()->cache->get($this->cache_key);
		//if (!$data){
			//$section = Section::model()->findAll('status=1');
			//die();
			//Yii::app()->cache->set($this->cache_key, $section, $this->timeout);
		//}
		$newly_opened = Article::model()->getListNewlyOpenedBySection(8, 0, 4);
		$newly_opened['title'] = 'NEWLY OPENED';

		$this->render('newly-opened', array('newly_opened' => $newly_opened));
	}

}
?>