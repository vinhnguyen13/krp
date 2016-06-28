<?php

/**
 * This is the model class for table "friendship_following".
 *
 * The followings are the available columns in table 'friendship_following':
 * @property integer $inviter_id
 * @property integer $friend_id
 * @property integer $status
 * @property integer $acknowledgetime
 * @property integer $requesttime
 * @property integer $updatetime
 * @property string $message
 */
class Following extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Following the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'friendship_following';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('inviter_id, friend_id, status', 'required'),
			array('inviter_id, friend_id, status, acknowledgetime, requesttime, updatetime', 'numerical', 'integerOnly'=>true),
			array('message', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('inviter_id, friend_id, status, acknowledgetime, requesttime, updatetime, message', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		return array(
			'inviter' => array(self::BELONGS_TO, 'Member', 'inviter_id'),
			'invited' => array(self::BELONGS_TO, 'Member', 'friend_id'),
		);
	}
	

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'inviter_id' => 'Inviter',
			'friend_id' => 'Friend',
			'status' => 'Status',
			'acknowledgetime' => 'Acknowledgetime',
			'requesttime' => 'Requesttime',
			'updatetime' => 'Updatetime',
			'message' => 'Message',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('inviter_id',$this->inviter_id);
		$criteria->compare('friend_id',$this->friend_id);
		$criteria->compare('status',$this->status);
		$criteria->compare('acknowledgetime',$this->acknowledgetime);
		$criteria->compare('requesttime',$this->requesttime);
		$criteria->compare('updatetime',$this->updatetime);
		$criteria->compare('message',$this->message,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function requestFollowing($inviter, $invited, $message = null) {
		$following = new Following();
		if(!is_object($inviter))
			$inviter = YumUser::model()->findByPk($inviter);

		if(!is_object($invited))
			$invited = YumUser::model()->findByPk($invited);

		if($inviter->id == $invited->id)
			return false;

		if(!empty($inviter->id) && !empty($invited->id)){
			$existFollowing = Following::returnFollowing($inviter->id, $invited->id);
			if(!empty($existFollowing)){
				$following = $existFollowing;
			}
		}
		$following->inviter_id = $inviter->id;
		$following->friend_id = $invited->id;
		$following->acknowledgetime = 0;
		$following->requesttime = time();
		$following->updatetime = time();

		if($message !== null)
			$following->message = $message;
		$following->status = 1;
		if($following->save())
			return $following;
		return false;
	} 
	
	public static function returnFollowing($uid1, $uid2) {
		if(is_numeric($uid1) && is_numeric($uid2)) {
			$following = Following::model()->find('inviter_id = '.$uid1 . ' and friend_id = '.$uid2);
			if(!empty($following->inviter_id))
				return $following;
		} 
		return false;
	}
	
	public static function coutFollowers($uid){
		if($uid){
			$criteria=new CDbCriteria;
			$criteria->select= 'count(*)';
			$criteria->addCondition("(friend_id='$uid') AND status='1'");
			$count = Following::model()->count($criteria);
			return $count;
		}
	}
	
	public static function coutFollowing($uid){
		if($uid){
			$criteria=new CDbCriteria;
			$criteria->select= 'count(*)';
			$criteria->addCondition("(inviter_id='$uid') AND status='1'");
			$count = Following::model()->count($criteria);
			return $count;
		}
	}
	
	public static function getFollowerWithStatus($uid, $status)
	{
		$condition = 'friend_id = :uid AND status=:status';
		return Following::model()->findAll($condition, array(':uid' => $uid, ':status' => $status));
	}
	
	public static function getFollowingWithStatus($uid, $status)
	{
		$condition = 'inviter_id = :uid AND status=:status';
		return Following::model()->findAll($condition, array(':uid' => $uid, ':status' => $status));
	}
}