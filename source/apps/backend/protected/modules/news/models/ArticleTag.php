<?php

/**
 * This is the model class for table "cms_article_tag".
 *
 * The followings are the available columns in table 'wiki_article_tag':
 * @property string $article_id
 * @property string $tag_id
 */
class ArticleTag extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ArticleTag the static model class
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
		return 'cms_article_tag';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('article_id, tag_id', 'required'),
			array('article_id, tag_id', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('article_id, tag_id', 'safe', 'on'=>'search'),
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
			'tags' => array(self::BELONGS_TO, 'Tag', 'tag_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'article_id' => 'Article',
			'tag_id' => 'Tag',
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

		$criteria->compare('article_id',$this->article_id,true);
		$criteria->compare('tag_id',$this->tag_id,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function getArticleId($keyword){
		$criteria = new CDbCriteria;
		$criteria->with = array(
			'tags' => array(
					'joinType'=>'INNER JOIN',
					'together'=>true,
					'alias' => 'tg'
				)
		);
		$criteria->addCondition('tg.name like :keyword');
		$criteria->params = array('keyword' => "%$keyword%");
		
		$data = $this->findAll($criteria);
		
		$id = array();
		
		if ($data){
			foreach ($data as $item){
				if (!in_array($item->article_id, $data))
					$id[] = $item->article_id;
			}
		}
		return $id;
	}
	
}