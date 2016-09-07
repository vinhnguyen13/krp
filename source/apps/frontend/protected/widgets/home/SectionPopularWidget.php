<?php
class SectionPopularWidget extends CWidget {
	
	public $cache_key = 'home_section_popular_widget';
	public $timeout = 0;
	
	public function run(){
		Yii::app()->cache->flush();

        $section_populars = Yii::app()->cache->get($this->cache_key);
        if (!$section_populars){
            $section_populars = Article::model()->getListArticlesBySection(9, 0, 4, 5);
            Yii::app()->cache->set($this->cache_key, $section_populars, $this->timeout);
        }
        //$section_populars['title']=Lang::t('article', 'People');
        $this->render('section-popular', array('section_populars' => $section_populars));
	}

}
?>