<?php

class Thread extends CActiveRecord
{

	public function tableName()
	{
		return 'tbl_thread';
	}

	public function rules()
	{
		return array(
			array('title', 'required'),
			array('title', 'length', 'max' => 64),
			array('description', 'required'),
			array('description', 'length', 'max' => 5000),
		);
	}
	
	public function relations()
	{
		return array(
			'topic' => array(self::BELONGS_TO, 'Topic', 'topic_id'),
			'user' => array(self::BELONGS_TO, 'User', 'user_id'),
			'fcomments' => array(self::HAS_MANY, 'ForumComment', 'thread_id'),
		);
	}
	
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'title' => 'Title',
			'description' => 'Description',
		);
	}
	
	
	public function beforeSave()
	{
		if ($this->isNewRecord)
		{
			$this->created = new CDbExpression('NOW()');
		}
		$this->modified = new CDbExpression('NOW()');
		$this->user = Yii::app()->user->id;
		return parent::beforeSave();
	}
	
	public static function model($className = __CLASS__)
	{
		return parent::model($className);
	}
}

?>