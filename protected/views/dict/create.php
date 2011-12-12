<?php
$this->breadcrumbs=array(
	'Dict Words'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List DictWord', 'url'=>array('index')),
	array('label'=>'Manage DictWord', 'url'=>array('admin')),
);
?>

<h1>Create DictWord</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>