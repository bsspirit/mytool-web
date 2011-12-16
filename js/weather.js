//window.onload = weatherHandler();

function weatherHandler(code){
	var	loc = 'CHXX0008';//china-weather-location
	if(code!=undefined && code!=null && code.length>0){
		loc = code;
	}
    var u = 'c';// units (f or c)

    var query = "SELECT * FROM weather.forecast WHERE location='" + loc + "' AND u='" + u + "'";
    var cacheBuster = Math.floor((new Date().getTime()) / 1200 / 1000);
    var url = 'http://query.yahooapis.com/v1/public/yql?q=' + encodeURIComponent(query) + '&format=json&_nocache=' + cacheBuster;

	$.ajax({
        url: url,
        dataType: 'jsonp',
        cache: true,
        jsonpCallback: 'weatherCallback'
    });
}

function weatherCallback (data) {
 	var today = new Date();
 	var results = data.query.results;
 	var item = results.channel.item;
 	var location = results.channel.location;
 	var link = results.channel.link;
 	
 	var txt = '<div class="current">';
 		txt += '<div class="loc">'+location.city+'&nbsp;&nbsp;<span class="red">'+item.condition.temp+'°C</span></div>';
 		txt += '<div class="info">('+item.lat+','+item.long+'),&nbsp;&nbsp;'+item.condition.text;
 		txt += '</div>';
 		txt += '</div>';
 		txt += '<div class="future">';
 		txt += '<ul>';
 		$.each(item.forecast,function(k,v){
 			txt += '<li>'+$.datepicker.formatDate('yy-mm-dd', new Date(v.date));
 			txt += ',&nbsp;&nbsp;'+v.day;
 			txt += ',&nbsp;&nbsp;'+v.text;
 			txt += ',&nbsp;&nbsp;'+v.high+'°C|'+v.low+'°C</li>';
 		});
 		txt += '</ul>';
 		txt += '</div>';
 		txt += '<div class="addr">';
 		txt += '<ul>';
 		txt += '<li><a href="javascript:void(0);" onclick=weatherHandler("CHXX0008")>Beijing</a></li>';
 		txt += '<li><a href="javascript:void(0);" onclick=weatherHandler("CHXX0116")>ShangHai</a></li>';
 		txt += '<li><a href="javascript:void(0);" onclick=weatherHandler("CHXX0037")>GuangZhou</a></li>';
 		txt += '<li><a href="javascript:void(0);" onclick=weatherHandler("CHXX0017")>ChongQing</a></li>';
 		txt += '</ul>';
 		txt += '</div>';
 		txt += '<div class="version">';
 		txt += 'Power by <a target="_blank" href="'+link.substring(link.charAt('*'))+'">Yahoo Weather</a>.';
 		txt += '</div>';	
 		
 	$('#weather').html(txt);
};