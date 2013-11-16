<?php

/**
 * This is the model class for table "infonesia".
 *
 * The followings are the available columns in table 'infonesia':
 * @property string $namadaerah
 * @property string $deskripsi
 * @property string $kendaraan
 * @property string $username
 *
 * The followings are the available model relations:
 * @property Container[] $containers
 * @property Admin $username0
 * @property Penginapan[] $penginapans
 * @property Rating[] $ratings
 * @property Review[] $reviews
 * @property Tempatmakan[] $tempatmakans
 * @property Urlpic[] $urlpics
 */
class Infonesia extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Infonesia the static model class
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
		return 'infonesia';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('namadaerah, deskripsi, username', 'required'),
			array('namadaerah', 'unique'),
			array('namadaerah', 'length', 'max'=>100),
			array('username', 'length', 'max'=>20),
			array('kendaraan', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('namadaerah, deskripsi, kendaraan, username', 'safe', 'on'=>'search'),
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
			'containers' => array(self::HAS_MANY, 'Container', 'namadaerah'),
			'username0' => array(self::BELONGS_TO, 'Admin', 'username'),
			'penginapans' => array(self::HAS_MANY, 'Penginapan', 'namadaerah'),
			'ratings' => array(self::HAS_MANY, 'Rating', 'namadaerah'),
			'reviews' => array(self::HAS_MANY, 'Review', 'namadaerah'),
			'tempatmakans' => array(self::HAS_MANY, 'Tempatmakan', 'namadaerah'),
			'urlpics' => array(self::HAS_MANY, 'Urlpic', 'namadaerah'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'namadaerah' => 'Nama Daerah',
			'deskripsi' => 'Deskripsi',
			'kendaraan' => 'Kendaraan',
			'username' => 'Username',
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

		$criteria->compare('namadaerah',$this->namadaerah,true);
		// $criteria->compare('deskripsi',$this->deskripsi,true);
		// $criteria->compare('kendaraan',$this->kendaraan,true);
		// $criteria->compare('username',$this->username,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
    public function addReview($review)
    {
        $review->namadaerah=$this->namadaerah;
        $review->username= yii::app()->user->id;
        return $review->save();
    }


}