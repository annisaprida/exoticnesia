<?php

/**
 * This is the model class for table "pengguna".
 *
 * The followings are the available columns in table 'pengguna':
 * @property string $username
 * @property string $kodeDaftar
 * @property integer $isAktif
 *
 * The followings are the available model relations:
 * @property Container[] $containers
 * @property Pengunjungterdaftar $username0
 * @property Profil[] $profils
 * @property Rating[] $ratings
 * @property Review[] $reviews
 * @property Wishlist[] $wishlists
 */
class Pengguna extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Pengguna the static model class
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
		return 'pengguna';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username, kodeDaftar, isAktif', 'required'),
			array('username','unique'),
			array('isAktif', 'numerical', 'integerOnly'=>true),
			array('username', 'length', 'max'=>20),
			array('kodeDaftar', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('username, kodeDaftar, isAktif', 'safe', 'on'=>'search'),
			// array('username' 'off' => 'update'),
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
			'containers' => array(self::HAS_MANY, 'Container', 'username'),
			'username0' => array(self::BELONGS_TO, 'Pengunjungterdaftar', 'username'),
			'profils' => array(self::HAS_ONE, 'Profil', 'username'),
			'ratings' => array(self::HAS_MANY, 'Rating', 'username'),
			'reviews' => array(self::HAS_MANY, 'Review', 'username'),
			'wishlists' => array(self::HAS_MANY, 'Wishlist', 'username'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'username' => 'Username',
			'kodeDaftar' => 'Kode Daftar',
			'isAktif' => 'Is Aktif',
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
		$criteria->compare('kodeDaftar',$this->kodeDaftar,true);
		$criteria->compare('isAktif',$this->isAktif);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
}