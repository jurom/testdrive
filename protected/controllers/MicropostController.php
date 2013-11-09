<?php

class MicropostController extends Controller
{

	public $layout='//layouts/column2';

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
				'actions' => array('create','update'),
				'users' => array('@'),
			),
			array('allow',
				'actions' => array('delete'),
				'users' => array('admin'),
			),
			array('deny',
				'users' => array('*'),
			),
		);
	}
	
	public function actionView($id)
	{
		$this->render('view', array(
			'model' => $this->loadModel($id),
		));
	}
	
	public function actionCreate($render = 1)
	{
		$model = new Micropost;
		
		$render = (isset($_GET['render']) ? $_GET['render'] : $render);
		
		if (isset($_POST['Micropost']))
		{
			$model->attributes = $_POST['Micropost'];
			if ($model->save())
			{
				if ($render == 0) $this->redirect(array('index'));
				$this->redirect(array('view', 'id' => $model->id));
			}
		}
		if ($render == 1) 
		{
			$this->render('create', array(
				'model'=>$model,
				'action' => '#',
			));
		} else {
			$this->redirect(array('index'));
		}
	}
	
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);
		
		if (isset($_POST['Micropost']))
		{
			$model->attributes=$_POST['Micropost'];
			if($model->save())
			{
				$this->redirect(array('index'));
			}
		}
		$this->render('update', array(
			'model' => $model,
		));
	}
	
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();
		
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
	}
	
	public function actionIndex()
	{
		$model = new Micropost;
		
		$dataProvider = new CActiveDataProvider('Micropost', array(
			'criteria' => array(
				'order' => 'created desc'
			)
		));
		$action = $this->createUrl('micropost/create', array ( 'render' => 0 ));
		$this->render('index', array(
			'dataProvider' => $dataProvider,
			'model' => $model,
			'action' => $action,
		));
	}
	
	public function loadModel($id)
	{
		$model = Micropost::model()->findByPk($id);
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