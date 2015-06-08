<?php
App::uses('AppController', 'Controller');
/**
 * LeaveStatuses Controller
 *
 * @property LeaveStatus $LeaveStatus
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class LeaveStatusesController extends AppController {

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
		$this->LeaveStatus->recursive = 0;
		$this->set('leaveStatuses', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->LeaveStatus->exists($id)) {
			throw new NotFoundException(__('Invalid leave status'));
		}
		$options = array('conditions' => array('LeaveStatus.' . $this->LeaveStatus->primaryKey => $id));
		$this->set('leaveStatus', $this->LeaveStatus->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->LeaveStatus->create();
			if ($this->LeaveStatus->save($this->request->data)) {
				$this->Session->setFlash(__('The leave status has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The leave status could not be saved. Please, try again.'));
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
		if (!$this->LeaveStatus->exists($id)) {
			throw new NotFoundException(__('Invalid leave status'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->LeaveStatus->save($this->request->data)) {
				$this->Session->setFlash(__('The leave status has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The leave status could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('LeaveStatus.' . $this->LeaveStatus->primaryKey => $id));
			$this->request->data = $this->LeaveStatus->find('first', $options);
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
		$this->LeaveStatus->id = $id;
		if (!$this->LeaveStatus->exists()) {
			throw new NotFoundException(__('Invalid leave status'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->LeaveStatus->delete()) {
			$this->Session->setFlash(__('The leave status has been deleted.'));
		} else {
			$this->Session->setFlash(__('The leave status could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
