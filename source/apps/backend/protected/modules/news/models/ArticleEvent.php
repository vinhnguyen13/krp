<?php

/**
 * This is the model class for table "cms_article_event".
 *
 * The followings are the available columns in table 'cms_article_event':
 * @property integer $article_id
 * @property string $title_display
 * @property integer $allDay
 * @property integer $start
 * @property integer $end
 * @property string $thumbnail
 * @property integer $enable
 */
class ArticleEvent extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ArticleEvent the static model class
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
		return 'cms_article_event';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('article_id', 'required'),
			array('article_id, allDay, start, end, enable', 'numerical', 'integerOnly'=>true),
			array('title_display, thumbnail', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('article_id, title_display, allDay, start, end, thumbnail, enable', 'safe', 'on'=>'search'),
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
			'article_id' => 'Article',
			'title_display' => 'Title Display',
			'allDay' => 'All Day',
			'start' => 'Start',
			'end' => 'End',
			'thumbnail' => 'Thumbnail',
			'enable' => 'Enable',
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
		$criteria->compare('title_display',$this->title_display,true);
		$criteria->compare('allDay',$this->allDay);
		$criteria->compare('start',$this->start);
		$criteria->compare('end',$this->end);
		$criteria->compare('thumbnail',$this->thumbnail,true);
		$criteria->compare('enable',$this->enable);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function setArticleToEvent(Article $article){
		$articleID = $article->id;
		if(empty($articleID)){
			return false;
		}
		if($article->event) {
			$oldEvent = $this->find('article_id = :article_id', array(':article_id'=>$articleID));
			
			$article->event->validate();
			$image 		= CUploadedFile::getInstance($article->event,'thumbnail');
			if($image){
				$article->event->thumbnail = date('d-m-Y-CV-h-i-s-A', time()) . uniqid().$image->name;
				$path_thumbnail = Yii::app()->params->webRoot.DS.Yii::app()->params->news['event_path'];
			}			
			if(!$article->event->hasErrors()){
				$article->event->article_id = $articleID;
				if($article->event->save()){
					if(!empty($image)){
						$a = $image->saveAs($path_thumbnail . $article->event->thumbnail);
						if(file_exists($path_thumbnail . $oldEvent->thumbnail)){
							unlink($path_thumbnail . $oldEvent->thumbnail);
						}
					}
				}
				return true;
			}			
		}
	}
	
	public function getImageThumbnail($htmlOptions = array()) {
		$baseUrl = Yii::app()->request->getHostInfo().DS;
		if(!empty($this->thumbnail)){
			$this->thumbnail = $baseUrl.Yii::app()->params->news['event_path']. $this->thumbnail; 
			return CHtml::image($this->thumbnail, $this->title_display, $htmlOptions);
		}
	}
	
	public function eventValidate(Article $article){
		$articleID = $article->id;
		$request = Yii::app()->request;
		$isEvent = $request->getPost('isEvent');
		$artEvent = $request->getPost('ArticleEvent');		
		if(empty($articleID)){
			return false;
		}
		$article->event = $this->find("article_id=:article_id", array(':article_id'=>$articleID));
		if(empty($article->event)){			
			$article->event = new ArticleEvent();
		}
		if(!empty($isEvent))
		{		
			$article->event->article_id = $articleID;
			$article->event->attributes = $artEvent;
			$article->event->start = strtotime($artEvent['start']);
			$article->event->end = strtotime($artEvent['end']);
			$article->event->validate();
			
			if(!$article->event->hasErrors())
			{
				$start = strtotime($artEvent['start']);
				$end = strtotime($artEvent['end']);
				if($end <= $start){
					$article->addError('end','End date must > start date.');	
				}		
				if(empty($artEvent['title_display'])){
					$article->addError('title_display','Not empty data.');
				}	
			}
			if(!empty($article->event->errors)){
				$article->addErrors($article->event->errors);			
			}
		}else{					
			if(!empty($article->event->article_id)){
				//$article->event->delete();
			}
		}
	}
}