<?php

/**
 * This is the model class for table "cms_widget".
 *
 * The followings are the available columns in table 'cms_widget':
 * @property integer $id
 * @property string $class
 * @property string $path_alias
 * @property integer $enable
 */
class Widget extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Widget the static model class
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
		return 'cms_widget';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('enable', 'numerical', 'integerOnly'=>true),
			array('class, path_alias', 'length', 'max'=>100),
			array('params','safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, class, path_alias, enable, params', 'safe', 'on'=>'search'),
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
			'class' => 'Class',
			'path_alias' => 'Path Alias',
			'enable' => 'Enable',
			'params' => 'Params',
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
		$criteria->compare('class',$this->class,true);
		$criteria->compare('path_alias',$this->path_alias,true);
		$criteria->compare('enable',$this->enable);
		$criteria->compare('params',$this->params);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function getItems(){
		return WidgetItem::model()->findAllByAttributes(array('widget_id' => $this->id));
	}
}