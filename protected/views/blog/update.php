<?php
$this->breadcrumbs=array(
	'Blog Contents'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List BlogContent', 'url'=>array('index')),
	array('label'=>'Create BlogContent', 'url'=>array('create')),
	array('label'=>'View BlogContent', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage BlogContent', 'url'=>array('admin')),
);
?>

<h1>Update BlogContent <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>