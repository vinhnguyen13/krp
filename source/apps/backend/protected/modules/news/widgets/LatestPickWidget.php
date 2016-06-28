<?php
/**
 * Created by Kenny.
 * Date: 10/25/13
 * Time: 1:13 AM
 * To change this template use File | Settings | File Templates.
 */

class LatestPickWidget extends CWidget {
    public function run(){
        $params['top'] = Article::model()->getTopNews(0, Yii::app()->params['news']['limit_latest']);
        return $this->render('latest_pick', $params);
    }
}