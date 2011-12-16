window.onload = jsonHandler;

function jsonHandler(){
	var json = '{"distance": "km","pressure": "mb", "speed": "km/h", "temperature": "C"}';
	var html = '<textarea class="rawjson">'+json+'</textarea>';
		html+= '<input type="button" value="格式化" onclick="json_format()"/>';
		html+= '<div class="canvas"></div>'
	$('#jsonFormat').html(html);
}

function json_format(){
	var json = $('#jsonFormat .rawjson').html();
	try{
		if(json == "") json = "\"\"";
 		var obj = eval("["+json+"]");
 		$("#jsonFormat .canvas").html(json);
 	}catch(e){
 		alert("JSON is not well formated:\n"+e.message);
 		$("#jsonFormat .canvas").html("");
 	} 
	
}