<?php

/**
 * This is the model class for table "post".
 *
 * The followings are the available columns in table 'post':
 * @property string $id
 * @property string $authorUsername
 * @property integer $thread_id
 * @property string $editorUsername
 * @property string $content
 * @property integer $created
 * @property integer $updated
 *
 * The followings are the available model relations:
 * @property Thread $id0
 * @property Pengguna $authorUsername0
 * @property Pengguna $editorUsername0
 */
class Post extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Post the static model class
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
		return 'post';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('authorUsername, thread_id, editorUsername, content, created, updated', 'required'),
			array('thread_id, created, updated', 'numerical', 'integerOnly'=>true),
			array('authorUsername, editorUsername', 'length', 'max'=>20),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, authorUsername, thread_id, editorUsername, content, created, updated', 'safe', 'on'=>'search'),
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
			'id0' => array(self::BELONGS_TO, 'Thread', 'id'),
			'authorUsername0' => array(self::BELONGS_TO, 'Pengunjungterdaftar', 'authorUsername'),
			'editorUsername0' => array(self::BELONGS_TO, 'Pengunjungterdaftar', 'editorUsername'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'authorUsername' => 'Author',
			'thread_id' => 'Thread',
			'editorUsername' => 'Editor',
			'content' => 'Content',
			'created' => 'Created',
			'updated' => 'Updated',
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
		$criteria->compare('authorUsername',$this->authorUsername,true);
		$criteria->compare('thread_id',$this->thread_id);
		$criteria->compare('editorUsername',$this->editorUsername,true);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('created',$this->created);
		$criteria->compare('updated',$this->updated);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}