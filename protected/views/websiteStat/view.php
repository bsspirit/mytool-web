<?php
$this->breadcrumbs=array(
	'Website Stats'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List WebsiteStat', 'url'=>array('index')),
	array('label'=>'Create WebsiteStat', 'url'=>array('create')),
	array('label'=>'Update WebsiteStat', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete WebsiteStat', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage WebsiteStat', 'url'=>array('admin')),
);
?>

<h1>View WebsiteStat #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'wid',
		'type',
		'count',
	),
)); ?>
