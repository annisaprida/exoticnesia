<?php

/**
 * This is the model class for table "foto".
 *
 * The followings are the available columns in table 'foto':
 * @property string $username
 * @property string $profil_id
 * @property string $url
 *
 * The followings are the available model relations:
 * @property Profil $profil
 * @property Profil $username0
 */
class Foto extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Foto the static model class
	 */
	public $foto;
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'foto';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username, url', 'required'),
			array('url', 'unique'),
			array('username', 'length', 'max'=>15),
			array('url', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('username, profil_id, url', 'safe', 'on'=>'search'),
			array('foto','file','types'=>'jpeg,jpg,gif,png','allowEmpty'=>true),
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
			'profil' => array(self::BELONGS_TO, 'Profil', 'profil_id'),
			'username0' => array(self::BELONGS_TO, 'Profil', 'username'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'username' => 'Username',
			'profil_id' => 'Profil',
			'url' => 'Url',
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

		$criteria->compare('username',$this->username,true);
		$criteria->compare('profil_id',$this->profil_id,true);
		$criteria->compare('url',$this->url,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}