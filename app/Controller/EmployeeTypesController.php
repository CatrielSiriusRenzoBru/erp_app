<?php
App::uses('AppController', 'Controller');
/**
 * EmployeeTypes Controller
 *
 * @property EmployeeType $EmployeeType
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class EmployeeTypesController extends AppController {

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
		$this->EmployeeType->recursive = 0;
		$this->set('employeeTypes', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->EmployeeType->exists($id)) {
			throw new NotFoundException(__('Invalid employee type'));
		}
		$options = array('conditions' => array('EmployeeType.' . $this->EmployeeType->primaryKey => $id));
		$this->set('employeeType', $this->EmployeeType->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->EmployeeType->create();
			if ($this->EmployeeType->save($this->request->data)) {
				$this->Session->setFlash(__('The employee type has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The employee type could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->EmployeeType->exists($id)) {
			throw new NotFoundException(__('Invalid employee type'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->EmployeeType->save($this->request->data)) {
				$this->Session->setFlash(__('The employee type has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The employee type could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('EmployeeType.' . $this->EmployeeType->primaryKey => $id));
			$this->request->data = $this->EmployeeType->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->EmployeeType->id = $id;
		if (!$this->EmployeeType->exists()) {
			throw new NotFoundException(__('Invalid employee type'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->EmployeeType->delete()) {
			$this->Session->setFlash(__('The employee type has been deleted.'));
		} else {
			$this->Session->setFlash(__('The employee type could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
