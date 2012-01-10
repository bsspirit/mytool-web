//1. init
//2. render
//3. action

window.onload = init();
var g={};

function init(){
	render_menu();
	render_tags();
}

function render_menu(){
	var url = "/dict/JSONTags";
	$.getJSON(url,function(data){
		g['cats']=data;
		var obj = {
			cats:data,
			btns:[{"action":"add_website","label":"增加标签"}]
		};
		
		var menu = new EJS({url:'/js/module/dict/template/menu.ejs'}).render(obj);
		$('#menu').html(menu);
	});
}

function render_mean(obj){
	var html = '<input type="q" value="'+obj.query+'" class="w400"/>';
	html += '<input type="button" value="查询"/>'
	$('#mean').html(html);
}

function render_tags(tobj){
	tobj = (tobj==undefined)?{"id":"1","name":"dict"}:tobj;
	var url = "/dict/JSONWordsByTag/tid/"+tobj.id;
	$.getJSON(url,function(data){
		var obj = {tag:tobj,words:data};
		var html = new EJS({url:'/js/module/dict/template/box.ejs?a=0'}).render(obj);
		$('#dict').html(html);	
		render_dbclick(tobj.id);
		render_click();
	});
}

function render_dbclick(tag){
	$('.words li').dblclick(function(){
		var txt = $(this).text();
		var aa = $('#form_dict_'+tag +' input[name="dict_word"]').val(txt);
		$('#form_dict_'+tag).show();
	});
}

function render_click(){
	$('.words li').click(function(){
		var txt = $(this).text();
		click_word(txt);
	});
}