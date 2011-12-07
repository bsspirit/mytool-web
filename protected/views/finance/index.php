<div class="view">
	<a href="javascript:void(0);" onclick="function_balance()">日记账</a>
	<a href="javascript:void(0);" onclick="function_balance_add()">(增加)</a>
</div>

<div class="view">
	<h1>日记账</h1>
<?php 
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'finance-balance-grid',
	'dataProvider'=>$dataProvider,
	'columns'=>array(
		'id',
		'date',
		array(
			'header'=>'金额RMB元',
			'value'=>'FinanceUtil::fen2Yuan($data->money)',
		),
		array(
			'header'=>'收支类型',
			'value'=>'FinanceUtil::pay_type($data->pay_type)',
		),
		array(
			'header'=>'支付方式',
			'value'=>'FinanceUtil::pay_mode($data->pay_mode)',
		),
		'description',
		array(
			'class'=>'CButtonColumn',
			'header'=>'操作',
			'buttons'=>array(
			 	'update'=>array(
		           	'label'=>'编辑',
		           	//'imageUrl'=>'',	
        		   	//'url'=>'Yii::app()->controller->createUrl("/prod/detail",array("pid"=>$data->id))',
		      		'options'=>array('onclick'=>'click_edit()'),
	            ),
	            'delete'=>array(
		           	'label'=>'删除',	
	            	//'imageUrl'=>'',
		      		'options'=>array('onclick'=>'click_delete()'),
	            ),
             ),
        	'template'=>'{update} {delete}',
            'htmlOptions'=>array(
		        'style'=>'width:80px;'
		    ),
		),
	),
)); ?>
</div>

<div id="balanceDialog" title="增加日记账">
	<div id="balance_form_add" class="form"></div>
</div>

<script src="/js/finance.js"></script>