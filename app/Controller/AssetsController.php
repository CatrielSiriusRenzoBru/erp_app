<?php
App::uses('AppController', 'Controller');
/**
 * Assets Controller
 *
 * @property Asset $Asset
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class AssetsController extends AppController {

/**
 * Helpers
 *
 * @var array
 */
	//public $helpers = array('N');

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
		$this->Asset->recursive = 0;
		$this->set('assets', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Asset->exists($id)) {
			throw new NotFoundException(__('Invalid asset'));
		}
		$options = array('conditions' => array('Asset.' . $this->Asset->primaryKey => $id));
		$this->set('asset', $this->Asset->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Asset->create();
			if ($this->Asset->save($this->request->data)) {
				$this->Session->setFlash(__('The asset has been saved.'));
				return $this->redirect(array('action' => 'home'));
			} else {
				$this->Session->setFlash(__('The asset could not be saved. Please, try again.'));
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
		if (!$this->Asset->exists($id)) {
			throw new NotFoundException(__('Invalid asset'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Asset->save($this->request->data)) {
				$this->Session->setFlash(__('The asset has been saved.'));
				return $this->redirect(array('action' => 'home'));
			} else {
				$this->Session->setFlash(__('The asset could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Asset.' . $this->Asset->primaryKey => $id));
			$this->request->data = $this->Asset->find('first', $options);
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
		$this->Asset->id = $id;
		if (!$this->Asset->exists()) {
			throw new NotFoundException(__('Invalid asset'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Asset->delete()) {
			$this->Session->setFlash(__('The asset has been deleted.'));
		} else {
			$this->Session->setFlash(__('The asset could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'home'));
	}
}
