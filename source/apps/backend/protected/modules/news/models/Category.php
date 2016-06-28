<?php

/**
 * This is the model class for table "cms_category".
 *
 * The followings are the available columns in table 'cms_category':
 * @property integer $id
 * @property integer $parent_id
 * @property integer $section_id
 * @property string $title
 * @property string $description
 * @property integer $status
 * @property string $events
 * @property integer $is_event
 * @property string $event_thumb
 * @property integer $displayorder
 */
class Category extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Category the static model class
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
		return 'cms_category';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('parent_id, section_id, status, displayorder', 'numerical', 'integerOnly'=>true),
			array('title, slug, description', 'length', 'max'=>500),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, parent_id, section_id, title, slug , description, status, displayorder', 'safe', 'on'=>'search'),
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
			'section' => array(self::BELONGS_TO, 'Section', 'id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'parent_id' => 'Parent',
			'section_id' => 'Section',
			'title' => 'Title',
			'slug'	=> 'Slug',
			'description' => 'Description',
			'status' => 'Status',
			'displayorder' => 'Display Order',
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
	        )
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

		$criteria->compare('id',$this->id);
		$criteria->compare('parent_id',$this->parent_id);
		$criteria->compare('section_id',$this->section_id);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('slug',$this->slug,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('displayorder',$this->displayorder);

		return new CActiveDataProvider( $this, array ('criteria' => $criteria ) );
	}
	
	public static function getAll() {
		$return =  Category::model()->findAll ();
		if(isset($return)){
			return $return;
		} else {
			return false;
		}
	}
	
	public function getTitle($id){
		$return = Category::model()->findByPk($id)->title;
		if(isset($return)){
			return $return;
		} else {
			return false;
		}
		
	}
	public function getSectionTitle($id){
		$return =  Section::model()->findByPk($id)->title;
		if(isset($return)){
			return $return;
		} else {
			return false;
		}
	}
	
	public function getCategories($section_id) {
		$criteria=new CDbCriteria;
		$criteria->addCondition('section_id =  :section_id');
		$criteria->params = array(':section_id' => $section_id);
		$result =  $this->findAll($criteria);
		//$result = $this->findAll(array('condition' => 'section_id = :section_id', 'params' => array(':section_id' => $section_id)));
		if(!$result)
			$result = array();
		return $result;
	}
	
	public function getCss(){
		if ($this->slug == 'in-game')
			return "section-2";
		elseif ($this->slug == 'cong-dong')
			return "section-1";
		return "";
	}
	
	public function getName(){
		if ($this->slug == 'in-game')
			return "GAME";
		elseif ($this->slug == 'cong-dong')
			return "CĐ";
		return "";
	}
	
	public function getEventThumb($htmlOptions = array(), $is_url = false){
		if(empty($this->event_thumb))
			$this->event_thumb = Yii::app()->createUrl(Yii::app()->theme->baseUrl .'/resources/css/images/img-news.jpg');
		else 
			$this->event_thumb = '/' . Yii::app()->params->news['thumbnail_path']. $this->event_thumb;
		if ($is_url) return $this->event_thumb;
		return CHtml::image($this->event_thumb, $this->title, $htmlOptions);
	}
	
	public function getUrl($section){
		if(isset($this->slug) && isset($this->title)){
			return Yii::app()->createUrl('//article/category', array('section' => $section, 'category' => $this->slug));
		}
	}
	
	protected function afterSave()
	{
		//save section default language
		$languageDefault = Language::model()->find("is_default = 1");
		$sectionTrans = CategoryTranslation::model()->findByAttributes(array('category_id'=>$this->id, 'language_code'=>$languageDefault->code));
		if(empty($sectionTrans)){
			$sectionTrans = new CategoryTranslation();
		}
		$sectionTrans->category_id = $this->id;
		$sectionTrans->language_code = $languageDefault->code;
		$sectionTrans->title = $this->title;
		$sectionTrans->validate();
		if(!$sectionTrans->hasErrors()){
			$sectionTrans->save();
		}
	
		if(isset($_POST['CategoryTranslation'])){
			foreach ($_POST['CategoryTranslation'] as $lang => $section){
				$sectionTrans = CategoryTranslation::model()->findByAttributes(array('category_id'=>$this->id, 'language_code'=>$lang));
				if(empty($sectionTrans)){
					$sectionTrans = new CategoryTranslation();
				}
				$sectionTrans->category_id = $this->id;
				$sectionTrans->language_code = $lang;
				$sectionTrans->title = $section['title'];
				$sectionTrans->validate();
				if(!$sectionTrans->hasErrors()){
					$sectionTrans->save();
				}
			}
		}
		parent::afterSave();
	}
	public function getTitleByLang($lang){
		$modelTransDefault = CategoryTranslation::model()->findByAttributes(array('category_id'=>$this->id, 'language_code'=>$lang));
		if(!empty($modelTransDefault)){
			return $modelTransDefault->title;
		} else {
			return false;
		}
	}
	
	/**
	 * Override for multilanguage
	 * @see CActiveRecord::findAll()
	 */
	public function findAll($condition='',$params=array()){
		$language = Yii::app()->language;
		if(!($condition instanceof CDbCriteria)){
			$condition = new CDbCriteria();
		}
		if(!empty($language) && Yii::app()->name != 'Admin'){
			$languageDefault = Language::model()->find("is_default = 1");
			if(!empty($languageDefault) ){
				if(!empty($languageDefault->code) && empty($language)){
					$language = $languageDefault->code;
				}
				
				$condition->join = "INNER JOIN `cms_category_translation` tr ON t.id = tr.category_id";
				$condition->mergeWith($condition);
				$condition->addCondition('tr.language_code = :language');
				if(!empty($condition->params)){
					$params = array_merge(array(':language'=>$language), $condition->params);
				}else{
					$params = array(':language'=>$language);
				}
				$condition->params = $params;
			}
		}
		return parent::findAll($condition, $params);
	}
	/**
	 * Override for multilanguage
	 * @see CActiveRecord::findAll()
	 */
	public function afterFind(){
		$language = Yii::app()->language;
		if(!empty($language) && Yii::app()->name != 'Admin'){
			$languageDefault = Language::model()->find("is_default = 1");
			if(empty($languageDefault->code) && empty($language)){
				$language = $languageDefault->code;
			}
			$modelTrans = CategoryTranslation::model()->findByAttributes(array('category_id'=>$this->id, 'language_code'=>$language));
			if(!empty($modelTrans)){
				$this->title =  $modelTrans->title;
				//$this->slug =  $modelTrans->slug;
			}
		}
		return parent::afterFind();
	}
}
