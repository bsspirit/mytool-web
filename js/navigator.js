window.onload = navigatorHandler;
function navigatorHandler(){
	$.ajax({
	    url: "/website/JSONNavigator",
	    type:"get",
	    dataType:"jsonp",
        jsonp:"callback",
        jsonpCallback: "jsonpCallback",
	    success: function(a,b,c){},
	    error: function(a,b,c){}
	});
}

function jsonpCallback(obj){
	var navs=[];
	$.each(obj,function(k,v){
		var html = '<div class="nav" id="nav'+v.id+'">';
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
		navs[v.seq-1] = html;
	});
	
	$('.nav').remove();
	$.each(navs,function(k,v){
		$('#navigator').append(v);
	});
	
	fade_click();
}

function http_url(url){
	return "http://"+url;
}

function fade_click(){
	$('#navigator h1').each(function(idx){
		$(this).toggle(function(){
			$(this).next().fadeOut();
		},function(){
			$(this).next().fadeIn();
		});
	});
}

function add(){
	$('#dialogClassroom').dialog('open');
	render_add1();
}

function render_add1(url){
	url=(url!=null?url:'');
	var html = '<p>输入URL：<input type="text" name="url" class="i_text" value="http://'+url+'"/></p>';
		html += '<p><input type="button" value="提交" class="i_button" onclick="add1(this)"/></p>';
	$('#navigator_add_1').html(html);
}

function add1(){
	var url = $('#navigator_add_1 input[name="url"]').val();
	render_add2(url);
	$('#navigator_add_1').hide();
}

function render_add2(url){
	url=(url!=null?url:'');
	var html = '<p>网址：'+url+'&nbsp;&nbsp;<img src="/images/404.ico" class="icon"/></p>';
		html +='<p>分类：<input type="text" name="url_2" class="i_select"/></p>';
		html +='<p>标题：<input type="text" name="title_2" class="i_text"/></p>';
		html +='<p>截图：<br/>';
		html +='<img src="/images/404.png" width="480px"/>';
		html +='</p>';
		html +='<p>';
		html +='<input type="button" value="返回" class="i_button" onclick="back()"/>';
		html +='<input type="button" value="提交" class="i_button" onclick="add2()"/>';
		html +='</p>';
	$('#navigator_add_2').html(html);
	$('#navigator_add_2').show();
}

function back(){
	$('#navigator_add_1').show();
	$('#navigator_add_2').hide();
}

function add2(){
	navigatorHandler();
	$('#dialogClassroom').dialog('close');
}


