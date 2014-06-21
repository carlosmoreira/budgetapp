<?php

/**
* 
*/
class Payment extends AppModel
{
	
	public $name = 'Payment';

	public function billPay($_bills){
		foreach($_bills['bill'] as &$bill){
			$bill['paydate'] = '2014-06-21';
		}			
		return $_bills;
	}
	
}

?>