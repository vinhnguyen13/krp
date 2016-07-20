<?php
class SectionPeoplesWidget extends CWidget {
	
	public $cache_key = 'home_section_peoples_widget';
	public $timeout = 0;
	
	public function run(){
		Yii::app()->cache->flush();
		$section_peoples = Yii::app()->cache->get($this->cache_key);
		if (!$section_peoples){
			$section_peoples = Article::model()->getListArticlesBySection(10, 0, 4, 2);
			Yii::app()->cache->set($this->cache_key, $section_peoples, $this->timeout);
		}
		$section_peoples['title']=Lang::t('article', 'People');
		$this->render('section-peoples', array('section_peoples' => $section_peoples));
	}

}
?>