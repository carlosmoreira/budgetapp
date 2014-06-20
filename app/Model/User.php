<?php
class User extends AppModel {
	public $name = 'User';
	public $displayField = 'name';
	
	public $validate = array(
      'role'=>array(
                    
                ),
		'email'=>array(
			'Valid email'=>array(
				'rule'=>array('email'),
				'message'=>'Please enter a valid email address'
			)
		),
        'password'=>array(
            'Not Empty'=>array(
                'rule'=>'notEmpty',
                'message'=>'Please Enter A Password'
            ),
            'Match Passwords'=>array(
                'rule'=>'matchPasswords',
                'message'=>'Your Passwords do not match'
            )
        ),
        'password_confirmation'=>array(
            'Not Empty'=>array(
                'rule'=>'notEmpty',
                'message'=>'Please Confirm Password'
            )
        )
	);
        
        public function matchPasswords($data){
            if($data['password'] == $this->data['User']['password_confirmation']){
                return true;
            }
            $this->invalidate('password_confirmation', 'Your Passwords do not match');
            return false;
        }
        
        public function beforeSave($options = array()){
            if(isset($this->data['User']['password'])) {
                $this->data['User']['password'] = AuthComponent::password($this->data['User']['password']);
            }
            return true;
        }
}
?>
