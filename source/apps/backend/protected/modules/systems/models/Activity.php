<?php
class Activity extends ActivityLog {
	const LOG_PICK_TO 					= 1;
	const LOG_LIKE_DISLIKE_BOUGHT		= 2;
	

	public static function log($action, $params = '', $owner_id, $owner_name, $object_id = 0, $time = 0, $group_id = 0) {
		if(Yii::app()->user->isGuest)
			return false;
		$log = new Activity();
		
		$log->user_id 			= intval(Yii::app()->user->id);
		$log->user_name 		= Yii::app()->user->data()->username;
		$log->action 			= $action;
		$log->message 			= self::setMessage($action, $params);
		$log->params 			= json_encode($params);
		$log->ip_address 		= Yii::app()->request->userHostAddress;
		$log->timestamp 		= $time == 0 ? time() : $time;
		$log->object_id 		= $object_id;
		$log->owner_id			= $owner_id;
		$log->owner_name		= $owner_name;
		$log->group_id			= $group_id;
		
		$log->save();
		$notifi = new XNotifications();
		$notifi->saveNotificationsFromActivity($log);
		return $log;
	}
	
	public static function setMessage($action) {
		$message = "";
		switch ($action) {
			case self::LOG_PICK_TO:
				$message = Yum::t('{user} {status} {article}');
				break;
			case self::LOG_LIKE_DISLIKE_BOUGHT:
				$message = Yum::t('{user} {status} {product}');
				break;
			default: 			
				$message = "";
		}
		return $message;
	}
	
	public static function getParams($activity) {
		$params = (array)json_decode($activity->params);
		switch ($activity->action) {
			case self::LOG_ALBUM_LIKE:
				$album = Album::model()->findByPk($params['{album_id}']);
				if ($album){
					$photo = $album->getThumb(false);
					if ($photo) $params['thumbnail'] = $photo->getThumb();
				}
				break;
		}
		return $params;
	}
	
	public static function getMessage($activity) {
		$params = json_decode($activity->params, true);
		$message = $activity->message;
		switch ($activity->action) {
			case self::LOG_PICK_TO:
				$params['{user}'] = CHtml::link($article->title, Yii::app()->createUrl('/article/view', array('section' => $article->sections['0']->slug, 'slug' => $article->slug, 'id' => $article->id)));
				$article = Article::model()->findByPk($params['{article}']);
				$params['{article}'] = CHtml::link($article->title, Yii::app()->createUrl('/article/view', array('section' => $article->sections['0']->slug, 'slug' => $article->slug, 'id' => $article->id)));
				$message = Yum::t($message, $params);
				break;
		}
		return $message;
	}
	
	public static function getHeader($activity){
		$header = "";
		$params = json_decode($activity->params, true);
		switch ($activity->action) {
			case self::LOG_PICK_TO:
				$params['{user}'] = self::getSubject($activity->member->getUserLink(), $activity->user_id, $activity->object_id);
				$article = Article::model()->findByPk($params['{article}']);
				if(!empty($article)){
    				$pickto = Pickto::model()->findByAttributes(array('user_id'=>$activity->user_id, 'article_id'=>$params['{article}']));
    				$params['{status}'] = !empty($pickto->status) ? 'picked' : 'unpicked';
				    $params['{article}'] = CHtml::link($article->title, Yii::app()->createUrl('/article/view', array('section' => $article->sections['0']->slug, 'slug' => $article->slug, 'id' => $article->id)), array('class'=>'link-like'));
    				$header = Yum::t($activity->message, $params);
				}
				break;
			case self::LOG_LIKE_DISLIKE_BOUGHT:
				$upro = UserProduct::model()->findByAttributes(array('user_id'=>$activity->user_id, 'article_id'=>$params['{product}']));
				if(!empty($upro->article)){
					$link = Yii::app()->createUrl('/article/view', array(
							'section' => !empty($upro->article->sections['0']->slug) ? $upro->article->sections['0']->slug : '', 
							'slug' => !empty($upro->article->slug) ? $upro->article->slug : '', 
							'id' => $upro->article->id)
					);
					$title = !(empty($upro->article->product->product_name)) ? $upro->article->product->product_name :  $upro->article->title;
					$params['{product}'] = CHtml::link($title, $link, array('class'=>'link-like'));
					$params['{status}'] = 'like';
					if($upro->like == 1){
						$params['{status}'] = 'like';
					}elseif($upro->hate == 1){
						$params['{status}'] = 'dislike';
					}elseif($upro->bought == 1){
						$params['{status}'] = 'bought';
					}
					$params['{user}'] = self::getSubject($activity->member->getUserLink(), $activity->user_id, $activity->object_id);
					$header = Yum::t($activity->message, $params);
				}
				break;
		}
		return $header;
	}
	
	public static function getSubject($name, $userid_1, $userid_2) {
		if ($userid_1 == Yii::app()->user->id)
			$msg = CHtml::link('you', Yii::app()->user->data()->getUserUrl(), array('class'=>'username'));
		else
			$msg = $name;
		return $msg;
	}
	
	public static function getS($name, $userid_1, $userid_2) {
		if ($userid_1 == Yii::app()->user->id)
			$msg = CHtml::link('your', Yii::app()->user->data()->getUserUrl());
		else
			$msg = $name.'\'s';
		return $msg;
	}
	
	public static function getActivityUrl($text, $alias, $htmlOptions = array()) {
		return Member::createLink($text, '//member/default/activity', array('alias' => $alias), $htmlOptions);
	}
	
}