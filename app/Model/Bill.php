<?php 
	/**
	* 
	*/
	class Bill extends AppModel
	{
		public $name = 'Bill';
		public $validate  = array(
			'name'=> array(
				'Valid Bill Name'=> array(
					'rule' => array('required'),
					'message' => 'Please Enter a Bill'
				)
			)

		);
		/*getBills
			Parameter 1 - HouseHold Id
			Gets All Bills for a current household
			Checks for the current YEAR and MONTH and ACTIVE BILL
			Queries for selection
			Example of Final Query - 
			----
				SELECT `payments`.*, `Bill`.* FROM `budget_app`.`bills` AS `Bill` 
				LEFT JOIN `budget_app`.`payments` 
					ON (`Bill`.`Id` = `payments`.`Bill_Id` AND `payments`.`paydate` like '2014-06-%') 
				WHERE `Household_Id` = 1 AND `bill`.`active` = '1'
			----
		*/
		public function getBills($houshold){
			$date = array('y'=>date('Y'), 'm'=>date('m'));
			$options['conditions'] = array( 
				'Household_Id' => $houshold, 
				'bill.active'=>'1'//,
				//'payments.paydate like'=>$date['y'].'-'.$date['m'].'-%'
				);
			$options['fields'] = array('payments.*', 'Bill.*');
			$options['joins'] = array(
			    array('table' => 'payments',
			        'type' => 'LEFT',
			        'conditions' => array(
			            'Bill.Id = payments.Bill_Id',
			            'payments.paydate like \''.$date['y'].'-'.$date['m'].'-%\'' 

			        )
			    )
			);
			return $this->find('all', $options);
		}

		public function setInactive($id){
			return array('active' => 0);
		}
		
	}
 ?>
