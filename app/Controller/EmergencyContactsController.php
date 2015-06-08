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
		if ($this->request->is('post')) {
			$this->EmergencyContact->create();
			if ($this->EmergencyContact->save($this->request->data)) {
				$this->Session->setFlash(__('The emergency contact has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The emergency contact could not be saved. Please, try again.'));
			}
		}
		$employees = $this->EmergencyContact->Employee->find('list');
		$this->set(compact('employees'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->EmergencyContact->exists($id)) {
			throw new NotFoundException(__('Invalid emergency contact'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->EmergencyContact->save($this->request->data)) {
				$this->Session->setFlash(__('The emergency contact has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The emergency contact could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('EmergencyContact.' . $this->EmergencyContact->primaryKey => $id));
			$this->request->data = $this->EmergencyContact->find('first', $options);
		}
		$employees = $this->EmergencyContact->Employee->find('list');
		$this->set(compact('employees'));
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
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->EmergencyContact->delete()) {
			$this->Session->setFlash(__('The emergency contact has been deleted.'));
		} else {
			$this->Session->setFlash(__('The emergency contact could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
