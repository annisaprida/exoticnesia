<?php

/**
 * This is the model class for table "forum".
 *
 * The followings are the available columns in table 'forum':
 * @property string $id
 * @property string $parent_id
 * @property string $title
 * @property string $description
 * @property integer $listorder
 * @property integer $is_locked
 *
 * The followings are the available model relations:
 * @property Forum $parent
 * @property Forum[] $forums
 * @property Thread[] $threads
 */
class Forum extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Forum the static model class
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
		return 'forum';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, description, listorder, is_locked', 'required'),
			array('listorder, is_locked', 'numerical', 'integerOnly'=>true),
			array('parent_id', 'length', 'max'=>10),
			array('title', 'length', 'max'=>120),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, parent_id, title, description, listorder, is_locked', 'safe', 'on'=>'search'),
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
			'parent' => array(self::BELONGS_TO, 'Forum', 'parent_id'),
			'forums' => array(self::HAS_MANY, 'Forum', 'parent_id'),
			'threads' => array(self::HAS_MANY, 'Thread', 'forum_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'parent_id' => 'Parent',
			'title' => 'Title',
			'description' => 'Description',
			'listorder' => 'Listorder',
			'is_locked' => 'Is Locked',
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
		$criteria->compare('parent_id',$this->parent_id,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('listorder',$this->listorder);
		$criteria->compare('is_locked',$this->is_locked);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}