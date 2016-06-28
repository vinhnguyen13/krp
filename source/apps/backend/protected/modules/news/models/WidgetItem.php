<?php

class WidgetItem extends CActiveRecord
{
	const STATUS_DISABLE 	= 0;
	const STATUS_ENABLE 	= 1;
	
	public $display_order;
	public $enabled;
	
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function tableName()
	{
		return 'cms_widget_item';
	}

	public function rules()
	{
		return array(
			array('widget_id, display_order, enabled, created_date, created_by, updated_date, updated_by', 'numerical', 'integerOnly'=>true),
			array('title, image', 'length', 'max'=>255),
			array('widget_id, title, display_order, enabled', 'required'),
			array('url, description', 'safe'),
			array('id, widget_id, title, description, image, display_order, enabled, created_date, created_by, updated_date, updated_by, type', 'safe', 'on'=>'search'),
		);
	}

	public function relations()
	{
		return array(
			'widget' 				=> array(self::BELONGS_TO, 'Widget', 'widget_id'),
			'tags' 					=> array(self::MANY_MANY, 'Tag', 'cms_widget_tag(widget_id, tag_id)'),
		);
	}
	
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'widget_id' => 'Widget',
			'title' => 'Title',
			'description' => 'Description',
			'image' => 'Image',
			'display_order' => 'Order',
			'enabled' => 'Enabled',
			'created_date' => 'Created Date',
			'created_by' => 'Created By',
			'updated_date' => 'Updated Date',
			'updated_by' => 'Updated By',
		);
	}

	public function search()
	{
		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('widget_id',$this->widget_id);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('image',$this->image,true);
		$criteria->compare('display_order',$this->display_order);
		$criteria->compare('enabled',$this->enabled);
		$criteria->compare('created_date',$this->created_date);
		$criteria->compare('created_by',$this->created_by);
		$criteria->compare('updated_date',$this->updated_date);
		$criteria->compare('updated_by',$this->updated_by);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function behaviors(){
		return array(
			'mtags' => array(
				'class' => 'backend.components.ETaggableBehavior',
				'tagTable' => 'cms_tag',
				'tagBindingTable' => 'cms_widget_tag',
				'modelTableFk' => 'widget_id',
				'tagTablePk' => 'id',
				'tagBindingTableTagId' => 'tag_id',
				'createTagsAutomatically' => true,
				'scope' => array(
					//'condition' => ' t.user_id = :user_id ',
					//'params' => array( ':user_id' => Yii::app()->user->id ),
				),
				'insertValues' => array(
					'user_id' => (Yii::app() instanceof CConsoleApplication) ? '' : Yii::app()->user->id,
				),
			)
		);
	}
	
	public function getImagePath() {
		$path = Yii::getPathOfAlias('pathroot') . DIRECTORY_SEPARATOR . Yii::app()->params->news['widget_path'];
		if(!is_dir($path)){
			mkdir($path);
		}
		return $path;
			
		
	}
	
	public function getImageLink() {
		return Yii::app()->params->news['widget_path'] . $this->image;
	}
	
	public function getImage($width = 100, $height = 100, $htmlOptions = null) {
		$options = array('width' => $width, 'height' => $height);
		if($htmlOptions)
			$options = CMap::mergeArray($options, $htmlOptions);
		return CHtml::image("/" . Yii::app()->params->news['widget_path'] . $this->image, $this->title, $options);
	}
	
	public function getThumbnailPath() {
		return Yii::getPathOfAlias('pathroot') . Yii::app()->params->news['widget_thumbnail_path'];
	}	
	
	public function getListTagIds() {
		$result = array();
		if(count($this->tags) > 0) {
			foreach($this->tags as $tag) {
				$result[] = $tag->id;
			}
		}
		return implode(", ", $result);
	}
	
	//SlideWidget
	public function getItemsByWidget($widget_id, $limit){
		$criteria=new CDbCriteria;
		$criteria->compare('widget_id',$widget_id);
		$criteria->compare('enabled', self::STATUS_ENABLE);
		$criteria->limit = $limit;
		$criteria->order = 'display_order ASC';
	
		return $this->findAll($criteria);
	}
	
	public function getItemsByNameWidget($widget_name, $limit){
		$widget = Widget::model()->findByAttributes(array('class' => $widget_name));
		if ($widget){
			$criteria=new CDbCriteria;
			$criteria->compare('widget_id',$widget->id);
			$criteria->compare('enabled', self::STATUS_ENABLE);
			$criteria->limit = $limit;
			$criteria->order = 'display_order ASC';
		
			return $this->findAll($criteria);
		}
		return null;
	}
	
	//TaiTroWidget
	public function getItemByOrder($widget_id, $order) {
		$criteria=new CDbCriteria;
		$criteria->compare('widget_id',$widget_id);
		$criteria->compare('enabled', self::STATUS_ENABLE);
		$criteria->compare('display_order', $order);
		$criteria->order = 'display_order ASC';
		
		return $this->find($criteria);
	}
	
	public function getParseUrl(){
		$url = str_replace("//", "/", $this->url);
		$url = explode('/', $url);
		$parse = array();
		if (!empty($url)){
			$article_id = 0;
			$url = "/" . $url[count($url) - 1];
			preg_match('/\/[\d]+\-/', $url, $result);
			if (!empty($result)){
				preg_match('/[\d]+/', $result[0], $result);
				$article_id = $result[0];
			}
			
			if ($article_id > 0){
				$article = Article::model()->findByPk($article_id);
				if ($article){
					$parse['article'] = $article;
					$parse['category'] = "";
					$category = $article->categories();
					if ($category){
						foreach ($category as $item){
							$parse['category'] = $item;
						}
					}
				}
			}
		}
		return $parse;
	}
}