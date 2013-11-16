<?php

/**
 * This is the model class for table "container".
 *
 * The followings are the available columns in table 'container':
 * @property integer $id
 * @property string $username
 * @property string $namadaerah
 *
 * The followings are the available model relations:
 * @property Pengguna $username0
 * @property Infonesia $namadaerah0
 */
class Container extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Container the static model class
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
		return 'container';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username, namadaerah', 'required'),
			array('username', 'length', 'max'=>20),
			array('namadaerah', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, username, namadaerah', 'safe', 'on'=>'search'),
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
			'username0' => array(self::BELONGS_TO, 'Pengguna', 'username'),
			'namadaerah0' => array(self::BELONGS_TO, 'Infonesia', 'namadaerah'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'username' => 'Username',
			'namadaerah' => 'Namadaerah',
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
		$criteria->compare('username',$this->username,true);
		$criteria->compare('namadaerah',$this->namadaerah,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}