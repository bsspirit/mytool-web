window.onload = init();

function init(){
	render_menu();
	render_wins();
}


function render_menu(){
	var url = "/website/JSONCatalog";
	$.getJSON(url,function(data){
		var obj = {
			cats:data,
			btns:[{"action":"add","label":"增加站点"}]
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
		var html = new EJS({url:'/js/module/website/template/final.ejs'}).render(obj);
		$('#navigator').html(html);
		hover_bar();
	});
}

//
//function render_catelog(obj){
//	var cat = {cats:obj};
//	var html = new EJS({url:'/js/module/website/template/catelog.ejs'}).render(cat);
//	$('#navigator').html(html);
//	
//	$.each(obj,function(k,v){
//		var url = "/website/JSONWins/cid/"+v.id;
//		$.getJSON(url,function(data){
//			var tmp1 = {wins:data};
//			var win = new EJS({url:'/js/module/website/template/wins.ejs'}).render(tmp1);
//			$('#nav'+v.id).append(win);
//			$('#nav'+v.id).append('<div class="c"></div>');
//			hover_bar();
//		});
//	});
//	click_fade();
//}

