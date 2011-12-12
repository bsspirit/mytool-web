//window.onload = weatherHandler;
window.onload = weatherCallback;

function weatherHandler(){
	var	loc = 'CHXX0008';//china-weather-location
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

var data = {"query":{	"count":1,"created":"2011-12-11T02:42:41Z","lang":"en-US",	"results":{		"channel":{"title":"Yahoo! Weather - Beijing, CH","link":"http://us.rd.yahoo.com/dailynews/rss/weather/Beijing__CH/*http://weather.yahoo.com/forecast/CHXX0008_c.html","description":"Yahoo! Weather for Beijing, CH","language":"en-us","lastBuildDate":"Sun, 11 Dec 2011 10:00 am CST","ttl":"60","location":{"city":"Beijing","country":"CH","region":""},"units":{"distance":"km","pressure":"mb","speed":"km/h","temperature":"C"},"wind":{"chill":"6","direction":"0","speed":"3.22"},"atmosphere":{"humidity":"34","pressure":"1015.92","rising":"0","visibility":"9.99"},"astronomy":{"sunrise":"7:24 am","sunset":"4:47 pm"},"image":{"title":"Yahoo! Weather","width":"142","height":"18","link":"http://weather.yahoo.com","url":"http://l.yimg.com/a/i/brand/purplelogo//uh/us/news-wea.gif"},"item":{"title":"Conditions for Beijing, CH at 10:00 am CST","lat":"39.93","long":"116.28","link":"http://us.rd.yahoo.com/dailynews/rss/weather/Beijing__CH/*http://weather.yahoo.com/forecast/CHXX0008_c.html","pubDate":"Sun, 11 Dec 2011 10:00 am CST","condition":{"code":"34","date":"Sun, 11 Dec 2011 10:00 am CST","temp":"6","text":"Fair"},"description":"\n<img src=\"http://l.yimg.com/a/i/us/we/52/34.gif\"/><br />\n<b>Current Conditions:</b><br />\nFair, 6 C<BR />\n<BR /><b>Forecast:</b><BR />\nSun - Sunny. High: 8 Low: -5<br />\nMon - Sunny. High: 4 Low: -5<br />\n<br />\n<a href=\"http://us.rd.yahoo.com/dailynews/rss/weather/Beijing__CH/*http://weather.yahoo.com/forecast/CHXX0008_c.html\">Full Forecast at Yahoo! Weather</a><BR/><BR/>\n(provided by <a href=\"http://www.weather.com\" >The Weather Channel</a>)<br/>\n","forecast":[{"code":"32","date":"11 Dec 2011","day":"Sun","high":"8","low":"-5","text":"Sunny"},{"code":"32","date":"12 Dec 2011","day":"Mon","high":"4","low":"-5","text":"Sunny"}],"guid":{"isPermaLink":"false","content":"CHXX0008_2011_12_12_7_00_CST"}}}}}};

function weatherCallback () {
 	var today = new Date();
 	var results = data.query.results;
 	var item = results.channel.item;
    
    $('#city').html("北京("+item.lat+","+item.long+"), "+$.datepicker.formatDate('yy-mm-dd', today)+":");
    $('#icon').css({backgroundPosition: '-' + (61 * item.condition.code) + 'px 0'}).attr({title: item.condition.text});
    $('#icon2').append('<img src="http://l.yimg.com/a/i/us/we/52/' + item.condition.code + '.gif" width="34" height="34" title="' + item.condition.text + '" />');
    
    //$('#wxTemp').html(info.temp + '&deg;' + (u.toUpperCase()));
    
    $('#create_time').html("发布时间:"+item.pubDate);
};