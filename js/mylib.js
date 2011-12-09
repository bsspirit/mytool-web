//======Ajax ===================


//======Form==================
function render_form(form,g){
	for(var prop in form){
		switch(prop){
			case 'list':
				$.each(form[prop],function(k,v){
					$.getJSON(v.url,function(obj){
					    render_form_list(obj,v.id,v.label,v.css);
					});
				});
				break;
			case 'date':
				$.each(form[prop],function(k,v){
					render_form_date(v.id,v.label,v.css);
				});
				break;
			case 'input':
				$.each(form[prop],function(k,v){
					render_form_input(v.id,v.label,v.css,v.layout);
				});
				break;
			case 'area':
				$.each(form[prop],function(k,v){
					render_form_area(v.id,v.label,v.css,v.layout);
				});
				break;
			case 'editor':
				$.each(form[prop],function(k,v){
					render_form_editor(v.id,v.label,v.css,v.layout,g);
				});
				break;
			case 'button':
				$.each(form[prop],function(k,v){
					render_form_button(v.id,v.label,v.css,v.onclick);
				});
				break;
		}
	}
}

//======Input=====================
function render_form_input(id,label,css,layout){
	var name=id;
	var value = ($('#'+id).attr('value')!=undefined)?value=$('#'+id).attr('value'):''; 
	if(css==undefined){css="w200";}
	var row = (layout!=undefined?(layout.row==2?'<br/>':''):'');
	
	var id_rad = id+'_'+getRandom(100);
	var txt = label+':&nbsp;'+row+'<input id="'+id_rad+'" type="text" name="'+name+'" class="'+css+'" value="'+value+'" />';
	$('#'+id).html(txt);
}

//======Areatext========================
function render_form_area(id,label,css,layout){
	var name=id;
	if(css==undefined){css="w200";}
	var value = ($('#'+id).attr('value')!=undefined)?value=$('#'+id).attr('value'):'';
	var row = (layout!=undefined?(layout.row==2?'<br/>':''):'');
	
	var id_rad = id+'_'+getRandom(100);
	var txt = label+':&nbsp;'+row+'<textarea id="'+id_rad+'" name="'+name+'" class="'+css+'" >'+value+'</textarea>';
	$('#'+id).html(txt);
}

//======Editor========================
function render_form_editor(id,label,css,layout,g){
	var name=id;
	var row = (layout!=undefined?(layout.row==2?'<br/>':''):'');
	if(css==undefined){css="w200";}
	
	var id_rad = id+'_'+getRandom(100);
	var txt = label+':&nbsp;'+row;
		txt +='<textarea id="'+id_rad+'" name="'+name+'" class="'+css+'"></textarea>';
	$('#'+id).html(txt);
	
	g['editor'][0] = KindEditor.create('textarea[#'+id_rad+']', {
		uploadJson : '/blog/uploadImage',
		fileManagerJson : 'manager',
		allowFileManager : false,
		width:700,
		height:350
	});
}

//======Date======================
function render_form_date(id,label,css,layout){
	var name=id;
	if(css==undefined){css="w200";}
	
	var value = new Date(); 
	try{
		if($('#'+id).attr('value')!=undefined){
			var d = $.datepicker.parseDate('yymmdd', $('#'+id).attr('value'));
			value = $.datepicker.formatDate('yy-mm-dd', d);
		}
	}catch(err){
		//transform cast error
	}
	var row = (layout!=undefined?(layout.row==2?'<br/>':''):'');
	var id_rad = id+'_'+getRandom(100);
	var txt = label+':&nbsp;'+row+'<input id="'+id_rad+'" type="text" name="'+name+'" class="'+css+'" value="'+value+'" />';
	$('#'+id).html(txt);
	
	$('#'+id_rad).datepicker({dateFormat:'yy-mm-dd'});
	$('#'+id_rad).datepicker('setDate', value);
}


//======Drop Down List =========
function render_form_list(obj,id,label,css,layout){
	var name=id;
	if(css==undefined){css="w200";}
	var value = ($('#'+id).attr('value')!=undefined)?value=$('#'+id).attr('value'):'';
	var row = (layout!=undefined?(layout.row==2?'<br/>':''):'');
	
	var	txt= label+':&nbsp;'+row+'<select name="'+name+'" class="'+css+'">';
		$.each(obj, function(key, val) {
	    	txt+='<option value="'+val.id+'" '+(value==val.id?'selected="selected"':'')+'>'+val.name+'</option>';
	  	});
		txt+='</select>';
	$('#'+id).html(txt);
}

//=======Button================
function render_form_button(id,label,css,onclick){
	var id_rad = id+'_'+getRandom(100);
	if(onclick==undefined){
		onclick = $('#'+id).attr('onclick')!=undefined?$('#'+id).attr('onclick'):'';
	}
	var txt = '<input id="'+id_rad+'" type="button" value="'+label+'" class="'+css+'" onclick="'+onclick+'"/>';
	$('#'+id).html(txt);
}

//=======Grid======================
function get_grid_row_id(grid_button){
	return $(grid_button).parent().parent().children(':first-child').text();
}


//=======Util ========================
function getRandom(n){
	return Math.floor(Math.random()*n+1)
}

function http_url(url,https){
	var protocol = "http";
	if(https!='undefined' && https=='https'){
		protocol = "https";
	}
	return protocol+"://"+url;
}

//=========Date========================