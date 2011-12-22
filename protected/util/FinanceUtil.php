<?php
class FinanceUtil{
	
	public static $balance_pay_type = array(
		array("id"=>"output","name"=>"支出"),
		array("id"=>"input","name"=>"收入"),
		array("id"=>"borrow","name"=>"借"),
		array("id"=>"repay","name"=>"还"),
	);
	
	public static $balance_pay_mode = array(
		array("id"=>"cash","name"=>"现金"),
		array("id"=>"visa","name"=>"信用卡"),
	);
	
	public static function fen2Yuan($fen){
		return substr($fen,0,-2).'.'.substr($fen,-2);
	}
	
	public static function yuan2Fen($yuan){
		return str_replace(".","",$yuan);
	}
	
	public static function int2Date($date){
		return substr($date,0,4).'-'.substr($date,4,2).'-'.substr($date,6);
	}
	
	public static function pay_type($type){
		$str='';
		foreach(FinanceUtil::$balance_pay_type as $pay){
			if($pay["id"] == $type){
				$str=$pay["name"];
			}
		}
		return $str;
	}
	
	public static function pay_mode($mode){
		$str='';
		foreach(FinanceUtil::$balance_pay_mode as $pay){
			if($pay["id"] == $mode){
				$str=$pay["name"];
			}
		}
		return $str;
	}
	
}

?>