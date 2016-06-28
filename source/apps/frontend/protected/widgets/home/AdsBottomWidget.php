<?php
/**
 * Created by Kenny.
 * Date: 12/17/13
 * Time: 10:40 PM
 * To change this template use File | Settings | File Templates.
 */

class AdsBottomWidget extends CWidget {
    public $position;
    public function run(){
        $zone = AdsZone::model()->getAll($this->position);
        $this->render('ads-bottom', array(
            'zone' => $zone
        ));
    }
}