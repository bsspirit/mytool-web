<?php $basepath=Yii::app()->request->baseUrl; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
	<link rel="stylesheet" href="/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" href="/css/print.css" media="print" />
	<link rel="stylesheet" href="/css/main.css" />
	<link rel="stylesheet" href="/css/form.css" />
	
	<script src="/js/jquery-1.5.1.min.js"></script>
	<script src="/js/navigator.js"></script>
	<script src="http://loc.tao6s.com/website/JSONNavigator?callback=jsonpCallback"></script>
</head>

<body>
<div class="container" id="page">
	<div id="header">
		<div id="logo"><?php echo CHtml::encode(Yii::app()->name); ?></div>
	</div><!-- header -->
	<div id="mainmenu">
		<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
<<<<<<< HEAD
				array('label'=>'Home', 'url'=>array('/site/index')),
				array('label'=>'加密算法', 'url'=>array('/site/encrypt')),
				array('label'=>'解密算法', 'url'=>array('/site/decrypt')),
				array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about')),
				array('label'=>'Contact', 'url'=>array('/site/contact')),
=======
				array('label'=>'首页', 'url'=>array('/default/index')),
				array('label'=>'快捷导航', 'url'=>array('/website/index')),
				array('label'=>'站工工具', 'url'=>array('/tool/index')),
				array('label'=>'我的博客', 'url'=>array('/blog/index')),
>>>>>>> e99024c3b2e1e3af681ee270ec0a8ad5b2c1f691
				array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
			),
		)); ?>
	</div><!-- mainmenu -->
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by My Company.<br/>
		All Rights Reserved.<br/>
		<?php echo Yii::powered(); ?>
	</div><!-- footer -->
</div><!-- page -->
</body>
</html>