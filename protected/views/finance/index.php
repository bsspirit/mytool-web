<div class="view">
	<a href="javascript:void(0);" onclick="function_balance()">日记账</a>
</div>

<div class="view">
	<h1>日记账</h1>
	<a href="javascript:void(0);" onclick="function_balance_add()">增加</a>|
	<a href="javascript:void(0);" onclick="function_input_select()">收入</a>|
	<a href="javascript:void(0);" onclick="function_output_select()">支出</a>|
	<a href="javascript:void(0);" onclick="function_borrow_select()">借</a>|
	<a href="javascript:void(0);" onclick="function_repay_select()">还</a>
	
<?php 
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'finance-balance-grid',
	'dataProvider'=>$dataProvider,
	'columns'=>array(
		'id',
		array(
			'name'=>'date',
			'header'=>'日期',
			'value'=>'FinanceUtil::int2Date($data->date)',
		),
		'money',
		array(
			'name'=>'pay_type',
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
		           	'imageUrl'=>'/css/update.png',	
        		   	'url'=>'',
		      		'options'=>array('onclick'=>'function_balance_edit(this)'),
	            ),
	            'del'=>array(
		           	'label'=>'删除',	
	            	'imageUrl'=>'/css/delete.png',
					'url'=>'',
		      		'options'=>array('onclick'=>'click_delete(this)'),
	            ),
             ),
        	'template'=>'{update} {del}',
            'htmlOptions'=>array(
		        'style'=>'width:80px;'
		    ),
		),
	),
)); ?>
</div>

<div id="balanceDialog">
	<div id="balance_form" class="form"></div>
</div>

<script src="/js/module/finance/finance.js"></script>