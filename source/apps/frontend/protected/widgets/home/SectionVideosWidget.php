<?php
class SectionVideosWidget extends CWidget {
	
	public $cache_key = 'home_section_videos_widget';
	public $timeout = 0;
	
	public function run(){
		//Yii::app()->cache->flush();
		//$data = Yii::app()->cache->get($this->cache_key);
		//if (!$data){
			//$section = Section::model()->findAll('status=1');
			//die();
			//Yii::app()->cache->set($this->cache_key, $section, $this->timeout);
		//}
		$section_videos = Article::model()->getListArticlesBySection(11, 0, 4, 4);
		$section_videos['title'] = '';
		$this->render('section-videos', array('section_videos' => $section_videos));
	}

}
?>