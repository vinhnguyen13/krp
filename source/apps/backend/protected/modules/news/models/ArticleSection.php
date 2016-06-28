<?php

/**
 * This is the model class for table "cms_article_section".
 *
 * The followings are the available columns in table 'cms_article_section':
 * @property integer $article_id
 * @property integer $section_id
 */
class ArticleSection extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ArticleSection the static model class
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
		return 'cms_article_section';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('article_id, section_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('article_id, section_id', 'safe', 'on'=>'search'),
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
			'section' => array(self::BELONGS_TO, 'Section', 'section_id'),
			'article' => array(self::BELONGS_TO, 'Article', 'article_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'article_id' => 'Article',
			'section_id' => 'Section',
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

		$criteria->compare('article_id',$this->article_id);
		$criteria->compare('section_id',$this->section_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public static function getListArticle($section_id){
		$article = ArticleSection::model()->findAll('section_id = :section_id', array(':section_id' => $section_id));
		if(isset($article)){
			$return = array();
			foreach ($article as $data){
				$return[] = array( 'label'=> Article::getTitle($data->article_id)->title,'url'	=> Yii::app()->createUrl('site/article', array('id' => $data->id)));
			}
			return $return;	
		} else {
			return false;
		}
	}
	
	public function getArticles($section_id = false, $limit = 10){
	 	$criteria = new CDbCriteria;
		if(!empty($limit)){
			$criteria->limit = $limit;
		}
		$criteria->with = array(
			'article' => array(
				'alias' => 'a',
				'condition' => 'a.ispublic = \'1\'',
			)
		);
		if($section_id > 0){
			$criteria->addCondition('section_id = :section_id');
			$criteria->params = array(':section_id' => $section_id);
		} 
		$criteria->order = "a.created DESC";
		return $this->findAll($criteria);
	}
	
	public function getEvents($limit = 10){
	 	$criteria = new CDbCriteria;
		if(!empty($limit)){
			$criteria->limit = $limit;
		}
		$criteria->alias = 'a';
		$criteria->join = "INNER JOIN ".ArticleEvent::model()->tableName()." b ON a.article_id = b.article_id";
		$criteria->addCondition(time()." BETWEEN b.start AND b.end");		
		$criteria->addCondition(time()." < b.start", "OR");		
		$criteria->group = "a.article_id";		
		return $this->findAll($criteria);
	}
	
	
}