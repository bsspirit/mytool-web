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
</head>

<body>
<div class="container" id="page">
	<div id="header">
		<div id="logo"><?php echo CHtml::encode(Yii::app()->name); ?></div>
	</div><!-- header -->
	<div id="mainmenu">
		<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'首页', 'url'=>array('/default/index')),
				array('label'=>'快捷导航', 'url'=>array('/website/index')),
				array('label'=>'我的博客', 'url'=>array('/blog/index')),
				array('label'=>'我的理财', 'url'=>array('/account/index')),
				array('label'=>'站工工具', 'url'=>array('/webtool/index')),
				array('label'=>'黑客工具', 'url'=>array('/hack/index')),
				array('label'=>'常用工具', 'url'=>array('/common/index')),
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