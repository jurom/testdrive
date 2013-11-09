<?php

class Comment extends CActiveRecord
{
	
	
	public function tableName()
	{
		return 'tbl_comment';
	}
	
	public function rules()
	{
		return array( 
			array('content', 'required'),
			array('content', 'length', 'max' => 1000),
		);
	}
	
	public function relations()
	{
		return array(
			'doctor' => array(self::BELONGS_TO, 'Doctor', 'doctor_id'),
			'user' => array(self::BELONGS_TO, 'User', 'user_id'),
		);
	}
	
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'content' => 'Content',
			'created' => 'Created',
			'modified' => 'Modified',
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
	
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
?>