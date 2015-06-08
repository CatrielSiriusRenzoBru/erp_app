<?php
App::uses('AppController', 'Controller');
/**
 * AssetLoaners Controller
 *
 * @property AssetLoaner $AssetLoaner
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class AssetLoanersController extends AppController {

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
		$this->AssetLoaner->recursive = 0;
		$this->set('assetLoaners', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->AssetLoaner->exists($id)) {
			throw new NotFoundException(__('Invalid asset loaner'));
		}
		$options = array('conditions' => array('AssetLoaner.' . $this->AssetLoaner->primaryKey => $id));
		$this->set('assetLoaner', $this->AssetLoaner->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->AssetLoaner->create();
			if ($this->AssetLoaner->save($this->request->data)) {
				$this->Session->setFlash(__('The asset loaner has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The asset loaner could not be saved. Please, try again.'));
			}
		}
		$employees = $this->AssetLoaner->Employee->find('list');
		$assets = $this->AssetLoaner->Asset->find('list');
		$this->set(compact('employees', 'assets'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->AssetLoaner->exists($id)) {
			throw new NotFoundException(__('Invalid asset loaner'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->AssetLoaner->save($this->request->data)) {
				$this->Session->setFlash(__('The asset loaner has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The asset loaner could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('AssetLoaner.' . $this->AssetLoaner->primaryKey => $id));
			$this->request->data = $this->AssetLoaner->find('first', $options);
		}
		$employees = $this->AssetLoaner->Employee->find('list');
		$assets = $this->AssetLoaner->Asset->find('list');
		$this->set(compact('employees', 'assets'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->AssetLoaner->id = $id;
		if (!$this->AssetLoaner->exists()) {
			throw new NotFoundException(__('Invalid asset loaner'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->AssetLoaner->delete()) {
			$this->Session->setFlash(__('The asset loaner has been deleted.'));
		} else {
			$this->Session->setFlash(__('The asset loaner could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
