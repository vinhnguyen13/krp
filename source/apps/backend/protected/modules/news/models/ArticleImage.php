<?php

/**
 * This is the model class for table "cms_article_image".
 *
 * The followings are the available columns in table 'cms_article_image':
 * @property integer $id
 * @property integer $article_id
 * @property string $image
 * @property string $path
 * @property integer $sort
 */
class ArticleImage extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'cms_article_image';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('article_id, sort', 'numerical', 'integerOnly'=>true),
			array('image, path', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, article_id, image, path, sort', 'safe', 'on'=>'search'),
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
			'article_id' => 'Article',
			'image' => 'Image',
			'path' => 'Path',
			'sort' => 'Sort',
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
		$criteria->compare('article_id',$this->article_id);
		$criteria->compare('image',$this->image,true);
		$criteria->compare('path',$this->path,true);
		$criteria->compare('sort',$this->sort);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ArticleImage the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	public function getImageThumb($htmlOptions = array(), $is_url = false){
		
		if(empty($this->image))
			$image = Yii::app()->createUrl(Yii::app()->theme->baseUrl .'/resources/css/images/img-news.jpg');
		else
			if(Yii::app()->baseUrl == '/admin'){
				$image = Yii::app()->createUrl('../'.DS.$this->path.DS.'thumb300x0'.DS.$this->image);
			}else{
				$image = Yii::app()->createAbsoluteUrl(DS.$this->path.DS.'thumb300x0'.DS.$this->image);
			}
		if ($is_url) return $image;
		return CHtml::image($image, $this->id, $htmlOptions);
	}
	
	public function getOriginImage($htmlOptions = array(), $is_url = false){
		if(empty($this->image)){
			$image = Yii::app()->createUrl(Yii::app()->theme->baseUrl .'/resources/css/images/img-news.jpg');
		}else{
			if(Yii::app()->baseUrl == '/admin'){
				$image = Yii::app()->createUrl('../'.DS.$this->path.DS.'origin'.DS.$this->image);
			}else{
				$image = Yii::app()->createAbsoluteUrl(DS.$this->path.DS.'origin'.DS.$this->image);
			}
		}
		if ($is_url){
			return $image;
		}
		return CHtml::image($image, $this->id, $htmlOptions);
	}
	
	
	
	
	
	public function getDetailImage($htmlOptions = array(), $is_url = false){
		if(empty($this->image))
			$image = Yii::app()->createUrl(Yii::app()->theme->baseUrl .'/resources/css/images/img-news.jpg');
		else
			if(Yii::app()->baseUrl == '/admin'){
				$image = Yii::app()->createUrl('../'.DS.$this->path.DS.'detail960x0'.DS.$this->image);
			}else{
				$image = Yii::app()->createAbsoluteUrl(DS.$this->path.DS.'detail960x0'.DS.$this->image);
			}
		if ($is_url) return $image;
		return CHtml::image($image, $this->id, $htmlOptions);
	}
}
