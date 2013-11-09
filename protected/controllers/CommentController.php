<?php

class CommentController extends Controller 
{
	
	public $layout = '//layouts/column2';
	
	public function filters()
	{
		return array(
			'accessControl',
			'postOnly + delete',
		);
	}
	
	public function accessRules()
	{
		return array(
			array('allow',
				'actions' => array('create', 'update', 'delete'),
				'users' => array('@'),
			),
			array('allow',
				'users' => array('admin'),
			),
			array('deny',
				'users' => array('*'),
			),
		);
	}
	
	public function actionCreate($doctor_id)
	{ 
		$model = new Comment;
		
		if (isset($_POST['Comment']))
		{
			$model->attributes = $_POST['Comment'];
			$model->user_id = Yii::app()->user->id;
			$model->doctor_id = $doctor_id;
			if ($model->save())
			{
				$this->redirect(array('doctor/view','id' => $doctor_id));
			}
		}
	}
	
	public function actionUpdate($id)
	{
		$model = $this->loadModel($id);
		
		if (isset($_POST['Comment']))
		{
			$model->attributes = $_POST['Comment'];
			if ($model->save())
			{
				$this->redirect(array('doctor/view', 'id' => $model->doctor_id));
			}
		}
		
		$this->render('update', array(
			'model' => $model,
		));
	}
	
	public function actionDelete($id)
	{
		$model = $this->loadModel($id);
	
		if ((Yii::app()->user->id == $model->user_id) || (Yii::app()->user->name = 'admin'))
		{
			$doctor_id = $model->doctor_id;
			$model->delete();
			
			if (!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('doctor/view', 'id' => $doctor_id));
		}
	}
	
	public function loadModel($id)
	{
		$model = Comment::model()->findByPk($id);
		if ($model === null)
			throw new CHttpException(404,'The requested page was not found.');
		return $model;
	}
	
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='micropost-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
?>