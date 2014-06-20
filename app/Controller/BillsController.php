<?php
	class BillsController extends AppController
	{
		public $name = "Bills";
		
		public function index($household){
			$this->checkForHouseHold($household);
			$this->set('household_id', $household);
			$this->set('Bills' , $this->Bill->getBills($household));
		}

		public function add($household){
			$this->checkForHouseHold($household);
			if ($this->request->is('post')) {
		  		$this->request->data['Bill']['Household_Id'] =  $household;
			    if ($this->Bill->save($this->request->data)) {
		    	    $this->Session->setFlash('The Bill has been added');
		        	$this->redirect(array('action' => 'index' , $household));
		    	} else {
		        	$this->Session->setFlash('Error Adding Bill. Please, try again.');
		    	}
		   }			
		}

		public function info($bill){
			$this->Bill->id = $bill;

		    if (!$this->Bill->exists()) {
		        $this->Session->setFlash('Invalid Bill');
		        $this->redirect(array('controller'=>'households'));
		    }


		}

		public function update($bill){
			$this->Bill->id = $bill;

		    if (!$this->Bill->exists()) {
		        $this->Session->setFlash('Invalid Bill');
		        $this->redirect(array('controller'=>'households'));
		    }

			if($bill === null || $bill == '')
				$this->redirect(array('controller'=>'households'));

			if ($this->request->is('post')) {
		    	if ($this->Bill->save($this->request->data)) {
	                $this->Session->setFlash('The Bill has been updated');
	                $this->redirect(array('action' => 'index' , $bill));
	            } else {
	                $this->Session->setFlash('The Bill could not be saved. Please, try again.');
	            }

			}else{
				$this->request->data = $this->Bill->read();
			}

		}

		public function remove($id){
			if ($this->request->is('get')) {
           		throw new MethodNotAllowedException();
       		}
			$bill = $this->Bill->setInactive($id);
			print_r($bill);
			$this->Bill->id=$id;
			if($this->Bill->save($bill)){
				$this->Session->setFlash('Bill Removed');
				$this->redirect(array('controller'=>'households'));
			}else{
				$this->Session->setFlash('There was an error removing the bill');
			}

			

			$this->Session->setFlash('Remove Bill');
		}

		private function checkForHouseHold($household){
			if($household == '' || $household == null){
				$this->Session->setFlash('Error Adding Bill. Please, try again.');
			}




		}		
	}
?>