<?php
/**
 * @desc Friend Controller
 */
class FriendController extends MemberController {
	
	public function actionBlockFollwer($inviter_id, $friend_id) {
		if($this->usercurrent->id == $friend_id) {
			$friendShip = Following::model()->returnFollowing($inviter_id, $friend_id);
			if($friendShip->delete())
				echo json_encode('1');
			else
				echo json_encode('0');
			exit;
		}
	}
	public function actionUnFollwing($inviter_id, $friend_id) {
		if($this->usercurrent->id == $inviter_id) {
			$friendShip = Following::model()->returnFollowing($inviter_id, $friend_id);
			if($friendShip->delete())
				echo json_encode('1');
			else
				echo json_encode('0');
			exit;
		}
	}
	
    public function actionConnectSocial($type) {
        if(!empty($type)){
            switch ($type){
                case 'facebook':
                    $user = Yii::app()->facebook->getUser();
                    if (empty($user)){
                        $loginUrl = Yii::app()->facebook->getLoginUrl(array('scope' => 'email,read_stream,publish_stream'));
                        $this->redirect($loginUrl);
                    }
                    $this->render("page/connect-success");
                    break;
            }
        }
    }

    /**
     * follower
     */
    public function actionFollower($view) {
    	if(!empty($view)){
    		$data = array();
    		switch ($view) {
    			case 'page':
    				$data['follow'] = Following::model()->getFollowerWithStatus($this->user->id, 1);
    				$this->render("page/follower", $data);
    				break;
    			case 'partial':
    				$data['follow'] = Following::model()->getFollowerWithStatus($this->user->id, 1);
    				$this->renderPartial("partial/follower", $data);
    				break;
    		}
	        
    	}
    }
    /**
     * following
     */
    public function actionFollowing($view) {
    	if(!empty($view)){
    		$data = array();
    		switch ($view) {
    			case 'page':
    				$data['follow'] = Following::model()->getFollowingWithStatus($this->user->id, 1);
    				$this->render("page/following", $data);
    				break;
    			case 'partial':
    				$data['follow'] = Following::model()->getFollowingWithStatus($this->user->id, 1);
			        $this->renderPartial("partial/following", $data);
    				break;
    		}
    	}
    }
    /**
     * listfriends
     */
    public function actionListfriends($view) {
    	if(!empty($view)){
    		$data = array();
    		switch ($view) {
    			case 'page':
    				break;
    			case 'partial':
            		$user = Yii::app()->facebook->getUser();
                	if (!empty($user)){
                		$accessToken = Yii::app()->facebook->getAccessToken();
                		Yii::app()->facebook->setAccessToken($accessToken);
                		$fuser = Yii::app()->facebook->api('/me');
                		if(!empty($fuser) && !empty($fuser['email'])){
                			$sql = "SELECT GROUP_CONCAT(social_id) as sid FROM usr_user_social";
                			$userSocial = UserSocial::model()->findByAttributes(array('user_id'=>$this->user->id, 'type'=>RegisterSocial::TYPE_FACEBOOK));
                			$uid1 = 'me()';
                			if(!empty($userSocial)){
                			    $uid1 = $userSocial->social_id;
                			}
                			$result = Yii::app()->db->createCommand($sql)->queryScalar();
            	    		$friends = Yii::app()->facebook->api(array(
            	    				"method"    => "fql.query",
            	    				"query"     => "SELECT uid,name FROM user WHERE uid IN (SELECT uid2 FROM friend WHERE uid1 = $uid1 AND (uid2 IN ($result)) ) LIMIT 100"
            	    		));
            	    		
            	    		if (Yii::app()->request->isAjaxRequest && Yii::app()->request->isPostRequest){
            	    		    $this->renderPartial("partial/friends_facebook", array('friends' => $friends));
            	    		}
                		}
                	} else {			
                        $this->renderPartial("partial/must-connect");
            		}
    				break;
    		}
    	}
    }
    /**
     * friends
     */
    public function actionFriends() {
    	/*
    	$user = Yii::app()->facebook->getUser();
    	if (!empty($user)){
    		$accessToken = Yii::app()->facebook->getAccessToken();
    		Yii::app()->facebook->setAccessToken($accessToken);
    		$fuser = Yii::app()->facebook->api('/me');
    		if(!empty($fuser) && !empty($fuser['email'])){
    		    $sql = "SELECT GROUP_CONCAT(social_id) as sid FROM usr_user_social";
    			$userSocial = UserSocial::model()->findByAttributes(array('user_id'=>$this->user->id, 'type'=>RegisterSocial::TYPE_FACEBOOK));
    			$uid1 = 'me()';
    			if(!empty($userSocial)){
    			    $uid1 = $userSocial->social_id;
    			}
    			$result = Yii::app()->db->createCommand($sql)->queryScalar();
	    		$friends = Yii::app()->facebook->api(array(
	    				"method"    => "fql.query",
	    				"query"     => "SELECT uid,name FROM user WHERE uid IN (SELECT uid2 FROM friend WHERE uid1 = $uid1 AND (uid2 IN ($result)) ) LIMIT 100"
	    		));
	    		
//     			$friends = Yii::app()->facebook->api("/me/friendlists", 'GET',
//     					array(
//     							'fields' => 'id,name,gender',
//     							'offset' => 0,
//     							'limit'  => 100
//     					)
//     			);
	    		if (Yii::app()->request->isAjaxRequest && Yii::app()->request->isPostRequest){
	    		    $this->renderPartial("partial/friends_friends", array('friends' => $friends));
	    		}else{
    		    	$this->render("page/friends", array('userfacebook' => $user));
	    		}
    		}
    	} else {			
            $this->render("page/friends");
            $this->renderPartial("partial/must-connect");
		}
		*/
    	$this->render("page/friends");
    }
    /**
     * friends
     */
    public function actionFind() {
    	/*
        $user = Yii::app()->facebook->getUser();
        if (!empty($user)){
        	$notIn = $this->user->id;
        	$criteria=new CDbCriteria();
        	$criteria->addCondition("id NOT IN ($notIn)");
        	$criteria->limit = 100;
        	$users = Member::model()->findAll($criteria);
        	if (Yii::app()->request->isAjaxRequest && Yii::app()->request->isPostRequest){
        	    $this->renderPartial("partial/friends_find", array('users' => $users));
        	}else{
            	$this->render("page/find", array('users'=>$users));
        	}
        }else {
			$this->renderPartial("partial/must-connect");
		}
		*/
    	$this->renderPartial("partial/friends_find");
    }
    
