window.onload = jsonHandler();
$('#jsonFormat').hide();

$("#click_json").toggle(function(){
	$('#jsonFormat').fadeIn();
},function(){
	$('#jsonFormat').fadeOut();
});

function jsonHandler(){
	var json = '{"distance": "k121m","distance2": {"km":"anb","km2":"anb"},"pressure": "mb", "speed": "km/h", "temperature": "C"}';
	var html = '<textarea class="rawjson">'+json+'</textarea>';
		html+= '<input type="button" value="格式化" onclick="json_format()"/>';
		html+= '<div class="canvas"></div>'
	$('#jsonFormat').html(html);
}

function json_format(){
	var json = $('#jsonFormat .rawjson').val();
	try{
		if(json == "") json = "\"\"";
 		var obj = eval("["+json+"]");
 		//$("#jsonFormat .canvas").html(json);
 		
 		var html = json_obj(obj[0]);		
 		$("#jsonFormat .canvas").html(html);
 		
 	}catch(e){
 		alert("JSON is not well formated:\n"+e.message);
 		$("#jsonFormat .canvas").html("");
 	} 
}

function json_obj(obj){
	var txt = json_loop(obj,1);
	var comma = txt.lastIndexOf(',');
 	return txt.substring(0,comma)+txt.substring(comma+1);
}

function json_loop(obj,idx){
	var output="{<br/>";
	$.each(obj,function(k,v){
		if(typeof(v) == 'object'){
			output += json_deep(idx)+style_prop(k)+":";
			output += json_loop(v,++idx);
			--idx;
		} else {
			output += json_deep(idx)+style_prop(k)+":"+style_val(v)+",<br/>";
		}
 	});
 	
 	var comma = output.lastIndexOf(',');
 	output = output.substring(0,comma)+output.substring(comma+1);
 	output += json_deep(idx-1)+"},<br/>";
 	return output;
}

function json_deep(idx){
	var space = "";
	for(var i=0;i<idx;i++){
		space += "&nbsp;&nbsp;&nbsp;&nbsp;";
	}
	return space;
}

function style_prop(k){
	return '<span class="prop">\"'+k+'\"</span>';
}

function style_val(v){
	var val= "";
	if(typeof(v) == 'string'){
		val='<span class="str">\"'+v+'\"</span>';
	} else if (typeof(v) == 'number'){
		val='<span class="num">'+v+'</span>';
	} else if (typeof(v) == 'boolean'){
		val='<span class="bool">'+v+'</span>';
	}
	return val;
}