<?php

/**
 * This is the model class for table "usr_badge_stats".
 *
 * The followings are the available columns in table 'usr_badge_stats':
 * @property integer $id
 * @property integer $user_id
 * @property integer $total_like
 * @property integer $total_comment
 * @property integer $total_following
 * @property integer $total_friend
 */
class BadgeStats extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'usr_badge_stats';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id', 'required'),
			array('user_id, total_like, total_comment, total_following, total_friend', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, user_id, total_like, total_comment, total_following, total_friend', 'safe', 'on'=>'search'),
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
			'user' => array(self::BELONGS_TO, 'Member', 'user_id'),
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
			'total_like' => 'Total Like',
			'total_comment' => 'Total Comment',
			'total_following' => 'Total Following',
			'total_friend' => 'Total Friend',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('total_like',$this->total_like);
		$criteria->compare('total_comment',$this->total_comment);
		$criteria->compare('total_following',$this->total_following);
		$criteria->compare('total_friend',$this->total_friend);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return BadgeStats the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	public function markConfig(BadgeConfig $config){
		if(!empty($config->id)){
			if($this->total_comment >= $config->total_comment && $this->total_following >= $config->total_following && $this->total_friend >= $config->total_friend && $this->total_like >= $config->total_like){
				return true;
			}
		}
		return false;
	}
}
