<?php
/**
 * @author VSoft
 */
class Friendship extends Following {
	public static function model($className=__CLASS__){
		return parent::model($className);
	}
		
	public function getAllFriendID($user_id){
	    $sql = "SELECT GROUP_CONCAT(tbl.user_id) FROM (
	    SELECT friend_id AS user_id  FROM friendship_following WHERE (inviter_id = :user_id ) AND STATUS = 1 GROUP BY user_id
	    ) tbl";
	    $command = Yii::app()->db->createCommand($sql);
	    $command->bindParam(":user_id", $user_id, PDO::PARAM_STR);
        $result = $command->queryScalar();
        $return = $user_id;
	    if(!empty($result)){    	    
    	    $return = $result;
	    }
	    return $return;
	}
} 