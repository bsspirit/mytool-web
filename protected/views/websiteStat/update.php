<?php
$this->breadcrumbs=array(
	'Website Stats'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List WebsiteStat', 'url'=>array('index')),
	array('label'=>'Create WebsiteStat', 'url'=>array('create')),
	array('label'=>'View WebsiteStat', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage WebsiteStat', 'url'=>array('admin')),
);
?>

<h1>Update WebsiteStat <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>