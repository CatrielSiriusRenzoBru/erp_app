<?php
App::uses('AppController', 'Controller');
/**
 * EmergencyContacts Controller
 *
 * @property EmergencyContact $EmergencyContact
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class EmergencyContactsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->EmergencyContact->recursive = 0;
		$this->set('emergencyContacts', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->EmergencyContact->exists($id)) {
			throw new NotFoundException(__('Invalid emergency contact'));
		}
		$options = array('conditions' => array('EmergencyContact.' . $this->EmergencyContact->primaryKey => $id));
		$this->set('emergencyContact', $this->EmergencyContact->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
            $this->layout = null;
		if ($this->request->is('post')) {
			$this->EmergencyContact->create();
			if ($this->EmergencyContact->save($this->request->data)) {
				$this->Session->setFlash(__('The emergency contact has been saved.'), 'alert-box', array('class'=>'alert-success') );
				return $this->redirect(array('controller'=>'employees', 'action' => 'view', $this->request->data['EmergencyContact']['employee_id']));
			} else {
				$this->Session->setFlash(__('The emergency contact could not be saved. Please, try again.'), 'alert-box', array('class'=>'alert-danger') );
                                return $this->redirect(array('controller'=>'employees', 'action' => 'view', $this->request->data['Beneficiary']['employee_id']));
			}
		}
		$title = $this->EmergencyContact->Title->find('list', array('order'=>array('Title.title'=>'ASC')) );
                $country = $this->EmergencyContact->Country->find('list', array('order'=>array('Country.title'=>'ASC')) );
                $relationship = $this->EmergencyContact->Relationship->find('list', array('order'=>array('Relationship.title'=>'ASC')) );
		$this->set(compact('title', 'country', 'relationship'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
            $this->layout = null;
		if (!$this->EmergencyContact->exists($id)) {
			throw new NotFoundException(__('Invalid emergency contact'));
		}
                
		if ($this->request->is(array('post', 'put'))) {
                        $this->EmergencyContact->id = $id;
			if ($this->EmergencyContact->save($this->request->data)) {
				$this->Session->setFlash(__('The emergency contact has been saved.'), 'alert-box', array('class'=>'alert-success') );
				return $this->redirect(array('controller'=>'employees', 'action' => 'view', $this->request->data['EmergencyContact']['employee_id']));
			} else {
				$this->Session->setFlash(__('The emergency contact could not be saved. Please, try again.'), 'alert-box', array('class'=>'alert-danger') );
                                return $this->redirect(array('controller'=>'employees', 'action' => 'view', $this->request->data['Beneficiary']['employee_id']));
			}
		} else {
			$options = array('recursive'=>-1, 'conditions' => array('EmergencyContact.' . $this->EmergencyContact->primaryKey => $id));
			$this->request->data = $this->EmergencyContact->find('first', $options);
		}
                
                        
		$title = $this->EmergencyContact->Title->find('list', array('order'=>array('Title.title'=>'ASC')) );
                $country = $this->EmergencyContact->Country->find('list', array('order'=>array('Country.title'=>'ASC')) );
                $relationship = $this->EmergencyContact->Relationship->find('list', array('order'=>array('Relationship.title'=>'ASC')) );
		$this->set(compact('title', 'country', 'relationship'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->EmergencyContact->id = $id;
		if (!$this->EmergencyContact->exists()) {
			throw new NotFoundException(__('Invalid emergency contact'));
                } else {
                    $employee = $this->EmergencyContact->find('first', array('recursive'=>-1, 'conditions' => array('EmergencyContact.id' => $id)));
                    $eid = $employee['EmergencyContact']['employee_id'];
                }
		$this->request->allowMethod('post', 'delete');
		if ($this->EmergencyContact->delete()) {
			$this->Session->setFlash(__('The emergency contact has been deleted.'), 'alert-box', array('class'=>'alert-success') );
		} else {
			$this->Session->setFlash(__('The emergency contact could not be deleted. Please, try again.'), 'alert-box',  array('class'=>'alert-danger') );
		}
		return $this->redirect(array('controller'=>'employees', 'action' => 'view', $eid));
	}
}
