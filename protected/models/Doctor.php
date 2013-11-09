<?php

class Doctor extends CActiveRecord
{
	
	
	public function tableName()
	{
		return 'tbl_doctor';
	}
	
	public function rules()
	{
		return array(
			array('name, area', 'required'),
			array('name, area', 'length', 'max' => 128),
		);
	}
	
	public function relations()
	{
		return array(
			'comments' => array(self::HAS_MANY, 'Comment', 'doctor_id'),
		);
	}
	
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => "Doctor's name",
			'area' => 'Locality',
		);
	}
	
	public static function model($className= __CLASS__)
	{
		return parent::model($className);
	}
}
?>