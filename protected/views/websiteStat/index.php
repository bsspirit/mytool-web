<?php
$this->breadcrumbs=array(
	'Website Stats',
);

$this->menu=array(
	array('label'=>'Create WebsiteStat', 'url'=>array('create')),
	array('label'=>'Manage WebsiteStat', 'url'=>array('admin')),
);
?>

<h1>Website Stats</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
