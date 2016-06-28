<?php

/**
 * This is the model class for table "usr_badge_config".
 *
 * The followings are the available columns in table 'usr_badge_config':
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property integer $total_like
 * @property integer $total_comment
 * @property integer $total_following
 * @property integer $total_friend
 * @property string $image
 * @property integer $enable
 * @property string $type
 */
class BadgeConfig extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'usr_badge_config';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('total_like, total_comment, total_following, total_friend, enable', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>255),
			array('image', 'length', 'max'=>500),
			array('type', 'length', 'max'=>50),
			array('description', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, title, description, total_like, total_comment, total_following, total_friend, image, enable, type', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'title' => 'Title',
			'description' => 'Description',
			'total_like' => 'Total Like',
			'total_comment' => 'Total Comment',
			'total_following' => 'Total Following',
			'total_friend' => 'Total Friend',
			'image' => 'Image',
			'enable' => 'Enable',
			'type' => 'Type',
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
		$criteria->compare('title',$this->title,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('total_like',$this->total_like);
		$criteria->compare('total_comment',$this->total_comment);
		$criteria->compare('total_following',$this->total_following);
		$criteria->compare('total_friend',$this->total_friend);
		$criteria->compare('image',$this->image,true);
		$criteria->compare('enable',$this->enable);
		$criteria->compare('type',$this->type,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return BadgeConfig the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
