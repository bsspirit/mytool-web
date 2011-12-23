function click_menu(obj){
	var tmp = $(obj);
	var o = {"id":tmp.attr('mid'), "name":tmp.attr('title')}
	render_wins(o);
}

function click_btn(obj){
	var tmp = $(obj);
	switch(tmp.attr('action')){
	case 'add_website':
		render_add1();
		break;
	case 'add_catalog':
		render_add3();
		break;
	}
}

function hover_bar(){
	$('#navigator .bar').each(function(idx){
		var bar = $(this);
		bar.hide();
		
		$(this).parent().hover(function(){
			bar.show();
		},function(){
			bar.hide();
		});
	});
}

function click_fade(){
	$('#navigator h1').each(function(idx){
		$(this).toggle(function(){
			$(this).next().fadeOut();
		},function(){
			$(this).next().fadeIn();
		});
	});
}

function click_back(){
	render_add1();
}

function click_update(id){
	var url ="/website/JSON/"+id;
	$.ajax({
	    url: url,
	    type:"get",
	    dataType:"jsonp",
        jsonp:"callback",
        jsonpCallback: "render_edit"
	});
}

function submit_add1(){
	var url = $('#navigator_add1 input[name="url"]').val();
	$.ajax({
	    url: "/website/JSONWebsite",
	    data:{"url":url},
	    type:"get",
	    dataType:"jsonp",
        jsonp:"callback",
        jsonpCallback: "render_add2"
	});
}

function submit_add2(){
	var form = {};
	$('#navigator_add2 :input').each(function(k,v){
	 	form[v.name]=v.value;
	});
	
	$.ajax({
	    url: "/website/postSave",
	    type:"post",
	    data:form,
	    success: function(a,b,c){
	    	render_wins();
	    	$('#dialog').dialog('close');
	    	$('#dialog').hide();
	    },
	    error: function(a,b,c){
	    	alert(a);
	    }
	});
}

function submit_delete(id){
	if(confirm("确认删除?")){
		$.ajax({
		    url: "/website/postDel",
		    data:{id:id},
		    type:"post",
		    success: function(a,b,c){
		    	render_wins();
		    },
		    error: function(a,b,c){
		    	alert(a);
		    }
		});
	}
}

function submit_add3(){
	var form = {};
	$('#catalog_add :input').each(function(k,v){
	 	form[v.name]=v.value;
	});
	
	$.ajax({
	    url: "/website/postSaveCatalog",
	    type:"post",
	    data:form,
	    success: function(a,b,c){
	    	render_menu();
	    	$('#dialog').dialog('close');
	    	$('#dialog').hide();
	    },
	    error: function(a,b,c){
	    	alert(a);
	    }
	});
}

function submit_update(){
	var form = {};
	$('#navigator_edit :input').each(function(k,v){
	 	form[v.name]=v.value;
	});
	
	$.ajax({
	    url: "/website/postSave",
	    type:"post",
	    data:form,
	    success: function(a,b,c){
	    	render_wins();
	    	$('#dialog').dialog('close');
	    	$('#dialog').hide();
	    },
	    error: function(a,b,c){
	    	alert(a);
	    }
	});
}