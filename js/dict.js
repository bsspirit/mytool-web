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
	var html =  '<div id="dict">';
	$.each(obj,function(k,v){
		html += '<div id="'+v.id+'" class="tag view">';
		html += '<div class="title">';
		html += '<span class="name w200">'+v.name+'</span>';
		html += '<a href="javascript:void(0);" onclick="click_dict_tagword_add('+v.id+')"><span class="act">Add</span></a>';
		html += '<a href="javascript:void(0);" onclick="click_dict_tagword_cancel('+v.id+')"><span class="act">Cancel</span></a>';
		html += '<form id="form_dict_'+v.id+'" class="form">'
		html += '<input type="text" class="w100" name="dict_word"/>';
		html += '<a href="javascript:void(0);" onclick="submit_dict_tagword_add('+v.id+')"><span class="act">Add</span></a>';
		html += '<a href="javascript:void(0);" onclick="submit_dict_tagword_del('+v.id+')"><span class="act">Delete</span></a>';
		html += '<input type="hidden" name="dict_tag" value="'+v.id+'"/>';
		html += '</form>';
		html += '</div>';
		html += '<ul id="'+v.id+'_words" class="words"></ul>';
		html += '<div class="c"></div>';
		html += '</div>';
		tags_arr.push(v.id);
	});
	html += '</div>';
	$('#desktop').html(html);
	
	$.each(tags_arr,function(k,v){
		getDictWords(v);
		$('#form_dict_'+v).hide();
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
		
		$('#'+tag+'_words li').dblclick(function(){
			var txt = $(this).text();
			var aa = $('#form_dict_'+tag +' input[name="dict_word"]').val(txt);
			$('#form_dict_'+tag).show();
		});
		
	});
}

function function_dist_tag_words(obj){
	
}

function click_dict_tagword_add(tag){
	$('#form_dict_'+tag).show();
}

function click_dict_tagword_cancel(tag){
	$('#form_dict_'+tag).hide();
}

function submit_dict_tagword_add(tag){
	var form = {};
	$('#form_dict_'+tag+' :input').each(function(k,v){
	 	form[v.name]=v.value;
	});
	$.ajax({
	    url: "/dict/addTagWord",
	    type:"post",
	    data:form,
	    success: function(a,b,c){
	    	getDictWords(tag);
	    },
	    error: function(a,b,c){
	    	alert('服务器出錯了。');
	    }
	});
}

function submit_dict_tagword_del(tag){
	var form = {};
	$('#form_dict_'+tag+' :input').each(function(k,v){
	 	form[v.name]=v.value;
	});
	$.ajax({
	    url: "/dict/delTagWord",
	    type:"post",
	    data:form,
	    success: function(a,b,c){
	    	getDictWords(tag);
	    },
	    error: function(a,b,c){
	    	alert('服务器出錯了。');
	    }
	});
}