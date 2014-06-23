<?php 
	 class DateHelper{
		

		public static function getDate($type){
			
		}

		public function getCurrentMonth($format){
			// (f) full textual representation
			// (m) numeric number 1-12 /w leading zeroes
			// (M) short text representation
		 	return date($format);
		}

		public function getDayOfMonth(){
			return date('d');
		}
	}
 ?>