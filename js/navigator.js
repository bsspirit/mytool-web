function jsonpCallback(obj){

	var navs='';
	$.each(obj,function(k,v){
		var html = '<div class="nav">';
		html +='<h1>'+v.name+'</h1>';
		html +='<ul>';
		
		$.each(v.pages,function(k1,v1){
			html +='<li>';
			html +='<a href="'+http_url(v1.url)+'" target="_blank">';
			html +='<img src="'+v1.image+'" class="preview"/>';
			html +='</a>';
			html +='<div class="info">';
			if(v1.icon != null){
				html +='<img src="'+v1.icon+'" class="icon"/>';
			}
			html +='<a href="'+http_url(v1.url)+'" target="_blank">';
			html +='<span class="title">'+v1.title+'</span>';
			html +='</a>';
			html +='<br/>';
			html +='<a href="'+http_url(v1.url)+'" target="_blank">';
			html +='<span class="url">'+v1.url+'</span>';
			html +='</a>';
			html +='</div>';
			html +='</li>';
		});
		
		html +='</ul>';
		html +='<div class="c"></div>';
		html +='</div>';
		navs += html;
	});
	
	$('#navigator').html(navs);
}

function http_url(url){
	return "http://"+url;
}