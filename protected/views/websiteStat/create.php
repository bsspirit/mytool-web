<?php
$this->breadcrumbs=array(
	'Website Stats'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List WebsiteStat', 'url'=>array('index')),
	array('label'=>'Manage WebsiteStat', 'url'=>array('admin')),
);
?>

<h1>Create WebsiteStat</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>