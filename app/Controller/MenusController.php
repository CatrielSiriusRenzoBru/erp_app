<?php
App::uses('AppController', 'Controller');

class MenusController extends AppController {
var $name = 'Menus';

function index() {
    if (isset($this->params['requested']) && $this->params['requested'] == true) {
        $menus = $this->Menu->find('all',  array('conditions'=>array('Menu.deleted'=>0)));
        $this->loadModel('Employee');
        $user = $this->Employee->find('first', array('recursive'=>-1, 'fields'=>array('Employee.firstname', 'Employee.othernames', 'Employee.lastname'), 'conditions'=>array('Employee.id'=>$this->Auth->user('employee_id'))) );
        $this->Session->write("logged_in_user", $user['Employee']['firstname'].' '.$user['Employee']['othernames'].' '.$user['Employee']['lastname']);
        return $menus;
    } else {
        $this->set( 'menus', $this->Menu->find('all', array('conditions'=>array('Menu.deleted'=>0))) );
    }
}

function add() {
    if (!empty($this->data)) {
        if ($this->Menu->save($this->data)) {
            $this->Session->setFlash(__('The menu item has been saved', true));
        }
    }
}

    // Build out additional CRUD functionality, 
    // for example edit / view / delete, as desired.

}