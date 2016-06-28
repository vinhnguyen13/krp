<?php

/**
 * This is the model class for table "activities".
 *
 * The followings are the available columns in table 'activities':
 * @property integer $id
 * @property string $user_id
 * @property string $user_name
 * @property integer $action
 * @property string $message
 * @property string $params
 * @property string $ip_address
 * @property integer $timestamp
 * @property integer $object_id
 * @property integer @owner_id
 * @property string @owner_name
 * @property integer @group_id
 */
class ActivityLog extends ActivityActiveRecord
{
	
	public $date;
	public $quantity; 
	public $ids;
	
	public function getDbConnection()
    {
        return self::getDbLogConnection();
    }
	/**
	 * Returns the static model of the specified AR class.
	 * @return ActivityLog the static model class
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
		return 'activities';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('action, timestamp, object_id, owner_id', 'numerical', 'integerOnly'=>true),
			array('user_id', 'length', 'max'=>10),
			array('user_name', 'length', 'max'=>255),
			array('ip_address', 'length', 'max'=>32),
			array('message, params, object_id, owner_name', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, user_id, user_name, action, message, params, ip_address, timestamp', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'member' => array(self::BELONGS_TO, 'Member', 'user_id'),
			'owner' => array(self::BELONGS_TO, 'Member', 'owner_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'user_id' => 'User',
			'user_name' => 'User Name',
			'action' => 'Action',
			'message' => 'Message',
			'params' => 'Params',
			'ip_address' => 'Ip Address',
			'timestamp' => 'Timestamp',
		);
	}
	
	public function afterDelete(){
		ActivityLogStats::model()->deleteAllByAttributes(array('log_id' => $this->id));
		Comment::model()->deleteAllByAttributes(array('item_id' => $this->id));
		Like::model()->deleteAllByAttributes(array('item_id' => $this->id));
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

		$criteria->compare('id',$this->id);
		$criteria->compare('user_id',$this->user_id,true);
		$criteria->compare('user_name',$this->user_name,true);
		$criteria->compare('action',$this->action);
		$criteria->compare('message',$this->message,true);
		$criteria->compare('params',$this->params,true);
		$criteria->compare('ip_address',$this->ip_address,true);
		$criteria->compare('timestamp',$this->timestamp);
		
		$criteria->order = 'timestamp DESC';

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function getActivitiesCriteria($user_id, $limit = 10) {
		/*
		 * get user following
		 */
		if(Yii::app()->user->id == $user_id){
	        $inList = Friendship::model()->getAllFriendID($user_id);
	    }else{
	        $inList = $user_id;
	    }
		
		$criteria=new CDbCriteria;
		$criteria->select = 't.*, FROM_UNIXTIME(t.timestamp, \'%d-%m-%Y\') as date, (Select count(*) From activities Where group_id = t.id) as quantity';
		$criteria->alias = 't';
		$criteria->addCondition("(user_id != 0 AND owner_id != 0) AND (t.user_id IN ($inList) OR t.owner_id IN ($inList) ) AND t.group_id = 0");
		$criteria->limit = $limit;
		$criteria->order = 'timestamp DESC';
		//$criteria->group = 't.action, t.object_id, date';
		return $criteria;
	}
	
	public function getActivitiesByUser($user_id, $limit = 10) {
		$criteria = $this->getActivitiesCriteria($user_id, $limit);
		return $this->findAll($criteria);
	}
	
	public function searchActivitiesByUser($limit = 10) {
		$criteria = $this->getActivitiesCriteria($this->user_id, $limit);
		return $this->findAll($criteria);
	}
	
	public function searchActivitiesByUserPagging($limit = 10, $offset = 0) {
		$criteria = $this->getActivitiesCriteria($this->user_id, $limit);
		$total_newsfeed    = $this->count($criteria);
		$data = array('data' => null, 'end' => true);
		
		$criteria->offset = $offset;
        $criteria->limit    =   $limit;
                
		$data['data'] = $this->findAll($criteria);
        $data['total']  =   isset($total_newsfeed)    ?   $total_newsfeed   :   0;
		
		return $data;
	}
	
	public function getLikeState($user_id){
		$params = json_decode($this->params, true);
		$ob = Like::model()->findByAttributes(array('item_id' => $this->id, 'like_by' => $user_id, 'type_id' => "activity"));
			
		if ($ob)
			return "Unlike";
		return "Like";
	}
	
	public function getLikeCount(){
		$params = json_decode($this->params, true);
		$tmp = ActivityLogStats::model()->findByAttributes(array('log_id' => $this->id));
			
		if ($tmp){
			return $tmp->like_count;
		}
		return 0;
	}
	
	public function getCommentCount(){
		$tmp = ActivityLogStats::model()->findByAttributes(array('log_id' => $this->id));
		if ($tmp){
			return $tmp->comment_count;
		}
		return 0;
	}
	
	public function getPhotos($limit = 5){
		$criteria = new CDbCriteria;
		$criteria->addCondition('group_id = :group_id');
		$criteria->params = array(':group_id' => $this->id);
		$criteria->limit = $limit;
		$criteria->order = "timestamp";
		return $this->findAll($criteria);
	}
}