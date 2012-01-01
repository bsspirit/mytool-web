//1. init
//2. render
//3. action

window.onload = init();
var g={};


function init(){
	render_dialog();
	render_menu();
	render_wins();
	
}


function render_menu(){
	var url = "/website/JSONCatalog";
	$.getJSON(url,function(data){
		g['cats']=data;
		var obj = {
			cats:data,
			btns:[{"action":"add_website","label":"增加站点"},
			      {"action":"add_catalog","label":"增加分类"}]
		};
		
		var menu = new EJS({url:'/js/module/website/template/menu.ejs'}).render(obj);
		$('#menu').html(menu);
	});
}

function render_wins(cobj){
	cobj = (cobj==undefined)?{"id":"1","name":"常用站点"}:cobj;
	var url = "/website/JSONWins/cid/"+cobj.id;
	$.getJSON(url,function(data){
		var obj = {cat:cobj,wins:data};
		var html = new EJS({url:'/js/module/website/template/wins.ejs'}).render(obj);
		$('#navigator').html(html);
		hover_bar();
		render_click();
	});
}

function render_dialog(){
	$('#dialog').hide();
}

function render_add1(url){
	var obj = {'page':'add1'};
	var html = new EJS({url:'/js/module/website/template/dialog.ejs'}).render(obj);
	$('#dialog').html(html);
	$('#dialog').dialog({title:'增加网站-1','modal':true,'width':550,'height':200});
	$('#dialog').show();
}

function render_add2(dobj){
	var obj = {'page':'add2','obj':dobj, 'cats':g['cats']};
	var html = new EJS({url:'/js/module/website/template/dialog.ejs'}).render(obj);
	$('#dialog').html(html);
	$('#dialog').dialog({title:'增加网站-2','modal':true,'width':550,'height':600});
	$('#dialog').show();
}

function render_add3(dobj){
	var obj = {'page':'add3'};
	var html = new EJS({url:'/js/module/website/template/dialog.ejs'}).render(obj);
	$('#dialog').html(html);
	$('#dialog').dialog({title:'增加分类','modal':true,'width':400,'height':160});
	$('#dialog').show();
}

function render_edit(dobj){
	var obj = {'page':'edit','obj':dobj, 'cats':g['cats']};
	var html = new EJS({url:'/js/module/website/template/dialog.ejs'}).render(obj);
	$('#dialog').html(html);
	$('#dialog').dialog({title:'修改网站','modal':true,'width':550,'height':600});
	$('#dialog').show();
}


function render_click(){
	$('.win .open').each(function(){
		var obj = $(this);
		$(this).click(function(){
			$.ajax({
			    url: "/website/addClick/wid/"+obj.attr('wid'),
			    type:"get"
			});
			window.open(obj.attr('url'), '_blank');
		});
	});
}