    /**
     * Find Facebook friends
     */
    public function actionFindFacebookFriends() {
    	$user = Yii::app()->facebook->getUser();
    	$invite = Yii::app()->request->getParam('invite','0');
    	if ($user) {
    		$accessToken = Yii::app()->facebook->getAccessToken();
    		Yii::app()->facebook->setAccessToken($accessToken);
    		$fuser = Yii::app()->facebook->api('/me');
    		
    		$limit = Yii::app()->params['facebook']['limit'];
    		$offset = (isset($_REQUEST['offset'])) ? $_REQUEST['offset'] : 0;
    		
    		if(!empty($fuser) && !empty($fuser['email'])){
    			$current_id = $this->usercurrent->id;
    			if($invite) {
	    			$sql = "SELECT GROUP_CONCAT(usr_user_social.social_id) as sid FROM usr_user_social";
	    			$result = Yii::app()->db->createCommand($sql)->queryScalar();
	    			
	    			$friends = Yii::app()->facebook->api(array(
	    					"method"    => "fql.query",
	    					"query"     => "SELECT uid,name FROM user WHERE uid IN (SELECT uid2 FROM friend WHERE uid1 = me() AND NOT (uid2 IN ($result))) LIMIT $limit OFFSET $offset"
	    			));
    			} else {
	    			$current_id = $this->usercurrent->id;
	    			$sql = "SELECT usr_user_social.* FROM usr_user_social WHERE usr_user_social.user_id NOT IN (SELECT friend_id FROM friendship_following WHERE inviter_id = $current_id)";
	    			$result = Yii::app()->db->createCommand($sql)->queryAll();
	    			 
	    			$facebooks_are_member = array();
	    			 
	    			foreach($result as $r) {
	    				$facebooks_are_member[$r['social_id']] = $r['user_id'];
	    			}
	    			 
	    			$in_value = implode(',', array_keys($facebooks_are_member));
	    			 
	    			$friends = Yii::app()->facebook->api(array(
	    					"method"    => "fql.query",
	    					"query"     => "SELECT uid,name FROM user WHERE uid IN (SELECT uid2 FROM friend WHERE uid1 = me() AND (uid2 IN ($in_value))) LIMIT $limit OFFSET $offset"
	    			));
	    			$model = new UserSocial();
	    			foreach($friends as &$friend) {
	    				$friend['member_id'] = $facebooks_are_member[$friend['uid']];
	    			}
    			}
    		}
    		if (Yii::app()->request->isAjaxRequest && Yii::app()->request->isPostRequest){
    			$this->renderPartial("partial/friends_invite", array('friends' => $friends, 'limit'=>$limit, 'invite'=>$invite));
    		}else{
    			$this->render("page/invite", array('friends' => $friends));
    		}
    	} else {
    		echo '';
    		exit;
    	}
    }
    
