<?php

class DictController extends Controller
{
	public $layout='//layouts/column2';

	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view','jSONTags','jSONWordsByTag'),
				'users'=>array('*'),
			),
			/*array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),*/
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
	
	public function actionIndex(){
//		$dataProvider=new CActiveDataProvider('DictWord');
		$this->render('index',array(
			//'dataProvider'=>$dataProvider,
		));
	}
	
	/*
	 * 显示Tags
	 */
	public function actionJSONTags(){
		/*$cats=WebsiteCatalog::model()->findAll();
		$webs=Website::model()->findAll();
		$j_cats=array();
		foreach($cats as $row){
			$line = array(
				'id'=>$row['id'],
				'name'=>$row['name'],
				'seq'=>$row['seq'],
				'pages'=>array()
			);
			array_push($j_cats, $line);
		}
		
		foreach ($webs as $row){
			$line = array(
				'id'=>$row['id'],
				'url'=>$row['url'],
				'image'=>$row['image'],
				'title'=>$row['title'],
				'icon'=>$row['icon'],
				'cid'=>$row['cid']
			);
			
			for($i=0;$i<count($j_cats);$i++){
				if($row['cid'] == $j_cats[$i]['id']){
					array_push($j_cats[$i]['pages'],$line);
				}
			}
		}
		echo $_GET['callback'] . "(". CJSON::encode($j_cats) .")";
		Yii::app()->end(); */
	}
	
	/*
	 * 查单词通过tag
	 */
	public function actionJSONWordsByTag($tag){
		/*$cats=WebsiteCatalog::model()->findAll();
		$webs=Website::model()->findAll();
		$j_cats=array();
		foreach($cats as $row){
			$line = array(
				'id'=>$row['id'],
				'name'=>$row['name'],
				'seq'=>$row['seq'],
				'pages'=>array()
			);
			array_push($j_cats, $line);
		}
		
		foreach ($webs as $row){
			$line = array(
				'id'=>$row['id'],
				'url'=>$row['url'],
				'image'=>$row['image'],
				'title'=>$row['title'],
				'icon'=>$row['icon'],
				'cid'=>$row['cid']
			);
			
			for($i=0;$i<count($j_cats);$i++){
				if($row['cid'] == $j_cats[$i]['id']){
					array_push($j_cats[$i]['pages'],$line);
				}
			}
		}
		echo $_GET['callback'] . "(". CJSON::encode($j_cats) .")";
		Yii::app()->end(); */
	}

	//=========================================
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

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new DictWord;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['DictWord']))
		{
			$model->attributes=$_POST['DictWord'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->word));
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

		if(isset($_POST['DictWord']))
		{
			$model->attributes=$_POST['DictWord'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->word));
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
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new DictWord('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['DictWord']))
			$model->attributes=$_GET['DictWord'];

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
		$model=DictWord::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='dict-word-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
