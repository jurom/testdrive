<?php

class ForumCommentController extends Controller
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
	
	public function actionCreate($thread_id)
	{
		$model = new ForumComment;
		
		if (isset($_POST['ForumComment']))
		{
			$model->attributes = $_POST['ForumComment'];
			$model->thread_id = $thread_id;
			$model->user_id = Yii::app()->user->id;
			if ($model->save())
			{
				$this->redirect(array('thread/view','id' => $thread_id));
			}
		}
		
		$this->redirect(array('thread/view','id'=>$thread_id));
	}
	
	public function actionUpdate($id)
	{
		$model = $this->loadModel($id);
		
		if (isset($_POST['ForumComment']))
		{
			$model->attributes = $_POST['ForumComment'];
			if ($model->save())
			{
				$this->redirect(array('thread/view','id' => $model->thread_id));
			}
		}
	}
	
	public function actionDelete($id)
	{
		$model = $this->loadModel($id);
		
		if ((Yii::app()->user->id == $model->user_id) || (Yii::app()->user->name == 'admin'))
		{
			$thread_id = $model->thread_id;
			$model->delete();
			
			if (!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('thread/view', 'id' => $thread_id));
		}
	}
	
	public function loadModel($id)
	{
		$model = ForumComment::model()->findByPk($id);
		
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