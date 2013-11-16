<?php

/**
 * This is the model class for table "pengunjungterdaftar".
 *
 * The followings are the available columns in table 'pengunjungterdaftar':
 * @property string $username
 * @property string $password
 * @property string $email
 *
 * The followings are the available model relations:
 * @property Admin $admin
 * @property Pengguna $pengguna
 * @property Thread[] $threads
 */
class Pengunjungterdaftar extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Pengunjungterdaftar the static model class
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
		return 'pengunjungterdaftar';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username, password, email', 'required'),
			// array('repeat_password','required','on'=>'create'),
			array('username', 'match', 'pattern'=>'/^([a-z0-9_])+$/'),
			array('password', 'match', 'pattern'=>'/^([A-Za-z0-9])+$/'),
			// array('password', 'compare','compareAttribute'=>'repeat_password'),
			array('username, email', 'unique'),
			array('username', 'length', 'min'=>5, 'max'=>20),
			array('password', 'length', 'min'=>6, 'max'=>20),
			array('email', 'length', 'max'=>40),
			array('email', 'email', 'message'=>'The email incorrect'),
			array('firstseen, lastseen', 'length', 'max'=>10),
			array('signature', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('username, password, email', 'safe', 'on'=>'search'),
			// array('username, password, email', 'off'=>'update'),
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
			'admin' => array(self::HAS_ONE, 'Admin', 'username'),
			'pengguna' => array(self::HAS_ONE, 'Pengguna', 'username'),
			'threads' => array(self::HAS_MANY, 'Thread', 'username'),
			'posts'=>array(self::HAS_MANY, 'Post', 'username'),
            'postCount'=>array(self::STAT, 'Post', 'username'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'username' => 'Username',
			'password' => 'Password',
			'email' => 'Email',
			'signature' => 'Signature',
			'firstseen' => 'Firstseen',
			'lastseen' => 'Lastseen',
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
		$criteria->compare('password',$this->password,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('signature',$this->signature,true);
		$criteria->compare('firstseen',$this->firstseen,true);
		$criteria->compare('lastseen',$this->lastseen,true);
		
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
     * Return the url to this user
     */
	public function getUrl()
    {
        if($this->username !== 'admin'){
	        return Yii::app()->createUrl('/pengguna/view', array('id'=>$this->username));	
        }
        else{
        	return unlink;
        }
    }
}