<?php
$this->breadcrumbs=array(
	'Finance Balances'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List FinanceBalance', 'url'=>array('index')),
	array('label'=>'Manage FinanceBalance', 'url'=>array('admin')),
);
?>

<h1>Create FinanceBalance</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>