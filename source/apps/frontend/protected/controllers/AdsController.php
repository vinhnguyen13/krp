<?php

class AdsController extends Controller {
    public function actionIndex($id){
        $banner = AdsBanner::model()->findByPk($id);
        if ($banner){
            $banner->count_click++;
            $banner->save();

            $this->redirect($banner->link);
        }
    }
}