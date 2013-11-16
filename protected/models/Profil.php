<?php

/**
 * This is the model class for table "profil".
 *
 * The followings are the available columns in table 'profil':
 * @property string $username
 * @property string $id
 * @property string $nama
 * @property string $contact
 * @property string $sex
 * @property string $avatar
 *
 * The followings are the available model relations:
 * @property Foto[] $fotos
 * @property Foto[] $fotos1
 * @property Pengguna $username0
 */
class Profil extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Profil the static model class
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
		return 'profil';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username', 'required'),
			array('nama', 'required'),
			array('username', 'unique'),
			array('username', 'length', 'max'=>20),
			array('nama', 'length', 'max'=>40),
			array('contact', 'length', 'max'=>15),
			array('sex', 'length', 'max'=>10),
			array('avatar', 'length', 'max'=>50),
			array('avatar', 'file', 'on'=>'update',
			 		'types'=>'jpg,gif,png', 'allowEmpty'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('username, id, nama, contact, sex, avatar', 'safe', 'on'=>'search, update'),
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
			'fotos' => array(self::HAS_MANY, 'Foto', 'profil_id'),
			'fotos1' => array(self::HAS_MANY, 'Foto', 'username'),
			'username0' => array(self::BELONGS_TO, 'Pengguna', 'username'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'username' => 'Username',
			'id' => 'ID',
			'nama' => 'Nama Lengkap',
			'contact' => 'Contact',
			'sex' => 'Sex',
			'avatar' => 'Avatar',
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
		$criteria->compare('id',$this->id,true);
		$criteria->compare('nama',$this->nama,true);
		$criteria->compare('contact',$this->contact,true);
		$criteria->compare('sex',$this->sex,true);
		$criteria->compare('avatar',$this->avatar,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}