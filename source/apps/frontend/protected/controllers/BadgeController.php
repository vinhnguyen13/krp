<?php
/**
 * @desc Badge Controller
 */
class BadgeController extends MemberController {

    /**
     * profile user
     */
    public function actionIndex($alias = null) {
        $this->redirect('//');
    	$badgeConfigs = BadgeConfig::model()->findAll();
    	$usrStats = BadgeStats::model()->findByAttributes(array('user_id'=>$this->user->id));
        $this->render('page/index', array(
        		'badgeConfigs'=>$badgeConfigs,
        		'usrStats'=>$usrStats,
        ));
    }
}