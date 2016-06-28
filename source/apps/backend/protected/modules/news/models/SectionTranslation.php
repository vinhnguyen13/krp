<?php

/**
 * This is the model class for table "cms_section_translation".
 *
 * The followings are the available columns in table 'cms_section_translation':
 * @property integer $id
 * @property integer $section_id
 * @property string $language_code
 * @property string $title
 * @property string $slug
 */
class SectionTranslation extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'cms_section_translation';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('section_id', 'numerical', 'integerOnly'=>true),
			array('language_code', 'length', 'max'=>10),
			array('title, slug', 'length', 'max'=>500),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, section_id, language_code, title, slug', 'safe', 'on'=>'search'),
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
			'section_id' => 'Section',
			'language_code' => 'Language Code',
			'title' => 'Title',
			'slug' => 'Slug',
		);
	}
	
	public function behaviors(){
		return array(
				'SlugBehavior' => array(
						'class' => 'backend.components.SlugBehavior',
						'slug_col' => 'slug',
						'title_col' => 'title',
						// 'max_slug_chars' => 125,
						'overwrite' => true
				),
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
		$criteria->compare('section_id',$this->section_id);
		$criteria->compare('language_code',$this->language_code,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('slug',$this->slug,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return SectionTranslation the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
}
