<?php
	class Household extends AppModel{
		public $name = 'Household';

		public $validate  = array(
			'name'=> array(
				'Valid Household Name'=> array(
					'rule' => array('required'),
					'message' => 'Please Enter a Household Name'
				)
			)

		);

		public function get(){
			$user = CakeSession::read('Auth.User');
			$conditions = array('User_Id' => $user['Id']);
			return $this->find('all', array('conditions' => $conditions));
		}
	}//End Class
?>