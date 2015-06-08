<?php
App::uses('AppController', 'Controller');
/**
 * Titles Controller
 *
 * @property Title $Title
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class TitlesController extends AppController {

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
		$this->Title->recursive = 0;
		$this->set('titles', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Title->exists($id)) {
			throw new NotFoundException(__('Invalid title'));
		}
		$options = array('conditions' => array('Title.' . $this->Title->primaryKey => $id));
		$this->set('title', $this->Title->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Title->create();
			if ($this->Title->save($this->request->data)) {
				$this->Session->setFlash(__('The title has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The title could not be saved. Please, try again.'));
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
		if (!$this->Title->exists($id)) {
			throw new NotFoundException(__('Invalid title'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Title->save($this->request->data)) {
				$this->Session->setFlash(__('The title has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The title could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Title.' . $this->Title->primaryKey => $id));
			$this->request->data = $this->Title->find('first', $options);
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
		$this->Title->id = $id;
		if (!$this->Title->exists()) {
			throw new NotFoundException(__('Invalid title'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Title->delete()) {
			$this->Session->setFlash(__('The title has been deleted.'));
		} else {
			$this->Session->setFlash(__('The title could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
