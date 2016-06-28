<?php
/**
 * @desc Notification Controller
 */
class NotificationController extends MemberController {

	
	
    /**
     * profile user
     */
    public function actionIndex($alias = null) {
    	
    	if(!$this->user->isMe()){
    		throw new CHttpException ( 404, 'The requested page does not exist.' );
    	}
    	$user = Yii::app()->user->data();
    	$uid = $user->id;
    	$criteria=new CDbCriteria();
    	$criteria->select = '*, DATE_FORMAT(FROM_UNIXTIME(`timestamp`), "%Y/%m/%d") AS ts';
    	$criteria->addCondition("(ownerid='$uid')");
    	$criteria->order = "timestamp DESC";
    	$notifications = XNotifications::model()->findAll($criteria);
        $this->render('page/index', array(
        		'notifications'=>$notifications
        ));
       
    	
    }
    
    
    public function actionShow($alias = null) {
    	$user = Yii::app()->user->data();
    	$uid = $user->id;
    	$criteria=new CDbCriteria();
    	$criteria->addCondition("(ownerid='$uid')");
    	$criteria->order = "timestamp DESC";
    	$notifications = XNotifications::model()->findAll($criteria);
        $this->render('page/view', array(
        		'notifications'=>$notifications
        ));
    }
}