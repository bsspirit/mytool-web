<?php
$this->breadcrumbs=array(
	'Finance Balances'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List FinanceBalance', 'url'=>array('index')),
	array('label'=>'Create FinanceBalance', 'url'=>array('create')),
	array('label'=>'View FinanceBalance', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage FinanceBalance', 'url'=>array('admin')),
);
?>

<h1>Update FinanceBalance <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>