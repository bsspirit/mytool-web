function function_balance(){
	alert("aa");
}

//日记账增加
function function_balance_add(){
	var html = '支付日期：<input type="text" name="date" class="w200" /><br/>';
		html += '支付金额：<input type="text" name="money" class="w200" /><br/>';
		html += '收支类型：<input type="text" name="type" class="w200" /><br/>';
		html += '支付方式：<input type="text" name="model" class="w200" /><br/>';
		html += '我的备注：<br/><textarea name="description" class="w300 h100" /><br/>';
		html += '<input type="button" value="提交" class="w80" onclick="submit_add1(this)"/><br/>';
	
	$('#function_balance_add').html(html);
	$('#balanceDialog').dialog('open');
}


