function function_balance(){
	alert("aa");
}

//日记账增加
function function_balance_add(){
	var html = '支付日期：<input id="balance_date" type="text" name="date" class="w200" /><br/>';
		html += '支付金额：<input type="text" name="money" class="w200" /><br/>';
		html += '收支类型：<input type="text" name="type" class="w200" /><br/>';
		html += '支付方式：<input type="text" name="model" class="w200" /><br/>';
		html += '我的备注：<br/><textarea name="description" class="w300 h100" /><br/>';
		html += '<input type="button" value="提交" class="w80" onclick="submit_add(this)"/><br/>';
	
	$('#function_balance_add').html(html);
	$('#balance_date').datepicker({dateFormat:'yy-mm-dd'});
	$('#balanceDialog').dialog('open');
	
	
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

