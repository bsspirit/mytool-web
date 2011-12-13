//初始化对话框
window.onload=dictHandler;
function dictHandler(){
	$("#dict_dialog").hide();
	$.ajax({
	    url: "/dict/JSONTags",
	    type:"get",
	    dataType:"jsonp",
        jsonp:"callback",
        jsonpCallback: "function_dist_tag",
	    success: function(a,b,c){},
	    error: function(a,b,c){}
	});
}

function function_dist_tag(obj){
	var tags_arr = [];
	var html =  '<div id="dict">'
	$.each(obj,function(k,v){
		html += '<div id="'+v.id+'" class="tag view">';
		html += '<div class="title">';
		html += '<span class="name w200">'+v.name+'</span>';
		html += '<a href="javascript:void(0);" onclick="click_dict_tagword_add(this)"><span class="act">add</span></a>';
		html += '</div>'
		html += '<ul id="'+v.id+'_words" class="words">';
		html += '</ul>';
		html += '<div class="c"></div>';
		html += '</div>';
		
		tags_arr.push(v.id);
	});
	html += '</div>';
	$('#desktop').html(html);
	
	$.each(tags_arr,function(k,v){
		getDictWords(v);
	})
}

function getDictWords(tag){
	var url = "/dict/jSONWordsByTag/tid/"+tag;
	$.getJSON(url,function(data){
		var html='';
		$.each(data,function(k,v){
			html += '<li>'+v.word+'</li>';
		});
		$('#'+tag+'_words').html(html);
	});
}

function function_dist_tag_words(obj){
	
}

function click_dict_tagword_add(tag){
	
}