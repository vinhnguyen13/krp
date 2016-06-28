<?php

/**
 * This is the model class for table "pro_companies".
 *
 * The followings are the available columns in table 'pro_companies':
 * @property integer $id
 * @property integer $city_id
 * @property string $title
 * @property string $slug
 * @property string $address
 * @property string $fax
 * @property string $contact_person
 * @property string $position
 * @property string $email
 * @property string $phone_1
 * @property string $phone_2
 * @property string $mobile
 * @property integer $created
 */
class ProCompanies extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'pro_companies';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('city_id, created', 'numerical', 'integerOnly'=>true),
			array('title, slug, contact_person, email', 'length', 'max'=>255),
			array('address, position', 'length', 'max'=>500),
			array('fax, phone_1, phone_2', 'length', 'max'=>20),
			array('mobile', 'length', 'max'=>15),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, city_id, title, slug, address, fax, contact_person, position, email, phone_1, phone_2, mobile, created', 'safe', 'on'=>'search'),
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
			'city' 				=> array(self::BELONGS_TO, 'ProLocation', 'city_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'city_id' => 'City',
			'title' => 'Title',
			'slug' => 'Slug',
			'address' => 'Address',
			'fax' => 'Fax',
			'contact_person' => 'Contact Person',
			'position' => 'Position',
			'email' => 'Email',
			'phone_1' => 'Phone 1',
			'phone_2' => 'Phone 2',
			'mobile' => 'Mobile',
			'created' => 'Created',
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
		$criteria->compare('city_id',$this->city_id);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('slug',$this->slug,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('fax',$this->fax,true);
		$criteria->compare('contact_person',$this->contact_person,true);
		$criteria->compare('position',$this->position,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('phone_1',$this->phone_1,true);
		$criteria->compare('phone_2',$this->phone_2,true);
		$criteria->compare('mobile',$this->mobile,true);
		$criteria->compare('created',$this->created);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ProCompanies the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
