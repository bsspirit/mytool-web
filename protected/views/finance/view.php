<?php
$this->breadcrumbs=array(
	'Finance Balances'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List FinanceBalance', 'url'=>array('index')),
	array('label'=>'Create FinanceBalance', 'url'=>array('create')),
	array('label'=>'Update FinanceBalance', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete FinanceBalance', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage FinanceBalance', 'url'=>array('admin')),
);
?>

<h1>View FinanceBalance #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'date',
		'money',
		'pay_type',
		'pay_mode',
		'description',
		'create_time',
	),
)); ?>
