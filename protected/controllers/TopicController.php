<?php

class TopicController extends Controller
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
				'users' => array('*')
			),
			array('allow',
				'actions' => array('create','update','delete'),
				'users' => array('admin'),
			),
			array('deny',
				'users' => array('*'),
			),
		);
	}
	
	public function actionView($id)
	{
		$model = $this->loadModel($id);
		$dataProviderTopic = new CActiveDataProvider('Topic');
		$dataProviderTopic->setData($model->topics);
		$dataProviderThread = new CActiveDataProvider('Thread');
		$dataProviderThread->setData($model->threads);
		$this->render('view', array(
			'dataProviderTopic' => $dataProviderTopic,
			'dataProviderThread' => $dataProviderThread,
			'model' => $this->loadModel($id),
		));
	}
	
	public function actionCreate($topic_id)
	{
		$model = new Topic;
		$model->topic_id = $topic_id;
			
		if (isset($_POST['Topic']))
		{
			$model->attributes = $_POST['Topic'];
			if ($topic_id == -1)
				$model->is_primary = 1;
			if ($model->save())
			{
				if ($model->is_primary == 1)
					$this->redirect(array('topic/index'));
				else 
					$this->redirect(array('topic/view', 'id' => $topic_id));
			}
		}
		
		$action = $this->createUrl('topic/create', array('topic_id' => $topic_id));
		$this->render('create', array(
			'model' => $model,
			'action' => $action,
		));
	}
	
	public function loadModel($id)
	{
		$model = Topic::model()->findByPk($id);
		if ($model === null)
			throw new CHttpException(404,'The requested page was not found.');
		return $model;
	}
	
	public function actionUpdate($id)
	{
		$model = $this->loadModel($id);
		
		if (isset($_POST['Topic']))
		{
			$model->attributes = $_POST['Topic'];
			if ($model->save())
			{
				if ($model->is_primary == 1)
					$this->redirect(array('topic/index'));
				else 
					$this->redirect(array('topic/view','id' => $model->topic_id));
			}
		}
		
		$action = $this->createUrl('topic/update', array('id' => $id));
		$this->render('update', array(
			'model' => $model,
			'action' => $action,
		));
	}
	
	public function actionIndex()
	{
		$dataProviderTopic = new CActiveDataProvider('Topic', array(
			'criteria' => array(
				'condition' => 'is_primary=1',
			),
		));
		$topic_id = -1;
		
		$dataProviderThread = new CActiveDataProvider('Thread', array(
			'criteria' => array(
				'condition' => 'topic_id=-1',
			),
		));
		$this->render('index', array(
			'dataProviderTopic' => $dataProviderTopic,
			'dataProviderThread' => $dataProviderThread,
			'topic_id' => $topic_id,
		));
	}
	
	public function actionDelete($id)
	{
		$model = $this->loadModel($id);
		$topic_id = $model->topic_id;
		
		$model->delete();
		
		if (!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl'])? $_POST['returnUrl'] : (($topic_id == -1)? array('topic/index') : array('topic/view', 'id' => $topic_id)));
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