<?php
/**
 * Created by Kenny.
 * Date: 12/17/13
 * Time: 10:40 PM
 * To change this template use File | Settings | File Templates.
 */

class AdsTopWidget extends CWidget {
    public $position;
    public function run(){
        $topzone = AdsZone::model()->getAll($this->position);
        $this->render('ads-top', array(
            'topzone' => $topzone
        ));
    }
}