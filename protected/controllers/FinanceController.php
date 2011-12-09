<?php

class FinanceController extends Controller
{
	public $layout='//layouts/column1';

	public function filters(){
		return array(
			'accessControl', 
		);
	}

	public function accessRules(){
		return array(
			array('allow', 
				'actions'=>array('index','admin','delBalance','addBalance','jSONBalance','jSONBalanceType','jSONBalanceMode'),
				'users'=>array('@'),
			),
			array('deny',  
				'users'=>array('*'),
			),
		);
	}
	
	/*
	 * 日记账查询
	 */
	public function actionIndex(){	
		$sort = new CSort;
        $sort->attributes = array('id','date','money','pay_type');
        $sort->defaultOrder = 'date DESC';
        $sort->multiSort = true;
        
        $criteria=new CDbCriteria;
        if(isset($_POST['pay_type'])){
        	$criteria->compare('pay_type',$_POST['pay_type'],true);
        }
		
		$dataProvider=new CActiveDataProvider('FinanceBalance',array(
			'criteria'=>$criteria,
			'sort'=>$sort,
		));
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}
	
	/*
	 * 增加一个日记账
	 */
	public function actionAddBalance(){
		$model=isset($_POST['balance_id'])?$this->loadModel($_POST['balance_id']):new FinanceBalance;
		
		$model['money']=$_POST['balance_money'];
		$model['description']=$_POST['balance_description'];
		$model['date']=str_replace("-","",$_POST['balance_date']);
		$model['pay_type']=$_POST['balance_pay_type'];
		$model['pay_mode']=$_POST['balance_pay_mode'];
		
		$json=array('success'=>false);
		if($model->save(false)){
			$json['success']=true;	
		} 
		echo CJSON::encode($json);
		Yii::app()->end();
	}
	
	/*
	 * 删除一个日记账
	 */
	public function actionDelBalance(){
		$id=$_POST['id'];
		$json=array('success'=>false);
		if(Yii::app()->request->isPostRequest){
			if($this->loadModel($id)->delete()){
				$json['success']=true;	
			} 
		}
		echo CJSON::encode($json);
		Yii::app()->end();
	}
	
	/*
	 * 查看一个日记账
	 */
	public function actionJSONBalance($id){
		$id=$_GET['id'];
		$model = $this->loadModel($id);
		echo CJSON::encode($model);
		Yii::app()->end();
	}
	
	/*
	 * 理财-收支类型
	 */
	public function actionJSONBalanceType($cid=null){
		echo CJSON::encode(FinanceUtil::$balance_pay_type);
		Yii::app()->end();
	}
	
	public function actionJSONBalanceMode($cid=null){
//		echo $_GET['callback'] . "(". CJSON::encode(FinanceUtil::$balance_pay_mode) .")";
		echo CJSON::encode(FinanceUtil::$balance_pay_mode);
		Yii::app()->end();
	}
	
	//============================================
	
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
		$model=new FinanceBalance;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['FinanceBalance']))
		{
			$model->attributes=$_POST['FinanceBalance'];
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

		if(isset($_POST['FinanceBalance']))
		{
			$model->attributes=$_POST['FinanceBalance'];
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
		//if(Yii::app()->request->isPostRequest)		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
		//}
		//else
			//throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}


	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new FinanceBalance('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['FinanceBalance']))
			$model->attributes=$_GET['FinanceBalance'];

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
		$model=FinanceBalance::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='finance-balance-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
