<?php
class XNotifications extends Notifications
{
	const NOTIFI_COMMENT_WALL 			= "NOTIFI_COMMENT_WALL";
	const NOTIFI_LIKE_WALL 				= "NOTIFI_LIKE_WALL";
	public $ts;
	
	
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	public function getNotificationsTypes($attributes){
		$notifiType = NotificationsTypes::model()->cache(500)->findByAttributes($attributes);
		if(!empty($notifiType))
			return $notifiType;
		return false;
	}
	
	public function saveNotificationsFromActivity($activity){
		$uid = Yii::app()->user->id;
		$member = new Member();
		if(!empty($activity)){
			$flgSaveNotify = true;
			switch ($activity->action) {
				case Activity::LOG_PICK_TO:
// 					$notifiType = $this->getNotificationsTypes(array('variables'=>self::SYS_POST_WALL));					
					break;
			}
			if(!empty($notifiType) && $flgSaveNotify==true && $activity->user_id!=$activity->owner_id){
				$params = (array)json_decode($activity->params);
				$message = $activity->message;
				$owner_id = 0;
				if(!empty($activity->owner_id)){
					$owner_id = $activity->owner_id;
				}					
				$notification_data = array(
					'params'=>$params,
					'message'=>$message,
					'activity_id'=>$activity->id
				); 
				$data = array(
					'userid'=>$activity->user_id,
					'ownerid'=>$owner_id,
					'owner_type'=>'user',
					'notification_type'=>$notifiType->id,
					'notification_data'=>addslashes(json_encode($notification_data)),
					'timestamp'=>time(),
					'last_read'=>0,
				);				
				$this->saveNotifications($data);
			}
		}
	}
	
	public function saveNotifications($data){
		if(!empty($data) && is_array($data)){
			$notifi = new XNotifications();
			$notifi->attributes = $data;
			$notifi->validate();
			if(!$notifi->getErrors()){				
				$notifi->save();
			}
		}
	}
	
	public function getNotificationData($notification, $subject='text') {
		$uid = Yii::app()->user->id;
		$output = new stdClass();
		$member = new Member();
		$criteria=new CDbCriteria;
		$notification_data = (array)json_decode(stripslashes($notification->notification_data));
		if(!empty($notification_data)){
			$params = (array)$notification_data['params'];
			$message = $notification_data['message'];
			$link = 'javascript:void(0);';
			$notifiType = $this->getNotificationsTypes(array('id'=>$notification->notification_type));
			switch ($notifiType->variables) {
				case self::NOTIFI_LIKE_WALL:	
					$cUser = $member->findByPk($notification->userid);
					$params['{userfrom}'] 			= $this->getNotificationSubject($cUser->getDisplayName(), $cUser->id, $cUser->alias_name, $subject);
					$userto = $member->findByPk($notification->ownerid);
					if(!empty($userto)){
						$params['{userto}'] 			= $this->getNotificationSubject($userto->getDisplayName(), $userto->id, $userto->alias_name, $subject);
					}
						
					if($cUser->id == $uid){
						$link = Member::model()->createUrl('//member/default/view', array('alias' => $userto->alias_name));
					}else{
						$link = Member::model()->createUrl('//member/default/view', array('alias' => $userto->alias_name));
					}
					break;
				default:
					break;
			}
			$message = Yum::t($message, $params);			
			$output->message = $message;
			$output->link = $link;
			return $output;
		}
		return false;
	}
	
	public function getNotificationSubject($name, $userid, $alias, $type) {
		if ($userid == Yii::app()->user->id)
			$msg = 'you';
		else{
			$msg = '<b>'.$name.'</b>';
			if($type == 'link'){
				$msg = Member::getMemberUrl($name, $alias, array('style'=>'font-weight: bold;'));
			}
		}
		return $msg;
	}
	
	public function getNotificationSubjectOwner($name, $userid, $ownerid) {
		if ($userid == Yii::app()->user->id)
			$msg = 'your';
		else
			$msg = $name.'\'s';
		return $msg;
	}
	
}