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
	<link rel="stylesheet" href="/css/jquery-ui-1.8.16.css" />

	<script src="/js/jquery-1.6.2.min.js"></script>
	<script src="/js/jquery-ui-1.8.16.min.js"></script>
	<script src="/js/jquery.ba-bbq.js"></script>
	<script src="/js/mylib.js"></script>
</head>
<body>
<div class="container" id="page">
	<div id="header">
		<div id="logo"><?php echo CHtml::encode(Yii::app()->name); ?></div>
	</div>
	<div id="mainmenu">
		<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'首页', 'url'=>array('/')),
				array('label'=>'快捷导航', 'url'=>array('/website'),'visible'=>!Yii::app()->user->isGuest),
				array('label'=>'我的博客', 'url'=>array('/blog'),'visible'=>!Yii::app()->user->isGuest),
				array('label'=>'我的理财', 'url'=>array('/finance'),'visible'=>!Yii::app()->user->isGuest),
				array('label'=>'站工工具', 'url'=>array('/webtool'),'visible'=>!Yii::app()->user->isGuest),
				array('label'=>'黑客工具', 'url'=>array('/hack'),'visible'=>!Yii::app()->user->isGuest),
				array('label'=>'常用工具', 'url'=>array('/common'),'visible'=>!Yii::app()->user->isGuest),
				array('label'=>'登陆', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'退出 ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
			),
		)); ?>
	</div>
	<?php echo $content; ?>
	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by <a href="http://www.wtmart.com">www.wtmart.com</a><br/>
		All Rights Reserved.<br/>
		Powered by bsspirit@gmail.com.
	</div>
</div>
</body>
</html>