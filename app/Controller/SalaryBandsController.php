<?php
App::uses('AppController', 'Controller');
/**
 * SalaryBands Controller
 *
 * @property SalaryBand $SalaryBand
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class SalaryBandsController extends AppController {

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
		$this->SalaryBand->recursive = 0;
		$this->set('salaryBands', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->SalaryBand->exists($id)) {
			throw new NotFoundException(__('Invalid salary band'));
		}
		$options = array('conditions' => array('SalaryBand.' . $this->SalaryBand->primaryKey => $id));
		$this->set('salaryBand', $this->SalaryBand->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->SalaryBand->create();
			if ($this->SalaryBand->save($this->request->data)) {
				$this->Session->setFlash(__('The salary band has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The salary band could not be saved. Please, try again.'));
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
		if (!$this->SalaryBand->exists($id)) {
			throw new NotFoundException(__('Invalid salary band'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->SalaryBand->save($this->request->data)) {
				$this->Session->setFlash(__('The salary band has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The salary band could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('SalaryBand.' . $this->SalaryBand->primaryKey => $id));
			$this->request->data = $this->SalaryBand->find('first', $options);
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
		$this->SalaryBand->id = $id;
		if (!$this->SalaryBand->exists()) {
			throw new NotFoundException(__('Invalid salary band'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->SalaryBand->delete()) {
			$this->Session->setFlash(__('The salary band has been deleted.'));
		} else {
			$this->Session->setFlash(__('The salary band could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
