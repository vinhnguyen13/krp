<?php

/**
 * This is the model class for table "pro_products".
 *
 * The followings are the available columns in table 'pro_products':
 * @property integer $id
 * @property string $title
 * @property string $slug
 * @property string $description
 * @property integer $gallery_id
 * @property integer $brand_id
 * @property integer $created
 * @property integer $created_by
 * @property integer $modified
 * @property integer $modified_by
 * @property integer $published
 * @property integer $published_time
 * @property string $price
 * @property integer $ordering
 */
class ProProducts extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'pro_products';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('gallery_id, brand_id, created, created_by, modified, modified_by, published, published_time, ordering', 'numerical', 'integerOnly'=>true),
			array('title, slug', 'length', 'max'=>255),
			array('price', 'length', 'max'=>20),
			array('description', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, title, slug, description, gallery_id, brand_id, created, created_by, modified, modified_by, published, published_time, price, ordering', 'safe', 'on'=>'search'),
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
			'gallery' 				=> array(self::BELONGS_TO, 'Gallery', 'gallery_id'),
			'brand' 				=> array(self::BELONGS_TO, 'ProBrands', 'brand_id'),
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
			'slug' => 'Slug',
			'description' => 'Description',
			'gallery_id' => 'Gallery',
			'brand_id' => 'Brand',
			'created' => 'Created',
			'created_by' => 'Created By',
			'modified' => 'Modified',
			'modified_by' => 'Modified By',
			'published' => 'Published',
			'published_time' => 'Published Time',
			'price' => 'Price',
			'ordering' => 'Ordering',
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
		$criteria->compare('slug',$this->slug,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('gallery_id',$this->gallery_id);
		$criteria->compare('brand_id',$this->brand_id);
		$criteria->compare('created',$this->created);
		$criteria->compare('created_by',$this->created_by);
		$criteria->compare('modified',$this->modified);
		$criteria->compare('modified_by',$this->modified_by);
		$criteria->compare('published',$this->published);
		$criteria->compare('published_time',$this->published_time);
		$criteria->compare('price',$this->price,true);
		$criteria->compare('ordering',$this->ordering);
		if(!empty($_POST['from']) && !empty($_POST['to'])){
			$criteria->addCondition("t.id IN (SELECT product_id FROM sys_user_product WHERE product_id = t.id AND (created BETWEEN :from AND :to))");
			$criteria->params = array(':from'=>strtotime($_POST['from']), ':to'=>strtotime($_POST['to']));
		}
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ProProducts the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	/**
	 * @see CModel::behaviors()
	 */
	public function behaviors(){
		return array(
				'SlugBehavior' => array(
						'class' => 'backend.components.SlugBehavior',
						'slug_col' => 'slug',
						'title_col' => 'title',
						//'max_slug_chars' => 125,
						'overwrite' => true
				),
		);
	}
	/**
	 * @see CActiveRecord::beforeSave()
	 */
	public function beforeSave() {
		if ($this->isNewRecord)
			$this->created = time();
		return parent::beforeSave();
	}
}
