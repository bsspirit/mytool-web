<?php
$this->breadcrumbs=array(
	'Dict Words'=>array('index'),
	$model->word=>array('view','id'=>$model->word),
	'Update',
);

$this->menu=array(
	array('label'=>'List DictWord', 'url'=>array('index')),
	array('label'=>'Create DictWord', 'url'=>array('create')),
	array('label'=>'View DictWord', 'url'=>array('view', 'id'=>$model->word)),
	array('label'=>'Manage DictWord', 'url'=>array('admin')),
);
?>

<h1>Update DictWord <?php echo $model->word; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>