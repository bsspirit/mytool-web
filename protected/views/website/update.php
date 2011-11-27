<?php
$this->breadcrumbs=array(
	'Websites'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Website', 'url'=>array('index')),
	array('label'=>'Create Website', 'url'=>array('create')),
	array('label'=>'View Website', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Website', 'url'=>array('admin')),
);
?>

<h1>Update Website <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>