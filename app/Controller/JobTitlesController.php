<?php
App::uses('AppController', 'Controller');
/**
 * JobTitles Controller
 *
 * @property JobTitle $JobTitle
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class JobTitlesController extends AppController {

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
		$this->JobTitle->recursive = 0;
		$this->set('jobTitles', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->JobTitle->exists($id)) {
			throw new NotFoundException(__('Invalid job title'));
		}
		$options = array('conditions' => array('JobTitle.' . $this->JobTitle->primaryKey => $id));
		$this->set('jobTitle', $this->JobTitle->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->JobTitle->create();
			if ($this->JobTitle->save($this->request->data)) {
				$this->Session->setFlash(__('The job title has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The job title could not be saved. Please, try again.'));
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
		if (!$this->JobTitle->exists($id)) {
			throw new NotFoundException(__('Invalid job title'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->JobTitle->save($this->request->data)) {
				$this->Session->setFlash(__('The job title has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The job title could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('JobTitle.' . $this->JobTitle->primaryKey => $id));
			$this->request->data = $this->JobTitle->find('first', $options);
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
		$this->JobTitle->id = $id;
		if (!$this->JobTitle->exists()) {
			throw new NotFoundException(__('Invalid job title'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->JobTitle->delete()) {
			$this->Session->setFlash(__('The job title has been deleted.'));
		} else {
			$this->Session->setFlash(__('The job title could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
