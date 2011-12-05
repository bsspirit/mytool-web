function function_balance(){
	alert("aa");
}

//日记账增加
function function_balance_add(){
	var html =  '<div id="balance_money"></div>';
		html += '<div id="balance_date"></div>';
		html += '<div id="balance_type"></div>';
		html += '<div id="balance_mode"></div>';
		html += '<div id="balance_description"></div>';
		html += '<input type="button" value="提交" class="w80" onclick="submit_add(this)"/><br/>';
	
	$('#function_balance_add').html(html);
	render_page_form();
	$('#balanceDialog').dialog('open');
}

function render_page_form(){
	var form = {
		input:[{id:"balance_money",label:"支付金额"}],
		area:[{id:"balance_description",label:"我的备注",css:"w300 h100"}],
		date:[{id:"balance_date",label:"支付日期"}],
		list:[{
			url:"/finance/JSONBalanceType",
			data:{},
			id:"balance_type",
			label:"收支类型"
		},{
			url:"/finance/JSONBalanceMode",
			data:{},
			id:"balance_mode",
			label:"支付方式"
		}]
	}
	
	render_form(form);
}

function submit_add(){
	var form = {};
	$('#function_balance_add :input').each(function(k,v){
	 	form[v.name]=v.value;
	});
	$.ajax({
	    url: "/finance/addBalance",
	    type:"post",
	    data:form,
	    success: function(a,b,c){
	    	balance();
			$('#balanceDialog').dialog('close');
	    },
	    error: function(a,b,c){
	    	alert(a);
	    }
	});
}
function balance(){
}
