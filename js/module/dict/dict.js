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

function render_tags(tobj){
	tobj = (tobj==undefined)?{"id":"1","name":"dict"}:tobj;
	var url = "/dict/jSONWordsByTag/tid/"+tobj.id;
	$.getJSON(url,function(data){
		var obj = {tag:tobj,words:data};
		var html = new EJS({url:'/js/module/dict/template/box.ejs'}).render(obj);
		$('#dict').html(html);	
		
		render_dbclick(tobj.id);
	});
	
	
}

function render_dbclick(tag){
	$('.words li').dblclick(function(){
		var txt = $(this).text();
		var aa = $('#form_dict_'+tag +' input[name="dict_word"]').val(txt);
		$('#form_dict_'+tag).show();
	});
}