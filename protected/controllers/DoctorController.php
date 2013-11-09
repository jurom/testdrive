<?php

class DoctorController extends Controller
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
				'actions' => array('index','view'),
				'users' => array('*'),
			),
			array('allow',
				'actions' => array('create', 'update', 'delete'),
				'users' => array('admin'),
			),
			array('deny',
				'users' => array('*'),
			),
		);
	}
	
	public function actionView($id)
	{
		$modelComment = new Comment;
		$model = $this->loadModel($id);
		$dataProvider = new CActiveDataProvider('Comment');
		$dataProvider->setData($model->comments);
		$action = $this->createUrl('comment/create', array('doctor_id' => $id));
	
		$this->render('view', array(
			'model' => $model,
			'modelComment' => $modelComment,
			'dataProvider' => $dataProvider,
			'action' => $action,
		));
	}
	
	public function actionCreate()
	{
		$model = new Doctor;
		
		if (isset($_POST['Doctor']))
		{
			$model->attributes = $_POST['Doctor'];
			if ($model->save())
				$this->redirect(array('view', 'id' => $model->id));
		}
		
		$this->render('create', array(
			'model' => $model,
		));
	}
	
	public function actionUpdate($id)
	{
		$model = $this->loadModel($id);
		
		if (isset($_POST['Doctor']))
		{
			$model->attributes = $_POST['Doctor'];
			if ($model->save())
				$this->redirect(array('view', 'id' => $model->id));
		}
		
		$this->render('update', array(
			'model' => $model,
		));
	}
	
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();
		
		if (!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl'])? $_POST['returnUrl'] : array('admin'));
	}
	
	public function actionIndex()
	{
		$dataProvider = new CActiveDataProvider('Doctor');
		$this->render('index', array (
			'dataProvider' => $dataProvider,
		));
	}
	
	public function loadModel($id)
	{
		$model = Doctor::model()->findByPk($id);
		if ($model === null)
			throw new CHttpException(404,'The requested page was not found.');
		return $model;
	}
	
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax'] === 'user-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}

?>