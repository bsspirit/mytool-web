<?php

class SiteController extends Controller
{
	
	/*
	 * 加密
	 */
	public function actionEncrypt()
	{
		$k='';
		$md5_32='';
		$md5_16='';
		$base64='';
		$url_16='';
		if(isset($_POST['k'])){
			$k=$_POST['k'];
			$md5_32 = md5($k);
			$md5_16 = substr(md5($k),8,-8);
			$base64 = base64_encode($k);
			for ( $i = 0; $i < strlen($k); $i++ ) {
				$url_16 .= '%'.base_convert(ord($k[$i]), 10, 16);
			}
		}
		
		$this->render('encrypt', array(
			'md5_32'=>$md5_32,
			'md5_16'=>$md5_16,
			'base64'=>$base64,
			'url_16'=>strtoupper($url_16),
			'k'=>$k,
		));
	}
	
	/*
	 * 解密算法
	 */
	public function actionDecrypt(){
		$k='';
		$md5='';
		if(isset($_POST['md5'])){
			$md5=$_POST['md5'];
			$k=$md5;
		}
		$this->render('decrypt', array(
			'md5'=>$md5,
			'k'=>$k,
		));
	}
	
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->render('index');
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
	    if($error=Yii::app()->errorHandler->error)
	    {
	    	if(Yii::app()->request->isAjaxRequest)
	    		echo $error['message'];
	    	else
	        	$this->render('error', $error);
	    }
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$headers="From: {$model->email}\r\nReply-To: {$model->email}";
				mail(Yii::app()->params['adminEmail'],$model->subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
}