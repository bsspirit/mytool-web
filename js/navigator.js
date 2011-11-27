/*
window.onload = init;

function init() {
	//var interval = setInterval(handleRefresh, 3000);
	handleRefresh();
}

function handleRefresh(){
	console.log("here");
	$.ajax({
	    url: "http://loc.tao6s.com/website/JSONNavigator",
	    type:"get",
	    dataType:"jsonp",
        jsonp:"callback",
        jsonpCallback: "jsonpCallback",
	    success: function(a,b,c) {
	       console.log("s-a:"+a);
	       console.log("s-b:"+b);
	       console.log("s-c:"+c);
	    },
	    error: function(a,b,c) {
	       console.log("errror-a:"+a);
	       console.log("errror-b:"+b);
	       console.log("errror-c:"+c);
	    },
	    complete:function(a,b){
	    	console.log("complete-a:"+a);
	        console.log("complete-b:"+b);
	    }
	});
}
*/

function jsonpCallback(obj){
	alert(obj[0].x);
}