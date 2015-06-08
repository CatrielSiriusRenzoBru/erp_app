<?php
App::uses('AppController', 'Controller');
/**
 * Genders Controller
 *
 * @property Gender $Gender
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class GendersController extends AppController {

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
		$this->Gender->recursive = 0;
		$this->set('genders', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Gender->exists($id)) {
			throw new NotFoundException(__('Invalid gender'));
		}
		$options = array('conditions' => array('Gender.' . $this->Gender->primaryKey => $id));
		$this->set('gender', $this->Gender->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Gender->create();
			if ($this->Gender->save($this->request->data)) {
				$this->Session->setFlash(__('The gender has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The gender could not be saved. Please, try again.'));
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
		if (!$this->Gender->exists($id)) {
			throw new NotFoundException(__('Invalid gender'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Gender->save($this->request->data)) {
				$this->Session->setFlash(__('The gender has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The gender could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Gender.' . $this->Gender->primaryKey => $id));
			$this->request->data = $this->Gender->find('first', $options);
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
		$this->Gender->id = $id;
		if (!$this->Gender->exists()) {
			throw new NotFoundException(__('Invalid gender'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Gender->delete()) {
			$this->Session->setFlash(__('The gender has been deleted.'));
		} else {
			$this->Session->setFlash(__('The gender could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
