<?php

/**
 * @desc My Controller
 */
class MyController extends MemberController {

    /**
     * profile user
     */
    public function actionView() {
    	$limit = 10;
    	$cs = Yii::app()->clientScript;
    	$cs->registerScriptFile(Yii::app()->theme->baseUrl . '/resources/js/my/newsfeed.js', CClientScript::POS_BEGIN);
    	$offset = Yii::app()->request->getParam("offset");
    	
    	$model = new Activity();
    	$model->user_id = $this->user->id;
    	$activities = $model->searchActivitiesByUserPagging($limit, $offset);
    	if(Yii::app()->request->isAjaxRequest){
    	    $this->renderPartial('partial/view-more', array(
    	            'activities'=>$activities,
    	            'data_offset'=>$offset + count($activities['data']),
    	    ));
    	}else{
            $this->render('page/view', array(
            		'activities'=>$activities,
                    'data_offset'=>$offset + count($activities['data']),
            ));
    	}
    }
    
    
    public function actionLike($oid, $type) {
    	$arr = Like::callLike(Util::decrypt($oid), $type, $this->usercurrent->id);
    
    	if (!empty($arr)) {
    		$activity = Activity::model()->findByPk(Util::decrypt($oid));
    		$notifiType = XNotifications::model()->getNotificationsTypes(array('variables'=>XNotifications::NOTIFI_LIKE_WALL));
    		$notification_data = array(
    			'params' => array('{userfrom}'=>$this->usercurrent->username, '{userto}'=>$activity->owner->username),		
    			'activity_id' => $activity->id,		
    			'message' => Yum::t('{userfrom} like activity of {userto}'),		
    		);
    		$data = array(
    				'userid'=>$this->usercurrent->id,
    				'ownerid'=>$activity->owner_id,
    				'owner_type'=>'user',
    				'notification_type'=>$notifiType->id,
    				'notification_data'=>addslashes(json_encode($notification_data)),
    				'timestamp'=>time(),
    				'last_read'=>0,
    		);
    		XNotifications::model()->saveNotifications($data);
    	}
    
    	echo htmlspecialchars(json_encode($arr), ENT_NOQUOTES);
    	Yii::app()->end();
    }
    
    public function actionCommentActivity() {
    	$model = new Comment();
    
    	if (isset($_POST['Comment'])) {
    		$data = $_POST['Comment'];
    
    		$item = json_decode(htmlspecialchars_decode($data['item']), true);
    
    		$item['action'] = intval(Util::decrypt($item['action']));
    		$item['object_id'] = intval(Util::decrypt($item['object_id']));
    
    		$type_id = "ACTIVITY";
    		$obj = Activity::model()->findByPk($item['object_id']);
    
    		if ($obj) {
    			$params = array('item' => null);
    
    			$model->attributes = $_POST['Comment'];
    			$model->created_date = time();
    			$model->created_by = $this->usercurrent->id;
    			$model->approved = 1;
    			$model->type_id = $type_id;
    			$model->item_id = $obj->id;
    
    			if ($model->save()) {
    				$sta = ActivityLogStats::model()->findByAttributes(array('log_id' => $obj->id));
    				if ($sta) {
    					$sta->comment_count++;
    					$sta->save();
    				} else {
    					$sta = new ActivityLogStats();
    					$sta->comment_count = 1;
    					$sta->log_id = $obj->id;
    					$sta->save();
    				}
    				$comment = Comment::model()->getComments($obj->id, $type_id);
    
    				$params['item'] = $model;
    				$params['user'] = $this->usercurrent;
    				$params['isLogged'] = $this->usercurrent;
    				
    				/**
    				 * notification
    				 */
    				$notifiType = XNotifications::model()->getNotificationsTypes(array('variables'=>XNotifications::NOTIFI_COMMENT_WALL));
    				$notification_data = array(
    						'params' => array('{userfrom}'=>$this->usercurrent->username, '{userto}'=>$obj->owner->username),
    						'activity_id' => $obj->id,
    						'message' => Yum::t('{userfrom} comment activity of {userto}'),
    				);
    				$data = array(
    						'userid'=>$this->usercurrent->id,
    						'ownerid'=>$obj->owner_id,
    						'owner_type'=>'user',
    						'notification_type'=>$notifiType->id,
    						'notification_data'=>addslashes(json_encode($notification_data)),
    						'timestamp'=>time(),
    						'last_read'=>0,
    				);
    				XNotifications::model()->saveNotifications($data);
    
    				$this->renderPartial("partial/comment-item", $params);
    			}
    		}
    		Yii::app()->end();
    	}
    	Yii::app()->end();
    }
    
    public function actionCommentsPrevious() {
        $page = Yii::app()->request->getParam('page', 1);
        $params['object_id'] = Yii::app()->request->getParam('object_id');
        $params['data'] = Comment::model()->getComments($params['object_id'], Comment::TYPE_COMMENT_ACTIVITY, $page);
        $this->renderPartial("//my/partial/previous-comment", $params);
        Yii::app()->end();
    }
    
}