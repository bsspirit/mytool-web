<?php

class BlogController extends Controller
{
	public $layout='//layouts/column2';

	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view','addBlog','jSONBlogs','jSONBlog'),
				'users'=>array('*'),
			),
// 			array('allow', // allow authenticated user to perform 'create' and 'update' actions
// 				'actions'=>array('create','update'),
// 				'users'=>array('@'),
// 			),
// 			array('allow', // allow admin user to perform 'admin' and 'delete' actions
// 				'actions'=>array('admin','delete'),
// 				'users'=>array('admin'),
// 			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}
	
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('BlogContent');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}
	
	/*
	 * 增加一个blog
	 */
	public function actionAddBlog(){
		$model=isset($_POST['blog_id'])?$this->loadModel($_POST['blog_id']):new BlogContent;
		
		$model['title']=$_POST['blog_title'];
		$model['content']=$_POST['blog_content'];
		
		$json=array('success'=>false);
		if($model->save(false)){
			$json['success']=true;
		}
		echo CJSON::encode($json);
		Yii::app()->end();
	}
	
	
	/*
	 * 查看Blog Feeds
	 */
	public function actionJSONBlogs(){
		$sort = new CSort;
		$sort->defaultOrder = 'create_time DESC';
		
		$criteria=new CDbCriteria;
		$criteria->select = array('id', 'title', 'content', 'create_time');
		
		
		$dataProvider=new CActiveDataProvider('BlogContent',array(
			'criteria'=>$criteria,
			'sort'=>$sort,
		));
		echo $_GET['callback'] ."(" . CJSON::encode($dataProvider->getData()) .")";
		Yii::app()->end();
	}
	
	/*
	* 查看一个Blog
	*/
	public function actionJSONBlog($id){
		$id=$_GET['id'];
		$model = $this->loadModel($id);
		echo CJSON::encode($model);
		Yii::app()->end();
	}

	//==============================================
	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new BlogContent;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['BlogContent']))
		{
			$model->attributes=$_POST['BlogContent'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['BlogContent']))
		{
			$model->attributes=$_POST['BlogContent'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */


	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new BlogContent('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['BlogContent']))
			$model->attributes=$_GET['BlogContent'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=BlogContent::model()->findByPk((int)$id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='blog-content-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
