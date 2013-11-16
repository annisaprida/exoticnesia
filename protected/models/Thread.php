<?php

/**
 * This is the model class for table "thread".
 *
 * The followings are the available columns in table 'thread':
 * @property string $id
 * @property string $forum_id
 * @property string $subject
 * @property integer $is_sticky
 * @property integer $is_locked
 * @property string $view_count
 * @property string $created
 *
 * The followings are the available model relations:
 * @property Post $post
 * @property Forum $forum
 */
class Thread extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Thread the static model class
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
		return 'thread';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('forum_id, subject, is_sticky, is_locked, view_count, created', 'required'),
			array('is_sticky, is_locked', 'numerical', 'integerOnly'=>true),
			array('forum_id, created', 'length', 'max'=>10),
			array('subject', 'length', 'max'=>120),
			array('view_count', 'length', 'max'=>20),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, forum_id, subject, is_sticky, is_locked, view_count, created', 'safe', 'on'=>'search'),
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
			'post' => array(self::HAS_ONE, 'Post', 'id'),
			'forum' => array(self::BELONGS_TO, 'Forum', 'forum_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'forum_id' => 'Forum',
			'subject' => 'Subject',
			'is_sticky' => 'Is Sticky',
			'is_locked' => 'Is Locked',
			'view_count' => 'View Count',
			'created' => 'Created',
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

		$criteria->compare('id',$this->id,true);
		$criteria->compare('forum_id',$this->forum_id,true);
		$criteria->compare('subject',$this->subject,true);
		$criteria->compare('is_sticky',$this->is_sticky);
		$criteria->compare('is_locked',$this->is_locked);
		$criteria->compare('view_count',$this->view_count,true);
		$criteria->compare('created',$this->created,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}