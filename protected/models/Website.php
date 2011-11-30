<?php

/**
 * This is the model class for table "t_website".
 *
 * The followings are the available columns in table 't_website':
 * @property integer $id
 * @property string $url
 * @property integer $grade
 * @property integer $cid
 * @property string $image
 * @property string $create_time
 */
class Website extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Website the static model class
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
		return 't_website';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('url, create_time', 'required'),
			array('grade, cid', 'numerical', 'integerOnly'=>true),
			array('url', 'length', 'max'=>128),
			array('image', 'length', 'max'=>256),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, url, grade, cid, image, create_time, title, icon', 'safe', 'on'=>'search'),
		);
	}

	public function relations()
	{
		return array(
			'cat' => array(self::BELONGS_TO,'Catalog','cid'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'url' => 'Url',
			'grade' => 'Grade',
			'cid' => 'Cid',
			'image' => 'Image',
			'create_time' => 'Create Time',
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
		$criteria->compare('url',$this->url,true);
		$criteria->compare('grade',$this->grade);
		$criteria->compare('cid',$this->cid);
		$criteria->compare('image',$this->image,true);
		$criteria->compare('create_time',$this->create_time,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}