<?php
$this->breadcrumbs=array(
	'Blog Contents',
);

$this->menu=array(
	array('label'=>'Create BlogContent', 'url'=>array('create')),
	array('label'=>'Manage BlogContent', 'url'=>array('admin')),
);
?>

<h1>Blog Contents</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
