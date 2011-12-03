<?php
$this->breadcrumbs=array(
	'Finance Balances',
);

$this->menu=array(
	array('label'=>'Create FinanceBalance', 'url'=>array('create')),
	array('label'=>'Manage FinanceBalance', 'url'=>array('admin')),
);
?>

<h1>Finance Balances</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
