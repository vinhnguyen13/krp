<?php

/**
 * This is the model class for table "pro_shops".
 *
 * The followings are the available columns in table 'pro_shops':
 * @property integer $id
 * @property integer $brand_id
 * @property integer $company_id
 * @property integer $location_id
 * @property string $title
 * @property string $slug
 * @property string $description
 * @property string $address
 * @property string $phone
 * @property string $email
 * @property string $website
 * @property integer $created
 */
class ProShops extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'pro_shops';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('brand_id, company_id, location_id, created', 'numerical', 'integerOnly'=>true),
			array('title, slug', 'length', 'max'=>255),
			array('description, address', 'length', 'max'=>500),
			array('phone', 'length', 'max'=>30),
			array('email', 'length', 'max'=>50),
			array('website', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, brand_id, company_id, location_id, title, slug, description, address, phone, email, website, created', 'safe', 'on'=>'search'),
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
			'brand' 				=> array(self::BELONGS_TO, 'ProBrands', 'brand_id'),
			'company' 				=> array(self::BELONGS_TO, 'ProCompanies', 'company_id'),
			'location' 				=> array(self::BELONGS_TO, 'ProLocation', 'location_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'brand_id' => 'Brand',
			'company_id' => 'Company',
			'location_id' => 'Location',
			'title' => 'Title',
			'slug' => 'Slug',
			'description' => 'Description',
			'address' => 'Address',
			'phone' => 'Phone',
			'email' => 'Email',
			'website' => 'Website',
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
		$criteria->compare('brand_id',$this->brand_id,true);
		$criteria->compare('company_id',$this->company_id,true);
		$criteria->compare('location_id',$this->location_id,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('slug',$this->slug,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('website',$this->website,true);
		$criteria->compare('created',$this->created);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ProShops the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	/*
	 * get product by shop
	 */
	public function getProductInShop() {
		$shop_id = $this->id;
		if(!empty($shop_id)){
			$cri = new CDbCriteria();
			$cri->alias = "pr";
			$cri->select = "pr.*";
			$cri->addCondition("FIND_IN_SET(pr.id, (SELECT products FROM pro_shops WHERE id = '$shop_id'))");
			$products = ProProducts::model()->findAll($cri);
			if(!empty($products)){
				return $products;
			}
		}
		return false;
	}
}
