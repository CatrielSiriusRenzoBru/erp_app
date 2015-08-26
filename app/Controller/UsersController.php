<?php
App::uses('AppController', 'Controller');

class UsersController extends AppController{
    
    public function index(){
        $users = $this->User->find('all');
        $this->set(compact("users"));
    }
    
    public function login(){
        if($this->request->is('post')){
            if($this->Auth->login()){
                $this->redirect( array('controller'=>'leaverequests','action'=>'plan') );
            } else {
                $this->Session->setFlash('Username or Password invalid');
            }
        }
    }
    
    public function add(){
        if( $this->request->is('post') ){
            if($this->User->save($this->request->data)){
                $this->Session->setFlash('Save Successfully');
            } else {
                $this->Session->setFlash('Oops! Could not save');
            } 
        } else {
            $this->Session->setFlash('Please try again.');
        }
    }
    
    public function logout(){
        $this->redirect($this->Auth->logout());
    }
    
    public function home(){
        $allusers = $this->User->find('all');
        $this->set(compact("allusers"));
    }
}
