<?php

/**
 * This is the model class for table "penginapan".
 *
 * The followings are the available columns in table 'penginapan':
 * @property string $namadaerah
 * @property string $penginapan
 *
 * The followings are the available model relations:
 * @property Infonesia $namadaerah0
 */
class Penginapan extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Penginapan the static model class
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
		return 'penginapan';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('namadaerah, penginapan', 'required'),
			array('namadaerah', 'length', 'max'=>100),
			array('penginapan', 'length', 'max'=>200),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('namadaerah, penginapan', 'safe', 'on'=>'search'),
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
			'namadaerah0' => array(self::BELONGS_TO, 'Infonesia', 'namadaerah'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'namadaerah' => 'Namadaerah',
			'penginapan' => 'Penginapan',
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
		$criteria->compare('penginapan',$this->penginapan,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}