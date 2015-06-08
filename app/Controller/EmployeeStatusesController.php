<?php
App::uses('AppController', 'Controller');
/**
 * EmployeeStatuses Controller
 *
 * @property EmployeeStatus $EmployeeStatus
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class EmployeeStatusesController extends AppController {

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
		$this->EmployeeStatus->recursive = 0;
		$this->set('employeeStatuses', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->EmployeeStatus->exists($id)) {
			throw new NotFoundException(__('Invalid employee status'));
		}
		$options = array('conditions' => array('EmployeeStatus.' . $this->EmployeeStatus->primaryKey => $id));
		$this->set('employeeStatus', $this->EmployeeStatus->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->EmployeeStatus->create();
			if ($this->EmployeeStatus->save($this->request->data)) {
				$this->Session->setFlash(__('The employee status has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The employee status could not be saved. Please, try again.'));
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
		if (!$this->EmployeeStatus->exists($id)) {
			throw new NotFoundException(__('Invalid employee status'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->EmployeeStatus->save($this->request->data)) {
				$this->Session->setFlash(__('The employee status has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The employee status could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('EmployeeStatus.' . $this->EmployeeStatus->primaryKey => $id));
			$this->request->data = $this->EmployeeStatus->find('first', $options);
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
		$this->EmployeeStatus->id = $id;
		if (!$this->EmployeeStatus->exists()) {
			throw new NotFoundException(__('Invalid employee status'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->EmployeeStatus->delete()) {
			$this->Session->setFlash(__('The employee status has been deleted.'));
		} else {
			$this->Session->setFlash(__('The employee status could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
