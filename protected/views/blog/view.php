<?php
$this->breadcrumbs=array(
	'Blog Contents'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List BlogContent', 'url'=>array('index')),
	array('label'=>'Create BlogContent', 'url'=>array('create')),
	array('label'=>'Update BlogContent', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete BlogContent', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage BlogContent', 'url'=>array('admin')),
);
?>

<h1>View BlogContent #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'title',
		'content',
		'create_time',
	),
)); ?>
