<?php

class UsersController extends AppController {

    public $name = 'Users';

    public function beforeFilter() {
        $this->Auth->allow('index', 'add');
        parent::beforeFilter();
    }

    
    public function admin_index(){
        $this->User->recursive = 0;
        $this->set('users', $this->User->find('all'));
    }
    
    public function admin_dashboard() {
        $title_for_layout = 'Dashbord';
        $this->set(compact('title_for_layout'));
    }

    public function admin_login() {
        if ($this->request->is('post')) {
            if ($this->Auth->login()) {
                $this->redirect($this->Auth->redirect());
            } else {
                $this->Session->setFlash("Your user combo is incorrect");
            }
        }
    }

    public function admin_logout() {
       
       $this->redirect(array('controller'=>'users', 'action'=>'login', 'admin'=>false));
       
    }
    /*
     * Checks where to send a user once logging in
     * 
     * if reg user takes them to user dash
     * 
     * if admin takes them to admin dashboard
     * 
     */
    public function login() {
        if ($this->request->is('post')) {
            if ($this->Auth->login()) {
               $this->redirect(array('controller'=>'Households', 'action'=>'index'));
            } else {
                $this->Session->setFlash("Your user combos is incorrect");
            }
        }
    }

    public function logout() {
        $this->redirect($this->Auth->logout());
    }

    public function index() {
        $this->User->recursive = 0;
        $this->set('users', $this->User->find('all'));
    }

    public function admin_view($id = null) {
        $this->User->id = $id;

        if (!$id) {
            $this->Session->setFlash('No User Passed');
            $this->redirect(array('action' => 'index'));
        }

        if (!$this->User->exists()) {
            //throw new NotFoundException('Invalid user - '.$id.' Not Found');
        }


        $this->set('user', $this->User->read());
    }

    public function add() {
        if ($this->request->is('post')) {
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash('The user has been saved');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('The user could not be saved. Please, try again.');
            }
        }
    }

    public function admin_edit($id = null) {
        $this->User->id = $id;

        if (!$this->User->exists()) {
            throw new NotFoundException('Invalid user');
        }

        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash('The user has been saved');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('The user could not be saved. Please, try again.');
            }
        } else {
            $this->request->data = $this->User->read();
        }
    }

    public function admin_delete($id = null) {
        if ($this->request->is('get')) {
            throw new MethodNotAllowedException();
        }

        if (!$id) {
            $this->Session->setFlash('Invalid id for user');
            $this->redirect(array('action' => 'index'));
        }
        if ($this->User->delete($id)) {
            $this->Session->setFlash('User deleted');
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash('User was not deleted');
        $this->redirect(array('action' => 'index'));
    }

}

?>
