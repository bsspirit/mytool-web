window.onload = init();

function init(){
	var menu = {btns:[
		['常用站点','normal'],
		['本地站点','local'], 
		['我的站点','my'], 
		['增加站点','add_site']
	]};
	
	var cat = {cats:[
		['常用站点','normal'],
		['本地站点','local'],
		['我的站点','my'],
	]};
	
	render_menu(menu);
	render_catelog(cat);
}

function render_menu(menu){
	var menu = new EJS({url:'/js/module/website/template/menu.ejs'}).render(menu);
	$('#menu').html(menu);
}

function render_catelog(cat){
	var cat = new EJS({url:'/js/module/website/template/catelog.ejs'}).render(cat);
	$('#navigator').html(cat);
}

