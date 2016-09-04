<?php

/**
 * This is the model class for table "cms_section".
 *
 * The followings are the available columns in table 'cms_section':
 * @property integer $id
 * @property string $title
 * @property string $image
 * @property string $description
 * @property integer $parent_id
 * @property integer $status
 * @property integer $displayorder
 */
class Section extends CActiveRecord
{
	
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Section the static model class
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
		return 'cms_section';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('parent_id, status, displayorder', 'numerical', 'integerOnly'=>true),
			array('title, slug, description', 'length', 'max'=>500),
			//array('image', 'file', 'types'=>'jpg, gif, png'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, title, slug, image, description, parent_id, status, displayorder', 'safe', 'on'=>'search'),
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
			'getparent' => array(self::BELONGS_TO, 'Section', 'parent_id'),
      		'childs' => array(self::HAS_MANY, 'Section', 'parent_id', 'order' => 'id ASC'),
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
			'slug'	=> 'Slug',
			'image'	=> 'Image',
			'description' => 'Description',
			'parent_id' => 'Parent',
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
	        ),
	        'image' => array(
	            'class' => 'backend.extensions.AttachmentBehavior.AttachmentBehavior',
	            # Should be a DB field to store path/filename
	            'attribute' => 'image',
	            # Default image to return if no image path is found in the DB
	            //'fallback_image' => 'images/sample_image.gif',
	            'path' => "../uploads/:model/:id.:ext",
	            'processors' => array(
	                array(
	                    # Currently GD Image Processor and Imagick Supported
	                    'class' => 'GDProcessor',
	                    'method' => 'resize',
	                    'params' => array(
	                        'width' => 430,
	                        'height' => 244,
	                        'keepratio' => true
	                    )
	                )
	            ),
	            'styles' => array(
	                # name => size 
	                # use ! if you would like 'keepratio' => false
	                'thumb' => '!100x60',
	            )           
       		 ),
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
		$criteria->compare('title',$this->title,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('parent_id',$this->parent_id);
		$criteria->compare('status',$this->status);
		$criteria->compare('displayorder',$this->displayorder);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public static function getAll(){
		$return =  Section::model()->findAll();
		if(isset($return)){
			return $return;
		} else {
			return false;
		}
	}
	
	public function getTitle($id){
		$return =  Section::model()->findByPk($id)->title;
		if(isset($return)){
			return $return;
		} else {
			return false;
		}		
	}
	
	
	public function getImageThumb($htmlOptions = array(), $is_url = false){
		if(empty($this->image))
			$this->image = Yii::app()->createUrl(Yii::app()->theme->baseUrl .'/resources/css/images/img-news.jpg');
		else
			$this->image = $this->image;
		if ($is_url) return $this->image;
		return CHtml::image($this->image, $this->title, $htmlOptions);
	}
	
	public function getUrl(){
		if($this->slug){
			return Yii::app()->createUrl('//article/section', array('section' => $this->slug));
		}
	}
	
	protected function afterSave()
	{
		//save section default language
		$languageDefault = Language::model()->find("is_default = 1");
		$sectionTrans = SectionTranslation::model()->findByAttributes(array('section_id'=>$this->id, 'language_code'=>$languageDefault->code));
		if(empty($sectionTrans)){
			$sectionTrans = new SectionTranslation();
		}
		$sectionTrans->section_id = $this->id;
		$sectionTrans->language_code = $languageDefault->code;
		$sectionTrans->title = $this->title;
		$sectionTrans->validate();
		if(!$sectionTrans->hasErrors()){
			$sectionTrans->save();
		}
		
		if(isset($_POST['SectionTranslation'])){
			foreach ($_POST['SectionTranslation'] as $lang => $section){
				$sectionTrans = SectionTranslation::model()->findByAttributes(array('section_id'=>$this->id, 'language_code'=>$lang));
				if(empty($sectionTrans)){
					$sectionTrans = new SectionTranslation();
				}
				$sectionTrans->section_id = $this->id;
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
		$modelTransDefault = SectionTranslation::model()->findByAttributes(array('section_id'=>$this->id, 'language_code'=>$lang));
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
		//print_r($condition);
		$language = Yii::app()->language;
		if(!($condition instanceof CDbCriteria)){
			//$condition_clone=$condition;
			$condition = new CDbCriteria();
			//$condition->addCondition($condition_clone);

		}

		if(!empty($language) && Yii::app()->name != 'Admin'){
			$languageDefault = Language::model()->find("is_default = 1");
			if(!empty($languageDefault) ){
				if(!empty($languageDefault->code) && empty($language)){
					$language = $languageDefault->code;
				}
				$condition->join = "INNER JOIN `cms_section_translation` tr ON t.id = tr.section_id";
				$condition->mergeWith($condition);
				$condition->addCondition('tr.language_code = :language');
				if(!empty($condition->params)){
					$params = array_merge(array(':language'=>$language), $condition->params);
				}else{
					$params = array(':language'=>$language);
				}
				$condition->params = $params;
                $condition->order='displayorder ASC';
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
			$modelTrans = SectionTranslation::model()->findByAttributes(array('section_id'=>$this->id, 'language_code'=>$language));
			if(!empty($modelTrans)){
				$this->title =  $modelTrans->title;
				//$this->slug =  $modelTrans->slug;
			}
		}
		return parent::afterFind();
	}
}