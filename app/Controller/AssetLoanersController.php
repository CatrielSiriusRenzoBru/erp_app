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
            $this->layout = null;
		if ($this->request->is('post')) {
                    $this->request->data['AssetLoaner']['borrowed_date'] = date('Y-m-d H:i:s');
			$this->AssetLoaner->create();
			if ($this->AssetLoaner->save($this->request->data)) {
				$this->Session->setFlash(__('The asset has been saved.'), 'alert-box', array('class'=>'alert-success') );
				return $this->redirect(array('controller'=>'employees', 'action' => 'view', $this->request->data['AssetLoaner']['employee_id']));
			} else {
				$this->Session->setFlash(__('The asset could not be saved. Please, try again.'), 'alert-box', array('class'=>'alert-danger') );
				return $this->redirect(array('controller'=>'employees', 'action' => 'view', $this->request->data['AssetLoaner']['employee_id']));
			}
		}
		$assets = $this->AssetLoaner->Asset->find('list');
		$this->set(compact('assets'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
            $this->layout = null;
		if (!$this->AssetLoaner->exists($id)) {
			throw new NotFoundException(__('Invalid asset loaner'));
		}
		if ($this->request->is(array('post', 'put'))) {
                    $this->AssetLoaner->id = $id;
			if ($this->AssetLoaner->save($this->request->data)) {
				$this->Session->setFlash(__('The asset has been saved.'), 'alert-box', array('class'=>'alert-success') );
				return $this->redirect(array('controller'=>'employees', 'action' => 'view', $this->request->data['AssetLoaner']['employee_id']));
			} else {
				$this->Session->setFlash(__('The asset could not be saved. Please, try again.'), 'alert-box', array('class'=>'alert-danger') );
				return $this->redirect(array('controller'=>'employees', 'action' => 'view', $this->request->data['AssetLoaner']['employee_id']));
			}
		} else {
			$options = array('conditions' => array('AssetLoaner.' . $this->AssetLoaner->primaryKey => $id));
			$this->request->data = $this->AssetLoaner->find('first', $options);
		}
		$assets = $this->AssetLoaner->Asset->find('list');
		$this->set(compact('assets'));
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
		} else {
                    $employee = $this->AssetLoaner->find('first', array('recursive'=>-1, 'conditions' => array('AssetLoaner.id' => $id)));
                    $eid = $employee['AssetLoaner']['employee_id'];
                }
		$this->request->allowMethod('post', 'delete');
		if ($this->AssetLoaner->delete()) {
			$this->Session->setFlash(__('The asset has been deleted.'), 'alert-box', array('class'=>'alert-success') );
		} else {
			$this->Session->setFlash(__('The asset could not be deleted. Please, try again.'), 'alert-box', array('class'=>'alert-danger') );
		}
		return $this->redirect(array('controller'=>'employees', 'action' => 'view', $eid));
	}
}
