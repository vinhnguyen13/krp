<?php

/**
 * This is the model class for table "ads_banner".
 *
 * The followings are the available columns in table 'ads_banner':
 * @property integer $id
 * @property string $name
 * @property string $link
 * @property string $upload
 * @property string $target
 * @property integer $weight
 * @property integer $start
 * @property integer $end
 * @property integer $number_click
 * @property integer $count_click
 * @property integer $number_view
 * @property integer $count_view
 * @property integer $is_active
 * @property integer $zone_id
 * @property string $type
 */
class AdsBanner extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'ads_banner';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('weight, number_click, count_click, number_view, count_view, is_active, zone_id', 'numerical', 'integerOnly'=>true),
            array('name, link, upload, weight, start, end, zone_id', 'required'),
			array('name', 'length', 'max'=>255),
			array('link', 'length', 'max'=>1024),
			array('upload', 'length', 'max'=>512),
			array('target', 'length', 'max'=>10),
			array('type', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, link, upload, target, weight, start, end, number_click, count_click, number_view, count_view, is_active, type, zone_id', 'safe', 'on'=>'search'),
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
            'zone' => array(self::BELONGS_TO, 'AdsZone', 'zone_id')
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Name',
			'link' => 'Link',
			'upload' => 'Upload',
			'target' => 'Target',
			'weight' => 'Weight',
			'start' => 'Start',
			'end' => 'End',
			'number_click' => 'Number Click',
			'count_click' => 'Count Click',
			'number_view' => 'Number View',
			'count_view' => 'Count View',
			'is_active' => 'Is Active',
			'zone_id' => 'Zone',
			'type' => 'Type',
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('link',$this->link,true);
		$criteria->compare('upload',$this->upload,true);
		$criteria->compare('target',$this->target,true);
		$criteria->compare('weight',$this->weight);
		$criteria->compare('start',$this->start);
		$criteria->compare('end',$this->end);
		$criteria->compare('number_click',$this->number_click);
		$criteria->compare('count_click',$this->count_click);
		$criteria->compare('number_view',$this->number_view);
		$criteria->compare('count_view',$this->count_view);
		$criteria->compare('is_active',$this->is_active);
		$criteria->compare('zone_id',$this->zone_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return AdsBanner the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

    public function getBanner($zone_id){
        $criteria = new CDbCriteria;
        $criteria->addCondition("zone_id = :zone_id");
        $criteria->addCondition("UNIX_TIMESTAMP(CONCAT(FROM_UNIXTIME(start, '%Y-%m-%d'), ' 00:00:00')) <= :time and :time <= UNIX_TIMESTAMP(CONCAT(FROM_UNIXTIME(end, '%Y-%m-%d'), ' 23:59:59'))");
        $criteria->addCondition('is_active = 1');
        $criteria->addCondition('number_click = 0 OR (number_click > 0 && number_click >= count_click)');
        $criteria->addCondition('number_view = 0 OR (number_view > 0 && number_view >= count_view)');
        $criteria->params = array('zone_id' => $zone_id, 'time' => time());

        $data = $this->findAll($criteria);
        if ($data){
            $weight = 0;
            foreach ($data as $item)
                $weight += $item->weight;

            $per = rand(0, 100) / 100.0;
            $t = 0;
            foreach ($data as $item){
                $t = $item->weight / $weight;
                if ($per <= $t){
                    return $item;
                }
            }
        }
        return null;
    }

    public function getPath(){
        return "/" . Yii::app()->params['ads']['upload_path'] . $this->upload;
    }

    public function getUrl(){
        $url = Yii::app()->createUrl('//ads/index', array('id' => $this->id));
        return $url;
    }

    public function updateView(){
        $this->count_view++;
        $this->save();
    }
}
