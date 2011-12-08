<?php
$this->breadcrumbs=array(
	'Blog Contents'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List BlogContent', 'url'=>array('index')),
	array('label'=>'Manage BlogContent', 'url'=>array('admin')),
);
?>

<h1>Create BlogContent</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>