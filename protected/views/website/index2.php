<?php
$this->breadcrumbs=array(
	'Websites',
);

$this->menu=array(
	array('label'=>'Create Website', 'url'=>array('create')),
	array('label'=>'Manage Website', 'url'=>array('admin')),
);
?>

<h1>Websites</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
