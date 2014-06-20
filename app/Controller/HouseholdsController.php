<?php
	class HouseholdsController extends AppController{
		public $name = "Households";
		public $User_Id;

		
		public function index(){
			$this->set('households', $this->Household->get());
		}

		public function add(){
		  if ($this->request->is('post')) {
		  		$this->request->data['Household']['User_Id'] =  $this->Auth->user('Id');
			    if ($this->Household->save($this->request->data)) {
		    	    $this->Session->setFlash('The Household has been added');
		        	$this->redirect(array('action' => 'index'));
		    	} else {
		        	$this->Session->setFlash('The user could not be saved. Please, try again.');
		    	}
		   }
		}

		public function delete(){}

		public function update($id){
			$this->Household->id = $id;
			if (!$this->Household->exists()) {
		        $this->Session->setFlash('Invalid Household');
		        $this->redirect(array('controller'=>'households'));
		    }

		    if($this->request->is('post')){
		    	if($this->Household->save($this->request->data)){
		    		$this->Session->setFlash('The Household has been Updated');
		        	$this->redirect(array('action' => 'index'));
		    	}
		    }else{
		    	$this->request->data = $this->Household->read();
		    }

		}


	}
?>