    public function actionFollowFriend($uid) {
    	$return = Following::model()->requestFollowing($this->usercurrent->id, $uid);
    	return $return;
    }
    
    /**
     * friends
     */
    public function actionInvite() {
    	$user = Yii::app()->facebook->getUser();
    	if (!empty($user)){
    		$accessToken = Yii::app()->facebook->getAccessToken();
    		Yii::app()->facebook->setAccessToken($accessToken);
    		$fuser = Yii::app()->facebook->api('/me');
    		if(!empty($fuser) && !empty($fuser['email'])){
    			$sql = "SELECT GROUP_CONCAT(social_id) as sid FROM usr_user_social";
    			$result = Yii::app()->db->createCommand($sql)->queryScalar();
    			$friends = Yii::app()->facebook->api(array(
    					"method"    => "fql.query",
    					"query"     => "SELECT uid,name FROM user WHERE uid IN (SELECT uid2 FROM friend WHERE uid1 = me() AND NOT (uid2 IN ($result)) ) LIMIT 100"
    			));
    		}
    		if (Yii::app()->request->isAjaxRequest && Yii::app()->request->isPostRequest){
    		    $this->renderPartial("partial/friends_invite", array('friends' => $friends));
    		}else{
    		    $this->render("page/invite", array('friends' => $friends));
    		}
    	} else {
    		$this->renderPartial("partial/must-connect");
    	}    	
    }
    /**
     * Follow friend
     */
    public function actionFollow() {
    	$func = Yii::app()->request->getPost('func');
    	if (Yii::app()->request->isAjaxRequest && Yii::app()->request->isPostRequest){
    		$follow = Following::model()->returnFollowing($this->usercurrent->id, $this->user->id);
    		if(!empty($follow)){
    			$follow->delete();
    			$return = false;
    		}else{
    			$return = Following::model()->requestFollowing($this->usercurrent->id, $this->user->id);
    		}
	    	$this->renderPartial("partial/follow", array('follow'=>$return));
    	}
    }
    
    public function actionFacebookDisconnect(){
    	$user = Yii::app()->facebook->getUser();
    	if (!empty($user)){
    		Yii::app()->facebook->destroySession();
	    	echo 'disconnect';
    	}
    	Yii::app()->end();
    	
    }
    public function actionFacebookConnect(){
    	$this->renderPartial("partial/must-connect");	
    }
}