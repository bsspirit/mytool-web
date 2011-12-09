//初始化对话框
$("#balanceDialog").dialog({
	autoOpen: false,
	height: 400,
	width: 350,
	modal: true
});

//日记账刷新
function function_balance(){
	$.fn.yiiGridView.update('finance-balance-grid',{
		 type:'GET',
		 url:$(this).attr('href')
	});
}

//日记账增加
function function_balance_add(){
	var html =  '<form id="balance_form">';
		html += '<div id="balance_money"></div>';
		html += '<div id="balance_date"></div>';
		html += '<div id="balance_pay_type"></div>';
		html += '<div id="balance_pay_mode"></div>';
		html += '<div id="balance_description"></div>';
		html += '<div id="balance_submit"></div>';
		html += '</form>';
	$('#balance_form').html(html);
	render_balance_form();
	$('#balanceDialog').dialog('option','title','日记账增加');
	$('#balanceDialog').dialog('open');
}

//日记账修改
function function_balance_edit(obj){
	var id = get_grid_row_id(obj);
	var url = '/finance/JSONBalance/'+id;
	$.getJSON(url,function(data){
		var html =  '<form id="balance_form">';
			html += '<div id="balance_money" value="'+data.money+'"></div>';
			html += '<div id="balance_date" value="'+data.date+'"></div>';
			html += '<div id="balance_pay_type" value="'+data.pay_type+'"></div>';
			html += '<div id="balance_pay_mode" value="'+data.pay_mode+'"></div>';
			html += '<div id="balance_description" value="'+data.description+'"></div>';
			html += '<div id="balance_submit"></div>';
			html += '<input type="hidden" name="balance_id" value="'+id+'"/>';
			html += '</form>';
		$('#balance_form').html(html);
		render_balance_form();
		$('#balanceDialog').dialog('option','title','日记账修改');
		$('#balanceDialog').dialog('open');
	});
	
	
}

function render_balance_form(){
	var form = {
		input:[{id:"balance_money",label:"支付金额"}],
		area:[{id:"balance_description",label:"我的备注",css:"w300 h100",layout:{row:2}}],
		date:[{id:"balance_date",label:"支付日期"}],
		button:[{id:"balance_submit",label:"提交",css:"w80",onclick:"balance_submit()"}],
		list:[{
			url:"/finance/JSONBalanceType",
			data:{},
			id:"balance_pay_type",
			label:"收支类型"
		},{
			url:"/finance/JSONBalanceMode",
			data:{},
			id:"balance_pay_mode",
			label:"支付方式"
		}]
	}
	render_form(form);
}

function balance_submit(){
	var form = {};
	$('#balance_form :input').each(function(k,v){
	 	form[v.name]=v.value;
	});
	$.ajax({
	    url: "/finance/addBalance",
	    type:"post",
	    data:form,
	    success: function(a,b,c){
	    	function_balance();
			$('#balanceDialog').dialog('close');
	    },
	    error: function(a,b,c){
	    	alert(a);
	    }
	});
}

function click_delete(obj){
	if(confirm("确认删除?")){
		var id = get_grid_row_id(obj);
		$.ajax({
		    url: "/finance/delBalance",
		    data:{id:id},
		    type:"post",
		    success: function(a,b,c){
		    	function_balance();
		    },
		    error: function(a,b,c){alert(a);}
		});
	}
}


function function_input_select(){
	$.fn.yiiGridView.update('finance-balance-grid',{
		 type:'POST',
		 url:$(this).attr('href'),
		 data:{pay_type:"input"}
	});
}

function function_output_select(){
	$.fn.yiiGridView.update('finance-balance-grid',{
		 type:'POST',
		 url:$(this).attr('href'),
		 data:{pay_type:"output"}
	});
}
