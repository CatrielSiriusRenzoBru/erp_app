<?php
App::uses('AppController', 'Controller');
/**
 * CostCentres Controller
 *
 * @property CostCentre $CostCentre
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class CostCentresController extends AppController {

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
		$this->CostCentre->recursive = 0;
		$this->set('costCentres', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->CostCentre->exists($id)) {
			throw new NotFoundException(__('Invalid cost centre'));
		}
		$options = array('conditions' => array('CostCentre.' . $this->CostCentre->primaryKey => $id));
		$this->set('costCentre', $this->CostCentre->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->CostCentre->create();
			if ($this->CostCentre->save($this->request->data)) {
				$this->Session->setFlash(__('The cost centre has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The cost centre could not be saved. Please, try again.'));
			}
		}
		$teams = $this->CostCentre->Team->find('list');
		$this->set(compact('teams'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->CostCentre->exists($id)) {
			throw new NotFoundException(__('Invalid cost centre'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->CostCentre->save($this->request->data)) {
				$this->Session->setFlash(__('The cost centre has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The cost centre could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('CostCentre.' . $this->CostCentre->primaryKey => $id));
			$this->request->data = $this->CostCentre->find('first', $options);
		}
		$teams = $this->CostCentre->Team->find('list');
		$this->set(compact('teams'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->CostCentre->id = $id;
		if (!$this->CostCentre->exists()) {
			throw new NotFoundException(__('Invalid cost centre'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->CostCentre->delete()) {
			$this->Session->setFlash(__('The cost centre has been deleted.'));
		} else {
			$this->Session->setFlash(__('The cost centre could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
