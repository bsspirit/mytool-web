<?php

/**
 * This is the model class for table "t_dict_explain".
 *
 * The followings are the available columns in table 't_dict_explain':
 * @property integer $id
 * @property string $word
 * @property string $type
 * @property string $word_cn
 * @property string $sentence
 * @property string $sentence_cn
 * @property string $create_time
 */
class DictExplain extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return DictExplain the static model class
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
		return 't_dict_explain';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('create_time', 'required'),
			array('word', 'length', 'max'=>32),
			array('type', 'length', 'max'=>8),
			array('word_cn', 'length', 'max'=>64),
			array('sentence, sentence_cn', 'length', 'max'=>256),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, word, type, word_cn, sentence, sentence_cn, create_time', 'safe', 'on'=>'search'),
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
			'word' => 'Word',
			'type' => 'Type',
			'word_cn' => 'Word Cn',
			'sentence' => 'Sentence',
			'sentence_cn' => 'Sentence Cn',
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
		$criteria->compare('word',$this->word,true);
		$criteria->compare('type',$this->type,true);
		$criteria->compare('word_cn',$this->word_cn,true);
		$criteria->compare('sentence',$this->sentence,true);
		$criteria->compare('sentence_cn',$this->sentence_cn,true);
		$criteria->compare('create_time',$this->create_time,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}