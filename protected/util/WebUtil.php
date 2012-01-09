<?php

class WebUtil{
	
	public function jsonp($json){
		return isset($_GET['callback'])?($_GET['callback']. "(". CJSON::encode($json) .")"):CJSON::encode($json);
	}
	
}

?>