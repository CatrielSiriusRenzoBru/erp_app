<?php
App::uses('AppController', 'Controller');
/**
 * Beneficiaries Controller
 *
 * @property Beneficiary $Beneficiary
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class BeneficiariesController extends AppController {

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
		$this->Beneficiary->recursive = 0;
		$this->set('beneficiaries', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Beneficiary->exists($id)) {
			throw new NotFoundException(__('Invalid beneficiary'));
		}
		$options = array('conditions' => array('Beneficiary.' . $this->Beneficiary->primaryKey => $id));
		$this->set('beneficiary', $this->Beneficiary->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
            $this->layout = null;
		if ($this->request->is('post')) {
                    //check remaining percentage
                    $total = $this->Beneficiary->find('first', array('fields'=>array('SUM(Beneficiary.percentage) AS total'), 'conditions'=>array('Beneficiary.employee_id'=>$this->request->data['Beneficiary']['employee_id'])));
                    if((100 - $total[0]['total']) >= $this->request->data['Beneficiary']['percentage']){
                        $this->Beneficiary->create();
			if ($this->Beneficiary->save($this->request->data)) {
				$this->Session->setFlash(__('The next-of-king has been saved.'), 'alert-box', array('class'=>'alert-success') );
				return $this->redirect(array('controller'=>'employees', 'action' => 'view', $this->request->data['Beneficiary']['employee_id']));
			} else {
				$this->Session->setFlash(__('The beneficiary could not be saved. Please, try again.'), 'alert-box', array('class'=>'alert-danger') );
				return $this->redirect(array('controller'=>'employees', 'action' => 'view', $this->request->data['Beneficiary']['employee_id']));
			}
                    } else {
                        $this->Session->setFlash(__('The percentage you are allocating to the next-of-king is more than the remain of <b>'.(100 - $total[0]['total']).'%</b>. Please, try again.'), 'alert-box', array('class'=>'alert-warning') );
			return $this->redirect(array('controller'=>'employees', 'action' => 'view', $this->request->data['Beneficiary']['employee_id']));
                    }
		}
		$title = $this->Beneficiary->Title->find('list', array('order'=>array('Title.title'=>'ASC')) );
                $country = $this->Beneficiary->Country->find('list', array('order'=>array('Country.title'=>'ASC')) );
                $this->set(compact('title', 'country'));
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
		if (!$this->Beneficiary->exists($id)) {
			throw new NotFoundException(__('Invalid beneficiary'));
		}
		if ($this->request->is(array('post', 'put'))) {
                    $total = $this->Beneficiary->find('first', array('fields'=>array('SUM(Beneficiary.percentage) AS total'), 'conditions'=>array('Beneficiary.employee_id'=>$this->request->data['Beneficiary']['employee_id'])));
                    //echo '<pre>'; echo $this->request->data['Beneficiary']['employee_id']; exit;
                    //check remaining percentage
                    if((100 - $total[0]['total']) >= $this->request->data['Beneficiary']['percentage']){
			$this->Beneficiary->id = $id;
                        if ($this->Beneficiary->save($this->request->data)) {
				$this->Session->setFlash(__('The next-of-king has been saved.'), 'alert-box', array('class'=>'alert-success') );
				return $this->redirect(array('controller'=>'employees', 'action' => 'view', $this->request->data['Beneficiary']['employee_id'].'#bene'));
			} else {
				$this->Session->setFlash(__('The beneficiary could not be saved. Please, try again.'), 'alert-box', array('class'=>'alert-danger') );
				return $this->redirect(array('controller'=>'employees', 'action' => 'view', $this->request->data['Beneficiary']['employee_id']));
			}
                    } else {
                        $this->Session->setFlash(__('The percentage you are allocating to the next-of-king is more than the remain of <b>'.(100 - $total[0]['total']).'%</b>. Please, try again.'), 'alert-box', array('class'=>'alert-warning') );
			return $this->redirect(array('controller'=>'employees', 'action' => 'view', $this->request->data['Beneficiary']['employee_id']));
                    }
		} else {
			$options = array('conditions' => array('Beneficiary.' . $this->Beneficiary->primaryKey => $id));
			$this->request->data = $this->Beneficiary->find('first', $options);
		}
		$title = $this->Beneficiary->Title->find('list', array('order'=>array('Title.title'=>'ASC')) );
                $country = $this->Beneficiary->Country->find('list', array('order'=>array('Country.title'=>'ASC')) );
                $this->set(compact('title', 'country'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Beneficiary->id = $id;
		if (!$this->Beneficiary->exists()) {
			throw new NotFoundException(__('Invalid beneficiary'));
		} else {
                    $employee = $this->Beneficiary->find('first', array('recursive'=>-1, 'conditions' => array('Beneficiary.id' => $id)));
                    $eid = $employee['Beneficiary']['employee_id'];
                }
		$this->request->allowMethod('post', 'delete');
		if ($this->Beneficiary->delete()) {
			$this->Session->setFlash(__('The next-of-king has been deleted.'), 'alert-box', array('class'=>'alert-success') );
		} else {
			$this->Session->setFlash(__('The next-of-king could not be deleted. Please, try again.'), 'alert-box', array('class'=>'alert-danger') );
		}
		return $this->redirect(array('controller'=>'employees', 'action' => 'view', $eid));
	}
}
