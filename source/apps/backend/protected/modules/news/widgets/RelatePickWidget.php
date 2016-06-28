<?php
/**
 * Created by Kenny.
 * Date: 10/25/13
 * Time: 1:13 AM
 * To change this template use File | Settings | File Templates.
 */

class RelatePickWidget extends CWidget {
    public $article_id;
    public function run(){
        $params['related'] = null;
        $article = Article::model()->findByPk($this->article_id);
        if ($article){
            $params['related'] = $article->getRelatedArticles(Yii::app()->params['news']['limit_related']);
        }
        return $this->render('relate_pick', $params);
    }
}