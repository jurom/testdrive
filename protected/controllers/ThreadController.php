<?php

class ThreadController extends Controller
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
				'actions' => array('view'),
				'users' => array('*'),
			),
			array('allow',
				'actions' => array('create','update','delete'),
				'users' => array('@'),
			),
			array('deny',
				'users' => array('*'),
			),
		);
	}
	
	public function actionCreate($topic_id)
	{
		$model = new Thread;
		$model->topic_id = $topic_id;
		
		if (isset($_POST['Thread']))
		{
			$model->attributes = $_POST['Thread'];
			$model->user_id = Yii::app()->user->id;
			if ($model->save())
			{
				if ($topic_id == -1)
					$this->redirect(array('topic/index'));
				else
					$this->redirect(array('topic/view','id' => $topic_id));
			}
		}
		
		$action = $this->createUrl('thread/create', array('topic_id' => $topic_id));
		$this->render('create', array(
			'model' => $model,
			'action' => $action,
		));
	}
	
	public function actionUpdate($id)
	{
		$model = $this->loadModel($id);
		
		if (isset($_POST['Thread']))
		{
			$model->attributes = $_POST['Thread'];
			if ($model->save())
			{
				$this->redirect(array('topic/view','id' => $model->topic_id));
			}
		}
		
		$action = $this->createUrl('update',array('id' => $id));
		$this->render('update', array(
			'model' => $model,
			'action' => $action,
		));
	}
	
	public function actionView($id)
	{
		$modelFComment = new ForumComment;
		$model = $this->loadModel($id);
		$dataProvider = new CActiveDataProvider('ForumComment');
		$dataProvider->setData($model->fcomments);
		$action = $this->createUrl('forumComment/create', array('thread_id' => $id));
		
		$this->render('view', array(
			'model' => $model,
			'modelFComment' => $modelFComment,
			'dataProvider' => $dataProvider,
			'action' => $action,
		));
	}
	
	public function actionDelete($id)
	{
		$model = $this->loadModel($id);
		
		$topic_id = $model->topic_id;
		if ((Yii::app()->user->id == $model->user_id) || (Yii::app()->user->name == 'admin'))
		{
			$model->delete();
			if (!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : (($topic_id == -1) ? array('topic/index') : array('topic/view', 'id' => $topic_id)));
		}
	}
	
	public function loadModel($id)
	{
		$model = Thread::model()->findByPk($id);
		
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