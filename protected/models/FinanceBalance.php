<?php

/**
 * This is the model class for table "t_finance_balance".
 *
 * The followings are the available columns in table 't_finance_balance':
 * @property integer $id
 * @property integer $date
 * @property integer $money
 * @property string $pay_type
 * @property string $pay_mode
 * @property string $description
 * @property string $create_time
 */
class FinanceBalance extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return FinanceBalance the static model class
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
		return 't_finance_balance';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('date, create_time', 'required'),
			array('date', 'numerical', 'integerOnly'=>true),
			array('money', 'numerical'),
			array('pay_type', 'length', 'max'=>6),
			array('pay_mode', 'length', 'max'=>4),
			array('description', 'length', 'max'=>512),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, date, money, pay_type, pay_mode, description, create_time', 'safe', 'on'=>'search'),
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
			'date' => '支付日期',
			'money' => '金额RMB(元)',
			'pay_type' => '收支类型',
			'pay_mode' => '支付方式',
			'description' => '备注',
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
		$criteria->compare('date',$this->date);
		$criteria->compare('money',$this->money);
		$criteria->compare('pay_type',$this->pay_type,true);
		$criteria->compare('pay_mode',$this->pay_mode,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('create_time',$this->create_time,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}