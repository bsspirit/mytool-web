<?php
$this->breadcrumbs=array(
	'Dict Words'=>array('index'),
	$model->word,
);

$this->menu=array(
	array('label'=>'List DictWord', 'url'=>array('index')),
	array('label'=>'Create DictWord', 'url'=>array('create')),
	array('label'=>'Update DictWord', 'url'=>array('update', 'id'=>$model->word)),
	array('label'=>'Delete DictWord', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->word),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage DictWord', 'url'=>array('admin')),
);
?>

<h1>View DictWord #<?php echo $model->word; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'word',
		'create_time',
	),
)); ?>
