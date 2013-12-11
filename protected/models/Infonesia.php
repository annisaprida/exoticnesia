<?php

/**
 * This is the model class for table "infonesia".
 *
 * The followings are the available columns in table 'infonesia':
 * @property string $namadaerah
 * @property string $deskripsi
 * @property string $kendaraan
 * @property string $username
 * @property double $avg_rating
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
		// Validasi ditambahkan oleh Egidius Richang
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('namadaerah, deskripsi, username', 'required'),
			array('namadaerah', 'unique','message'=>'Nama Daerah must be unique'),
			array('namadaerah', 'match', 'pattern'=>'/^([A-Za-z\s])+$/','message'=>'Nama Daerah must be filled with alphabetic character'),
			array('namadaerah', 'length', 'max'=>100),
			//array('username', 'length', 'max'=>20),
			array('deskripsi', 'length', 'max'=> 250),
			array('deskripsi', 'match', 'pattern'=>'/^([A-Za-z0-9_\.\,\-\"\:\&\(\)\s])+$/','message'=>'Deskripsi has invalid pattern'),
			array('kendaraan', 'safe'),
			array('kendaraan', 'length', 'max'=>100),
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
			'avg_rating' => 'Nilai Rating',
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

    //add by Annisa Prida Rachmadianty
    public function getTotalRating()
	{
		$cmd = Yii::app()->db->createCommand();
		$cmd->select('SUM(nilai) AS ratingSum');
		$cmd->from('rating');
		$cmd->where('namadaerah=:X', array(':X' => $this->namadaerah));

		$res = $cmd->queryRow();
		return $res['ratingSum'];
	}

	/**
	 * Retrieves the rating of this note given by a student
	 * @param int student_id the student id
	 * @return double the rating of this note given by student $student_id
	 */
	public function getRating($username0)
	{
		$cmd = Yii::app()->db->createCommand();
		$cmd->select('nilai');
		$cmd->from('rating');
		$cmd->where('namadaerah=:X AND username=:Y', array(':X' => $this->namadaerah, ':Y' => $username0));

		$res = $cmd->queryRow();
		return $res['nilai'];
	}

	//add by Annisa Prida Rachmadianty
	public function getRatersCount()
	{
		$cmd = Yii::app()->db->createCommand();
		$cmd->select('COUNT(*) AS ratersCount');
		$cmd->from('rating');
		$cmd->where('namadaerah=:X', array(':X' => $this->namadaerah));

		$res = $cmd->queryRow();
		return $res['ratersCount'];
	}
	//add by Annisa Prida Rachmadianty
	public function rate($username0, $rating)
	{
		$cmd = Yii::app()->db->createCommand();
		$cmd->select('*');
		$cmd->from('rating');
		$cmd->where('namadaerah=:X AND username=:Y', array(':X' => $this->namadaerah, ':Y' => $username0));
		$res = $cmd->queryRow();

		if ($res)
		{
			$cmd = Yii::app()->db->createCommand();
			$cmd->update('rating', array('nilai' => $rating, 'username'=>$username0),'namadaerah=:namadaerah');
		}
		else
		{
			$cmd = Yii::app()->db->createCommand();
			$cmd->insert('rating', array('namadaerah' => $this->namadaerah, 'username' => $username0, 'nilai' => $rating));
		}
	}

	/**
	 * fungsi untuk meng-update nilai terkini dari rating infonesia
	 *
	 * added by Wira Pramudy
	 */
	public function updateRating($avg_rating)
	{
		$cmd = Yii::app()->db->createCommand();
		$cmd->update('infonesia', array('avg_rating' => $avg_rating), 'namadaerah=:namadaerah', array(':namadaerah'=> $this->namadaerah));
	}
}