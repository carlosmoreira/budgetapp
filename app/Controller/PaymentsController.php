<?php

/**
* 
*/
class PaymentsController extends AppController
{
	public $name = 'Payments';
	
	public function billpay(){
		if ($this->request->is('post')) {
			$data = $this->request->data;
			$bills = $this->Payment->billPay($data); //Created if need for filtering
			
			$this->set('bills', $this->Payment->billPay($bills)); //Used for debugging
			$household_id = $data['household_id'];
			$this->Payment->saveMany($bills['bill']);
			$this->redirect(array('controller'=>'Bills', 'action'=>'index', $household_id));
			

		} 
	}
}
	
?>