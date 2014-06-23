<?php

/**
* 
*/
class Payment extends AppModel
{
	
	public $name = 'Payment';

	public function billPay($_bills){
		
		foreach($_bills['bill'] as &$bill){
			$bill['paydate'] = date('Y').'-'.date('m').'-'.date('d');
		}			
		return $_bills;
	}
	
}

?>