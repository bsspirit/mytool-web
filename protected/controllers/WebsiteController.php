<?php
class WebsiteController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column1';

	/**
	 * @return array action filters
	 */
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
				'actions'=>array('index','index2','postSave','postDel',
								'JSONNavigator','JSONWebsite','JSONCatalog','JSONWins'),
				'users'=>array('@'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
	
	/*
	 * 导航菜单
	 */
	public function actionJSONNavigator()
	{
		$cats=WebsiteCatalog::model()->findAll();
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
		Yii::app()->end(); 
	}
	
	/*
	 * 分析网站
	 */
	public function actionJSONWebsite($url){
		$header = $this->getHtml($url);
		echo $_GET['callback'] . "(". CJSON::encode($header) .")";
		Yii::app()->end();
	}
	
	/*
	 * 分类下拉列表
	 */
	public function actionJSONCatalog($cid=null){
		$cats=WebsiteCatalog::model()->findAll();
		$j_cats = array();
		foreach ($cats as $cat){
			$line = array(
				'id'=>$cat->id,
				'name'=>$cat->name,
			);
			array_push($j_cats, $line);
		}
		echo isset($_GET['callback'])?($_GET['callback']. "(". CJSON::encode($j_cats) .")"):CJSON::encode($j_cats);
		Yii::app()->end();
	}
	
	/*
	* 分类的网站
	*/
	public function actionJSONWins($cid=null){
		$webs=Website::model()->findAll('cid=:cid',array(':cid'=>$cid));
		$j_wins = array();
		foreach ($webs as $row){
			$line = array(
				'id'=>$row['id'],
				'url'=>$row['url'],
				'image'=>$row['image'],
				'title'=>$row['title'],
				'icon'=>$row['icon'],
				'cid'=>$row['cid']
			);
			array_push($j_wins, $line);
		}
		
		echo isset($_GET['callback'])?($_GET['callback']. "(". CJSON::encode($j_wins) .")"):CJSON::encode($j_wins);
		Yii::app()->end();
	}
	
	/*
	 * 访问网站
	 */
	private function getHtml($url) {
		$time1 = time();
		$data = Yii::app()->curl->simple_get($url);
		require_once 'simple_html_dom.php';
		$html=str_get_html($data);
		$time2 = time();
		$title = $html->find('title',0)->innertext;
		//$keywords=$html->find('meta[name="keywords"]',0)->innertext;
		
		$icon_remote=$url."/favicon.ico";
		$icon="./images/icon/".substr(str_replace("www.","",$url),7).".ico";
		//================================================
		//调用命令代替PHP处理
		//file_put_contents(substr($icon,1), file_get_contents($icon_remote));
		//wget http://jquery.com/favicon.ico -O tt.ico
		//================================================
		echo exec("wget ".$icon_remote . " -O " . $icon);
		
		$image="./images/screen/".substr(str_replace("www.","",$url),7).".png";
		//================================================
		//命令截图
		//xvfb-run  cutycapt --url=http://www.ppurl.com --out=ppurl.com.png
		//xvfb-run --server-args="-screen 0, 1024x768x24" cutycapt --url=$url --out=$image
		//mogrify -resize 400 -crop 400x300-0+0 a.png
		//================================================
		exec('xvfb-run --server-args="-screen 0, 1024x768x24" cutycapt --url='.$url.' --out='.$image);
		exec('mogrify -resize 480 -crop 480x300-0+0 '.$image);

		$header = array(
			'title'=>$title,
			//'keywords'=>$keywords,
			'url'=>$url,
			'icon'=>substr($icon,1),
			'image'=>substr($image,1),
			'time'=>($time2-$time1),
		);
		return $header;
	}
	
	public function actionPostSave(){
		$json=array('success'=>false);
		if(Yii::app()->request->isPostRequest){
			$model=new Website;
			$model['title']=$_POST['title'];
			$model['image']=$_POST['image'];
			$model['cid']=$_POST['catalog'];
			$model['icon']=$_POST['icon'];
			$model['url']=substr($_POST['url'],7);
			if($model->save(false)){
				$json['success']=true;	
			} 
		}
		echo CJSON::encode($json);
		Yii::app()->end();
	}
	
	public function actionPostDel(){
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
	
	
	
	public function actionIndex()
	{
		$this->render('index',array());
	}
	
	public function actionIndex2()
	{
		$this->render('index2',array());
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

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Website;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Website']))
		{
			$model->attributes=$_POST['Website'];
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

		if(isset($_POST['Website']))
		{
			$model->attributes=$_POST['Website'];
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
//	public function actionIndex()
//	{
//		$dataProvider=new CActiveDataProvider('Website');
//		$this->render('index',array(
//			'dataProvider'=>$dataProvider,
//		));
//	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Website('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Website']))
			$model->attributes=$_GET['Website'];

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
		$model=Website::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='website-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
