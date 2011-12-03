<?php
class FinanceUtil{
	
	public static function fen2Yuan($fen){
		return substr($fen,0,-2).'.'.substr($fen,-2);
	}
	
	public static function yuan2Fen($yuan){
		return str_replace(".","",$yuan);
	}
	
	public static function pay_type($type){
		$str='';
		switch($type){
			case 'input':$str="收入";break;
			case 'output':$str="支出";break;
		}
		return $str;
	}
	
	public static function pay_mode($mode){
		$str='';
		switch($mode){
			case 'cash':$str="现金";break;
			case 'visa':$str="信用卡";break;
		}
		return $str;
	}
	
}

?>