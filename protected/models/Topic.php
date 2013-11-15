<?php

class Topic extends CActiveRecord {

	public function tableName()
	{
		return 'tbl_topic';
	}

	public function rules()
	{
		return array(
			array('title', 'required'),
			array('title', 'length', 'max' => 64),
			array('description', 'required'),
			array('description', 'length', 'max' => 128),
		);
	}
	
	public function relations()
	{
		return array(
			'topics' => array(self::HAS_MANY, 'Topic', 'topic_id'),
			'topic' => array(self::BELONGS_TO, 'Topic', 'topic_id'),
			'threads' => array(self::HAS_MANY, 'Thread', 'topic_id'),
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
	
	public static function model($className = __CLASS__)
	{
		return parent::model($className);
	}

}

?>