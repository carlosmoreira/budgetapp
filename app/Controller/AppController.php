<?php

class AppController extends Controller {
    
    public function __construct($request = null, $response = null) {
        parent::__construct($request, $response);
        
        $url = explode('/', $_SERVER["REQUEST_URI"]);
        $this->set('url_id' , $url[sizeof($url)-1]);  
        $this->set('logged_in', false);

    }
    
    public $components = array(
        'Session',
        'Auth' => array(
            'LoginRedirect' => array('controller' => 'users', 'action' => 'index'),
            'LogoutRedirect' => array('controller' => 'users', 'action' => 'index'),
            'authError' => "You cant acess that page",
            'authorize' => array('Controller'),
            'authenticate' => array(
         	   'Form' => array(
            	    'fields' => array('username' => 'email',
            	    				  'password' => 'password')
            	)
        	)
        )
    );

    public function isAuthorized($user) {
       
        // Only admins can access admin functions
        if (isset($this->request->params['admin'])) {
            $adminTest = (bool) ($user['role'] === 'admin');
            if(!$adminTest){
                $this->Session->setFlash("Only Admin Access");
            }
            return $adminTest;
        }
        return true;
    }

    public function getUser(){
        $user = $this->Auth->user(); 
        return ($user != null) ? $user : null;
    }

    public function beforeFilter() {
        $this->set('logged_in', $this->Auth->loggedIn());
        $this->set('current_user', $this->Auth->user());
    }



}
