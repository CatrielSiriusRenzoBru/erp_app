<?php
App::uses('AppController', 'Controller');
/**
 * Salaries Controller
 *
 * @property Salary $Salary
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class SalariesController extends AppController {

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
		$this->Salary->recursive = 0;
		$this->set('salaries', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Salary->exists($id)) {
			throw new NotFoundException(__('Invalid salary'));
		}
		$options = array('conditions' => array('Salary.' . $this->Salary->primaryKey => $id));
		$this->set('salary', $this->Salary->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Salary->create();
			if ($this->Salary->save($this->request->data)) {
				$this->Session->setFlash(__('The salary has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The salary could not be saved. Please, try again.'));
			}
		}
		$employees = $this->Salary->Employee->find('list');
		$salaryBands = $this->Salary->SalaryBand->find('list');
		$this->set(compact('employees', 'salaryBands'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Salary->exists($id)) {
			throw new NotFoundException(__('Invalid salary'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Salary->save($this->request->data)) {
				$this->Session->setFlash(__('The salary has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The salary could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Salary.' . $this->Salary->primaryKey => $id));
			$this->request->data = $this->Salary->find('first', $options);
		}
		$employees = $this->Salary->Employee->find('list');
		$salaryBands = $this->Salary->SalaryBand->find('list');
		$this->set(compact('employees', 'salaryBands'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Salary->id = $id;
		if (!$this->Salary->exists()) {
			throw new NotFoundException(__('Invalid salary'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Salary->delete()) {
			$this->Session->setFlash(__('The salary has been deleted.'));
		} else {
			$this->Session->setFlash(__('The salary could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
