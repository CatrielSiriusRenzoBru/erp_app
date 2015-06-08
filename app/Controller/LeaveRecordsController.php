<?php
App::uses('AppController', 'Controller');
/**
 * LeaveRecords Controller
 *
 * @property LeaveRecord $LeaveRecord
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class LeaveRecordsController extends AppController {

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
		$this->LeaveRecord->recursive = 0;
		$leaveRecords = $this->Paginator->paginate();
                $list = $this->LeaveRecord->find('all');
                $this->set(compact('list', 'leaveRecords'));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->LeaveRecord->exists($id)) {
			throw new NotFoundException(__('Invalid leave record'));
		}
		$options = array('conditions' => array('LeaveRecord.' . $this->LeaveRecord->primaryKey => $id));
		$this->set('leaveRecord', $this->LeaveRecord->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->LeaveRecord->create();
			if ($this->LeaveRecord->save($this->request->data)) {
				$this->Session->setFlash(__('The leave record has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The leave record could not be saved. Please, try again.'));
			}
		}
		$employees = $this->LeaveRecord->Employee->find('list');
		$leaveTypes = $this->LeaveRecord->LeaveType->find('list');
		$this->set(compact('employees', 'leaveTypes'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->LeaveRecord->exists($id)) {
			throw new NotFoundException(__('Invalid leave record'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->LeaveRecord->save($this->request->data)) {
				$this->Session->setFlash(__('The leave record has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The leave record could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('LeaveRecord.' . $this->LeaveRecord->primaryKey => $id));
			$this->request->data = $this->LeaveRecord->find('first', $options);
		}
		$employees = $this->LeaveRecord->Employee->find('list');
		$leaveTypes = $this->LeaveRecord->LeaveType->find('list');
		$this->set(compact('employees', 'leaveTypes'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->LeaveRecord->id = $id;
		if (!$this->LeaveRecord->exists()) {
			throw new NotFoundException(__('Invalid leave record'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->LeaveRecord->delete()) {
			$this->Session->setFlash(__('The leave record has been deleted.'));
		} else {
			$this->Session->setFlash(__('The leave record could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
