<?php

class Micropost extends CActiveRecord 
{

	public function tableName() 
	{
		return 'tbl_micropost';
	}

	public function rules() 
	{
		return array( 
			array('content', 'required'),
			array('content', 'length', 'max'=>1000),
		);
	}
	
	public function relations()
	{
		return array();
	}
	
	public function attributeLabels() 
	{
		return array(
			'id' => 'ID',
			'name' => 'Author',
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
		$this->name = Yii::app()->user->name;
		
		return parent::beforeSave();
	}
	
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	public function search()
	{
	
		$criteria=new CDbCriteria;
		$criteria->compare('id',$this->id);
		
		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}
?>